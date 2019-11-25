<?php
session_start();
include_once 'addlikeDB.php';
include '../config/database.php';
include_once '../functions/E_Mail.class.php';

$pic_id = $_POST['pic_id'];
$login = $_SESSION['username'];
$comment = $_POST['new_comment'];
date_default_timezone_set('Europe/Paris');
$date_creation = date("Y-m-d H:i:s");
add_comm($pic_id,$comment, $login, $date_creation);

try
    {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("SELECT pictures.login,users.E_Mail, users.notifications FROM users INNER JOIN pictures ON users.username=pictures.login WHERE pictures.id_pic= ?");
        $query->execute(array($pic_id));
        $val = $query->fetch();
        var_dump($val);
        if ($val['notifications'] == 'Y')
        {
            $mail = $val['E_Mail'];
            $toWho = $val['login'];
            send_comment_mail($mail, $toWho, $comment);
            header("Location: ../Form/home.php");
        }
        else
            header("Location: ../Form/home.php");
        $query->closeCursor();
        return (0);
    }
    catch (PDOException $e)
    {
        return ($e->getMessage());
    }

// header("Location: ../Form/home.php");
?>