<?php
session_start();
function send_verification_email($toAddr, $toUsername, $token, $ip) {
  $subject = "[CAMAGRU] - Email verification";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <kmatjeke@student.wethinkcode.co.za>' . "\r\n";
  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      To finalyze your subscribtion please click the link below And Login</br>
      <a href="http://localhost:8080/camagru/functions/verify.class.php?token=' . $token . '">Verify E-mail Address</a>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}

function send_forget_mail($toAddr, $toUsername) {
  $subject = "[CAMAGRU] - Reset Your Password";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <kmatjeke@student.wethinkcode.co.za>' . "\r\n";
  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' <br />
      To reset your password please click the link below</br>
      <a href="http://localhost:8080/camagru/Form/forgot_password.form.php?mail=' . $toAddr . '&username=' . $toUsername . '">Reset your password</a>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}
?>