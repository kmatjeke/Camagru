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
                    <img id="upImg" name="img" src="">
                    <a href="#" id="savebutton" class="booth-capture-button">
                        <form action="" id="formtake">
                            <input type="hidden" id="photo" name="photo">
                            <input type="submit" id="takephoto" value="take" name="submitphoto">
                        </form>
                        <form action="" id="formupload">
                            <input id="handler" accept="imgs/*" type="file" name="">
                            <button id="button_upload">OK</button>
                        </form>
                    </a>
                </div>
                <div class="divcanvas">
                    <canvas id="canvas" class="canvas_class" width="400" height="300"></canvas>
                    
                    <a href="">
                        <button id="button_download" class="img-download" type="button">Download</button>
                        <button id="button_save_to_gallery" class="img-gallery">Save to Gallery</button>
                </div>
            </div>
        </div>
    </BODY>
    <?php if (isset($_SESSION['id'])) { ?>
    <script type="text/javascript" src="../javascript/gallery.js"></script>
    <?php } ?>