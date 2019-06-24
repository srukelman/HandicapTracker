<?php
include "lib/config.php";
include 'lib/email-send.php';
 include "lib/connfunc.php";

$conn=htconn();

$sql="SELECT ID, email, firstname  FROM Users";
if (!$result = $conn->query($sql)){
  echo("Input data is fail");
}
while($row = $result->fetch_assoc()) {
  $u_id=$row['ID'];
  $today =  date('Y-m-d');
  $hsql="SELECT Hindex FROM Handicap Where HindexDate='$today' and ID=$u_id";
  //troubleshooting $hsql
  echo $hsql."<BR>";

  if (!$hresult = $conn->query($hsql)){
    echo("Input data is fail");
  }
  //troubleshooting for hindex; count rows, echo hindex
  echo "rows: ".$hresult->num_rows."<BR>";
  $hrow = $hresult->fetch_assoc();
  //echo "Hindex: ". $hrow['Hindex']."<BR>";

  $twelvemo_date = date('Y-m-d', strtotime("-1 year")) ;
  //troubleshooting for 12 months ago
  echo $twelvemo_date."<BR>";
  $lsql="SELECT Hindex FROM Handicap Where ID=$u_id and HindexDate > ". $twelvemo_date ." ORDER By Hindex Asc";
  //troubleshooting for lsql
  //echo $lsql."<BR>";

  if (!$lresult = $conn->query($lsql)){
    echo("Input data is fail");
  }

  $lrow = $lresult->fetch_assoc();
  echo "Low Handicap: ".$lrow['Hindex']."<BR><BR>";
  sendhtMail($row['email'], $hrow['Hindex'], $row['firstname'], $lrow['Hindex']);
}

$conn->close();
?>
