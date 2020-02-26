$(document).ready(function() {

	createScatterView();
	applyShapiro();
});


function createScatterView() {

	var job = getValuesURL('job');
	var feature = getValuesURL('response');

	//hago la llamada a php para obtener la data...
	$.ajax({
			method:"POST",
			url: "../php/jobs/getDataSet.php?job="+job

		}).done( function(info){

			//obtenemos el nombre del set de datos
			var response = JSON.parse(info);

			//formamos el nombre del csv...
			var nameCSV = "../../jobs/"+job+"/"+response.nameFile;
			console.log(nameCSV);
			Plotly.d3.csv(nameCSV, function(err, rows){
				function unpack(rows, key) {
					return rows.map(function(row) { return row[key]; });
				}
				//obtenemos la data
				var valuesData = unpack(rows, feature);
				//formamos la trace...
				var trace = {
					x: valuesData,
					name: 'control',
					autobinx: true,
					histnorm: "count",
					marker: {
						color: "rgba(255, 100, 102, 0.7)",
						line: {
							color:  "rgba(255, 100, 102, 1)",
							width: 1
						}
					},
					opacity: 0.5,
					type: "histogram"
				};

				var dataGraphic = [trace];
				var layout = {
					bargap: 0.05,
					bargroupgap: 0.2,
					barmode: "overlay",
					xaxis: {title: "Values in Feature"},
					yaxis: {title: "Frequence in distribution"}
				};
				Plotly.newPlot('histogram', dataGraphic, layout);
			});
		});
}


//funcion para recuperar la clave del valor obtenido por paso de referencia
function getValuesURL(key) {

	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;

}

//funcion para aplicar el test de shapiro...
function applyShapiro() {

	var job = getValuesURL('job');
	var feature = getValuesURL('response');

	//hago la llamada a php para obtener la data...
	$.ajax({
			method:"POST",
			url: "../php/jobs/applyShapiro.php?job="+job+"&feature="+feature

		}).done( function(info){

			//obtenemos el nombre del set de datos
			var response = JSON.parse(info);

			//ahora modificamos los valores de la tabla...
			$(".statisticValue").html(parseFloat(response.statistic).toFixed(4));
			$(".pvalue").html(parseFloat(response.pvalue).toFixed(4));
			$(".outliers").html(parseFloat(response.outliers));

		});
}
