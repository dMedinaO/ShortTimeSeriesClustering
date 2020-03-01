<?php

  $job = $_REQUEST['job'];
  $group = $_REQUEST['group'];
  $nameDocument = "/var/www/html/clusteringShortTimeSeries/jobs/$job/results/groups/$group"."_statistical_information_export_csv.csv";
  $row = 0;

  $matrixResponse = [];
  $header = ["Max_Point", "Min_Point", "AVG_Point", "Variance", "Standar_Deviation", "Feature"];
  $dataAdd = 0;

  $responseData = [];
  $responseData['nameDoc'] = $nameDocument;
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
  }else{
    $responseData['res'] = "ERROR";
  }

  $responseData['data'] = $matrixResponse;
  echo json_encode($responseData);
?>
