<?php
session_start();
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");
//username, text
$username = $_SESSION['username'];
$text = $_POST['text'];
$namedParameters = array();
$namedParameters[':username'] = $username;
$namedParameters[':text'] = $text;

$sql = "INSERT INTO `chat_text`
        (`username`, `text`)
        VALUES
        (:username, :text);";
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);

$sql = "SELECT *
        FROM chat_text
        ORDER BY timePosted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);

?>