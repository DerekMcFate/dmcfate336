<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "INSERT INTO `weather_data`
            (`id`,`zipcode`,`date`, `ipaddress`) 
            VALUES
            (NULL,:zipcode, CURRENT_TIMESTAMP,:ipaddress)";
            

    $namedParameters = array();
    $namedParameters[":zipcode"] = $_GET["zip"];
    $namedParameters[":ipaddress"] = $_SERVER["REMOTE_ADDR"];
    
    print_r($namedParameters[":zipcode"]." ".$namedParameters[":ipaddress"]);
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($namedParameters);
?>