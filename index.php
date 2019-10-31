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
        <div class="bg-image"></div>
        <div class="page">
            <img src="imgs/Instagram-icon.png" alt="Insta Logo" id="instalogo">
            <?php if (isset($_SESSION['id'])) { ?>
                <br />
                <div class="profile">
                    You are connected as <?php print_r(htmlspecialchars($_SESSION['username'])) ?>
                </div>
                <div class="go_home">
                    <p>
                        Navigate to profile home :
                        <a href="Form/home.php" class="link">Click Here</a>
                    </p>
                </div>
                <div class="logout">
                    <form action="functions/logout.class.php" method="post">
                        <button type="submit" name="logout-button" id="button-logout">Click Here To Logout</button>
                    </form>
                </div>
            <?php }
            else { ?>
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
                    <div class="no_account">
                        <label>Don't have an account </label>
                        <a href="Form/sign-up.form.php" id="signup-text">Sign-up</a>
                    </div>
                    <span>
                        <?php
                            if ($_SESSION['error']) {
                                echo $_SESSION['error'];
                            }
                            $_SESSION['error'] = null;
                        ?>
                    </span>
                </form>
                <?php }?>
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
                
                <!-- <div class="logout">
                    <form action="functions/logout.class.php" method="post">
                        <button type="submit" name="logout-button" id="button-logout">LOGOUT</button>
                    </form>
                </div> -->
            </div>
        </div>
    </BODY>
</html>