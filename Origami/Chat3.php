<!DOCTYPE html>
<head>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="css2.css">
</head>
<?php
session_start();
if (!isset($_SESSION)) {
    header("Location: login.php");
    die();
}
?>
<style>


</style>
<body>
<?php include "functions.php"; ?>
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
<div class ="left">
<center>
</br>
</br>
<h2>Talk to people, have some fun!!!</h2>
</br>
</br>
<?php include "Comment/forumpath3.php"; ?>
<form action="" method="post">
Comment <br> <input type="text" id="comment" name="comment" placeholder="Comment"/><br>
<button type="submit" id="btn" name="submit" value="submit" default>Submit Comment</button>
</center>
</div>
<div class ="right">
<div class ="white">
<?php include "Comment/talking3.php"; ?>
</div>  
</div>
<div class ="leg">
"FEEEEEEET"
</div>
</div>
</body>
</html>