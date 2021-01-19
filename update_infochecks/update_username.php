<?php

session_start();
include_once '../functions/addlikeDB.php';
$newuser = $_POST['username'];
$login = $_SESSION['username'];
if (strlen($newuser) > 50 || strlen($newuser) < 3)
{
  $_SESSION['error'] = "Not a valid username!";
  header("Location: ../Form/update.php");
  return;
}
update_username($login, $newuser);
$_SESSION['username'] = null;
$_SESSION['username'] = $newuser;
$_SESSION['update'] = 'Username updated';
header("Location: ../Form/update.php");

?>