<?php

session_start() or die("Failed to resume session\n");
$rawpic = $_POST['pic'];
$pic = base64_decode($rawpic);
require '../functions/pictures.class.php';
$db = new Pictures("", $pic, $_SESSION['username']);
$id_pic = $db->addPicture();
echo json_encode($id_pic);
?>