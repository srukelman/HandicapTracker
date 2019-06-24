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
$ht_918=$_POST["918"];
$ht_date=$_POST["date"];
$ht_differential=$_POST["differential"];

 $conn=htconn();

//inserting data order
$sql = "INSERT INTO favcourses
	   (ID, CourseName, Slope, Rating, 9or18)
	  VALUES
	   ('$s_uid','$ht_name', '$ht_slope', '$ht_rating','$ht_918')";

//declare in the order variable
if (!$result = $conn->query($sql)){
  echo("Input data is fail");
}
header("Location: http://" . $URL . "/fav-course.php");

$conn->close();
?>
