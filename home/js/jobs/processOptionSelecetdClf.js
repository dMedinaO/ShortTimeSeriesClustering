$(document).ready(function() {

  goBack();
  processJobNoOutliers();
  processJobRemoveOutliers();

});

//function go to back
function goBack() {

  $("#goBack").on("click", function(){
    var job = getQuerystring('job');
    location.href="../checkDataSet/?job="+job+"&kind=1";

  });
}

//function process job without remove outliers
function processJobRemoveOutliers(){

  $("#removeOutliers").on("click", function(){
    $('#loading').show();
    var job = getQuerystring('job');
    var response = getQuerystring('response');

    //procesamos por ajax editanto el job en el estado y agregando la respuesta
    $.ajax({
      method: "POST",
      url: "../php/jobs/processJob.php",
      data: {
        "job"   : job,
        "kind"   : 1,
        "response"   : response,
        "removeOutliers": 2,
      }
    }).done( function( info ){
      $('#loading').hide();
      var response = JSON.parse(info);
      if (response.execResponse== "ERROR"){
        var message = "Error during process job, please contact the administrator of system at email david.medina@cebib.cl";
        $('#errorResponse').show();
      }else{
          var message = "The job ID: "+job+" has been correctly generated, changes will be notified via email. Use the ID to query for the status of the Job.";
          $(".messageOK").html( message);
          $('#okResponse').show();
      }
      setTimeout("location.href='../'", 5000);//redirecciono al job
    });
  });
}

//function process job without remove outliers
function processJobNoOutliers(){

  $("#onlyProcess").on("click", function(){
    $('#loading').show();
    var job = getQuerystring('job');
    var response = getQuerystring('response');

    //procesamos por ajax editanto el job en el estado y agregando la respuesta
    $.ajax({
      method: "POST",
      url: "../php/jobs/processJob.php",
      data: {
        "job"   : job,
        "kind"   : 1,
        "response"   : response,
        "removeOutliers": 1,
      }
    }).done( function( info ){
      $('#loading').hide();
      var response = JSON.parse(info);
      if (response.execResponse== "ERROR"){
        var message = "Error during process job, please contact the administrator of system at email david.medina@cebib.cl";
        $('#errorResponse').show();
      }else{
          var message = "The job ID: "+job+" has been correctly generated, changes will be notified via email. Use the ID to query for the status of the Job.";
          $(".messageOK").html( message);
          $('#okResponse').show();
      }
      setTimeout("location.href='../'", 5000);//redirecciono al job
    });
  });
}
//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
