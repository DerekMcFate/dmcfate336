<?php

$plains = array("img/tree.png", "img/lake.png", "img/cloud.png");
$snow = array("img/snowman.png", "img/pinetree.png", "img/snowflake.png");
$desert = array("img/sun.png", "img/cactus.png", "img/oasis.png");

function back() {
    $biome = rand(0, 2);
    switch($biome) {
        case 0:
            echo "<style> body { 
    background-image: url('img/plains.png');
    background-repeat: no-repeat;
    } </style>";
            break;
        case 1:
            echo "<style> body {
    background-image: url('img/desert.png');
    background-repeat: no-repeat;
    } </style>";
            break;
        case 2:
            echo "<style> body {
    background-image: url('img/snowland.png');
    background-repeat: no-repeat;
    } </style>";
            break;
    }
    return $biome;
}

function generate() {
    $habitat = back();
    $placementChance = rand(0, 50000);
    $itemChance = 0;
    for($i = 324; $i < 648; $i++) {
        for($j = 0; $j < 1152; $j++) {
            if($placementChance < 1) {
                $itemChance = rand(0, 2);
                switch($itemChance) {
                    case 0:
                        echo '<img src="' . $plains[0] . '" width="140"/>';
                        break;
                }
                echo "Thing placed on screen<br>";
            }
            $placementChance = rand(0, 50000);
        }
    }
}
?>