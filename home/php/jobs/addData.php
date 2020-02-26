<?php

  include("../readDocument.php");

  #recibimos los parametros...
  $optionProcess = $_REQUEST['optionProcess'];
  $percentage = $_REQUEST['percentage'];
  $significanceLevel = $_REQUEST['significanceLevel'];

  #creamos un directorio para almacenar los resultados
  $idJob = time();#sera el id del job...
  $response ['job'] = $idJob;

  $pathRespone = "/var/www/html/clusteringShortTimeSeries/jobs/";
  #obtenemos el nombre del archivo de entrada...
  $pathData = "/var/www/html/clusteringShortTimeSeries/jobs/tmp/1_documentQueue.txt";
  $nameDocument = readDocument($pathData);
  $response ['nameFile'] = $nameDocument;

  #movemos el archivo... creamos directorio
  $path = "/var/www/html/clusteringShortTimeSeries/jobs/$idJob";

  if (!file_exists($path)) {
      mkdir($path, 0777, true);
  }

  #movemos el archivo...
  //movemos el archivo al path de la licitacion...
  $pathActual = "/var/www/html/clusteringShortTimeSeries/jobs/tmp/$nameDocument";
  $pathMove = "/var/www/html/clusteringShortTimeSeries/jobs/$idJob/";

  $command = "mv $pathActual $pathMove";
  $nameDocFull ="/var/www/html/clusteringShortTimeSeries/jobs/$idJob/$nameDocument";
  exec($command);

  #hacemos la ejecucion del script para el algoritmo
  $command = "python /var/www/html/clusteringShortTimeSeries/exec/LauncherClustering.py $nameDocFull $pathMove $optionProcess $percentage $significanceLevel";
  $output = [];
  exec($command, $output);

  $response['exec'] = $output[0];

  echo json_encode($response);

?>
