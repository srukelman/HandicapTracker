<?php
include 'lib/passwordsend.php';
include 'lib/connfunc.php';
include "lib/config.php";

$ht_user=strtolower($_POST["email"]);

$conn = htconn();

// Check connection
if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}
$tsql="SELECT email, Firstname from Users where email='".$ht_user."'";

 //tsql troubleshooting
//echo $tsql."<br><br>";

if (!$result = $conn->query($tsql)) {
    //Oh no! The query failed.
    echo "Sorry, the website is experiencing problems.";
}
  elseif ($result->num_rows < 1) {
    echo "The email you created is not associated with a Handicap Tracker account<BR>";
    echo "Please try a different email or use the sign-up page to create a new account<BR>";
} else {
    //troubleshooting for row_cnt
    //echo "passed";
     $row = $result->fetch_assoc();
    $q_name = $row["Firstname"];
    $q_email = $row["email"];

    //troubleshooting for name, email
  //  echo "email: ".$q_email." Name: ".$q_name;
  //  echo "<BR>----Begin sendPasslink troubleshooting----<BR>";
    sendPasslink($q_email, $q_name);
  //  echo "<BR>----End sendPasslink troubleshooting----<BR>";
    echo "A link to reset your password has been emailed to you.";
}

$conn->close();
?>
