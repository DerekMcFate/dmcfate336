<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "SELECT *
            FROM location_info";
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>