<?php
session_start();
include_once '../functions/reset_password.class.php';

$mail = $_POST['email'];
$password = $_POST['password'];
$re_password = $_POST['re-password'];

if (!($password == $re_password))
{
  $_SESSION['error'] = "Passwords do not match!";
  header("Location: forgot_password.form.php");
  return;
}