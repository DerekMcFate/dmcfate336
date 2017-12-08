<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "DELETE FROM `location_info`
            WHERE `zipcode` = :zip";
            
    
    $namedParameters = array();
    $namedParameters[":zip"] = $_GET["zip"];
    
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($namedParameters);
?>