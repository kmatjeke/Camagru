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
        <link rel="stylesheet" type="text/css" href="../style/footer.css">
        <meta charset="UTF-8">
        <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
        <title>Gallery</title>
    </HEAD>
    <BODY>
        <HEADER>
            <?php include('../includes/header.php') ?>
        </HEADER>
        <div class="bg-image"></div>
        <main class="allgallery">
            <div class="gallery">
                <?php
                    $results_per_page = 6;
                    $db = new Pictures("", "", $_SESSION['username']);
                    $count = $db->nbPictures();
                    $nbofpages = ceil($count / $results_per_page);
                    $pics = $db->getAllPicture();
                ?>
                    <?php
                    if (!isset($_GET['page'])){
                        $page = 1;
                    }
                    else
                    {
                        $page = $_GET['page'];
                    }
                    $this_page_result = ($page-1) * $results_per_page;
                    $picbypage = $db->getPicturesByPage($this_page_result, $results_per_page);
                    ?>
                    <div class="pagenumbersbox">
                    <?php
                    for ($page = 1; $page <= $nbofpages; $page++) {
                        echo '
                                <div class="pagenumbers">
                                    <a href="home.php?page=' . $page . '">' . $page . '</a>
                                </div>';
                    }
                    ?>
                    </div>
                        <?php
                        require '../functions/likes.class.php';
                        // require '../class/comments.class.php';
                        foreach ($picbypage as $value){
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
                                            <div class="likesdiv">
                                            <form method="post" action="../functions/addlike.php">
                                                <input type="text" value='<?php echo $id_pic; ?>' class="input_hidden" name="pic_id">
                                                <button type="submit" class="likes" ><img id=like_<?= $id_pic ?> src="../imgs/like.png"/></button>
                                            </form>
                                            </div>
                                            <form method="post" action="../functions/deletelike.php">
                                                <input type="text" value='<?php echo $id_pic; ?>' class="input_hidden" name="pic_id">
                                                <button type="submit" class="likes" ><img id=like_<?= $id_pic ?> src="../imgs/like_red.png"/></button>
                                            </form>
                            <?php } ?>
                                <form method="post" action="../functions/comment.php">
                                    <?php if (isset($_SESSION['id'])){ ?>
                                        <input type="text" maxlength="255" class="inputcomment" id="new_comment" name="new_comment" placeholder="Insert your comment..."><br />
                                        <input type="text" value='<?php echo $id_pic; ?>' class="input_hidden" name="pic_id">
                                        <button type="submit" class="comment" ><img id=comment_ src="../imgs/comment.png"/></button>
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
        <FOOTER>
            <?php include '../includes/footer.php'; ?>
        </FOOTER>
        <script type="text/javascript" src="../javascript/home.js"></script>
    </BODY>
</HTML>