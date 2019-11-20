<?php

function add_like($pic_id, $login, $creation_date) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("INSERT INTO `likes` (`id_pic`, `login`, `date_creation`) VALUES (:id_pic, :login, :creation)");
      $query->execute(array(':id_pic' => $pic_id, ':login' => $login, ':creation' => $creation_date));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

?>