<?php

function displaySymbol($symbol) {
    
    echo "<img src='../labs/lab2/img/$symbol.png' width='70'/>";
    
}

$symbols = array("lemon", "orange", "cherry");

//print_r($symbols); //displays content of the array, only for debugging purposes.

//echo $symbols[0]; //displays first element
//displaySymbol($symbols[2]);

$symbols[] = "grapes"; //Adding an element to the array's end
//$symbols[2] = "seven"; //Replaces value

array_push($symbols, "seven"); //Adding an element to the array's end
displaySymbol($symbols[4]);

for($i = 0; $i < count($symbols); $i++) { //Count returns array size
    displaySymbol($symbols[$i]);
}

sort($symbols); //sorts elements in ascending order
print_r($symbols);

//shuffle($symbols);
echo "<hr>";
print_r($symbols);
echo "<hr>";

$lastSymbol = array_pop($symbols); //retrieves and removes the last element from the array
displaySymbol($lastSymbol);
echo "<hr>";
print_r($symbols);

foreach ($symbols as $symbol) {
    displaySymbol($symbol);
}

unset($symbols[2]);
echo "<hr>";
print_r($symbols);
$symbols = array_values($symbols); //Re-indexes the array
echo "<hr>";
print_r($symbols);

//dispplay a random symbol
displaySymbol($symbols[array_rand($symbols)]);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> PHP Arrays </title>
    </head>
    <body>

    </body>
</html>