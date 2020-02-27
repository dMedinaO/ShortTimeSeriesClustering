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
        scaler = preprocessing.StandardScaler().fit(self.dataset)
        self.dataset_scaled = scaler.transform(self.dataset)

    def applyMinMaxScaler(self):#min max scaler
        min_max_scaler = preprocessing.MinMaxScaler()
        self.dataset_scaled = min_max_scaler.fit_transform(self.dataset)

    def applyMaxAbosulteScaler(self):#max absolute scaler
        max_abs_scaler = preprocessing.MaxAbsScaler()
        self.dataset_scaled = max_abs_scaler.fit_transform(self.dataset)

    def applyQuantileScaler(self):#quantile scaler
        quantile_transformer = preprocessing.QuantileTransformer(random_state=0)
        self.dataset_scaled = quantile_transformer.fit_transform(self.dataset)

    def applyPowerTransformation(self):#power transformation scaler
        pt = preprocessing.PowerTransformer(method='box-cox', standardize=False)
        self.dataset_scaled = pt.fit_transform(self.dataset)
