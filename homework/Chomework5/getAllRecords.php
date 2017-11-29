<?php
include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT *
        FROM weather
        WHERE zipCode = :zipCode"; 

$namedParameters = array();
$namedParameters[':zipCode'] = $_GET['zip'];
       
        
$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

// print_r($record);

echo json_encode($record);

$sql = "INSERT INTO weather
        (zipCode)
        VALUES
        (:zipCode)";
        

$stmt = $conn->prepare($sql);
$stmt->execute($namedParameters);
?>
