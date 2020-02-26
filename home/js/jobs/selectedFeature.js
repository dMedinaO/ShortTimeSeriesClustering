$(document).ready(function() {

	listValues();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

//listamos los datos...
var listValues = function(){
	var job = getValuesURL('job');
	console.log(job);
	var url = "../php/jobs/showFeatures.php?job="+job;
	console.log(url);
  var t = $('#features').DataTable({

      "responsive": true,
      "dom": '<"newtoolbar">frtip',
      "destroy":true,
      "ajax":{
        "method":"POST",
        "url": url
      },

      "columns":[
        {"data":"nameFeature"},
				{"data":"kind"},
        {"defaultContent":"<button type='button' class='processJob btn btn-success'><i class='fa fa-list'></i></button>"}
      ]
  });
  $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

	get_values_params("#features tbody", t);

}

var get_values_params = function(tbody, table){
	$(tbody).on("click", "button.processJob", function(){

		$('#loading').show();

		var data = table.row( $(this).parents("tr") ).data();
		var feature = data.nameFeature;
		var kindSelected = data.kind;
		var job = getValuesURL('job');
		var kind = getValuesURL('kind');

		if (kind == 1){//modelos de clasificacion

			if (kindSelected == "CATEGORICAL"){

				//redireccionamos
				location.href="../viewCategorical/?job="+job+"&response="+feature;
			}else{
				$('#errorResponseDiscrete').show();
				setTimeout("location.href=''", 5000);
			}
		}else{

			if (kindSelected == "CONTINUE"){

				//redireccionamos
				location.href="../viewContinue/?job="+job+"&response="+feature;
			}else{
				$('#errorResponseContinue').show();
				setTimeout("location.href=''", 5000);
			}
		}
	});
}

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getValuesURL(key) {

	var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
}
