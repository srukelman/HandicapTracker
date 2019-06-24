<?php
function sendPasslink($to,$name) {
  $subject="Reset Password";
  $headers = 'From: info@handicaptracker.kelman.casa' . "\r\n" .
    'Reply-To: info@handicaptracker.kelman.casa' . "\r\n" ;
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $namedate=$name;
    $key= hash('gost', $namedate);
    $message="<html><body>".
      "Hi ".$name."<br><br>".
      "Please use this link to reset your password:<br>".
      "<a href=\"handicaptracker.daxhund.com/resetpasswd.php?email=".$to."&key=".$key."\" target=\"_top\">".
      "handicaptracker.daxhund.com/resetpasswd.php?email=".$to."&key=".$key."</a>".
      "<BR><BR>".
      "If you have questions please e-mail us at <a href=\"info@handicaptracker.kelman.casa?Subject=Handicap%20notification%20question\" target=\"_top\">".
      "info@handicaptracker.daxhund.com</a>".
      "</body></html>";

  //  echo "to: ".$to." name: ".$name." Message: ".$message;
  mail($to, $subject, $message, $headers);
}
?>
