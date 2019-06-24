<?php
 include "lib/connfunc.php";
 include "lib/config.php";
$ht_id=$_POST["id"];
if (is_null($ht_id)) {
  //if ID is null prompt the user for ID
  echo "<!DOCTYPE html>\n";
  echo "<html>\n";
  echo "<head>\n";
    echo"<title>Handicap Tracker-Handicap Fetcher</title>";
echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">";
  echo "</head>\n";
  echo "<body>\n";
  echo "<form action =\"hndcp_ftchr.php\" method=\"post\">\n";
  echo "User ID: <input type=\"text\" name=\"id\">\n";
  echo "<input type=\"submit\" name=\"Submit\">\n";
  echo" </form>\n";
  echo "</body>\n";
  echo "</html>\n";
}  else {
  //else if ID is not null - see how many differentials for that ID

  $conn=htconn();
//the example of inserting data with variable from HTML form
mysql_connect($servername,$user,$passwd);//database connection
mysql_select_db($dbname);
/*  $username = "a5034661";
  $password = "s1mpl3";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
*/

  $result = mysql_query("SELECT COUNT(*) AS `count` FROM `differentials` where ID = '$ht_id'");
  $row = mysql_fetch_assoc($result);
  $count = $row['count'];
  echo "Number of Differentials: ". $count;
}
?>
