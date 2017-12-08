<?php
session_start();
if($_GET['choice'] == 'radio1') {
    $_SESSION['yes'] += 1;
} else if($_GET['choice'] == 'radio2') {
    $_SESSION['maybe'] += 1;
} else if($_GET['choice'] == 'radio3') {
    $_SESSION['no'] += 1;
}
$result = array("yes"=>$_SESSION['yes'], "maybe"=>$_SESSION['maybe'], "no"=>$_SESSION['no']);

echo json_encode($result);
?>