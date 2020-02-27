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

from modulesSTSClustering.utils import checkDataSet
from modulesSTSClustering.utils import standarizedDataSet

#inputs from command line
dataset = pd.read_csv(sys.argv[1])
type_scaler = int(sys.argv[2])

print "Check dataset elements"
checkElement = checkDataSet.checkDataSet(dataset)
checkElement.evaluateNullData()
checkElement.evaluateTypeData()
dataset_check = checkElement.dataset

print "To apply standardization at dataset"
standarHandler = standarizedDataSet.standardizedDataSet(dataset_check)

if type_scaler == 1:
    standarHandler.applyQuickScale()
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

dataset_standard = standarHandler.dataset_scaled

print dataset_standard
