$(document).ready(function() {

	listValues();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

//listamos los datos...
var listValues = function(){
	var job = getQuerystring('job');
	var url = "../php/resultsProcess/loadDataCSV.php?job="+job;
	console.log(url);
  var t = $('#statistical').DataTable({

      "responsive": true,
      "dom": '<"newtoolbar">frtip',
      "destroy":true,
      "ajax":{
        "method":"POST",
        "url": url
      },

      "columns":[
        {"data":"Feature"},
        {"data":"Average"},
        {"data":"StandarDeviation"},
        {"data":"Variance"},
        {"data":"MaxValue"},
				{"data":"MinValue"}
      ]
  });
  $('#demo-custom-toolbar2').appendTo($("div.newtoolbar"));

}

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key, default_) {
  if (default_ == null)
    default_ = "";
  key = key.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regex = new RegExp("[\\?&amp;]"+key+"=([^&amp;#]*)");
  var qs = regex.exec(window.location.href);
  if(qs == null)
    return default_;
  else
    return qs[1];
};
