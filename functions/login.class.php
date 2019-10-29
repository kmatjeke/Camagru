<?php
session_start();
include 'login_check.class.php';
// retreive values
$mail = $_POST['mail'];
$password = $_POST['userpassword'];
if (($val = login_user($mail, $password)) == -1)
{
    $_SESSION['error'] = "user or password Incorrect";
    header("Location: ../index.php?user_password=incorrect");
    exit();
}
else if (isset($val['err']))
{
    $_SESSION['error'] = $val['err'];
    header("Location: ../index.php?login=failed");
    exit();
}
else
{
    $_SESSION['id'] = $val['id'];
    $_SESSION['username'] = $val['username'];
    header("Location: ../Form/home.php");
}
// header("Location: ../index.php");
?>