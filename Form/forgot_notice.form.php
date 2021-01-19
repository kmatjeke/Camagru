<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="../style/forgot_notice.css">
      <meta charset="UTF-8">
      <title>Forgot Password</title>
  </HEAD>
  <BODY>
    <div class="bg-image"></div>
    <div class="center_div">
        <div class="title">Forgot Password</div>
        <div class="info">
          <img src="../imgs/Instagram-Icon.png" alt="Insta Logo" id="instalogo">
          <form method="post" style="position: relative;" action="../functions/forgot_notice_check.class.php">
            <div class="divemail">
              <label>Enter Email: </label>
              <input id="mail" name="email" placeholder="email" type="mail" required>
            </div>
            <div class="divsubmit">
              <button type="submit" name="reset-request-submit" class="submitbutton">Change Password</button>
            </div>
          </form>
        </div>
        <?php
        echo $_SESSION['error'];
        $_SESSION['error'] = null;
        if (isset($_SESSION['forgot_success'])) { ?>
          <div class="notice">
              An email has been sent to your email address please go view it
          </div>
          <a href="../index.php">Click here to go to main page</a>
          <?php
          $_SESSION['forgot_success'] = null;
        }
        ?>
    </div>
  </BODY>
</HTML>