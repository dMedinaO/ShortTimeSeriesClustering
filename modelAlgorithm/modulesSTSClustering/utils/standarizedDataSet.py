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
from sklearn import preprocessing

class standardizedDataSet(object):

    def __init__(self, dataset):

        self.dataset = dataset

    def applyQuickScale(self):#quick scaler
        self.dataset_scaled = preprocessing.scale(self.dataset)

    def applyStandarScale(self):#standar scaler
        self.scaler = preprocessing.StandardScaler().fit(self.dataset)
        self.dataset_scaled = self.scaler.transform(self.dataset)

    def applyMinMaxScaler(self):#min max scaler
        self.scaler = preprocessing.MinMaxScaler()
        self.dataset_scaled = self.scaler.fit_transform(self.dataset)

    def applyMaxAbosulteScaler(self):#max absolute scaler
        self.scaler = preprocessing.MaxAbsScaler()
        self.dataset_scaled = self.scaler.fit_transform(self.dataset)

    def applyQuantileScaler(self):#quantile scaler
        self.scaler = preprocessing.QuantileTransformer(random_state=0)
        self.dataset_scaled = self.scaler.fit_transform(self.dataset)

    def applyPowerTransformation(self):#power transformation scaler
        self.scaler = preprocessing.PowerTransformer(method='box-cox', standardize=False)
        self.dataset_scaled = self.scaler.fit_transform(self.dataset)
