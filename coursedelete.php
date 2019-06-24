<?php
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
 include "lib/connfunc.php";

$ht_name=$_POST["name"];
$ht_rating=$_POST["rating"];
$ht_slope=$_POST["slope"];
$ht_918=$_POST["9or18"];

$conn=htconn();

//inserting data order
$sql="DELETE FROM favcourses WHERE CourseName='".$ht_name ."' and id=" .$s_uid;

//declare in the order variable
if (!$result = $conn->query($sql)){
  echo("Delete data is fail");
}


  header("Location: http://" . $URL . "/fav-course.php");


$conn->close();
?>
