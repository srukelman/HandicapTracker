<?php
 include "lib/connfunc.php";
 include "lib/config.php";

$ht_first=$_POST["firstname"];
$ht_last=$_POST["lastname"];
$ht_email=$_POST["email"];
$ht_password=$_POST["password"];
$ht_pass2=$_POST["password2"];


$conn=htconn();

//email locale_lookup
$emailsql="SELECT email from Users where email='".$ht_email."'";
if (!$emailres = $conn->query($emailsql)) {

    echo "Sorry, the website is experiencing problems.";
}  else {
  $emailexist=$emailres->num_rows;
}

 if($ht_password!=$ht_pass2) {
   echo "Password 1: ".$ht_password."; Password 2: ".$ht_pass2."<br>\n";
   //header("Location:htt2{
   header("Location:http://" . $URL . "/register.php?error=pswdmatch");
 }elseif(!$ht_first) {
   header("Location:http://" . $URL . "/register.php?error=firstnull");
 }elseif(!$ht_last) {
   header("Location:http://" . $URL . "/register.php?error=lastnull");
 }elseif(!$ht_email) {
   header("Location:http://" . $URL . "/register.php?error=emailnull");
 }elseif(!$ht_password  || !$ht_pass2) {
   header("Location:http://" . $URL . "/register.php?error=pswdnull");
 }elseif($emailexist) {
   header("Location:http://" . $URL . "/register.php?error=emailexist");
} else{
 //inserting data order
$hash_pass= hash('gost', $ht_pass2);
  $ht_email = strtolower($ht_email);
   $sql = "INSERT INTO Users
	    (Firstname, Lastname, email, password)
	   VALUES
	    ('$ht_first','$ht_last', '$ht_email', '$hash_pass')";

  //declare in the order variable
  if (!$result = $conn->query($sql)){
   echo("Input data is fail");
  }
  $sql = "SELECT Password, id from Users where Email = '" . $ht_user."'";
  if (!$result = $conn->query($sql)){
   echo("Input data is fail");
  }
  $cookie_value = $row['id'];
  setcookie('uid', $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
  header("Location:http://" . $URL . "/entry.html");
}

$conn->close();


?>
