<?php
include 'dbConnection.php';
function getAllClasses() {
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Elements</title>
    </head>
    <body>
        <form>
            <input type="text" name="elementSearch" placeholder="elementSearch">
            <select>
                <option value>Choose a class</option>
                <?=getAllClasses?>
                <!--Get all classes-->
            </select>
            <input type="submit" name="submit" value="Create Itinerary">
        </form>
    </body>
</html>