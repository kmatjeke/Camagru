<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="../style/update.css">
      <link rel="stylesheet" type="text/css" href="../style/header.css">
      <meta charset="UTF-8">
      <title>Update Profile</title>
  </HEAD>
  <BODY>
      <HEADER>
        <?php include('../includes/header.php') ?>
    </HEADER>
    <div class="bg-image"></div>
    <div class="center_div">
        <div class="title">Update Your Profile</div>
        <div class="info">
          <img src="../imgs/Instagram-Icon.png" alt="Insta Logo" id="instalogo">
          <form method="post" style="position: relative;" action="../functions/notifications.php">
            <div class="Notification">
              <label>Do you want to receive notifications</label>
                <br>
                <input type="radio" id="notification" name="notification" value="yes">yes
                <br>
                <input type="radio" id="notification" name="notification" value="no">No
            </div>
            <div class="divsubmit">
              <button type="submit" class="submitbutton">Update Notifications</button>
            </div>
            <span>
              <?php
              echo $_SESSION['error'];
              $_SESSION['error'] = null;
              if (isset($_SESSION['update_success'])) {
                echo "Profile successfully updated";
                $_SESSION['update_success'] = null;
              }
              ?>
            </span>
          </form>
        </div>
    </div>
  </BODY>
</HTML>