$(document).ready(function() {

	listValues2();
});

$.fn.DataTable.ext.pager.numbers_length = 5;

//listamos los datos...
var listValues2 = function(){
	var job = getQuerystring('job');
	var url = "../php/resultsProcess/loadDataCSVSummary.php?job="+job;
	console.log(url);
  var t = $('#summaryGroup').DataTable({

      "responsive": true,
      "dom": '<"newtoolbar">frtip',
      "destroy":true,
      "ajax":{
        "method":"POST",
        "url": url
      },

      "columns":[
        {"data":"IDGroup"},
        {"data":"Members"},
        {"defaultContent": "<button type='button' class='detail btn btn-success'><i class='fa fa-file'></i></button>"}
      ]
  });
	getID("#summaryGroup tbody", t);

}

//metodo para obtener el id y asi generar la edicion del usuario...
var getID = function(tbody, table){
	$(tbody).on("click", "button.detail", function(){
		var data = table.row( $(this).parents("tr") ).data();
		var idGroup = data.IDGroup;
		var job= getQuerystring("job");
		location.href="detailGroup.php?job="+job+"&group="+idGroup;
	});
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
