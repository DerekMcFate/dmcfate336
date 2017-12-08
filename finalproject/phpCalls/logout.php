<?php
session_start();
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

$username = $_SESSION['username'];
$namedParameters = array();
$namedParameters[':username'] = $username;
if($_SESSION['isAdmin']) {
    $sql = "UPDATE `chat_admin`
        SET `active` = '0' WHERE username = :username";
} else {
    $sql = "UPDATE `chat_user`
        SET `active` = '0' WHERE username = :username";
}

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

session_destroy();

header("Location: ../index.php");

?>