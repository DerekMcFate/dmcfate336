<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "SELECT city FROM `location_info` ORDER BY city ASC";
            
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>