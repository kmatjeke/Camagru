<?php
session_start();
include_once 'addlikeDB.php';
include '../config/database.php';
$pic_id = $_POST['pic_id'];
$login = $_SESSION['username'];
$comment = $_POST['new_comment'];
date_default_timezone_set('Europe/Paris');
$date_creation = date("Y-m-d H:i:s");
add_comm($pic_id,$comment, $login, $date_creation);
header("Location: ../Form/home.php");
?>