<?php
function sendhtMail($to, $handicap,$name,$low) {
  $subject="New Handicap Updates";
  $headers = 'From: info@handicaptracker.kelman.casa' . "\r\n" .
    'Reply-To: info@handicaptracker.kelman.casa' . "\r\n" .
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $message="<html><body>".
      "Hi ". $name .",<br><br>\n As of ". date('F jS')  ." your handicap is:<br><font face=\"serif\" color=\"blue\">". $handicap ."</font><br><br>\n".
      "Your low handicap (for the past 12 months) is:<br><font face=\"serif\" color=\"blue\">". $low ."</font><br><br>\n".
      "If you have questions please e-mail us at <a href=\"info@handicaptracker.daxhund.com?Subject=Handicap%20notification%20question\" target=\"_top\">info@handicaptracker.daxhund.com</a>".
    "</body></html>";

    echo $message;
  mail($to, $subject, $message, $headers);
}
?>
