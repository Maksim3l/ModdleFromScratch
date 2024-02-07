<!DOCTYPE html>

<head>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" href="css.css">
</head>
<style>
</style>
<body>
<div class ="container">
    <div class="header">
<?php
session_start();

include "connection.php";
include "functions.php";
if (isset($_POST["login"]));
$user = $_POST["username"];
$pass = $_POST["password"];
$pass2 = sqli_takefirst(
    $con->query("SELECT Password from login where Username ='$user'")
);
if (password_verify($pass, $pass2)) {
    $_SESSION["valid"] = true;
    $_SESSION["timeout"] = time();
    $_SESSION["Username"] = $user;
} else {
    echo "<center><h1>WRONG USERNAME OR PASSWORD</h1></center>";
}
?>
</br>
</br>
</br>
</br>
</br>
<center> <button type="button" style="display: block;
  width: 50%;
  height: 25%;
  border: none;
  background-color: #04AA6D;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;" onclick="window.location.href='Home2.php'"> Continue </button>
 </center>

</div>

</div>
</body>
</html>