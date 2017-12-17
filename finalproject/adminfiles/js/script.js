function validateUserName()
{
    $.ajax({
            type: "get",
             url: "api.php",
        dataType: "json",
            data: {
                 "username": $("#username").val()
            },
            success: function(data,status) {
               if(data.length > 0){
                   $("#username-valid").html("");
                   $("#username-invalid").html("");
                   $("#username-valid").html("Admin Account exists");
               }
               else{
                   $("#username-valid").html("");
                   $("#username-invalid").html("");
                   $("#username-invalid").html("No such Admin Username in Database");
               }
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
}
