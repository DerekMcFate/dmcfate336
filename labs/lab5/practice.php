<?php

$host = 'localhost'; //cloud 9
$dbname = 'tcp';
$username = "root";
$password = "";
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function usersWithAnA() {
    global $dbConn;
$sql = "SELECT firstName, lastName, email FROM tc_user WHERE firstName LIKE 'A%'";

$stmt = $dbConn -> prepare ($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);

foreach ($records as $record) {
    echo $record['firstName'] . " " . $record['lastName'] . " " . $record['email'] . "<br/>";
}
}

function devicesBetween300And1000() {
    global $dbConn;
$sql = "SELECT deviceId, deviceName, price FROM tc_device WHERE price > 300 && price < 1000 ORDER BY price";

$stmt = $dbConn -> prepare ($sql);
$stmt->execute();
$records = $stmt->fetchAll(PDO::FETCH_ASSOC);

//print_r($records);

foreach ($records as $record) {
    echo $record['deviceId'] . " " . $record['deviceName'] . " " . $record['price'] . "<br/>";
}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>

<h3>Users whose first name starts with A:</h3>
<?=usersWithAnA()?>
<h3>Devices between $300 and $1000</h3>
<?=devicesBetween300And1000()?>
    </body>
</html>