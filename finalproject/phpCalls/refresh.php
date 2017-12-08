<?php
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

$sql = "SELECT *
        FROM chat_text
        ORDER BY timePosted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);

?>