<?php
function htconn(){
  $servername = "localhost";
  $user = "daxhund1_handi";
  $passwd = "h4nd1-Tr4ck";
  $dbname = "daxhund1_handicap";

  $conn = new mysqli($servername, $user, $passwd,$dbname);
  return $conn;
}
?>
