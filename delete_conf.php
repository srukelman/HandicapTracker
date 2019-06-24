<?php
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:https://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
$ht_difid=$_POST['difid'];
 include "lib/connfunc.php";

$conn=htconn();

if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Score, ScoreDate, Differential, 9or18, Slope, Rating FROM differentials WHERE difid=".$ht_difid ." and id=" .$s_uid;
//echo $sql;
if (!$result = $conn->query($sql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}else{
  $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel=\"stylesheet\" media=\"screen\" href=\"handicap.css\">
	<title>Handicap Tracker-Delete</title>
</head>
<body>
<p>
Please confirm you want to delete the following entry
</p>
<form action="delete.php" align="center" method="post">
<input type="hidden" name="difid" value="<?php echo $ht_difid; ?>">
  Score: <?php echo $row['Score']; ?>
  <input type="hidden" name="Score" value="<?php echo $row['Score']; ?>">
  <br>
  Rating: <?php echo $row['Rating']; ?>
  <input type="hidden" name="rating" value="<?php echo$row['Rating']; ?>">
  <br>
  Slope: <?php echo $row['Slope']; ?>
  <input type="hidden" name="slope" value="<?php echo $row['Slope']; ?>">
  <br>
  9 or 18: <?php echo $row['918']; ?>
  <input type="hidden" name="918" value="<?php echo $row['918']; ?>">
  <br>
  Date: <?php echo $row['ScoreDate']; ?>
  <input type="hidden" name="date" value="<?php echo $row['ScoreDate']; ?>">
  <br>
  Differential: <?php echo $row['Differential']; ?>
  <input type="hidden" name="differential" value="<?php echo $row['Differential']; ?>">
  <br><br>
  <input type="button" value="Back" onClick="history.go(-1);return true;">
  <input type="submit" value="Confirm">
</form>
</body>
</html>
<?php
$conn->close();
?>
