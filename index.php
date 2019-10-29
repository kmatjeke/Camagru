<?php
session_start();
?>
<!DOCTYPE html>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="index.css">
        <meta charset="UTF-8">
        <title>CAMAGRU</title>
    </HEAD>
    <BODY>
        <div class="page">
            <img src="imgs/Instagram-icon.png" alt="Insta Logo" id="instalogo">
            <div class = "Login">
                <form action="functions/login.class.php" method="post">
                    <div class="lblemail">
                        <label id="lblemail">Enter your E-mail: </label>
                        <input type="text" name="mail" placeholder="E_mail" id="inputmail" required>
                    </div>
                    <div class="lblpassword">
                        <label id="lblpassword">Password: </label>
                        <input type="password" name="userpassword" placeholder="Password" id="inputpass" required>
                    </div>
                    <div class="divbutton">
                        <button type="submit" name="submit-button" id="loginbutton">LOGIN</button>
                    </div>
                </form>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URL]";
                    if (strpos($fullUrl, "user_password=incorrect") == true)
                    {
                        echo "<p class='error'>Password or Username Incorrect!</p>";
                    }
                    else if (strpos($fullUrl, "login=failed") == true)
                    {
                        echo "<p class='error'>Session Error!</p>";
                    }
                ?>
                <br />
                <label>Don't have an account </label>
                <a href="Form/sign-up.form.php" id="signup-text">Sign-up</a>
                <!-- <div class="logout">
                    <form action="functions/logout.class.php" method="post">
                        <button type="submit" name="logout-button" id="button-logout">LOGOUT</button>
                    </form>
                </div> -->
            </div>
                </div>
        <!-- <img src="https://www.medicalnewstoday.com/content/images/articles/325/325466/man-walking-dog.jpg" alt="mandog" class="bg-image"> -->
    </BODY>
</html>