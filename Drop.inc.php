<?php
	require_once 'Database_Con.inc.php';

if (isset($_POST["myFile"])){

	$File = $_POST["myFile"];
    $user=$_SESSION["accountun"];
    $date = date("Y-m-d");
    $conn->query("INSERT INTO files (File, Uploader, date)
        values('$File','$user', '$date')
        ");
}
