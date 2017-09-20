<?php

$plains = array('img/tree.png', 'img/lake.png', 'img/cloud.png');
shuffle($plains);
$snow = array('img/snowman.png', 'img/pinetree.png', 'img/snowflake.png');
$desert = array('img/sun.png', 'img/cactus.png', 'img/oasis.png');
sort($snow);
$pictures = array_merge($plains, $snow);
$pictures = array_merge($pictures, $desert);


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
    $placementChance = rand(0, 30000);
    $itemChance = 0;
    $z = 1;
    for($i = 162; $i < 324; $i++) {
        for($j = 0; $j < 1082; $j++) {
            if($placementChance < 1) {
                $itemChance = rand(0, 2);
                if($habitat == 0) {
                switch($itemChance) {
                    case 0:
                        echo '<img class="photo" src="img/tree.png" alt="tree"style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 1:
                        echo '<img class="photo" src="img/lake.png" alt="lake" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 2:
                        echo '<img class="photo" src="img/pinetree.png" alt="pinetree" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                }
                }
                else if($habitat == 1) {
                    switch($itemChance) {
                    case 0:
                        echo '<img class="photo" src="img/cactus.png" alt="cactus" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 1:
                        echo '<img class="photo" src="img/cactus.png" alt="cactus" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 2:
                        echo '<img class="photo" src="img/oasis.png" alt="oasis" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                }
                }
                else {
                    switch($itemChance) {
                    case 0:
                        echo '<img class="photo" src="img/snowman.png" alt="snowman" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 1:
                        echo '<img class="photo" src="img/pinetree.png" alt="pinetree" style="width:140px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                    case 2:
                        echo '<img class="photo" src="img/snowflake.png" alt="snowflake" style="width:70px;top:'.$i.'px;left:'.$j.'px;z-index:'.$z.'px;"/>';
                        $z++;
                        break;
                }
                }
            }
            $placementChance = rand(0, 30000);
        }
    }
}
?>