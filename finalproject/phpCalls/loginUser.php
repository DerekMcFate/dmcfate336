<?php
session_start();
//print_r($_POST);

include '../../dbConnection.php';
$conn = getDatabaseConnection("chatroom");

$username = $_POST['username'];
$password = sha1($_POST['password']);

$sql = "SELECT *
        FROM chat_admin
        WHERE username = :username 
        AND   password = :password";

$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;
$namedParam = array();
$namedParam[':username'] = $username;
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);//expecting only one record
$_SESSION['isAdmin'] = true;
//If an admin name was found, update
if(!empty($record)) {
    $sql = "UPDATE `chat_admin`
            SET `active` = '1' WHERE username = :username";
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParam);
}
//If not, search users
if(empty($record)) {
    $sql = "SELECT *
        FROM chat_user
        WHERE username = :username 
        AND   password = :password";

    $namedParameters[':username'] = $username;
    $namedParameters[':password'] = $password;
    $namedParam = array();
    $namedParam[':username'] = $username;
        
    $stmt = $conn->prepare($sql);
    $stmt->execute($namedParameters);
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['isAdmin'] = false;
    if(!empty($record)) {
        $sql = "UPDATE `chat_user`
            SET `active` = '1' WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParam);
    }
}
//print_r($record);

if (empty($record)) {
    
    $_SESSION['loginError'] = true;
    header("Location: ../index.php");
    
} else {
    
    $_SESSION['username'] = $record['username'];
    $_SESSION['loginError'] = false;
    header("Location: ../chatroom.php");
}
?>