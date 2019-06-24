<?php
include "lib/config.php"
$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

      // Create the unique user password reset key
      $password = hash('gost', $salt.$userExists["email"]);

      // Create a url which we will direct them to reset their password
      $pwrurl = url."/reset_passwd.php?q=".$password;

      // Mail them their key
      $mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website ".url."\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nMe";
      mail($userExists["email"], "www.yoursitehere.com - Password Reset", $mailbody);
      echo "Your password recovery key has been sent to your e-mail address.";

  }
  else
      echo "No user with that e-mail address exists.";
?>
