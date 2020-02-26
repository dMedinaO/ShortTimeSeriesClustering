$(document).ready(function() {

  $("#processJob").on("click", function(){

      $('#loading').show();

      var job = getQuerystring('job');
      $.ajax({
        method: "POST",
        url: "../php/jobs/tryModelClf.php?job="+job,
      }).done( function( info ){
        var response = JSON.parse(info);

        if (response.exec== "1"){
          $('#loading').hide();
          var message = "Error during the creation of the job, please check the data set. If the error persists, please contact the administrator.";
          $(".messageError").html( message);

          $('#errorResponse').show();
          //setTimeout("location.href=''", 5000);
        }else{
          location.href="../viewModelClf/?job="+job;
        }
      });
  });
});

//funcion para recuperar la clave del valor obtenido por paso de referencia
function getQuerystring(key) {
  var url_string = window.location;
	var url = new URL(url_string);
	var c = url.searchParams.get(key);
	return c;
};
