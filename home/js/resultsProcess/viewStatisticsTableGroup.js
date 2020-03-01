$(document).ready(function() {


  	listValues();
  });

  $.fn.DataTable.ext.pager.numbers_length = 5;

  //listamos los datos...
  var listValues = function(){
  	var job = getQuerystring('job');
  	var group = getQuerystring('id');
  	var url = "../php/resultsProcess/loadDataCSVGroup.php?job="+job+"&group="+group;
  	console.log(url);
    var t = $('#statisticalGroup').DataTable({

        "responsive": true,
        "dom": '<"newtoolbar">frtip',
        "destroy":true,
        "ajax":{
          "method":"POST",
          "url": url
        },

        "columns":[
          {"data":"Feature"},
          {"data":"AVG_Point"},
          {"data":"Variance"},
          {"data":"Standar_Deviation"},
          {"data":"Max_Point"},
  				{"data":"Min_Point"}
        ]
    });
    $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

  }

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
