<<?php include "lib/config.php";?>
<!DOCTYPE html>
<html>
<head>
  <title>Handicap Tracker-Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 0.5vw 4.5vw;
      text-align: center;
      font-size: 1.5vw;
      cursor: pointer;
      border-radius: 1vw;
    }
    .input {
      width: 15%;
      font-size: 1vw;
      height: 1.5vw
    }

    .button:hover {
      background-color: green;
    }
    a:link, a:visited {
      color: #0000FF;
      text-decoration: underline;
      cursor: auto;
    }

    a:link:hover, a:visited:hover {
      color: #4CAF50;
    }
    p {
      font-size: 1.25vw;
    }
  </style>
</head>
<body align="center">
 <font color="red">

 <?php echo $err_string; ?>
</font>
 <form action="logn_vldtn.php"  method="post" style = "font-size: 1.5vw">
   E-Mail:<br>
   <input type="text" name="email" class = "input" placeholder = "E-Mail">
   <br>
   Password:<br>
   <input type="password" name="password" class = "input" placeholder = "Password">
   <br>
   <br>
   <input class = "button" type="submit" value="Login">
   <br>
   <br>
   <p>Don't have an account? Create one
   <a href="register.php">here</a>.<br>
   OR
   <br>
   <a href="getnewpass.php">Forgot Password?</a></p>
 </form>
</body>
</html>
