$(document).ready(function() {

  showCurves();

});

function getNameFeatures() {

  var job = getQuerystring('job');
  var fileName = getQuerystring('file');
  var file = "../../jobs/"+job+"/"+fileName;

  var allText;
  var rawFile = new XMLHttpRequest();
  rawFile.open("GET", file, false);
  rawFile.onreadystatechange = function ()
  {
      if(rawFile.readyState === 4)
      {
          if(rawFile.status === 200 || rawFile.status == 0)
          {
              allText = rawFile.responseText;
          }
      }
  }
  rawFile.send(null);

  return allText.split("\n")[0];

}
function showCurves() {

  var job = getQuerystring('job');
  var file = getQuerystring('file');
  var header = getNameFeatures().split(",");
  var nameCSV = "../../jobs/"+job+"/"+file;

  Plotly.d3.csv(nameCSV, function(err, rows){

    function unpack(rows, key) {
      return rows.map(function(row) { return row[key]; });
    }

    //obtenemos el largo
    var exampleLenght = unpack(rows, header[0]).length;

    //generamos el trace por cada punto
    var data =[];
    for (i=0; i<exampleLenght; i++){

      //obtenemos la data para formar la fila
      var row=[];
      for (j=0; j<header.length; j++){
        var element = unpack(rows, header[j])[i];
        row[j] = element;
      }

      var nameE = "example "+ (i+1);

      //generamos el trace
      var trace = {
        y: row,
        x: header,
        mode: 'lines+markers',
        name: nameE,
        line: {shape: 'spline'},
        type: 'scatter'
      };

      data[i]=trace;
    }

    layout = {
      legend: {
        y: 0.5,
        traceorder: 'reversed',
        font: {size: 16},
        yref: 'paper'
      }
    };

    Plotly.react('viewCurves', data, layout);

  });

}
//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
