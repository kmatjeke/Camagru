<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="signup.css">
      <meta charset="UTF-8">
      <title>SIGNUP</title>
  </HEAD>
  <BODY>
    <div class="center_div">
        <div class="title">SIGNUP</div>
        <div class="blue">
            <form method="post" style="position: relative;" action="signup_infocheck.php">
                <label>Username: </label>
                <input id="name" name="username" placeholder="username" type="text" required>
                <label>Email: </label>
                <input id="mail" name="email" placeholder="email" type="mail" required>
                <label>Firstname: </label>
                <input id="mail" name="firstname" placeholder="Enter firstname" type="text" required>
                <label>Surname: </label>
                <input id="mail" name="surname" placeholder="enter surname" type="text" required>
                <label>Password: </label>
                <input id="password" name="password" placeholder="password" type="password" required>
                <label>Re-enter Password: </label>
                <input id="re-password" name="re-password" placeholder="re-enter password" type="password" required>
                <input name="submit" type="submit" value=" SEND ">
                <span>
                  <?php
                  echo $_SESSION['error'];
                  $_SESSION['error'] = null;
                  if (isset($_SESSION['signup_success'])) {
                    echo "Signup success please check your mail box";
                    $_SESSION['signup_success'] = null;
                  }
                  ?>
                </span>
            </form>
        </div>
    </div>
  </BODY>
</HTML>