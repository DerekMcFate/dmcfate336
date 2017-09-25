<?php
session_start();
if(isset($_SESSION['matchcount'])) { // Checks whether the session exists
    
    $_SESSION['matchcount'] = 0;
}

$deck = array();
$suits = array("clubs","spades","hearts","diamonds");
$scores = array(0, 0, 0, 0);

for ($i = 0; $i < 4; $i++) {            //sets the suit 
    for ($j = 1; $j <= 13; $j++) {      //sets the value
    
        $deck[] = $suits[$i] . "_" . $j;
    }
    
}

shuffle($deck);

?>

<!DOCTYPE html>
<html>
    <head>
        <title> SilverJack </title>
        <meta charset="utf-8"/>
        <style>
            @import url("css/layout.css");
        </style>
    </head>
    <body>
        <div id="name">
            <h1> Silverjack </h1>
        </div>
        </br>
        
        <div id ='pic_container'>
        <?php 
     ///Before the session starts to randomize the array////
     $starttime = microtime(true);
        for($i =0; $i<4; $i++)
        {
        $imageURLs[$i]= $i;
        }
        
        shuffle($imageURLs);
        $picArray = array();
        for($i =0; $i<4; $i++)
        {
            echo "<img src = 'people/$imageURLs[$i].jpg'/>";
            $picArray[] = $imageURLs[$i];
            echo "       ";
            while($scores[$i] < 35){
                    $poppedValue = explode("_", array_pop($deck));
                    echo '<img src ="cards/'.$poppedValue[0].'/'.$poppedValue[1].'.png">';
                    $scores[$i] += $poppedValue[1];
                }
             echo"<div id='scores'>";
                echo $scores[$i] . "   <br/>";
            echo"</div>";
                 echo "<div id ='players'>";
                if($picArray[$i] == 0) {
                     echo "Derek<br/>";
                  } else if($picArray[$i] == 1) {
                     echo "Alyssia<br/>";
                  } else if($picArray[$i] == 2) {
                     echo "Cameron<br/>";
                  } else if($picArray[$i] == 3) {
                     echo "Jaime<br/>";
                  }
                unset($imageURLs[$randomIndex]);
            }
            echo "</div>";
          //Determines the highest value between players
          $maxScore = 0;
          for($i = 0; $i < 4; $i++) {
              if($scores[$i] > $maxScore && $scores[$i] < 43) {
                  $maxScore = $scores[$i];
              }
          }
          //Determines winners for the round
          $winner = array(0, 0, 0, 0);
          for($i = 0; $i < 4; $i++) {
              if($scores[$i] == $maxScore) {
                  $winner[$i] = 1;
              }
          }
          //Adds the scores together
          $totalPoints = 0;
          for($i = 0; $i < 4; $i++) {
              if($winner[$i] == 0) {
                  $totalPoints += $scores[$i];
              }
          }
          //Assigns points to the winners
          echo "<div id = winner>";
          for($i = 0; $i < 4; $i++) {
              if($winner[$i] == 1) {
                  if($picArray[$i] == 0) {
                     echo "Derek won with " . $totalPoints . " points! <br/>";
                  } else if($picArray[$i] == 1) {
                     echo "Alyssia won with " . $totalPoints . " points! <br/>";
                  } else if($picArray[$i] == 2) {
                     echo "Cameron won with " . $totalPoints . " points! <br/>";
                  } else if($picArray[$i] == 3) {
                     echo "Jaime won with " . $totalPoints . " points! <br/>";
                  }
              }
          }
          echo "</div>";
          echo "<div id = bottom>";
          echo "</br>";
          $endtime = microtime(true);
          $timediff = $endtime - $starttime;
          echo "This match took " . $timediff . " second(s) to complete. <br/>";
          $_SESSION['time'] += $timediff;
          $_SESSION['matchCount'] += 1;
          echo "Matches this session: " + $_SESSION['matchCount'] . "<br/>";
          echo "Total time: " . $_SESSION['time'] . " second(s).<br/>";
          $averageTime = $_SESSION['time'] / $_SESSION['matchCount'];
          echo "Average time: " . $averageTime . " second(s).<br/>";
            echo"</div>"
        ?>
        <form>
            <input type="submit" value="Replay!"/>
        </form>
        </div>
    </body>
</html>