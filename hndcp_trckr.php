<?php
 include "lib/connfunc.php";
 include "lib/config.php";

//session mgmt & check
if (!isset($_COOKIE["uid"])) {
  header("Location:http:// . $URL . /login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}

$ht_favman=$_POST["favman"];
$ht_name=$_POST["course"];
$ht_score=$_POST["Score"];
$ht_id=$_POST["id"];
$ht_rating=$_POST["rating"];
$ht_slope=$_POST["slope"];
$ht_918=$_POST["918"];
$ht_date=$_POST["date"];

$conn=htconn();

if($ht_favman=="fav"){
  $sql="SELECT Slope, Rating, 9or18 from favcourses where CourseName='$ht_name' and ID=$s_uid";
  if (!$result = $conn->query($sql)) {
      /* Oh no! The query failed. */
        echo "Sorry, the website is experiencing problems.";
        echo $sql;
         echo $ht_name;
  }  else{
    $row = $result->fetch_assoc();
    $ht_rating=$row['Rating'];
    $ht_slope=$row['Slope'];
    $ht_918=$row['9or18'];
  }

}
$differential=number_format(($ht_score-$ht_rating)*113/$ht_slope,1);
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Handicap Tracker</title>
</head>
<body>
<h1>Welcome to Handicap Tracker</h1>
<p>
Please confirm your entry
</p>
<form action="hndcp_insert.php" align="center" method="post">

  Score: <?php echo $ht_score; ?>
  <input type="hidden" name="Score" value="<?php echo $ht_score; ?>">
  <br>
  Rating: <?php echo $ht_rating; ?>
  <input type="hidden" name="rating" value="<?php echo $ht_rating; ?>">
  <br>
  Slope: <?php echo $ht_slope; ?>
  <input type="hidden" name="slope" value="<?php echo $ht_slope; ?>">
  <br>
  9 or 18: <?php echo $ht_918; ?>
  <input type="hidden" name="918" value="<?php echo $ht_918; ?>">
  <br>
  Date: <?php echo $ht_date; ?>
  <input type="hidden" name="date" value="<?php echo $ht_date; ?>">
  <br>
  Differential: <?php echo $differential; ?>
  <input type="hidden" name="differential" value="<?php echo $differential; ?>">
  <br><br>
  <input type="button" value="Back" onClick="history.go(-1);return true;">
  <input type="submit" value="Confirm">
</form>
</body>
</html>
