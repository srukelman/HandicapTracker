<?php
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:https://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
} include "lib/connfunc.php";
$ht_score=$_POST["Score"];
$ht_rating=$_POST["rating"];
$ht_slope=$_POST["slope"];
$ht_918=$_POST["918"];
$ht_date=$_POST["date"];
$ht_differential=$_POST["differential"];
$ht_difid=$_POST['difid'];

$conn=htconn();

//inserting data order
$sql="DELETE FROM differentials WHERE difid=".$ht_difid ." and id=" .$s_uid;

//declare in the order variable
if (!$result = $conn->query($sql)){
  echo("Input data is fail");
}


  header("Location: https://" . $URL . "/recent-diffs.php");


$conn->close();
?>
