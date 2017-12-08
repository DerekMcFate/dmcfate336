<?php
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");
$username = $_POST['username'];
$namedParameters = array();
$namedParameters[':username'] = $username;

$sql = "SELECT *
        FROM chat_text
        WHERE username = :username
        ORDER BY timePosted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);

?>