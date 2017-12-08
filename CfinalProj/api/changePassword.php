<?php

    include '../inc/dbConnection.php';
    $dbConn = getDatabaseConnection("weatherdb");    
    $sql = "UPDATE `weather_users`
            SET `password` = :password";
            
    
    $namedParameters = array();
    $namedParameters[":password"] = sha1($_POST["password"]);
    
    
    $stmt = $dbConn -> prepare($sql);
    $stmt -> execute($namedParameters);
?>