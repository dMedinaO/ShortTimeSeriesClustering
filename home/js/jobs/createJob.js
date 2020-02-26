$(document).ready(function() {

  $('#initNewJob').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            percentage: {
                validators: {
                    notEmpty: {
                        message: 'The percentage is required'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
      e.preventDefault();
      $('#loading').show();
      var optionProcess = $("#initNewJob #optionProcess").val();
      var percentage = $("#initNewJob #percentage").val();
      var significanceLevel = $("#initNewJob #significanceLevel").val();

      $.ajax({
        method: "POST",
        url: "php/jobs/addData.php",
        data: {
          "optionProcess"   : optionProcess,
          "percentage"   : percentage,
          "significanceLevel"   : significanceLevel

        }
      }).done( function( info ){
        var response = JSON.parse(info);

        if (response.exec== "ERROR"){
          $('#loading').hide();
          var message = "Error during the creation of the job, please check the data set. If the error persists, please contact the administrator.";
          $(".messageError").html( message);

          $('#errorResponse').show();
          setTimeout("location.href=''", 5000);
        }else{
          var job = response.job;
          location.href="resultProcess/?job="+job+"&file="+response.nameFile;
        }
      });
  });
});
