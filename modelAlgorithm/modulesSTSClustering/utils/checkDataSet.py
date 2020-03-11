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

class checkDataSet(object):

    def __init__(self, dataset):
        self.dataset = dataset

    #to remove null values in dataset
    def evaluateNullData(self):

        self.dataset = self.dataset.dropna(how='any',axis=0)
    #to check values if there are string o characters in dataset
    def evaluateTypeData(self):

        response = 0
        for i in range(len(self.dataset)):
            for key in self.dataset.keys():
                try:
                    data = float(self.dataset[key][i])
                except:
                    response = 1
                    break
                    pass
            if response == 1:
                break

        return response
