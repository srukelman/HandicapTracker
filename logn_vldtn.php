<?php
include "lib/config.php";
session_start();
 include "lib/connfunc.php";
$ht_user=strtolower($_POST["email"]);
$ht_passwd=$_POST["password"];

$conn=htconn();
if ($conn->connect_error) {
  die("connection failed: " . $conn->connect_error);
}

//echo $ht_passwd."something<BR>\n";

$sql = "SELECT Password, id from Users where Email = '" . $ht_user."'";

if (!$result = $conn->query($sql)){
 echo("Input data is fail");
}
$row = $result->fetch_assoc();
$q_pass = $row['Password'];
$hash_pass= hash('gost', $ht_passwd);
//echo $q_pass."<BR>".$hash_pass;
if ($q_pass == $hash_pass) {
  //then start session
  $cookie_value = $row['id'];
  setcookie('uid', $cookie_value, time() + (86400), "/"); // 86400 = 1 day
  //go to recentdiffs.php
  echo $q_pass;
  header("Location:https://" . $URL . "/recent-diffs.php");
  //header("Location:recent-diffs.php");
}  elseif($result->num_rows<1) {
  //message incorrect password back to login page
   header("Location:http://" . $URL . "/login.php?error=emailinval");
}else{
  header("Location:http://" . $URL . "/login.php?error=pswdincorr");
}

?>
