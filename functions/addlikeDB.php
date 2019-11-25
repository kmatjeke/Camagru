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

function add_comm($pic_id, $comment, $login, $creation_date) {
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

function comment_on($login) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("UPDATE users SET notifications='Y' WHERE username=:login");
      $query->execute(array(':login' => $login));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

function comment_off($login) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("UPDATE users SET notifications='N' WHERE username=:login");
      $query->execute(array(':login' => $login));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

function update_password($login, $password) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("UPDATE users SET password=:password WHERE username=:login");
      $query->execute(array(':password' => $password, ':login' => $login));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}

function update_email($login, $mail) {
  include '../config/database.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("UPDATE users SET E_Mail=:mail WHERE username=:login");
      $query->execute(array(':mail' => $mail, ':login' => $login));
      return (0);
    } catch (PDOException $e) {
      return ($e->getMessage());
    }
}
?>