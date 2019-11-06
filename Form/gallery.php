<?php
session_start();

include_once("gallery.class.php");

?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="../style/gallery.css">
        <link rel="stylesheet" type="text/css" href="../style/header.css">
        <meta charset="UTF-8">
        <title>Gallery</title>
    </HEAD>
    <BODY>
        <HEADER>
            <?php include('../includes/header.php') ?>
        </HEADER>
        <div class="center">
            <div class="booth">
                <video autoplay="true" id="video"></video>
                <div class="takepicturediv">
                    <a href="#" id="capture" class="booth-capture-button">Take Photo</a>
                </div>
                <div class="divcanvas">
                    <canvas id="canvas" class="canvas_class" width="400" height="300"></canvas>
                </div>
            </div>
        </div>
    </BODY>
    <?php if (isset($_SESSION['id'])) { ?>
    <script type="text/javascript" src="../javascript/gallery.js"></script>
    <?php } ?>