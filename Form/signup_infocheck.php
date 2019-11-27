<?php
session_start();
include_once '../functions/signup.class.php';

$mail = $_POST['email'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];
$_SESSION['error'] = null;

if(!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
  $_SESSION['error'] = "You need to enter a valid email";
  header("Location: sign-up.form.php");
  return;
}
if (strlen($username) > 50 || strlen($username) < 3) {
  $_SESSION['error'] = "Username should be between 3 and 50 characters";
  header("Location: sign-up.form.php");
  return;
}
if (strlen($password) < 3) {
  $_SESSION['error'] = "Password should be between 3 and 255 characters";
  header("Location: sign-up.form.php");
  return;
}
if (!($password == $re_password))
{
  $_SESSION['error'] = "Passwords do not match!";
  header("Location: sign-up.form.php");
  return;
}
$url = $_SERVER['HTTP_HOST'] . str_replace("/forms/signup.php", "", $_SERVER['REQUEST_URI']);
signup($mail, $username, $firstname, $surname, $password, $url);
header("Location: ../Form/sign-up.form.php");
?>