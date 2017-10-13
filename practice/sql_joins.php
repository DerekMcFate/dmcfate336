<?php

$host = 'localhost';
$dbname = 'tcp';
$username = 'root';
$password = '';
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

function getUsersAndDepartments() {
    global $dbConn;
    
    $sql = "SELECT firstName, lastName, deptName FROM `tc_user`
            INNER JOIN tc_department
            ON tc_user.deptId = tc_department.departmentId
            WHERE deptName IS NULL";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($records as $record) {
        
        echo $record['firstName'] . ' ' . $record['lastName'] . ' ' . $record['deptName'] . '<br />';
        
    }
    
}

function getUsersByTablets() {
    global $dbConn;
    
    $sql = "SELECT firstName, lastName FROM `tc_user`
            INNER JOIN tc_device, tc_checkout
            WHERE tc_device.deviceType = 'Tablet' && tc_user.userId = tc_checkout.userId && tc_device.deviceId = tc_checkout.deviceId
            ORDER BY lastName";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach ($records as $record) {
        
        echo $record['firstName'] . ' ' . $record['lastName'] . '<br />';
        
    } 
    
    getenv("keyName");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SQL Joins</title>
    </head>
    <body>
        
        <h2>Users and their corresponding departments:</h2> <br/>
        
        <?=getUsersAndDepartments()?>
        
        <hr>
        
        <h2>Users who have checked out Tablets</h2>
        
        <?=getUsersByTablets()?>

    </body>
</html>