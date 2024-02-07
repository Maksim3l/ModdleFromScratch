<!DOCTYPE html>
<head>
<link REL="Icon" href="icon.ico"> 
<meta name= "viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">

<link rel="stylesheet" href="css.css">
<link rel="stylesheet" href="css2.css">
</head>
<style>


</style>
<body>
<?php
include "Functions.inc.php";
?>

<?php
include "forumpath.php";
?>

<div class="Class-Socials">
	<div class="chatf">
		<div class ="white">
		<?php
		include "talking.php";
		?>
		</div>

		<div class="neat">
		<form action="" method="post"> <br> <input type="text" id="chat" name="chat" placeholder="Aa"/> <button type="submit" id="btn" name="submit" value="submit" default>Send</button>
		</div>
	</div>
	<div class="classmates">
		Your classmates
		<hr>
		<p>Blob</p>
	</div>
</div>
</body>
</html>