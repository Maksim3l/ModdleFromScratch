<!DOCTYPE html>
<head>
<?php
session_start();
if (!isset($_SESSION)) {
    header("Location: home.php");
    die();
}
?>
<link REL="Icon" href="icon.ico"> 
<title> Origami </title>
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="css2.css">
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
<div class ="left">
<center><h2>While chatting be sure to:</h2></center>

1. Be kind </br></br>
2. Respect other humans </br></br>
3. Include everyone </br></br>
4. Listen to the moderation team </br></br>
5. No bullying, sexism, racism, homophobia or other hate-based chat </br></br>
6. No ethnic, sexual, religious, disability, agist or transphobic slurs </br></br>
7. Don’t spam words or use all-caps </br></br>
8. No spoilers to a game, TV show or film </br></br>
9. Don’t argue with people over chat</br></br>
10. No advertising or self-promotion </br></br>

</div>
<div class ="right">
<a href ="Chat1.php" class="panel">
<h1>
    Fun chat
</h1>
</a></br></br></br></br></br></br></br></br></br>
<a href ="Chat2.php" class="panel">
<h1>
    Serious Discussion
</h1>
</a></br></br></br></br></br></br></br></br></br>
<a href ="Chat3.php" class="panel">
<h1>
    Talk About Origami
</h1>
</a></br></br></br></br></br></br></br></br></br></br></br>
<a href ="Chat4.php" class="panel">
<h1>
    Origami Festivals
</h1>
</a>
</div>
<div class ="leg">
"leg"
</div>
</div>
</body>
</html>