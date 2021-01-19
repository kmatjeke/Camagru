<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
  <HEAD>
      <link rel="stylesheet" type="text/css" href="../style/signup.css">
      <meta charset="UTF-8">
      <title>SIGNUP</title>
  </HEAD>
  <BODY>
    <div class="bg-image"></div>
    <div class="center_div">
        <div class="title">SIGNUP</div>
        <div class="info">
          <img src="../imgs/Instagram-Icon.png" alt="Insta Logo" id="instalogo">
          <form method="post" style="position: relative;" action="signup_infocheck.php">
            <div class ="divusername">
              <label>Username: </label>
              <input id="username" name="username" placeholder="username" type="text" required>
            </div>
            <div class="divemail">
              <label>Email: </label>
              <input id="mail" name="email" placeholder="email" type="mail" required>
            </div>
            <div class="divfname">
              <label>Firstname: </label>
              <input id="fname" name="firstname" placeholder="Enter firstname" type="text" required>
            </div>
            <div class="divsname">
              <label>Surname: </label>
              <input id="sname" name="surname" placeholder="enter surname" type="text" required>
            </div>
            <div class="divpass">
              <label>Password: </label>
              <input id="password" name="password" placeholder="password" type="password" required pattern="^(?=.*[A-Z])(?=.*[0-9]).{6,32}$" oninput="setCustomValidity(''); checkValidity(); setCustomValidity(validity.valid ? '' : 'invalid password.');">
            </div>
            <div class="divrepass">
              <label>verify Password: </label>
              <input id="re-password" name="re-password" placeholder="re-enter password" type="password" required>
            </div>
            <div class="divsubmit">
              <button type="submit" class="submitbutton">Sign Up</button>
            </div>
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