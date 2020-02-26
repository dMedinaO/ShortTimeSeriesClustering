$(document).ready(function() {

	getValuesFromCSV();
});

function getValuesFromCSV() {

  var job = getQuerystring('job');
  var nameDoc = "../../jobs/"+job+"/glucose.csv";
  d3.text(nameDoc, function(data) {
    var parsedCSV = d3.csv.parseRows(data);
    var container = d3.select("tableInputData")
      .append("table")
      .selectAll("tr")
        .data(parsedCSV).enter()
        .append("tr")

      .selectAll("td")
        .data(function(d) { return d; }).enter()
        .append("td")
        .text(function(d) { return d; });
  });
}

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
