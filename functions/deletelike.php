<?php
session_start();
include_once 'deletelikeDB.php';
$pic_id = $_POST['pic_id'];
$login = $_SESSION['username'];
delete_like($pic_id, $login);
header("Location: ../Form/home.php");
?>