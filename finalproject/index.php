<?php
session_start();
?>


<!DOCTYPE html>
<html>
    <head>
        <title>IP Chatroom Login</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Courgette|Josefin+Sans|Crimson+Text" rel="stylesheet" />
    </head>
    <body>
        <div id="loginHead"><h2>Welcome to the IP Chatroom!</h2></div>
        <hr>
        <form method="POST" action="phpCalls/loginUser.php">
            Username: <input type="text" placeholder="Username" name="username" id="username"/>
            <br>
            Password: <input type="password" placeholder="Password" name="password" id="password"/>
            <br>
            <input type="submit" value="Login"/>
        </form>
        
        <?php
            if($_SESSION['loginError'] == true) {
                echo "<p id='loginError'>Wrong username or password!</p>";
            }
        ?>
        
    </body>
</html>