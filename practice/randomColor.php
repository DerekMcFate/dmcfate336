<?php

    function getRandomColor() {
        return "rgba(".rand(0, 255).", ".rand(0, 255).", ".rand(0, 255).", ".(rand(0, 100)/100).");";
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Random Background Color </title>
        <meta charset="utf-8" />
        <style>
            body {
                <?php
                
                echo "background-color: ".getRandomColor();
                
                ?>
            }
            h1 {
                <?php
                
                echo "color: ".getRandomColor();
                echo "background-color: ".getRandomColor();
                
                ?>
            }
            h2 {
                
                background-color: <?=getRandomColor()?>;
                
            }
        </style>
    </head>
    <body>
        <h1>Welcome! </h1>
        <h2> Hola!</h2>

    </body>
</html>