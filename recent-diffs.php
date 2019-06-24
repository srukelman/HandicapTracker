<?php
 include "lib/connfunc.php";
 include "lib/config.php";

//session mgmt & check
if (!isset($_COOKIE["uid"])) {
  header("Location:http://" . $URL . "/login.php");
}else {
  $s_uid = $_COOKIE['uid'];
  $s_email = $_COOKIE['email'];
}

/*$servername = "mysql13.000webhost.com";
$user = "a5034661_user";
$passwd = "s1mpl3";
$dbname = "a5034661_db";*/

$conn = htconn();

// Check connection
if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}
$tsql="SELECT Trend from trend where id=$s_uid";
if (!$tresult = $conn->query($tsql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}else{
  $trow=$tresult->fetch_assoc();
}

$sql = "SELECT Score, ScoreDate, difid, Differential, 9or18, Slope, Rating FROM differentials WHERE id=".$s_uid." ORDER BY ScoreDate Desc";

if (!$result = $conn->query($sql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}


if ($result->num_rows > 0) {
   Echo "<!DOCTYPE html>\n";
    echo "<html>\n";
    echo "<head>\n";
    echo"<title>Handicap Tracker-Recent Diffs</title>";
    echo "<link rel=\"stylesheet\" media=\"screen\" href=\"handicap.css\">";
    echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
    echo "</head>";
    echo "<body>";
    ?>
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3325490738538386",
        enable_page_level_ads: true
      });
  </script>
<ul>
  <li><a  href="entry.php">Enter Scores</a></li>
 <li><a class="active" href="recent-diffs.php">Differentials</a></li>
 <li><a  href="fav-course.php">Saved Courses</a></li>
 <li><a href="save-course.php">Add Course</a></li>
 <li><a  href="logout.php">Logout</a></li>
</ul>
<?php
$rsql="SELECT Hindex, HindexDate From Handicap where ID=$s_uid order by HindexDate Desc limit 1";
if (!$rresult = $conn->query($rsql)) {
    /* Oh no! The query failed. */
    echo "Sorry, the website is experiencing problems.";
}else {
  $rrow=$rresult->fetch_assoc();
}
    /* cellpadding='2' cellspacing='2' border='1'  */
    Echo "<p align=\"center\">Your current handicap trend is ". $trow['Trend'] . ".<br>";
    Echo" Your official Handicap Index as of ".$rrow['HindexDate']. " is " .$rrow['Hindex'].".";
    echo "<table align=\"center\"><tr><th>Date</th><th>9 or 18</th><th>Slope</th><th>Rating</th><th>Score</th><th>Differential</th><th>Delete</th></tr>\n";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['ScoreDate']."</td><td>".$row['9or18']."</td><td>".$row['Slope']."</td><td>".$row["Rating"]."</td><td>".$row['Score']."</td><td>".$row['Differential']."</td>";
        echo "<td><form action=\"delete_conf.php\" method=\"post\"><input type=\"image\" src=\"images/trashcan-512.png\" alt=\"Delete\" width=\"20\" height=\"20\" ><input type=\"hidden\" name=\"difid\" value=\"". $row['difid'] . "\"></form></td></tr>\n";
    }
    echo "</table>\n";
    echo"</p>\n";
    echo "<br><br>";
  //  echo "<a href=\"entry.php\">Enter more scores</a>";
  ?>
  <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
  <!-- handicaptracker-responsive -->
  <ins class="adsbygoogle"
       style="display:block"
       data-ad-client="ca-pub-5076322706022915"
       data-ad-slot="5456482382"
       data-ad-format="auto"></ins>
  <script align="center">
  (adsbygoogle = window.adsbygoogle || []).push({});
  </script>
  <?php
    echo "</body>\n";
    echo "</html>\n";
} else {


    echo "You have not posted any scores yet.<br>";
        echo "<a href=\"entry.php\">Enter scores</a>";
}
$conn->close();

?>
