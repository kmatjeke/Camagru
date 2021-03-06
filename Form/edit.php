<?php
session_start();
include '../config/database.php';
include '../functions/pictures.class.php';
if (!(isset($_SESSION['id'])))
{
    header("Location: ../index.php");
}

?>
    
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="../style/edit.css">
        <link rel="stylesheet" type="text/css" href="../style/header.css">
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
        <meta charset="UTF-8">
        <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Edit</title>
    </HEAD>
    <BODY>
        <HEADER>
            <?php include('../includes/header.php') ?>
        </HEADER>
        <main class="allgallery">
            <div class="gallery">
                <?php
                    $db = new Pictures("", "", $_SESSION['username']);
                    $pics = $db->getPicture();
                    ?>
                        <?php
                        require '../functions/likes.class.php';
                        // require '../class/comments.class.php';
                        foreach ($pics as $value){
                            $id_pic = $value['id_pic'];
                            $user = $value['login'];
                            $pic = $value['pic'];
                            $like = new Likes($id_pic, $user);
                            $liked = $like->getLike();
                            $nblike = $like->nbLike();
                            ?>
                            <div class="box">
                            <?php 
                                echo ' 
                                    <div class="picture">
                                        <h2 class="users">'.$user.'
                                        <img class="images" src="data:image/png;base64,'.base64_encode($pic).'"/>
                                    </div>
                                    ';
                            ?>
                            <?php if (isset($_SESSION['id'])) {  ?>
                                            <div class="delete">
                                                <label>Click The Cross To Delete Picture</label>
                                                <form method="post" action="../functions/deletepicture.php">
                                                    <input type="text" value='<?php echo $id_pic; ?>' class="input_hidden" name="pic_id">
                                                    <button type="submit" class="delete" ><img id=delete_<?= $id_pic ?> src="../imgs/delete.png"/></button>
                                                </form>
                                            </div>
                            <?php } ?>
                            </div>
                        <?php }
                    ?>
            </div>
        </main>
        <FOOTER>
            <?php include '../includes/footer.php'; ?>
        </FOOTER>
        <script type="text/javascript" src="../javascript/home.js"></script>
    </BODY>
</HTML>