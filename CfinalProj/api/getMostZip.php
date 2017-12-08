<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "SELECT zipcode, COUNT(zipcode) 
            FROM `weather_data`
            GROUP BY zipcode
            HAVING ( COUNT(zipcode) > 1 )";
            
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute();
    $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($resultSet);
        
?>