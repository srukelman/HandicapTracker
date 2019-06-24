<?php
include "lib/config.php";
$error=$_GET["error"];
if($error=="pswdnull"){
  $err_string="The password must be at least 1 characters long.";
}elseif ($error=="pswdmatch"){
  $err_string="The passwords do not match.";
}elseif ($error=="emailexist") {
  $err_string="This email is linked to an existing account.";
}elseif($error=="firstnull"){
  $err_string="You must enter your firstname";
}elseif($error=="lastnull"){
  $err_string="You must enter your lastname";
}elseif($error=="emailnull"){
  $err_string="You must enter your email";
}
?>
<!DOCTYPE html>
<head>
  <head>
    <title>Handicap Tracker-Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel=\"stylesheet\" media=\"screen\" href=\"handicap.css\">
  <style>
    .button {
      background-color: #3344ff;
      border: none;
      color: white;
      padding: 0.5vw 4.5vw;
      text-align: center;
      font-size: 1.5vw;
      cursor: pointer;
      border-radius: 1vw;
    }

    .button:hover {
      background-color: blue;
    }
    a:link, a:visited {
      color: #0000FF;
      text-decoration: underline;
      cursor: auto;
    }

    a:link:hover, a:visited:hover {
      color: #4CAF50;
    }
  </style>
</head>

<body align="center">
  <font color="red">

  <?php echo $err_string; ?>
</font>
 <form action = "register_log.php" align = "center" method = "post" style = "font-size: 1.5vw">
     Firstname: <br>
     <input type="text" name="firstname"placeholder = "First Name" style = "width: 15%; font-size: 1vw; height: 1.5vw;">
     <br>
     Lastname:<br>
     <input type="text" name="lastname" placeholder = "Last Name" style = "width: 15%; font-size: 1vw; height: 1.5vw">
     <br>
     E-Mail:<br>
     <input type="text" name="email" placeholder = "E-Mail" style = "width: 15%; font-size: 1vw; height: 1.5vw">
     <br>
     Password:<br>
     <input type="password" name="password" placeholder = "Password" style = "width: 15%; font-size: 1vw; height: 1.5vw">
     <br>
     Confirm Password:<br>
     <input type="password" name="password2" placeholder = "Confirm Password" style = "width: 15%; font-size: 1vw; height: 1.5vw">
     <br>
     <br>
     <input type="submit" value="Register" class = "button">
     <p style = "font-size: 1.25vw">Already have an account? Log in
       <a href = "login.php">here</a>.
     </p>
 </form>
</body>
