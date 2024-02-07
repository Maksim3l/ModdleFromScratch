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
include "Connection.php";

if (
    array_key_exists("First_Name", $_POST) &&
    array_key_exists("Last_Name", $_POST) &&
    array_key_exists("Username", $_POST) &&
    array_key_exists("Email", $_POST) &&
    array_key_exists("Password", $_POST) &&
    array_key_exists("Password2", $_POST)
) {
    if ($_POST["Password"] == $_POST["Password2"]) {
        $firstname = $_POST["First_Name"];
        $lastname = $_POST["Last_Name"];
        $username = $_POST["Username"];
        $email = $_POST["Email"];
        $password = $_POST["Password"];
        $date = date("Y-m-d H:i:s");
        if (
            $con->query("select username from login where username='$username'")
                ->num_rows > 0
        ) {
            echo "<center><h1> <br> Username $username already Taken. <br> </h1><center>";
        } elseif (
            $con->query("select email from login where email='$email'")
                ->num_rows > 0
        ) {
            echo "<center> <h1> <br> Email $email already Taken. <br> </h1> </center>";
        } else {
            $query =
                "INSERT INTO login(First_Name,Last_Name,Username, Email, Password, Date)
        values('$firstname','$lastname','$username','$email','" .
                password_hash($password, PASSWORD_DEFAULT) .
                "','$date')";
            if ($con->query($query)) {
                echo "<center><h1>Sign Up successful</h1></center>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
        }
        $con->close();
    } else {
        echo "<center><h1>Passwords not the same</h1></center>";
    }
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
  text-align: center;" onclick="window.location.href='Login.php'"> Go Back </button>
 </center>

</div>

</div>
</body>
</html>
