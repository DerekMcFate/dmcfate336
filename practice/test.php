<?php


?>

<!DOCTYPE html>
<html>
    <head>
        <title> SilverJack </title>
        <meta charset="utf-8"/>
        <style>
            @import url("css/styles.css");
        </style>
    </head>
    <body>
        
<?php
$array = array(
    'fruit1' => 'apple',
    'fruit2' => 'orange',
    'fruit3' => 'grape',
    'fruit4' => 'apple',
    'fruit5' => 'apple');
    
$players = array(
    'dog' => 1,
    'orangutan' => 1,
    'otter' => 0,
    'flamingo' => 0);

// this cycle echoes all associative array
// key where value equals "apple"
while ($fruit_name = current($players)) {
    if ($fruit_name < 2) {
        echo key($players).'<br />';
    }
    next($players);
}
?>

    </body>
</html>