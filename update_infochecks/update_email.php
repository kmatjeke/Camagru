<?php
session_start();
include_once '../functions/addlikeDB.php';
$mail = $_POST['email'];
$login = $_SESSION['username'];
if(!filter_var($mail, FILTER_VALIDATE_EMAIL))
{
  $_SESSION['error'] = "Not a valid email!";
  header("Location: ../Form/update.php");
  return;
}
update_email($login, $mail);
$_SESSION['update'] = 'E Mail updated';
header("Location: ../Form/update.php");
?>