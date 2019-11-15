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
            <div class="booth">
                <video id="video"></video>
                <a href="#" id="capture" class="booth-capture-button">Take Photo</a>
                <a href="#" id="download" class="download-capture-button">Download</a>
                <a href="#" id="save" class="save-capture-button">Save_to_gallery</a>
                <div class="hidden" id="user"><?php echo $_SESSION['username']; ?></div>
                <canvas id="canvas"></canvas>
                <img id="photo" width="400" height="300" src="" alt="">
                <img id="new-img" src="">
            </div>
                
    </BODY>
    <?php if (isset($_SESSION['id'])) { ?>
    <script type="text/javascript" src="../javascript/gallery.js"></script>
    <?php } ?>