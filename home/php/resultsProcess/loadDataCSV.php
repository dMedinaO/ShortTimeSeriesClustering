<?php

  $job = $_REQUEST['job'];
  $nameDocument = "/var/www/html/ShortTimeSeriesClustering/jobs/$job/statisticsSummary.csv";
  $row = 0;

  $matrixResponse = [];
  $header = ['Feature', 'Average', 'StandarDeviation', 'Variance',	'MaxValue', 'MinValue'];
  $dataAdd = 0;

  if (($handle = fopen($nameDocument, "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
      $rowData= [];
      $num = count($data);
      if ($row != 0){
        for ($c=0; $c < $num; $c++) {

            $rowData[$header[$c]] = $data[$c];
        }
        $matrixResponse[$dataAdd] = $rowData;
        $dataAdd++;
      }
      $row++;
    }
    fclose($handle);
  }

  $responseData['data'] = $matrixResponse;
  echo json_encode($responseData);
?>
