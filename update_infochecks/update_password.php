<?php
session_start();
include_once '../functions/addlikeDB.php';
$password = $_POST['password'];
$re_password = $_POST['re-password'];
$login = $_SESSION['username'];
if (!($password == $re_password))
{
  $_SESSION['error'] = "Passwords do not match!";
  header("Location: ../Form/update.php");
  return;
}
$password = hash("whirlpool", $password);
update_password($login, $password);
$_SESSION['update'] = 'password updated';
header("Location: ../Form/update.php");
?>