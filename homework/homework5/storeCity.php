<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection("tcp");

// $sql = "SELECT *
//         FROM tc_search
//         WHERE zipCode = :zip";

$namedParameters = array();
$namedParameters[':city'] = $_GET['city'];
$namedParameters[':zip'] = $_GET['zip'];
$namedParameters[':elevation'] = $_GET['elevation'];
        
// $stmt = $conn->prepare($sql);
// $stmt->execute($namedParameters);
// $record = $stmt->fetch(PDO::FETCH_ASSOC);

//print_r($record);

//echo json_encode($record);
$sql = "INSERT INTO tc_search (city, zipCode, elevation) VALUES (:city, :zip, :elevation);";
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
?>