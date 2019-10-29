<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="CSS/index.css">
        <meta charset="UTF-8">
        <title>CAMAGRU</title>
    </HEAD>
    <BODY>
        <HEADER>
            <!-- <div class = "Title">CAMAGRU</div> -->
            <img src="imgs/Instagram-icon.png" alt="Insta Logo" id="instalogo">
            <div class = "Login">
                <form action="functions/login.class.php" method="post">
                    <label>Usename or E-mail: </label>
                    <input type="text" name="mail/userID" placeholder="Username/E-mail" required>
                    <label>Password: </label>
                    <input type="password" name="userpassword" placeholder="Password">
                    <button type="submit" name="submit-button">LOGIN</button>
                </form>
                <br />
                <label>Don't have an account </label>
                <a href="Form/sign-up.form.php">Sign-up</a>
                <div class="logout">
                    <form action="functions/logout.class.php" method="post">
                        <button type="submit" name="logout-button" id="button-logout">LOGOUT</button>
                    </form>
                </div>
            </div>
        </HEADER>
    </BODY>
</HTML>