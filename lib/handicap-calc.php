<?php
require_once "connfunc.php";

function handicap_calc($id){

 $hconn=htconn();

  $sql="SELECT Differential, ScoreDate from differentials where id=$id Order by ScoreDate DESC LIMIT 20";
  //echo $sql;
  if (!$result = $hconn->query($sql)) {
      /* Oh no! The query failed. */
      echo "Sorry, the website is experiencing problems.";
  }
  $row_cnt = $result->num_rows;
  //echo "Num Entries: ".$row_cnt."<BR>";

  $n = $row_cnt-1;
  //echo "n-1: ".$n."<BR>";

  $result->data_seek($n);
  $row = $result->fetch_assoc();
  $maxDate = $row['ScoreDate'];
  //troubleshooting
  //echo "MaxDate: ".$maxDate."<BR>";

  if($row_cnt==20){
    $i=10;
  }elseif($row_cnt>18){
    $i=9;
  }elseif($row_cnt>17){
    $i=8;
  }elseif($row_cnt>16){
    $i=7;
  }elseif($row_cnt>14){
    $i=6;
  }elseif($row_cnt>12){
    $i=5;
  }elseif($row_cnt>10){
    $i=4;
  }elseif($row_cnt>8){
    $i=3;
  }elseif($row_cnt>6){
    $i=2;
  }elseif($row_cnt>4){
    $i=1;
  }else{
    return "n/a";
  }
  //echo "i: ".$i."<BR>";

  $sql="SELECT Differential from differentials where id=$id and ScoreDate > ".$maxDate." Order by Differential ASC limit ".$i;
  //echo "error sql: ".$sql;
  if (!$result = $hconn->query($sql)) {
      /* Oh no! The query failed. */
      echo "Sorry, the website is experiencing problems.34567890";
  }

  $diftotal=0;
  while($row = $result->fetch_assoc()) {
    $diftotal=$diftotal+$row['Differential'];
    //troubleshooting
    //echo "total: ".$diftotal."; Curr Diff: ".$row['Differential']."<BR>";
  }
  //troubleshooting
  $nt_hand=0.96*($diftotal/$i);
  //echo $nt_hand;
  $handif=number_format((floor((0.96*($diftotal/$i))*10)/10), 1);
  $hconn->close();
  return $handif;
}
// functional call example
//echo "H. I.: ".handicap_calc(7);

?>
