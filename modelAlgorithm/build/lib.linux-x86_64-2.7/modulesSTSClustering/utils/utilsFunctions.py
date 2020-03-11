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
from modulesSTSClustering.clustering_analysis import checkProcessCluster

class utilsFunctions(object):

    #create matrix from response clustering splitter by labels (two matrix):
    def createMatrixData(self, labels, dataSet):

        matrixGroup1 = []
        matrixGroup2 = []

        for i in range(len(labels)):
            row = []
            for key in dataSet:
                row.append(dataSet[key][i])
            if labels[i] == 0:#group 1
                matrixGroup1.append(row)
            else:#group 2
                matrixGroup2.append(row)

        return matrixGroup1, matrixGroup2

    #count members per group
    def checkMembersDistributionCluster(self, labels):

        label1 = 0
        label2 = 0

        for label in labels:
            if label == 0:
                label1+=1
            else:
                label2+=1

        return label1, label2

    #evaluation bi modal to dataset
    def evaluateBiModalByGroup(self, dataset):
        cluster_check = checkProcessCluster.checkProcess()#instance of check
        response = 1#there are only one extreme point in distribution in all points of time series
        for key in dataset.keys():
            if len(cluster_check.getExtremePoints(dataset[key])) >1:
                response=0#there are more of one extreme points in point of time serie
                break
        return response

    #evaluation of criterion by options
    def evaluationCriterionPerSplit(self, response_size_criterion, response_statistical_criterion, response_bi_modal_g1, response_bi_modal_g2):

        response =-1
        #size member criterio
        if response_size_criterion == 1:#criterion OK
            if response_statistical_criterion == 1:#criterion OK
                response=1#all OK it is possible to continue split the dataset
            else:#check bi modal options
                if response_bi_modal_g1 == 0 or response_bi_modal_g2 == 0:
                    response=1#statistically is not OK, but, there are different extreme points, are multi-modal distribution
        return response

    #get best partition (index)
    def getBestpartitionOfList(self, partitions_candidates):

        calinski_perform = []
        silhouette_perform = []

        for i in range(len(partitions_candidates)):
            calinski_perform.append(partitions_candidates[i][2])
            silhouette_perform.append(partitions_candidates[i][3])

        #get max values
        max_calinski_perform = max(calinski_perform)
        max_silhouette_perform = max(silhouette_perform)

        indexCandCal = []
        indexCandSil = []

        index=0
        for element in calinski_perform:
            if element == max_calinski_perform:
                indexCandCal.append(index)
            index+=1

        index=0
        for element in silhouette_perform:
            if element == max_silhouette_perform:
                indexCandSil.append(index)
            index+=1

        #buscamos los calinski que estan en ambas listas, si no existen, solo tomamos el primer elemento
        indexCandidato = -1

        for element in indexCandCal:
            if element in indexCandSil:
                indexCandidato=element
                break

        if indexCandidato == -1:
            indexCandidato = indexCandCal[0]

        return indexCandidato
