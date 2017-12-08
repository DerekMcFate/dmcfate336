<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}
include "../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

function getAllUsers() {
    global $conn;
    $sql = "SELECT username
            FROM chat_admin
            WHERE active = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($record as $records) {
        echo "<h3 id='admin'>" . $records['username'] . "</h3>";
    }
    $sql = "SELECT username
            FROM chat_user
            WHERE active = 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($record as $records) {
        echo "<h3 id='user'>" . $records['username'] . "</h3>";
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>IP Chatroom</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <a class="navbar-brand">Navigation</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="chatroom.php">Home <span class="sr-only">(current)</span></a>
                    <?php
                        if($_SESSION['isAdmin']) {
                    ?>
                    <a class="nav-item nav-link" href="addUser.php">Add User</a>
                    <a class="nav-item nav-link" href="deleteUser.php">Delete User</a>
                    <?php
                        }
                    ?>
                </div>
            </div>
            <form class="form-inline my-2 my-lg-0" action="phpCalls/logout.php">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="logout">Logout</button>
            </form>
        </nav>
        <h2 id="chatHead">Chat Room A</h2>
        <div>
            <div id="allUsers">
                <?php
                getAllUsers();
                ?>
            </div>
            <div id="chatContainer">
                <div id="textBox">
                    <textarea rows="2" cols="52" name="messageArea" placeholder="Enter text here..." id="textField"></textarea>
                    <input type="submit" id="postMessage" value="Post">
                    <input type="submit" id="refresh" value="Refresh">
                </div>
                <div id="chat">
                    
                </div>
                <div id="sortBy">
                    <input type="submit" id="sortBtn" value="Sort">
                    <input type="text" id="search" placeholder="Search by..."><br>
                    <label><input type="radio" name="radioButton" id="radioBtn1" value="radio1">Name</label>
                    <br>
                    <label><input type="radio" name="radioButton" id="radioBtn2" value="radio2">Text</label>
                    <br>
                    <label><input type="radio" name="radioButton" id="radioBtn3" value="radio3">Date(Asc)</label>
                    <br>
                    <label><input type="radio" name="radioButton" id="radioBtn4" value="radio4" checked>Date(Desc)</label>
                </div>
            </div>
        </div>
        <script>
        var radio = 4;
            $('#postMessage').click(function() {
                $.ajax({
                    type: "POST",
                    url: "phpCalls/post.php",
                    data: {"text" : $('#textField').val()},
                    datatype: "json",
                    success: function(data) {
                        var arr = JSON.parse(data);
                        $('#chat').html("");
                        for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                    }
                });
            });
            $('#refresh').click(function() {
                $.ajax({
                    type: "POST",
                    url: "phpCalls/refresh.php",
                    data: {},
                    datatype: "json",
                    success: function(data) {
                        var arr = JSON.parse(data);
                        $('#chat').html("");
                        for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                    }
                });
            });
            $('#sortBtn').click(function() {
                if(radio == 1) {
                    $.ajax({
                        type: "POST",
                        url: "phpCalls/sortName.php",
                        data: {"username": $('#search').val()},
                        datatype: "json",
                        success: function(data) {
                            var arr = JSON.parse(data);
                            $('#chat').html("");
                            for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                        }
                    });
                } else if(radio == 2){
                    $.ajax({
                        type: "POST",
                        url: "phpCalls/sortText.php",
                        data: {"text": $('#search').val()},
                        datatype: "json",
                        success: function(data) {
                            var arr = JSON.parse(data);
                            alert(data);
                            $('#chat').html("");
                            for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                        }
                    });
                } else if(radio == 3) {
                    $.ajax({
                        type: "POST",
                        url: "phpCalls/sortDateA.php",
                        data: {},
                        datatype: "json",
                        success: function(data) {
                            var arr = JSON.parse(data);
                            $('#chat').html("");
                            for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                        }
                    });
                } else if(radio == 4) {
                    $.ajax({
                        type: "POST",
                        url: "phpCalls/sortDateD.php",
                        data: {},
                        datatype: "json",
                        success: function(data) {
                            var arr = JSON.parse(data);
                            $('#chat').html("");
                            for(var i = 0; i < arr.length; i++) {
                            $('#chat').append("<div class='chatMessage'><div class='textField'>"+arr[i]['username']+": "+arr[i]['text']+"</div></div>");
                        }
                        }
                    });
                }
            });
            $('#radioBtn1').click(function() {
                radio = 1;
            });
            $('#radioBtn2').click(function() {
                radio = 2;
            });
            $('#radioBtn3').click(function() {
                radio = 3;
            });
            $('#radioBtn4').click(function() {
                radio = 4;
            });
        </script>
    </body>
</html>