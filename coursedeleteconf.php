<?php
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
 include "lib/connfunc.php";
$ht_name=$_POST['CourseName'];

$conn=htconn();

if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CourseName, 9or18, Slope, Rating FROM favcourses WHERE CourseName='".$ht_name ."' and id=" .$s_uid;
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
  <link rel=\"stylesheet\" media=\"screen\" href=\"handicap.css\">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Handicap Tracker-Delete Course</title>
</head>
<body>
<p>
Please confirm you want to delete the following entry
</p>
<form action="coursedelete.php" align="center" method="post">
  Course Name: <?php echo $row['CourseName']; ?>
  <input type="hidden" name="name" value="<?php echo $row['CourseName']; ?>">
  <br>
  Rating: <?php echo $row['Rating']; ?>
  <input type="hidden" name="rating" value="<?php echo$row['Rating']; ?>">
  <br>
  Slope: <?php echo $row['Slope']; ?>
  <input type="hidden" name="slope" value="<?php echo $row['Slope']; ?>">
  <br>
  9 or 18: <?php echo $row['9or18']; ?>
  <input type="hidden" name="9or18" value="<?php echo $row['9or18']; ?>">
  <br>
  <br><br>
  <input type="button" value="Back" onClick="history.go(-1);return true;">
  <input type="submit" value="Confirm">
</form>
</body>
</html>
<?php
$conn->close();
?>
