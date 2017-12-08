<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "SELECT ipaddress 
            FROM `weather_data` 
            ORDER BY date DESC";
            
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>