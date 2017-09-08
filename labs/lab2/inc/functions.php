<?php

        function displaySymbol($randomValue, $pos){
            if($randomValue == 0) {
                echo "<img id='reel$pos' src='img/seven.png' alt='Seven' title='Seven' width='70'/>";
            } else if ($randomValue == 1) {
                echo "<img id='reel$pos' src='img/cherry.png' alt='Cherry' title='Cherry' width='70'/>";
            } else if ($randomValue == 2) {
                echo "<img id='reel$pos' src='img/lemon.png' alt='Lemon' title='Lemon' width='70'/>";
            } else {
                echo "<img id='reel$pos' src='img/grapes.png' alt='Grapes' title='Grapes' width='70'/>";
            }
        }
        
        function displayPoints($randomValue1, $randomValue2, $randomValue3) {
            echo "<div id='output'>";
            if ($randomValue1 == $randomValue2 && $randomValue2 == $randomValue3) {
                switch ($randomValue1) {
                    case 0: $totalPoints = 1000;
                        echo "<h1>Jackpot!</h1>";
                        break;
                    case 1: $totalPoints = 500;
                        break;
                    case 2: $totalPoints = 250;
                        break;
                    case 3: $totalPoints = 900;
                        break;
                }
                
                echo "<h2>You won $totalPoints points!</h2>";
            } else {
                echo "<h3>Try again!</h3>";
            }
            echo "</div>";
        }
        
        function play() {
            for($i=1; $i<4; $i++){
                ${"randomValue" . $i} = rand(0,3);
                displaySymbol(${"randomValue" . $i}, $i);
            }
            displayPoints($randomValue1, $randomValue2, $randomValue3);
        }
?>