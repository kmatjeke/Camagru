<?php

function reset_password($Mail)
{
    include '../config/database.php';
    include_once '../functions/E_Mail.class.php';

    try
    {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("SELECT `user_id`, username FROM users WHERE E_Mail=:mail AND verified='Y'");
        $Mail = strtolower($Mail);
        $query->execute(array(':mail' => $Mail));
        $val = $query->fetch();
        if ($val == null) {
            $query->closeCursor();
            return (-1);
        }
        $query->closeCursor();
        $pass = uniqid('');
        $passEncrypt = hash("Whirlpool", $pass);

        $query= $dbh->prepare("UPDATE users SET password=:password WHERE E_Mail=:mail");
        $query->execute(array(':password' => $passEncrypt, ':mail' => $Mail));
        $query->closeCursor();

        send_forget_mail($Mail, $val['username'], $pass);
        return (0);
    }
    catch (PDOException $e)
    {
        return ($e->getMessage());
    }
}

?>