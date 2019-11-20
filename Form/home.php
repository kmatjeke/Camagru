<?php
session_start();
include '../config/database.php';
include '../functions/pictures.class.php';
include '../functions/addlike.php';


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
                    $pics = $db->getAllPicture();
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
                            <?php if (isset($_SESSION['id'])) { 
                                        if ($liked === false) { ?>
                                            <div class="likesdiv">
                                            <form method="post" action="../functions/addlike.php">
                                                <input type="text" value='<?php echo $id_pic; ?>' class="input_hidden" name="pic_id">
                                                <button type="submit" class="likes" ><img id=like_<?= $id_pic ?> src="../imgs/like.png"/></button>
                                            </form>
                                            </div>
                                        <?php }
                                        else ?>
                                            <div class="likesdiv">
                                                <button onclick="deleteLike()" class="likes" ><img id=like_<?= $id_pic ?> src="../imgs/like_red.png"/></button>
                                            </div>
                            <?php } ?>
                                <form method="post">
                                    <?php if (isset($_SESSION['id'])){ ?>
                                        <input type="text" maxlength="255" onkeypress="{if (event.keyCode == 13) { event.preventDefault(); addComment(<?= $id_pic ?>, this, '<?= $user ?>')}}"
                                            class="inputcomment" id="new_comment_<?= $id_pic ?>" name="new_comment_<?= $id_pic ?>" placeholder="Insert your comment...">
                                    <?php } ?>
                                </form>
                                <div class="likediv">
                                    <label class="likelbl">Likes :</label>
                                    <?php echo $nblike; ?>
                                </div>
                            </div>
                        <?php }
                    ?>
            </div>
        </main>
        <footer></footer>
        <script type="text/javascript" src="../javascript/home.js"></script>
    </BODY>
</HTML>