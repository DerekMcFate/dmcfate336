<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "INSERT INTO `location_info`
            (`id`,`city`,`zipcode`) 
            VALUES
            (NULL, :city, :zipcode)";
            

    $namedParameters = array();
    $namedParameters[":zipcode"] = $_GET["zip"];
    $namedParameters[":city"] = $_GET["city"];

    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($namedParameters);
?>