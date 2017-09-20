<?php

include 'functions.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Landscape Generator </title>
        <meta charset="utf-8"/>
        <link href="css/style.css" rel="stylesheet"/>
    </head>
    <body>
        <header>
            <h1><span>Landscape Generator</span></h1>
        </header>
        <div class="items">
        <?php
            generate();
        ?>
        </div>
        <div>
        <form id="button">
            <input type="submit" value="Regenerate"/>
        </form>
        </div>
    </body>
</html>