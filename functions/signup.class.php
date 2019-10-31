<?php

function signup($mail, $username, $firstname, $surname, $password, $host) {
    include_once '../setup/DB_connect.class.php';
    include_once 'E_Mail.class.php';
    $mail = strtolower($mail);
    try {
            $dbhost = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
            $dbhost->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query= $dbhost->prepare("SELECT user_id FROM users WHERE username=:username OR E_Mail=:mail");
            $query->execute(array(':username' => $username, ':mail' => $mail));
            if ($val = $query->fetch()) {
              $_SESSION['error'] = "user already exist";
              $query->closeCursor();
              return(-1);
            }
            $query->closeCursor();
            // encrypt password
            $password = hash("whirlpool", $password);
            $query= $dbhost->prepare("INSERT INTO users (username, E_Mail, Firstname, Surname, password, token) VALUES (:username, :mail, :firstname, :surname, :password, :token)");
            $token = uniqid(rand(), true);
            $query->execute(array(':username' => $username, ':mail' => $mail, ':firstname' => $firstname, ':surname' => $surname, ':password' => $password, ':token' => $token));
            send_verification_email($mail, $username, $token, $host);
            $_SESSION['signup_success'] = true;
            return (0);
        }
        catch (PDOException $e)
        {
            $_SESSION['error'] = "ERROR: ".$e->getMessage();
        }
}
?>