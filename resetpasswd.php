<?php
include 'lib/connfunc.php';
include "lib/config.php";
if (isset($_GET["email"])) {
    $ht_email =  $_GET["email"];
    $ht_key = $_GET["key"];
}

$conn = htconn();

// Check connection
if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}

$rsql=" SELECT  Firstname from Users where email='" .$ht_email. "'";
if (!$result = $conn->query($rsql)){
 echo("Input data is fail");
}
   $row = $result->fetch_assoc();
    $name=$row["Firstname"];
$key= hash('gost', $name);
if ($ht_key == $key){
//echo $ht_email." ".$ht_key;
echo "<form action=\"reset.php\" method=\"POST\">";
echo "E-mail Address: <input type=\"text\" name=\"email\" size=\"20\" value=\"".$ht_email."\" /><br>";
echo "New Password: <input type=\"password\" name=\"password\" size=\"20\" /><br>";
echo "Confirm Password: <input type=\"password\" name=\"confirmpassword\" size=\"20\" /><br>";
echo "<input type=\"hidden\" name=\"q\" value=\" />";
echo "<input type=\"submit\" name=\"ResetPasswordForm\" value=\"Reset Password\" />";
echo "</form>";
}else{
  echo 'Invalid key';
}

$conn->close();
?>
