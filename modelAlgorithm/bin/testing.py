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
    initialSize = dataset_standard.shape[0]

    #to apply clustering for testing call service
    callServiceObject = callService.serviceClustering(dataset_standard, pathResponse, threshold, initialSize, significancia)
    #callService debe retornar un arreglo en donde [sePuedeDividir,dataFramegrupo1,dataFramegrupo2]
    response = callServiceObject.execProcess()

    print response
