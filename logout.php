<?php
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
setcookie('uid', "", time() + (-3600), "/"); // 86400 = 1 day
   header("Location:http://" . $URL . "/login.php");
?>
