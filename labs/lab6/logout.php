<?php
session_start();
include "../dbConnection.php";
$conn = getDatabaseConnection();

session_destroy();

header("Location: index.php");

?>