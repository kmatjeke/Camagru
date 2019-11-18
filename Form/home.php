<?php
session_start();
include '../config/database.php';
?>
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" type="text/css" href="../style/header.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Home</title>
    </HEAD>
    <BODY>
        <HEADER>
            <?php include('../includes/header.php') ?>
        </HEADER>
        <?php if (isset($_SESSION['id'])) { ?>
            
        <?php } ?>
    </BODY>
</HTML>