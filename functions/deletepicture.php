<?php
session_start();
include '../functions/pictures.class.php';
$id_pic = $_POST['pic_id'];
$db = new Pictures($id_pic, "", $_SESSION['username']);
$db->deletePicture();
header("Location: ../Form/edit.php");
?>