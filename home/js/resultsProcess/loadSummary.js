$(document).ready(function() {

  //load data information
  definitions();
  listar();

});

$.fn.DataTable.ext.pager.numbers_length = 5;

var listar = function(){

  var job = getQuerystring('job');
  var nameFile = "../../jobs/"+job+"/results/summary_group.json";

  readTextFile(nameFile, function(text){
    var dataResponse = JSON.parse(text);

    var t = $('#groups').DataTable({
      "responsive": true,
      "destroy":true,
      "data":dataResponse,
      "columns":[
        {"data":"id_group"},
        {"data":"number"},
        {"defaultContent": "<button type='button' class='detail btn btn-success'><i class='fa fa-file'></i></button>"}
      ]
    });
    get_id_redirect("#groups tbody", t);
  });

}

var get_id_redirect = function(tbody, table){
	$(tbody).on("click", "button.detail", function(){
		var data = table.row( $(this).parents("tr") ).data();
		var idgroup = data.id_group.split(" ")[2];

    var job = getQuerystring('job');
    location.href="detailGroup.php?job="+job+"&id="+idgroup;
	});
}
var definitions = function loadDefinition() {

  var job = getQuerystring('job');

  var nameFile = "../../jobs/"+job+"/results/summary_process.json";

	readTextFile(nameFile, function(text){
		var data = JSON.parse(text);
		$(".calinski").html(data.calinski);
		$(".siluetas").html(data.siluetas);
    $(".number").html(data.groups);

    //load pie chart with information of groups...
    var dataPie = [{
      values: data.numberElementGroupArray,
      labels: data.indexGroupArray,
      type: 'pie'
    }];

    Plotly.newPlot('graphMembers', dataPie);

    //load mean curve per group
    var lengthData = data.numberElementGroupArray.length;

    //to create trace for each group
    var dataLines =[];
    for (i=0; i<lengthData; i++){

      //obtenemos la data para formar la fila
      //generamos el trace
      var trace = {
        y: data.AVG_Curves[i],
        x:data.features,
        mode: 'lines+markers',
        name: data.indexArrayID[i],
        line: {shape: 'linear'},
        type: 'scatter'
      };
      dataLines[i]=trace;
    }

    layout = {
      legend: {
        y: 0.5,
        traceorder: 'reversed',
        font: {size: 16},
        yref: 'paper'
      }
    };

    Plotly.react('curveGroups', dataLines, layout);
	});

}
//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};

//read document
function readTextFile(file, callback) {
    var rawFile = new XMLHttpRequest();
    rawFile.overrideMimeType("application/json");
    rawFile.open("GET", file, true);
    rawFile.onreadystatechange = function() {
        if (rawFile.readyState === 4 && rawFile.status == "200") {
            callback(rawFile.responseText);
        }
    }
    rawFile.send(null);
}
