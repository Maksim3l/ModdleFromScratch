<?php
$servername = "localhost";
$username = "Jesus";
$password = "Christ";
$con = new mysqli($servername, $username, $password, "origami");
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
