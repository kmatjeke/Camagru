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
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
        <meta charset="UTF-8">
        <title>Camera</title>
    </HEAD>
    <BODY>
        <?php include '../includes/header.php'; ?>
    <div class="sticker_list">
        <button id="img1"  style=background-color:#f2f2f2><img src="../imgs/image1.png" class= "sticker"/></button>
        <button id="img2" style=background-color:#f2f2f2><img src="../imgs/image2.png" class= "sticker" /></button>
        <button id="img3" style=background-color:#f2f2f2><img src="../imgs/image3.png" class= "sticker" /></button>
        <button id="img4" style=background-color:#f2f2f2><img src="../imgs/image4.png" class= "sticker" /></button>
        <button id="img5" style=background-color:#f2f2f2><img src="../imgs/image5.png" class= "sticker" /></button>
        <button id="img6" style=background-color:#f2f2f2><img src="../imgs/image6.png" class= "sticker" /></button>
        <button id="img7" style=background-color:#f2f2f2><img src="../imgs/image7.png" class= "sticker" /></button>
        <button id="img8" style=background-color:#f2f2f2><img src="../imgs/image8.png" class= "sticker" /></button>
        <button id="img9" style=background-color:#f2f2f2><img src="../imgs/image9.png" class= "sticker" /></button>
        <button id="img10" style=background-color:#f2f2f2><img src="../imgs/image10.png" class= "sticker" /></button>
    </div>
    <div class="allwebcam">
    </div>
    <div class="allwebcam">
      <main class="webcamapercu">
        <div class="webcam" id="column1">
          <video id="video"></video><br />
          <button id="startbutton">Take Photo</button>
          <img src="http://placekitten.com/g/200/300" alt="" id="photo" hidden>
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
                $results_per_page = 3;
                $db = new Pictures("", "", $_SESSION['username']);
                $count = $db->nbPicturesByLogin();
                $nbofpages = ceil($count / $results_per_page);
                $pics = $db->getPicture();
            ?>
                <?php
                if (!isset($_GET['page'])){
                    $page = 1;
                }
                else
                {
                    $page = $_GET['page'];
                }
                $this_page_result = ($page-1) * $results_per_page;
                $picbypage = $db->getPicturesByPageByLogin($this_page_result, $results_per_page);
                for ($page = 1; $page <= $nbofpages; $page++) {
                    echo '<a href="gallery.php?page=' . $page . '">' . $page . '</a>';
                }
                foreach ($picbypage as $value){
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
    <FOOTER>
        <?php include '../includes/footer.php'; ?>
    </FOOTER>
    </BODY>
    <?php if (isset($_SESSION['id'])) { ?>
    <script type="text/javascript" src="../javascript/gallery.js"></script>
    <?php } ?>