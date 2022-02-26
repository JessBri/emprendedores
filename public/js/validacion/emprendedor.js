$(document).ready(function(){
    console.log("xD");
    $("#formEmprendedor").validate({
        rules: {
          name : {
            required: true,
            minlength: 3
          },
          age: {
            required: true,
            number: true,
            min: 18
          },
          email: {
            required: true,
            email: true
          },
          weight: {
            required: {
              depends: function(elem) {
                return $("#age").val() > 50
              }
            },
            number: true,
            min: 0
          }
        }
      });
});
