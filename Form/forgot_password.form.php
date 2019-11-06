<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="forgot_password.css">
      <meta charset="UTF-8">
      <title>Change Password</title>
  </HEAD>
  <BODY>
    <div class="bg-image"></div>
    <div class="center_div">
        <div class="title">Change Password</div>
        <div class="info">
          <div class="Hello">Hello <?php echo $_GET['username']; ?></div> 
          <img src="../imgs/Instagram-Icon.png" alt="Insta Logo" id="instalogo">
          <form method="post" style="position: relative;" action="forgot_password_infocheck.php">
            <div class="divpass">
              <label>Enter new Password: </label>
              <input id="password" name="password" placeholder="password" type="password" required>
            </div>
            <div class="divrepass">
              <label>Re-enter Password: </label>
              <input id="re-password" name="re-password" placeholder="re-enter password" type="password" required>
            </div>
            <div class="divsubmit">
              <button type="submit" class="submitbutton">Change Password</button>
            </div>
          </form>
        </div>
    </div>
  </BODY>
</HTML>