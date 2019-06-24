<?php
function nine_combine($id){
/*
$servername = "mysql13.000webhost.com";
$user = "a5034661_user";
$passwd = "s1mpl3";
$dbname = "a5034661_db";

$conn = new mysqli($servername, $user, $passwd, $dbname);

// Check connection
if ($conn->connect_errno > 0) {
    die("Connection failed: " . $conn->connect_error);
}
*/
$sql = "SELECT Score, ScoreDate, Differential, difid, 9or18, Slope, Rating,ID FROM differentials
    where 9or18=9
    and id=".$s_uid." ORDER BY ScoreDate ASC limit 2";

$result=$conn->query($sql);
if ($result->num_rows< 2){
    /* Oh no! The query failed. */
    //echo "Sorry, You don't have enough nine hole scores for a combination.";
} else {
    $comsco=0;
    while($row = $result->fetch_assoc()){
       $comsco=$row['Score']+$comsco;
       $comslo=$row['Slope']/2+$comslo;
       $comrat=$row['Rating']+$comrat;
       $comdif=number_format(($comsco-$comrat)*113/$comslo,1);
       $difid=$row['difid'];
       $ScoreDate=$row['ScoreDate'];
       $sqldel="DELETE from differentials where difid=".$difid;
       $result1=$conn->query($sqldel);
   }
}

$sql = "INSERT INTO differentials
	   (ID, Score, Slope, Rating, 9or18, Differential, ScoreDate)
	  VALUES
	   ('$s_uid','$comsco', '$comslo', '$comrat', 18, '$comdif', '$ScoreDate')";
$result=$conn->query($sql);

$conn->close();
}

?>
