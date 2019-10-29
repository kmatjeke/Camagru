<?php
function login_user($userMail, $password) {
  include_once '../setup/DB_connect.class.php';
  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT user_id, username FROM users WHERE E_Mail=:mail AND password=:password /*AND verified='Y'*/");
      $userMail = strtolower($userMail);
      $password = hash("whirlpool", $password);
      $query->execute(array(':mail' => $userMail, ':password' => $password));
      $val = $query->fetch();
      if ($val == null) {
          $query->closeCursor();
          return (-1);
      }
      $query->closeCursor();
      return ($val);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
?>