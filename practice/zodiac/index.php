<?php

function yearList($startYear, $endYear) {
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    $total = 0;
    for($i = $startYear; $i <= $endYear; $i++) {
        echo "<li> Year $i";
        if($i % 100 == 0) {
            echo " <b> Happy New Century!</b>";
        }
        if($i == 1776) {
            echo " <b> USA INDEPENDENCE! </b>";
        }
        echo "</li>";
        if($i >= 1900) {
            if(($i - 1900) % 4 == 0){
            echo "<img src='img/".$zodiac[$i % 12].".png' width='100'> <br/>";
            }
        }
        $total += $i;
    }
    return $total;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1> Chinese Zodiac List </h1>
        <ul>
            <?php 
            $startYear = $_GET['startYear'];
            $endYear = $_GET['endYear'];
            $startYear = 1500;
            $endYear = 2000;
            $sum = yearList($startYear, $endYear);
            ?>
        </ul>
        <h1> <?php
                echo "Year Sum = $sum <br/>";
        ?></h1>

    </body>
</html>