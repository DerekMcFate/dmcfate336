<?php
session_start();

include '../../dbConnection.php';
$conn = getDatabaseConnection();

$sql = "SELECT * 
            FROM tc_user
            WHERE userId = " . $_GET['userId'];
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <p>
        <?php
            echo $record['firstName'] . " " . $record['lastName'] . "<br>";
            echo $record['email'] . "<br>";
            echo $record['universityId'] . "<br>";
            echo $record['phone'] . "<br>";
            echo $record['gender'] . "<br>";
            echo $record['role'] . "<br>";
            echo $record['deptId'] . "<br>";
            
        ?>
        </p>

    </body>
</html>