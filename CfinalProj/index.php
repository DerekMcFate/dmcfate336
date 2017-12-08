<?php
    include 'inc/header.php';
?>
<script>
    var count = 0;
    function getCities() {
        $.ajax({
            type: "GET",
            url: "api/getCityInfo.php",
            dataType: "json",
            success: function(data,status) {
                $("#citySelect").html("<option id='default'>Select...</option>");
                for(var i = 0; i < data.length; i++) {
                    $("#citySelect").append("<option id='" + i + "'>" + data[i].city + "</option>");
                }
            }
        });//ajax
    }
    function getWeather() {
        if($('#citySelect').val() == "Select..."){
           $.ajax({
            type: "GET",
            url: "http://api.openweathermap.org/data/2.5/forecast?zip="+$("#zipcode").val()+"&APPID=b3f18962eb4060c924e7ab7aa9f57cfe",
            dataType: "json",
            success: function(data,status){
            addLocation();
            $('#forecastHold').append("<div id='"+$("#zipcode").val()+count+"' class='row'></div>");
            $("#"+$("#zipcode").val()+count).append("<p id=cityName>"+data.city.name+"</p>")
            for(var i = 0;i<data.list.length;i+=8){
                $("#"+$("#zipcode").val()+count).append("<div class='col-sm'><p>"+data.list[i]["dt_txt"]+"</p><img src='http://openweathermap.org/img/w/"+data.list[i]["weather"][0]["icon"]+".png'><p>Temp: "+parseInt(9/5*(data.list[i]["main"]["temp"] - 273) + 32) +"F°</p></div>");
            }
            ("#"+$("#zipcode").val()+count).append("<hr>")
         }
           
        });
        }
        else{
            var city = $("#citySelect").val();
            city = city.replace(" ", "+");
            $.ajax({
                type: "GET",
                url: "http://api.openweathermap.org/data/2.5/forecast?q="+city+",us&APPID=b3f18962eb4060c924e7ab7aa9f57cfe",
                dataType: "json",
                success: function(data,status){
                    $('#forecastHold').append("<div id='"+$("#citySelect").val()+count+"' class='row'></div>");
                    $("#"+$("#citySelect").val()+count).append("<p id=cityName>"+data.city.name+"</p>")
                    for(var i = 0;i<data.list.length;i+=8){
                        $("#"+$("#citySelect").val()+count).append("<div class='col-sm'><p>"+data.list[i]["dt_txt"]+"</p><img src='http://openweathermap.org/img/w/"+data.list[i]["weather"][0]["icon"]+".png'><p>Temp: "+parseInt(9/5*(data.list[i]["main"]["temp"] - 273) + 32) +"F°</p></div>");
                    }
                 }
            });
        }
        count++;
    }
    function addLocation(){
        $.ajax({
            type: "GET",
            url: "api/addUserData.php",
            data: { "zip": $("#zipcode").val()},
            success: function(data,status) {
            }
        });//ajax
    }
    
    $(document).ready(  function(){
        getCities();
        $('#citySelect').change( function(){
            $("#zipcode").val('');
            getWeather();
        });
        $('#zipcode').change(function() {
            $("#default").prop('selected',true);
            getWeather();
        });
    });
</script>

<div id='mainjumbo' class="jumbotron">
            <h1>Monterey Area Weather</h1>
            <h2>What is the Weather like in the Monterey Area</h2>
  <div id='formArea'>
  <form onsubmit="return false">
        <fieldset>
           <legend>Location</legend>
            <p>Enter City or a Zip Code</p>
            City: <select id="citySelect" class= "formdata" name="state">
            </select>
            <br>
            <input id= "zipcode" class="formdata" placeholder="Zip Code" type="text"><br>
            <input  type="submit" class="btn btn-primary" value="Submit" name="login">
        </fieldset>
    </form>
  </div>
</div>
<div id="forecastHold" class="container">
    
</div>



<?php
    include 'inc/footer.php';
?>



