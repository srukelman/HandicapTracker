<?php
//session mgmt & check
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="handicap.css">
	<title>Handicap Tracker-Save Course</title>
</head>
<body>

  <ul>
    <li><a href="entry.php">Enter Scores</a></li>
    <li><a  href="recent-diffs.php">Differentials</a></li>
    <li><a  href="fav-course.php">Saved Courses</a></li>
    <!--<li><a href="contact.asp">Contact</a></li>-->
    <li><a class="active" href="save-course.php">Add Course</a></li>
        <li><a  href="logout.php">Logout</a></li>

  </ul>

<h1>Welcome to Handicap Tracker</h1>
<p>
Please enter the name, rating and the slope, and whether the course is 9 or 18 holes.
</p>
<form action="crse-trckr.php" method="post">
  Course  Name:<br>
  <input type="text" name="name">
  <br>
  Rating:<br>
  <input type="text" name="rating">
  <br>
  Slope:<br>
  <input type="text" name="slope" >
  <br>
   <input type="radio" name="918" value="9"> 9 holes<br>
  <input type="radio" name="918" value="18"> 18 holes<br>
  <input type="submit" value="Submit">
</form>
</body>
</html>
