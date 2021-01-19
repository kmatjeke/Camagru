<?php
	session_start();
	if ($_SESSION['id'] != NULL && $_SESSION['login_user'] != "")
    	header('Location: Form/home.php');
	else
    	header('Location: config/setup.php');
?>