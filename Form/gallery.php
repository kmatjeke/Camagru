<?php
session_start();
if (!(isset($_SESSION['id'])))
{
    header("Location: ../index.php");
}

include_once("gallery.class.php");
include '../functions/pictures.class.php';

?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="../style/gallery.css">
        <link rel="stylesheet" type="text/css" href="../style/header.css">
        <meta charset="UTF-8">
        <title>Camera</title>
    </HEAD>
    <BODY>
            <?php include('../includes/header.php') ?>
        <?php include '../includes/header.php'; ?>
    <div class="allwebcam">
      <main class="webcamapercu">
        <div class="webcam" id="column1">
          <video id="video"></video><br />
          <button id="startbutton">Take Photo</button>
          <button id="img1" onclick="addsticker(1)" style=background-color:#f2f2f2><img src="../imgs/image1.png" width=100/></button>
          <button id="img2" onclick="addsticker(2)" style=background-color:#f2f2f2><img src="../imgs/image2.png" width=100/></button>
          <button id="img3" onclick="addsticker(3)" style=background-color:#f2f2f2><img src="../imgs/image3.png" width=100/></button>
          <img src="" alt="" id="photo" hidden>
        <label class="file" title="">
            <input type="file" accept="image/*" name="uploadpic" id="uploadpic" onchange="this.parentNode.setAttribute('title', this.value.replace(/^.*[\\/]/, ''))" />
        </label>
        <input id="uploadsubmitbutton" type="submit" value="Upload Image" name="submit">
        </div>
        <div class="apercu">
          <canvas id="canvas"></canvas><br />
          <button id="savebutton">Save Picture</button>
        </div>
        <div class="sidepic">
            <?php
              $db = new Pictures("", "", $_SESSION['username']);
              $pics = $db->getPicture();
              ?>
                  <?php
                  foreach ($pics as $value){
                      $id_pic = $value['id_pic'];
                      $date = $value['date_creation'];
                      $pic = $value['pic'];
                      ?>
                      <div class="box">
                      <?php 
                          echo ' 
                              <div class="picture">
                                  <h2 class="users">'.$date.'
                                  <img class="images" src="data:image/png;base64,'.base64_encode($pic).'"/>
                              </div>
                              ';
                      ?>
                      </div>
                  <?php }
              ?>
        </div>
    </main><br />
    <aside>
    
    </aside>
    
    </BODY>
    <?php if (isset($_SESSION['id'])) { ?>
    <script type="text/javascript" src="../javascript/gallery.js"></script>
    <?php } ?>