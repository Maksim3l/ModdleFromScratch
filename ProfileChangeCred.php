<?php
if(isset($_POST ["UpdateCred"])) {
	echo "Processing";
	$AccountId = $_SESSION["accountid"];
	$NewAccountName = $_POST["name"];
	$NewAccountSurname = $_POST["surname"];
	$NewAccountEmail = $_POST["email"];
	$NewAccountUsername =  $_POST["username"];

	require_once 'Database_Con.inc.php';

	require_once 'Functions.inc.php';

	if(emptyInputProfileEdit($AccountName, $AccountSurname, $AccountEmail, $AccountUsername) !== false){
		header("location:Profile_Edit.php?error=emptyinput");
		exit();
	}

	UpdateProfile($conn, $AccountName, $AccountSurname, $AccountEmail, $AccountUsername, $AccountId);





}
else{
	header("location:Profile.php");
	exit();
}