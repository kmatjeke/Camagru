<?php
    session_start();
?>
<?php if (isset($_SESSION['id'])) { ?>
    <div class="logheader">
        <a href="#">
            <img src="../imgs/insta.jpg" alt="logo" id="instalogo">
        </a>
        <ul class="ulhead">
            <li><a href="../Form/gallery.php">GALLERY</a></li>
            <li><a href="../index.php" class="home">HOME</a></li>
        </ul>
    </div>
    <div class="logout">
        <form action="../functions/logout.class.php" method="post">
            <button type="submit" name="logout" class="logout_button">Sign Out</button>
        </form>
    </div>
<?php } ?>