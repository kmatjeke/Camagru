<?php
session_start();
include_once 'addlikeDB.php';
$pic_id = $_POST['pic_id'];
$login = $_SESSION['username'];
date_default_timezone_set('Europe/Paris');
$date_creation = date("Y-m-d H:i:s");
add_like($pic_id, $login, $date_creation);
header("Location: ../Form/home.php");
?>