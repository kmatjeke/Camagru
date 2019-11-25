<?php
  session_start();
  include_once 'addlikeDB.php';

  $login = $_SESSION['username'];
  
  if ($_POST['notification'] == 'yes')
  {
    comment_on($login);
    header("Location: ../Form/update.php");
  }
  else if ($_POST['notification'] == 'no')
  {
    comment_off($login);
    header("Location: ../Form/update.php");
  }
?>