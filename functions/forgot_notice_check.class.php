<?php
session_start();
include('forgot_notice_send.class.php');

$mail = $_POST['email'];
$_SESSION['error'] = null;
if (($result = reset_password($mail)) !== 0)
{
    if ($result == -1)
    {
        $_SESSION['error'] = "user not found";
    }
    else
    {
        $_SESSION['error'] = "internal error";
    }
}
else
{
    $_SESSION['forgot_success'] = true;
}
header("Location: ../Form/forgot_notice.form.php");

?>