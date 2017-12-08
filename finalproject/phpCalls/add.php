<?php
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

$username = $_POST['username'];
$password = sha1($_POST['password']);
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':password'] = $password;

$sql = "INSERT INTO `chat_user`
        (`username`, `password`, `active`)
        VALUES
        (:username, :password, '0');";

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

?>