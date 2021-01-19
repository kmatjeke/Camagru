<?php
    session_start();
?>
<?php if (isset($_SESSION['id'])) { ?>
    <div class="logheader">
        <a href="#" class="logo">
            <img src="../imgs/insta.jpg" alt="logo" id="instalogo">
        </a>
        <div class="header-right">
            <a href="../Form/home.php" class="home">HOME</a>
            <a href="../Form/edit.php" class="home">MY PICTURES</a>
            <a href="../Form/gallery.php">CAMERA</a>
            <a href="../Form/update.php">UPDATE PROFILE</a>
            <a href="../functions/logout.class.php">LOG OUT</a>
        </div>
    </div>
<?php } 
else { ?>
    <div class="logheader">
        <a href="#" class="logo">
            <img src="../imgs/insta.jpg" alt="logo" id="instalogo">
        </a>
        <div class="header-right">
            <a href="../Form/home.php" class="home">HOME</a>
            <a href="../index.php">LOG IN</a>
        </div>
    </div>
<?php } ?>