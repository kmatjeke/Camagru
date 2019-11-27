<?php
session_start();
include_once '../config/database.php';
try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query= $dbh->prepare("SELECT user_id FROM users WHERE token=:token");
    $query->execute(array(':token' => $_GET['token']));
    $val = $query->fetch();
    if ($val == null) {
        return (-1);
    }
    $query->closeCursor();
    $query= $dbh->prepare("UPDATE users SET verified='Y' WHERE user_id=:id");
    $query->execute(array(':id' => $val['user_id']));
    $query->closeCursor();
    $_SESSION['verified'] = true;
    header("Location: ../index.php");
    return (0);
  }
  catch (PDOException $e)
  {
    return (-2);
  }
?>
