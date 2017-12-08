<?php
include "../../dbConnection.php";
$conn = getDatabaseConnection("chatroom");

$text = $_POST['text'];
$namedParameters = array();
$namedParameters[':text'] = '%'.$text.'%';

$sql = "SELECT * FROM `chat_text`
        WHERE text LIKE :text
        ORDER BY timePosted DESC";
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultSet);
?>