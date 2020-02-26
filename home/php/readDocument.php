<?php

  #funcion que permite la lectura de archivos...
  function readDocument($nameFile){
    $nameDocument = "";
    //leemos un archivo de texto para capturar el nombre de la imagen...
    $file = fopen($nameFile, "r");
    while(!feof($file)) {
      $nameDocument =  fgets($file);
    }
    fclose($file);
    return $nameDocument;
  }

?>
