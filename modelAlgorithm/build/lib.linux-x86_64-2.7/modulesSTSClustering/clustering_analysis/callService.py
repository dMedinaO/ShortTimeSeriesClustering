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

from modulesSTSClustering.clustering_analysis import processClustering
from modulesSTSClustering.clustering_analysis import evaluationClustering
from modulesSTSClustering.clustering_analysis import summaryScan
from modulesSTSClustering.clustering_analysis import checkProcessCluster
from modulesSTSClustering.utils import utilsFunctions

import pandas as pd

class serviceClustering(object):

    def __init__(self, dataSet, pathResponse, threshold, sizeEval, significancia):

        self.sizeEval = sizeEval
        self.dataSet = dataSet#matriz de elementos
        self.threshold = threshold#umbral de desbalance aceptado
        self.pathResponse = pathResponse
        self.significancia = significancia
        self.applyClustering = processClustering.aplicateClustering(self.dataSet)

    #Exec exploration service based on unsupervised learning algorithm
    def execProcess(self):

        checkObject = checkProcessCluster.checkProcess()#instance of check
        utils = utilsFunctions.utilsFunctions()#instance of utils functions process
        partitions_candidates = []#to save candidate partitions
        k=2

        #exec K-Means
        responseExec = self.applyClustering.aplicateKMeans(k)#To apply algorithm
        if responseExec == 0:#ok!
            try:
                result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                numberGroups = 2#allways are two members
                label1, label2 =  utils.checkMembersDistributionCluster(self.applyClustering.labels)

                #get matrix splitter by group
                matrixGroup1, matrixGroup2 = utils.createMatrixData(self.applyClustering.labels, self.dataSet)

                #to create dataFrame for matrix
                dataG1 = pd.DataFrame(matrixGroup1, columns=self.dataSet.keys())
                dataG2 = pd.DataFrame(matrixGroup2, columns=self.dataSet.keys())

                #check members in group based on threshold and original size of dataset
                response_size_criterion = checkObject.checkSplitter(label1, label2, self.threshold, self.sizeEval)
                response_statistical_criterion =  checkObject.checkStatisticValidation(matrixGroup1, matrixGroup2, self.significancia)
                response_bi_modal_g1 = utils.evaluateBiModalByGroup(dataG1)
                response_bi_modal_g2 = utils.evaluateBiModalByGroup(dataG2)

                #to evaluate options
                responseCheck = utils.evaluationCriterionPerSplit(response_size_criterion, response_statistical_criterion, response_bi_modal_g1, response_bi_modal_g2)

                if responseCheck == 1:#add to list!
                    #evaluation clustering!
                    result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                    row = [dataG1, dataG2, result.calinski, result.siluetas]
                    partitions_candidates.append(row)
            except:
                pass

        #exec Birch
        responseExec = self.applyClustering.aplicateBirch(k)#To apply algorithm
        if responseExec == 0:#OK!
            try:
                result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                numberGroups = 2#allways are two members
                label1, label2 =  utils.checkMembersDistributionCluster(self.applyClustering.labels)

                #get matrix splitter by group
                matrixGroup1, matrixGroup2 = utils.createMatrixData(self.applyClustering.labels, self.dataSet)

                #to create dataFrame for matrix
                dataG1 = pd.DataFrame(matrixGroup1, columns=self.dataSet.keys())
                dataG2 = pd.DataFrame(matrixGroup2, columns=self.dataSet.keys())

                #check members in group based on threshold and original size of dataset
                response_size_criterion = checkObject.checkSplitter(label1, label2, self.threshold, self.sizeEval)
                response_statistical_criterion =  checkObject.checkStatisticValidation(matrixGroup1, matrixGroup2, self.significancia)
                response_bi_modal_g1 = utils.evaluateBiModalByGroup(dataG1)
                response_bi_modal_g2 = utils.evaluateBiModalByGroup(dataG2)

                #to evaluate options
                responseCheck = utils.evaluationCriterionPerSplit(response_size_criterion, response_statistical_criterion, response_bi_modal_g1, response_bi_modal_g2)

                if responseCheck == 1:#add to list!
                    #evaluation clustering!
                    result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                    row = [dataG1, dataG2, result.calinski, result.siluetas]
                    partitions_candidates.append(row)
            except:
                pass

        #exec agglomerative clustering
        for affinity in ['euclidean', 'l1', 'l2', 'manhattan', 'cosine', 'precomputed']:
            for linkage in ['ward', 'complete', 'average', 'single']:
                responseExec = self.applyClustering.aplicateAlgomerativeClustering(linkage, affinity, k)#to apply algorithm
                if responseExec == 0:
                    try:
                        result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                        numberGroups = 2#allways are two members
                        label1, label2 =  utils.checkMembersDistributionCluster(self.applyClustering.labels)

                        #get matrix splitter by group
                        matrixGroup1, matrixGroup2 = utils.createMatrixData(self.applyClustering.labels, self.dataSet)

                        #to create dataFrame for matrix
                        dataG1 = pd.DataFrame(matrixGroup1, columns=self.dataSet.keys())
                        dataG2 = pd.DataFrame(matrixGroup2, columns=self.dataSet.keys())

                        #check members in group based on threshold and original size of dataset
                        response_size_criterion = checkObject.checkSplitter(label1, label2, self.threshold, self.sizeEval)
                        response_statistical_criterion =  checkObject.checkStatisticValidation(matrixGroup1, matrixGroup2, self.significancia)
                        response_bi_modal_g1 = utils.evaluateBiModalByGroup(dataG1)
                        response_bi_modal_g2 = utils.evaluateBiModalByGroup(dataG2)

                        #to evaluate options
                        responseCheck = utils.evaluationCriterionPerSplit(response_size_criterion, response_statistical_criterion, response_bi_modal_g1, response_bi_modal_g2)

                        if responseCheck == 1:#add to list!
                            #evaluation clustering!
                            result = evaluationClustering.evaluationClustering(self.dataSet, self.applyClustering.labels)#evaluamos...
                            row = [dataG1, dataG2, result.calinski, result.siluetas]
                            partitions_candidates.append(row)
                    except:
                        pass

        #if there are not candidates, it is not possible continue with split, finish recursive in this branch
        if len(partitions_candidates)==0:
            return [-1,-1,-1]
        else:
            #get best partition
            indexCandidate = utils.getBestpartitionOfList(partitions_candidates)
            return [1, partitions_candidates[indexCandidate][0], partitions_candidates[indexCandidate][1]]
