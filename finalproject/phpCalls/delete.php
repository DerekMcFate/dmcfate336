<?php
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

$username = $_POST['username'];
$namedParameters = array();
$namedParameters[':username'] = $username;

$sql = "DELETE FROM `chat_user`
        WHERE username = :username";

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

?>