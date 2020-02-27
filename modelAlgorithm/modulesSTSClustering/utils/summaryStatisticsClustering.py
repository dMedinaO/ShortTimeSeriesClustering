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
import numpy as np

class summaryStatistics(object):

    def __init__(self, dataset, cluster_index):
        self.dataset = dataset
        self.cluster_index = cluster_index

    def getValuesForGroup(self):

        matrixData = []

        for i in range(len(self.dataset)):
            if self.dataset['classGroup'][i] == self.cluster_index:
                row = []
                for key in self.dataset.keys():
                    row.append(self.dataset[key][i])

                matrixData.append(row)

        dataFrame = pd.DataFrame(matrixData, columns=self.dataset.keys())
        dataFrame = dataFrame.drop(['classGroup'], axis=1)

        #get statistical values
        arrayIndex = ["Max Point", "Min Point", "AVG Point", "Variance", "Standar Deviation"]
        maxData = []
        minData = []
        meanData = []
        varData = []
        stdData = []

        for key in dataFrame.keys():
            maxData.append(max(dataFrame[key]))
            minData.append(min(dataFrame[key]))
            meanData.append(np.mean(dataFrame[key]))
            varData.append(np.var(dataFrame[key]))
            stdData.append(np.std(dataFrame[key]))

        responseMatrix = [maxData, minData, meanData, varData, stdData]
        dataExport = pd.DataFrame(responseMatrix, columns=dataFrame.keys())
        dataExport['Property'] = arrayIndex

        return dataExport
