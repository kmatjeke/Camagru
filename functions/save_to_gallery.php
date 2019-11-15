<?php
  require_once "../config/connect_db.php";
  session_start();
  $user = $_SESSION['username'];
  $src_img = $_POST['img_src'];
  echo $src_img;
  
  ?>