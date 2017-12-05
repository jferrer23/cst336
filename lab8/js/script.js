function getCityInfo()
{
    $.ajax({
            type: "get",
             url: "http://hosting.otterlabs.org/laramiguel/ajax/zip.php",
        dataType: "json",
            data: {
                 "zip_code": $("#zip").val() 
            },
            success: function(data,status) {
                $("#valid-zip").html("");
                if(!data.city)
                {
                    $("#valid-zip").html("Zip Code is Invalid");
                    $("#city").html("");
                    $("#lat").html("");
                    $("#long").html("");
                }
                $("#city").html(data.city);
                $("#lat").html(data.latitude);
                $("#long").html(data.longitude);
                
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
}

function getCountyInfo()
{
    $.ajax({
            type: "get",
             url: "http://hosting.otterlabs.org/laramiguel/ajax/countyList.php",
        dataType: "json",
            data: {
                 "state": $("#stateList").val() 
            },
            success: function(data,status) {
                $("#countyList").html("");
                for(var i = data.counties.length-1; i >= 0; i--)
                {
                    $("#countyList").append("<option value='" + data.counties[i].county + "'>" + data.counties[i].county + "</option>");
                }
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
}

function validateUserName()
{
    $.ajax({
            type: "get",
             url: "http://ferr1760-cst336.herokuapp.com/lab8/api.php",
        dataType: "json",
            data: {
                 "username": $("#username").val(),
                 "action": "validate-username"
            },
            success: function(data,status) {
               
               if(data.length > 0){
                   $("#username-valid").html("Username is NOT available");
               }
               else{
                   $("#username-valid").html("Username IS available");
               }
              },
            complete: function(data,status) { //optional, used for debugging purposes
                 //alert(status);
            }
         });
}
