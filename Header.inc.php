

<?php
	session_start();
?>


<!DOCTYPE html>
<html>
 <head>
		<link rel="stylesheet" href="school.css">
		<link REL="SHORTCUT ICON" HREF="logo.ico">
		<title>Schoodl</title>
	</head>
<body>


<div class="nav">
<div class="left ">
  <div class="l"><a class='navi' href="Home.php">Home</a></div>
<?php
  if(isset($_SESSION["accountid"])){
	echo"<div class='l'><a class='navi' href='Subjects.php'>Subjects</a></div> ";
	echo"<div class='l'><a class='navi' href='Drop.php'>Assigments</a></div>";
	}
?>				
</div>

<div class="right">
<?php
  if(isset($_SESSION["accountid"])){
  echo"<div class='r'><a class='navi' href='Logout.php'>Logout</a></div> ";
	echo"<div class='r'><a class='navi' href='Profile.php'>Profile</a></div>";

	}
				
	else {
	echo"<div class='r'><a class='navi'  href='Login.php'>Login</a></div>";
	}


	if (isset($_SESSION['accountperms'])){
		if($_SESSION["accountperms"] == "Admin" || $_SESSION["accountperms"] == "Monarch"){
  	echo"<div class='r'><a class='navi' href='Manage.php'>Manage</a></div>";

  }

  if($_SESSION["accountperms"] == "Teacher" || $_SESSION["accountperms"] == "Monarch"){
  	echo"<div class='r'><a class='navi' href='Classes.php'>Classes</a></div>";

  }
	}
	

?>
</div>
</div>

<div class="neat">
	





	
















