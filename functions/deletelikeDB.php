<?php

function delete_like($pic_id, $login) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("DELETE FROM `likes` WHERE `id_pic` = :id_pic AND `login` = :login");
      $query->execute(array(':id_pic' => $pic_id, ':login' => $login));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

?>