<!DOCTYPE html>

<head>
<?php
session_start();
if (!isset($_SESSION)) {
    header("Location: home.php");
    die();
}
?>
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
<?php include "password.php"; ?>
</head>
<style>


</style>
<body>
<div class ="container">
<div class ="header">

<button class="button" onclick="window.location.href='Home2.php'">
 Home
</button>
<button class="button" onclick="window.location.href='Forum2.php'">
 Forum
</button>
<button class="button" onclick="window.location.href='Contact2.php'">
 Contact
</button>
<button class="button" onclick="window.location.href='Login2.php'">
 Account
</button>
</div>
<div class="left">
</br></br></br></br>
</br></br></br></br>
    <?php
    $user = $_SESSION["Username"];
    echo "<center><h1>Hello $user, this is where you change your password!</h1></center>";
    ?>
</div>
<div class="right">
</br></br></br></br>
</br></br></br></br>
    <center>
<form action="" method="post">
Current Password: <br> <input type="password" id="CurrPass" name="CurrPass" placeholder="Current Password"/><br>
Password: <br> <input type="password" id="Pass" name="Pass" placeholder="New Password"/><br>
RepeatPassword: <br> <input type="password" id="RepPass" name="RepPass" placeholder="Repeat New Password"/><br>
<button type="submit" id="btn" name="login" value="Login" default>login</button>
</form>
<center>
</div>
<div class ="leg">
"leg"
</div>
</div>
</body>
</html>
