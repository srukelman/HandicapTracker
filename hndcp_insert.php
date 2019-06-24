<?php
include 'lib/handicap-calc.php' ;
include 'lib/9-combine.php';
 require_once "lib/connfunc.php";
 include "lib/config.php";

if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
}

$ht_score=$_POST["Score"];
$ht_rating=$_POST["rating"];
$ht_slope=$_POST["slope"];
$ht_918=$_POST["918"];
$ht_date=$_POST["date"];
$ht_differential=$_POST["differential"];

$conn=htconn();
//inserting data order
$sql = "INSERT INTO differentials
	   (ID, Score, Slope, Rating, 9or18, Differential, ScoreDate)
	  VALUES
	   ('$s_uid','$ht_score', '$ht_slope', '$ht_rating','$ht_918', '$ht_differential', '$ht_date')";

//declare in the order variable
if (!$result = $conn->query($sql)){
  echo("Input data is fail");
}

//echo "blah blah blah".$ht_918;
if($ht_918=='9'){
  nine_combine($s_uid);
}
$hdcp_trend= handicap_calc($s_uid);

  $sql = "UPDATE trend SET Trend=$hdcp_trend, TrenDate=now() WHERE ID=$s_uid ";
  if (!$result = $conn->query($sql)){
    echo("Input data is fail");
  }
  $conn->close();
header("Location: http://" . $URL . "/recent-diffs.php");

?>
