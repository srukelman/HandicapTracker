<?php
include 'lib/handicap-calc.php';
include "lib/config.php";
 //include_once "lib/connfunc.php";

$conn=htconn();

$sql="SELECT ID FROM Users";
if (!$result = $conn->query($sql)){
  echo("Input data is fail");
}
while($row = $result->fetch_assoc()) {
  $hindex=handicap_calc($row['ID']);
  //toubleshooting
  //echo "Index: ".$hindex;
  $u_id=$row['ID'];
  $insql= "INSERT INTO Handicap
  (ID, Hindex, HindexDate)
  VALUES
  ($u_id, $hindex, now())";

  if (!$insresult = $conn->query($insql)){
    echo("Input data is fail");
  }
}
$conn->close();
?>
