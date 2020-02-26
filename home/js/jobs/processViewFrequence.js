$(document).ready(function() {

	createPieFrequence();

});


function createPieFrequence() {

	var job = getValuesURL('job');
	var feature = getValuesURL('response');

	console.log(feature);

	//hago la llamada a php para obtener la data...
	$.ajax({
			method:"POST",
			url: "../php/jobs/getDataSet.php?job="+job

		}).done( function(info){

			//obtenemos el nombre del set de datos
			var response = JSON.parse(info);
			var nameCSV = "../../jobs/"+job+"/"+response.nameFile;
			Plotly.d3.csv(nameCSV, function(err, rows){
				function unpack(rows, key) {
					console.log(key);
						return rows.map(function(row) { return row[key]; });
				}

					//obtenemos la data y los valores unicos
				var valuesData = unpack(rows, feature);
				var valuesDataRemomve = unpack(rows, feature);
				var contData = [];
				valuesDataRemomve = valuesDataRemomve.unique();

				for (j=0; j<valuesDataRemomve.length; j++){

					var contValue = countElementsInArray(valuesDataRemomve[j], valuesData);
					contData.push(contValue);
				}

				var data = [{
				  values: contData,
				  labels: valuesDataRemomve,
				  type: 'pie'
				}];

				Plotly.newPlot('frequncePlot', data);

			});
		});
}

Array.prototype.unique=function(a){
  return function(){return this.filter(a)}}(function(a,b,c){return c.indexOf(a,b+1)<0
});

//funcio que permite contar elementos...
function countElementsInArray(key, arrayData) {

	var cont=0;
	for (i=0; i<arrayData.length; i++){
		if (arrayData[i] == key){
			cont++;
		}
	}
	return cont;
}
//funcion para recuperar la clave del valor obtenido por paso de referencia
function getValuesURL(key) {

	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;

}
