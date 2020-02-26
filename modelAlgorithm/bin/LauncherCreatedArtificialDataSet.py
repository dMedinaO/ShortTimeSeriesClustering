import pandas as pd
import sys
import random

path = sys.argv[1]
datasetDemo = pd.read_csv(sys.argv[2])

#creamos los diferentes conjuntos de datos asociados a los requerimientos de la data artifical
#1. Conjunto maximo de datos

matrixData = []

for i in range(10000):#examples
    row = []
    for j in range(1000):#features
        row.append(random.uniform(2,10))
    row.append(random.randrange(100))
    matrixData.append(row)

header = []
for i in range(1001):
    header.append('C'+str(i))

#exportamos al dataFrame
dataDimension = pd.DataFrame(matrixData, columns = header)
dataDimension.to_csv(path+"dimensionFull.csv", index=False)

#a partir del dataset demo, creamos el conjunto de datos con ruido
