<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="../style/update.css">
      <link rel="stylesheet" type="text/css" href="../style/header.css">
      <link rel="stylesheet" type="text/css" href="../style/footer.css">
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
          </form>
          <div class="title2">Update Info</div>
          <div class="update_info">
            <form method="post" style="position: relative;" action="../update_infochecks/update_username.php">
                <div class ="divusername">
                <label>Username: </label>
                <input id="username" name="username" placeholder="username" type="text" required>
                </div>
                <div class="button_update">
                    <button type="submit" class="submitbutton">Update Username</button>
                </div>
            </form>
            <form method="post" style="position: relative;" action="../update_infochecks/update_email.php">
                <div class ="divemail">
                <label>E-Mail: </label>
                    <input id="mail" name="email" placeholder="email" type="mail" required>
                </div>
                <div class="button_update">
                    <button type="submit" class="submitbutton">Update e-mail</button>
                </div>
            </form>
            <form method="post" class="passform" style="position: relative;" action="../update_infochecks/update_password.php">
                <div class="divpass">
                <label>Password: </label>
                <input id="password" name="password" placeholder="password" type="password" required>
                </div>
                <div class="divrepass">
                <label>verify Password: </label>
                <input id="re-password" name="re-password" placeholder="re-enter password" type="password" required>
                </div>
                <div class="button_update">
                    <button type="submit" class="submitbutton">Update Password</button>
                </div>
                <span>
                    <?php
                    echo $_SESSION['error'];
                    $_SESSION['error'] = null;
                    if (isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        $_SESSION['update'] = null;
                      }
                    ?>
                </span>
            </form>
        </div>
    </div>
    <FOOTER>
        <?php include '../includes/footer.php'; ?>
    </FOOTER>
  </BODY>
</HTML>