<?php
    include 'inc/header.php';
?>

<script>
    function changePassword(){
        $.ajax({
            type: "POST",
            url: "api/changePassword.php",
            data: { "password": $("#passwordUpdate").val()},
            success: function(data,status) {
                alert("Password Changed")
            }
        });//ajax
        
    }
    function deleteTown(){
         $.ajax({
                type: "GET",
                url: "api/deleteZip.php",
                data: { "zip": $("#zipdel").val()},
                success: function(data,status) {
                    alert("Successfully Deleted "+$("#zipdel").val())
                }
            });//ajax
    }
    function addTown(){
        $.ajax({
                type: "GET",
                url: "api/addPlace.php",
                data: { "city": $("#townup").val(), "zip": $("#zipup").val()},
                success: function(data,status) {
                    alert("Successfully Added "+$("#townup").val())
                }
            });//ajax
    }
    function generateReport(){
        $.ajax({
            type: "GET",
            url: "api/getIp.php",
            dataType: "json",
            success: function(data,status){
                for(var i = 0; i < data.length;i++){
                    $('#ipReport').append("<p>"+data[i]['ipaddress']+"</p>")
                }
             }
           
        });//ajax
        $.ajax({
            type: "GET",
            url: "api/getCityList.php",
            dataType: "json",
            success: function(data,status){
                for(var i = 0; i < data.length;i++){
                    $('#cityReport').append("<p>"+data[i]['city']+"</p>")
                }
             }
           
        });//ajax
        $.ajax({
            type: "GET",
            url: "api/getMostZip.php",
            dataType: "json",
            success: function(data,status){
                for(var i = 0; i < data.length;i++){
                    $('#zipReport').append("<p>"+data[i]['zipcode']+ " | Searched:   "+data[i]['COUNT(zipcode)'] +" times</p>");
                }
             }
           
        });//ajax
    }
    $(document).ready(  function(){
        $('#passUpBut').click( function(){
            changePassword();
        });
        $('#delTownBut').click( function(){
            deleteTown();
        });
        $('#addTownBut').click( function(){
            addTown();
        });
        generateReport();
    });
    
</script>
<div class="container">
  <div class="row">
    <div class="col-sm">
      <form onsubmit="return false">
        <fieldset>
           <legend>Update Admin Password</legend>
            <input id= "passwordUpdate" class="formdata" type="password" placeholder='Password'><br>
            <input  type="submit" class="btn btn-primary" value="Submit" id ="passUpBut">
        </fieldset>
    </form>
    </div>
    <div class="col-sm">
    <form onsubmit="return false">
        <fieldset>
           <legend>Add a Town</legend>
            <input id= "townup" class="formdata" type="text" placeholder='City Name'><br>
            <input id= "zipup" class="formdata" type="text" placeholder='Zip Code'><br>
            <input  type="submit" class="btn btn-primary" value="Submit" id= "addTownBut">
        </fieldset>
    </form>
    </div>
    <div class="col-sm">
      <form onsubmit="return false">
        <fieldset>
           <legend>Delete a town</legend>
            <input id= "zipdel" class="formdata" type="text" placeholder='Zip Code'><br>
            <input  type="submit" class="btn btn-primary" value="Submit" id="delTownBut">
        </fieldset>
    </form>
    </div>
  </div>
</div>
<div class="jumbotron">
    <h2>Report:</h2>
</div>
<div id= 'result' class=container>
 <div class="container">
  <div class="row">
    <div id= 'zipReport' class="col-sm">
      <p>Most searched Zip Codes:</p>
    </div>
    <div id='ipReport' class="col-sm">
      <p>Most recent user IP:'s</p>
    </div>
    <div id="cityReport" class="col-sm">
      <p>Current Available Cities: (Alphabetical)</p>
    </div>
  </div>
</div>
    
</div>

<?php
    include 'inc/footer.php';
?>