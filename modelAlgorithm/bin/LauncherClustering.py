########################################################################
# Copyright (C) 2020  David Medina Ortiz, david.medina@cebib.cl
#
# This program is free software; you can redistribute it and/or modify
# it under the terms of the GNU General Public License as published by
# the Free Software Foundation; either version 3 of the License, or
# any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software Foundation,
# Inc., 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301  USA
########################################################################

import pandas as pd
import sys
import graphviz as gp
import pylab
import sys
import time
import glob
import os
import json

from modulesSTSClustering.utils import checkDataSet
from modulesSTSClustering.utils import standarizedDataSet
from modulesSTSClustering.utils import summaryStatisticsClustering
from modulesSTSClustering.clustering_analysis import callService
from modulesSTSClustering.clustering_analysis import evaluationClustering

class Nodo(object):
    def __init__(self, data):
        # Data contiene el dataFrame de cada nodo
        self.data = data
        # Marca unica para realizar enlace y edges con graphviz
        self.id = int(round(time.time() * 1000))
        # rama izq
        self.left = None
        # rama der
        self.right = None

class BinaryTree(object):
    def __init__(self):
        self.top = None

    # Llamada para dividir grupo de forma recursiva
    def split(self, nodo, dataSet, pathResponse, threshold, sizeEval, significancia):
        callServiceObject = callService.serviceClustering(dataSet, pathResponse, threshold, sizeEval, significancia)
        #callService debe retornar un arreglo en donde [sePuedeDividir,dataFramegrupo1,dataFramegrupo2]
        result = callServiceObject.execProcess()
        if isinstance(result,list):
            if(result[0] == -1):
                dataSet.to_csv(pathResponse+""+str(dataSet.shape[0])+'_'+str(int(round(time.time() * 1000)))+'.csv', index=False)
                return nodo
            else:
                #Los sleep es para generar id unicos por cada dataframe que se agregaal arbol
                nodo.left = Nodo(result[1])
                time.sleep(0.05)
                nodo.right = Nodo(result[2])
                time.sleep(0.05)
                nodo.left = self.split(nodo.left,result[1], pathResponse, threshold, sizeEval, significancia)
                time.sleep(0.05)
                nodo.right = self.split(nodo.right,result[2], pathResponse, threshold, sizeEval, significancia)
                return nodo
        else:
            #almacena nodo anterior que se pudo dividir
            dataSet.to_csv(pathResponse+""+str(dataSet.shape[0])+'_'+str(int(round(time.time() * 1000)))+'.csv', index=False)
            return nodo

    # Llamar funcion recursiva para dibujar arbol
    def diagramSplit(self, pathResult) :
        tree = gp.Digraph(format='png')
        if(self.top != None):
            self.draw(self.top,tree);
        # formatear pathResult quitando ultimo slash
        pathResult=pathResult[0:(len(pathResult)-1)]
        filename = tree.render(filename='tree',directory=pathResult)

    # Renderiza arbol de clustering
    def draw(self,data,tree):
        if(data.left != None):
            tree.edge(str(data.id),str(data.left.id));
            self.draw(data.left,tree)
        tree.node(str(data.id),str(data.data.shape[0]))
        if(data.right != None):
            tree.edge(str(data.id),str(data.right.id));
            self.draw(data.right,tree)

    # Insercion para el nodo raiz
    def insert(self, data):
        self.top = Nodo(data)

#inputs from command line
dataset = pd.read_csv(sys.argv[1])
type_scaler = int(sys.argv[2])
pathResponse = sys.argv[3]
threshold = float(sys.argv[4])
significancia = float(sys.argv[5])

checkElement = checkDataSet.checkDataSet(dataset)
checkElement.evaluateNullData()
response_check = checkElement.evaluateTypeData()

if response_check == 0:
    dataset_check = checkElement.dataset

    standarHandler = standarizedDataSet.standardizedDataSet(dataset_check)

    if type_scaler == 1:
        standarHandler.applyStandarScale()
    elif type_scaler == 2:
        standarHandler.applyStandarScale()
    elif type_scaler == 3:
        standarHandler.applyMinMaxScaler()
    elif type_scaler == 4:
        standarHandler.applyMaxAbosulteScaler()
    elif type_scaler == 5:
        standarHandler.applyQuantileScaler()
    else:
        standarHandler.applyPowerTransformation()

    dataset_standard = pd.DataFrame(standarHandler.dataset_scaled, columns=dataset.keys())
    #Obtiene la cantida de row del dataSet
    initialSize = dataset_standard.shape[0];
    tree = BinaryTree()
    #Nodo raiz con la informacion del dataSet inicial
    tree.insert(dataset_standard)
    tree.split(tree.top,dataset_standard, pathResponse, threshold, initialSize, significancia)
    tree.diagramSplit(pathResponse)

    #una vez procesada la data... para cada elemento en formato csv en el path response... lo leemos
    listFiles = glob.glob(pathResponse+"*.csv")

    matrixFull = []
    matrixGroup = []
    classResponse = []

    #creamos un directorio donde se almacenaran los resultados de los archivos
    command = "mkdir -p %sgroups" % pathResponse
    os.system(command)

    dictGroupResponse = []

    indexGroupArray = []
    numberElementGroupArray = []

    indexClass = 1
    for files in listFiles:
        dataFrame = pd.read_csv(files)
        #armamos la matriz completa
        for i in range(len(dataFrame)):
            row = []
            for key in dataFrame:
                row.append(dataFrame[key][i])#formamos la fila
            classResponse.append(indexClass)
            matrixGroup.append(row)

        #cambiamos el nombre del archivo
        command = "mv %s %sgroups/%d.csv" % (files, pathResponse, indexClass)
        os.system(command)

        dictGroupResponse.append({"id_group":"Group ID "+str(indexClass), "number":len(dataFrame)})
        indexGroupArray.append("Group ID "+str(indexClass))
        numberElementGroupArray.append(len(dataFrame))
        indexClass+=1

    #export JSON with information about group
    with open(pathResponse+"summary_group.json", 'w') as fp:
        json.dump(dictGroupResponse, fp)

    #formamos el conjunto de datos para el entrenamiento del modelo de clasificacion
    dataFrameExport = pd.DataFrame(matrixGroup, columns=dataFrame.keys())

    clusteringPerformance = evaluationClustering.evaluationClustering(dataFrameExport, classResponse)

    #reducimos los datos a la codificacion original
    dataFrameExport = standarHandler.scaler.inverse_transform(dataFrameExport)
    dataFrameExport = pd.DataFrame(dataFrameExport, columns=dataset.keys())
    dataFrameExport['classGroup'] = classResponse
    dataFrameExport.to_csv(pathResponse+"fullDataSetWith.csv", index=False)

    #trabajamos las estadisticas de cada grupo...
    indexClassArray = list(set(dataFrameExport['classGroup']))

    matrixMeanGroup = []
    indexClassID = []

    for indexClass in indexClassArray:
        summaryCluster = summaryStatisticsClustering.summaryStatistics(dataFrameExport, indexClass)
        dataFrameStatisticsGroup, dataFrameExportColumns, dataFrameOriginal = summaryCluster.getValuesForGroup()

        #export dataFrame
        nameDoc = "%sgroups/%s_statistical_information.csv" % (pathResponse, indexClass)
        dataFrameStatisticsGroup.to_csv(nameDoc, index=False)
        #export dataFrame to load in csv view
        nameDoc = "%sgroups/%s_statistical_information_export_csv.csv" % (pathResponse, indexClass)
        dataFrameExportColumns.to_csv(nameDoc, index=False)

        row = []
        for element in dataFrameExportColumns['AVG_Point']:
            row.append(element)
        matrixMeanGroup.append(row)
        indexClassID.append("Group ID "+str(indexClass))

        #export dataFrame with original values
        nameDoc = "%sgroups/%s_original_values.csv" % (pathResponse, indexClass)
        dataFrameOriginal.to_csv(nameDoc, index=False)

    featureArray = []
    for key in dataFrameOriginal.keys():
        featureArray.append(key)

    #make summary file process
    dictSummary = {"fileInput": sys.argv[1].split("/")[-1], "status": "OK", "groups": len(indexClassArray), "calinski": clusteringPerformance.calinski, "siluetas": clusteringPerformance.siluetas, "indexGroupArray":indexGroupArray, "numberElementGroupArray":numberElementGroupArray, "AVG_Curves":matrixMeanGroup, "indexArrayID":indexClassID, "features":featureArray}
    print "OK"

else:
    dictSummary = {"fileInput": sys.argv[1].split("/")[-1], "status": "ERROR", "groups": -1, "calinski": -1, "siluetas": -1}
    print "ERROR"
with open(pathResponse+"summary_process.json", 'w') as fp:
    json.dump(dictSummary, fp)
