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
<div class ="header">

<button class="button" onclick="window.location.href='Home.php'">
 Home
</button>
<button class="button" onclick="window.location.href='Forum.php'">
 Forum
</button>
<button class="button" onclick="window.location.href='Contact.php'">
 Contact
</button>
<button class="button" onclick="window.location.href='Login.php'">
 Login
</button>
</div>
<div class ="left">
<form action="login check.php" method="post">
Username: <br> <input type="text" id="username" name="username" placeholder="username"/><br>
Password: <br> <input type="password" id="password" name="password" placeholder="password"/><br>
<input type="Submit" value="Login">
</form>
</div>
<div class ="right">
<form action="register.php" method="post">
First Name: <br> <input type="text" name="First_Name" class="login-input"><br>
Last Name: <br> <input type="text" name="Last_Name" class="login-input"><br>
Email: <br> <input type="text" name="Email" class="login-input"><br>
Username: <br> <input type="text" name="Username" class="login-input"><br>
Password <br> <input type="password" name="Password" class="login-input" id ="password" onchange="checkok()"><br>
Repeat Password <br> <input type = "password" name="Password2" class="login-input" id ="password1" onchange="checkok()"><br>
<input type="Submit" value="Register"> 
</div>
<div class ="leg">
"leg"
</div>
</div>
</body>
</html>