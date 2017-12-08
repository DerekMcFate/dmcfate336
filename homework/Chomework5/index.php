
<!DOCTYPE html>
<html>
    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>AJAX: Sign Up Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <style type="text/css" id="diigolet-chrome-css"></style>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            function getWeather() {
                $.ajax({
        
                    type: "GET",
                    url: "http://api.openweathermap.org/data/2.5/weather?zip="+$("#zip").val()+"&APPID=b3f18962eb4060c924e7ab7aa9f57cfe",
                    dataType: "json",
                    success: function(data,status) {
                    var fahrenheit = parseInt(9/5*(data.main.temp - 273) + 32);
                    $("#weather").html("The weather in "+data.name+" is " + data.weather[0]["main"]+"<br>");
                    $("#weather").append("Wind Speed: "+data.wind.speed+" Meters Per Second<br>");
                    $("#weather").append("Temperature: "+fahrenheit+" F <br>");
                    
                    }
                });
                displayDates();
            }
            function displayDates() {
                $.ajax({
                    type: "GET",
                    url: "getAllRecords.php",
                    dataType: "json",
                    data: { "zip": $("#zip").val()},
                    success: function(locdata,status) {
                        console.log(locdata)
                      for (var i in locdata){
                          console.log(i+"    "+locdata[i]);
                          $("#history").append(locdata[i]+ "    ");
                      }
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                        //alert(status);
                    }
                    
                    });
            }
        </script>
    </head>
    <body>
        <h1> What's my weather? </h1>

    <form method = "GET" onsubmit="return false">
        <fieldset>
           <legend>Where are you?</legend>
           
            Zip Code:    <input type="text" name = "zipCode" id="zip"><br>
            
            <input type="submit" onclick="getWeather()" value= "Submit!">
        </fieldset>
    </form>
    <div id= "weather" ></div>
    <div id= "history"></div>

    </body>
</html>