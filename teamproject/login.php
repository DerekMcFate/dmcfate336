<?php
session_start();
include 'dbConnection.php';

$conn = getDatabaseConnection();

function loginError() {
    global $conn;
    $userFlag = 0;
    $passFlag = 0;
    //Gets all users from the database
    $sql = "SELECT * FROM el_users WHERE
            userName = :user";
            
    $namedParameters = array();
    $namedParameters[':user'] = $_POST['username'];
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    //Checks the username
    if(empty($_POST['username']) && isset($_POST['username'])) {
        //If the username is empty
        echo "<h3 style='color:red;'>Please enter your username</h3>";
    } else if($record['userName'] != $_POST['username']) {
        //If the username doesn't match with those in the database
        echo "<h3 style='color:red;'>Wrong username entered</h3>";
    } else if($record['userName'] == $_POST['username']) {
        //If the username matches, make the flag 1
        $userFlag = 1;
    }
    
    if(isset($_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $password = "";
    }
    
    if(empty($_POST['password']) && isset($_POST['password'])) {
        //If the password is empty
        echo "<h3 style='color:red;'>Please enter your password</h3>";
    } else if($record['password'] != sha1($password) && $password != "") {
        //If the password doesn't match with those in the database
        echo "<h3 style='color:red;'>Wrong password entered</h3>";
    } else if($record['password'] == sha1($password)){
        //If the password matches, make the flag 1
        $passFlag = 1;
    }
    
    if($passFlag && $userFlag) {
        //Store variables and go to next page
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: main.php");
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Elemental Catalog Login</title>
        <meta charset="utf-8" />
        <link href="login.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Cuprum:400i" rel="stylesheet"> 
    </head>
    <body>
        <div id="header">
            <h1><span>User Login</span></h1>
        </div>
        <div id="fields">
            <form method="post">
                <h3>Username: </h3><input type="text" name="username" placeholder="Username"> <br>
                <h3>Password: </h3><input type="password" name="password" placeholder="Password"> <br>
                <br>
                <div id="logBtn">
                    <input type="submit" value="Login!" name="login">
                </div>
                <?=loginError()?>
            </form>
        </div>

    </body>
</html>