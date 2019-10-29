<?php

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
      To finalyze your subscribtion please click the link below </br>
      <a href="http://' . $ip . '/verify.class.php?token=' . $token . '">Verify my email</a>
    </body>
  </html>
  ';
  mail($toAddr, $subject, $message, $headers);
}

?>