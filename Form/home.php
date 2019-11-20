<?php
session_start();
include '../config/database.php';
include '../functions/pictures.class.php';


?>
    
<!DOCTYPE HTML>
<HTML>
    <HEAD>
        <link rel="stylesheet" type="text/css" href="../style/home.css">
        <link rel="stylesheet" type="text/css" href="../style/header.css">
        <meta charset="UTF-8">
        <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Gallery</title>
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
                                <form method="post">
                                    <?php if (isset($_SESSION['id'])){ ?>
                                        <input type="text" maxlength="255" onkeypress="{if (event.keyCode == 13) { event.preventDefault(); addComment(<?= $id_pic ?>, this, '<?= $user ?>')}}"
                                            class="inputcomment" id="new_comment_<?= $id_pic ?>" name="new_comment_<?= $id_pic ?>" placeholder="Insert your comment...">
                                    <?php } ?>
                                </form>
                            </div>
                        <?php }
                    ?>
            </div>
        </main>
        <footer></footer>
        <script type="text/javascript" src="../javascript/home.js"></script>
    </BODY>
</HTML>