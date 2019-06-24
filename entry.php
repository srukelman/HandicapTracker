<?php
include "lib/connfunc.php";
include "lib/config.php";
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}

$conn=htconn();

if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}
$sql="SELECT CourseName, Rating, Slope, 9or18 FROM favcourses WHERE ID=".$s_uid;

if (!$result = $conn->query($sql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}
 ?>
<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="jquery-3.1.1.min.js"></script>
      <link rel="stylesheet" media="screen" href="handicap.css">
	     <title>Handicap Tracker-Enter Scores</title>
       <style>
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 0.5vw 4.5vw;
          text-align: center;
          font-size: 1.5vw;
          cursor: pointer;
          border-radius: 1vw;
        }
        .input {
          width: 15%;
          font-size: 1vw;
          height: 1.5vw
      }

      .button:hover {
        background-color: green;
      }
      p {
        font-size: 1.5vw;
      }
    </style>
</head>
<body>

  <ul>
      <li><a class="active" href="entry.php">Enter Scores</a></li>
    <li><a  href="recent-diffs.php">Differentials</a></li>
    <li><a  href="fav-course.php">Saved Courses</a></li>
    <!--<li><a href="contact.asp">Contact</a></li>-->
    <li><a href="save-course.php">Add Course</a></li>
            <li><a  href="logout.php">Logout</a></li>

  </ul>

<h1>Welcome to Handicap Tracker</h1>
<p>
Please enter your score,the rating and the slope.
</p>
<form action="hndcp_trckr.php" method="post" style = "font-size: 1.5vw" align = "center">
  Score:<br>
  <input type="text" name="Score" placeholder = "Score" class = "input">
  <br>
 <input type="radio" name="favman" value="fav"> Use a favorite course<br>
 Favorite Courses:<br>
 <?php
 echo "<select name='course'>";
 echo "<option value='" . $row['CourseName'] . "''> Course Name S/R </option>";
while($row = $result->fetch_assoc()) {
    echo "<option value='" . $row['CourseName'] . "'>" . $row['CourseName'] . " " . $row['Slope'] ."/" . $row['Rating'] . "</option>";
}
echo "</select>";
?>

<br>
 <input type="radio" name="favman" value="man" class = "input">Manually enter slope and rating<br>
  Rating:<br>
  <input type="text" name="rating" placeholder = "Rating" class = "input">
  <br>
  Slope:<br>
  <input type="text" name="slope" placeholder = "Slope" class = "input">
  <br>
  <input type="radio" name="918" value="9"> 9 holes<br>
  <input type="radio" name="918" value="18"> 18 holes<br>
  Date:<br>
  <input type="text" name="date" placeholder = "YYYY/MM/DD" class = "input">
  <br>
  <br>
  <input type="submit" value="Submit" class = "button">
</form>
</body>
</html>
