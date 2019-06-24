<?php
//session mgmt & check
include "lib/config.php";

if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
} include "lib/connfunc.php";

$conn=htconn();

// Check connection
if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT CourseName, 9or18, Slope, Rating FROM favcourses WHERE id=".$s_uid." ORDER BY 9or18, CourseName Desc";

if (!$result = $conn->query($sql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}


if ($result->num_rows > 0) {
    Echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "<head>\n";
      echo"<title>Handicap Tracker-Favorite Courses</title>";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo "<link rel=\"stylesheet\" media=\"screen\" href=\"handicap.css\">";
    echo "</head>";
    echo "<body>";
    ?>
    <ul>
            <li><a href="entry.php">Enter Scores</a></li>
      <li><a  href="recent-diffs.php">Differentials</a></li>
      <li><a class="active" href="fav-course.php">Saved Courses</a></li>
      <!--<li><a href="contact.asp">Contact</a></li>-->
      <li><a href="save-course.php">Add Course</a></li>
        <li><a  href="logout.php">Logout</a></li>
    </ul>
<?php
    /* cellpadding='2' cellspacing='2' border='1'  */
    echo "<table><tr><th>Course Name</th><th>9 or 18</th><th>Slope</th><th>Rating</th><th>Delete</th></tr>\n";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['CourseName']."</td><td>".$row['9or18']."</td><td>".$row['Slope']."</td><td>".$row["Rating"]."</td>";
        echo "<td><form action=\"coursedeleteconf.php\" method=\"post\"><input type=\"image\" src=\"images/trashcan-512.png\" alt=\"Delete\" width=\"20\" height=\"20\"> </form></td></tr>\n";
    }
    echo "</table>\n";
    echo "<br><br>";
  //  echo "<a href=\"entry.php\">Enter more scores</a>";
    echo "</body>\n";
    echo "</html>\n";
} else {


    echo "You have not saved any favorite courses yet.<br>";
        echo "<a href=\"save-course.php\">Save Courses</a>";
}
$conn->close();

?>
