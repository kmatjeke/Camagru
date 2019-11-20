<?php

function add_comment($pic_id, $comment, $login, $date_creation) {
    include '../config/database.php';
    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("INSERT INTO `comments` (`id_pic`,`comment`, `login`, `date_creation`) VALUES (:id_pic, :comment, :login, :creation)");
        $query->execute(array(':id_pic' => $pic_id, ':comment' => $comment, ':login' => $login, ':creation' => $creation_date));
        return (0);
      } catch (PDOException $e) {
        return ($e->getMessage());
      }
  }

?>