<?php
session_start();
// if (!isset($_SESSION['username'])) { //checks whether admin has logged in
//     header("Location: login.php");
//     exit();
// }
include 'dbConnection.php';
$conn = getDatabaseConnection();

function getAllClasses() {
    global $conn;
    $sql = "SELECT * 
            FROM el_classes";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $classes = $statement->fetchAll(PDO::FETCH_ASSOC);
    // print_r($classes);
    foreach ($classes as $cl) {
      echo "<option value='" . $cl['className'] . "'>" . $cl['className'] . "</option>";
    }
}

function getItems() {
    global $conn;
    $namedParameters = array();
    
    $sql = "SELECT itemName, className, atomicNum 
            FROM el_items 
            WHERE 1";
            
    if(isset($_GET['submit'])) {
        if (isset($_GET['elementSearch'])) {
            $sql .= " AND itemName LIKE :itemName";
            $namedParameters[':itemName'] = "%" . $_GET['elementSearch'] . "%";
        }
        if (isset($_GET['classType'])) {
            $sql .= " AND className = :className ";
            $namedParameters[':className'] = $_GET['classType'];
        }
        
        $sql .= " AND atomicNum >= :range";
        $namedParameters[':range'] = $_GET['range'];
        
        if ($_GET['sort'] == 'desc') {
            $sql .= " ORDER BY itemName desc";
        }
        if ($_GET['sort'] == 'asc') {
            $sql .= " ORDER BY itemName";
        }
    }
            
    
    $statement = $conn->prepare($sql);
    $statement->execute($namedParameters);
    $records = $statement->fetchAll(PDO::FETCH_ASSOC);
    
    foreach($records as $r) {
        echo "<div class='element'>";
        echo    "<details>";
        echo        "<summary>" . $r['itemName'] . "</summary>";
        echo        "<p> Atomic Number: " . $r['atomicNum'] . "</p>";
        echo        "<p> Class:  " . $r['className'] . "</p>";
        echo        "<form action='addToCart.php' method='GET'>";
        echo            "<input type='hidden' name='val' value='".$r['itemName']."'>";
        echo            "<input type='submit' value='Add to cart' style='position:relative; top:-10px'>";
        echo        "</form>";
        echo    "</details>";
        echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Elements</title>
        <style>
            body {
                text-align: center;
                background-color: #396173;
                font-family: 'Cuprum', sans-serif;
                color:white;
                font-size: 125%;
            }
        </style>
        <link href="main.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Cuprum:400i" rel="stylesheet">
    </head>
    <body>
        <h1>Elements List</h1>
        <a href="checkout.php">Shopping Cart</a>
        <form>
            <fieldset style='border-radius:25px;'>
            <input type="text" name="elementSearch" placeholder="Search Name">
            <select name="classType">
                <option disabled selected value value>Choose a class</option>
                <?=getAllClasses()?>
            </select></br>
            Atomic Range (1-100):</br>
            <input type="range" name="range" value="1" min="1" max="100" step="1"></input></br>
            Sort names by:</br>
            <input type="radio" name="sort" value="desc" class="rad" checked> Descending </br>
            <input type="radio" name="sort" value="asc" class="rad"> Ascending </br></br>
            <input type="submit" name="submit" value="Go">
            </fieldset>        
        </form>
        <?=getItems()?>
    </body>
</html>