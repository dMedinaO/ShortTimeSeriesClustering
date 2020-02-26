$(document).ready(function() {

  $('#queryJob').bootstrapValidator({
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {

            jobID: {
                validators: {
                    notEmpty: {
                        message: 'The jobID is required'
                    }
                }
            }
        }
    }).on('success.form.bv', function(e) {
      e.preventDefault();
      $('#loading').show();
      var jobID = $("#queryJob #jobID").val();

      $.ajax({
        method: "POST",
        url: "../php/jobs/searchJob.php",
        data: {
          "jobID"   : jobID

        }
      }).done( function( info ){
        var response = JSON.parse(info);
        $('#loading').hide();

        console.log(response.res);

        if (response.res== "1" || response.res== 1){
          $(".messageInit").html( response.msg);
          $('#initResponse').show();
          setTimeout("location.href=''", 5000);
        }else{
          if (response.res== "2" || response.res== 2){
            $(".messageProcessing").html( response.msg);
            $('#processingResponse').show();
            setTimeout("location.href=''", 5000);
          }else{
            if (response.res== "0" || response.res== 0){
              $(".messageError").html( response.msg);
              $('#notExistResponse').show();
              setTimeout("location.href=''", 5000);
            }else{

              if (response.kind == "PREDICTION"){
                location.href="../resultsPred/?job="+jobID
              }else{
                location.href="../resultsClass/?job="+jobID
              }
            }
          }
        }
      });
  });
});
