<?php
//session mgmt & check
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
$ht_name=$_POST["name"];
$ht_id=$_POST["id"];
$ht_rating=$_POST["rating"];
$ht_slope=$_POST["slope"];
$ht_918=$_POST["918"];
$ht_date=$_POST["date"];
$differential=number_format(($ht_score-$ht_rating)*113/$ht_slope,1);

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
<form action="crse-insert.php" align="center" method="post">

  Name: <?php echo $ht_name; ?>
  <input type="hidden" name="name" value="<?php echo $ht_name; ?>">
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
  <br><br>
  <input type="button" value="Back" onClick="history.go(-1);return true;">
  <input type="submit" value="Confirm">
</form>
</body>
</html>
