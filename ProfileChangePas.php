<?php
if(isset($_POST ["UpdatePas"])) {
	echo "Processing";
	$AccountPwd = $_POST["password"];
	$NewAccountPwd = $_POST["newpassword"];
	$NewAccountPwdRe = $_POST["newrepassword"];


	require_once 'Database_Con.inc.php';

	require_once 'Functions.inc.php';

	if(emptyInputPwdChange($AccountPwd, $NewAccountPwd, $NewAccountPwdRe) !== false){
		header("location:Profile_Edit.php?error=emptypwdinput");
		exit();
	}

	if(PwdCheck($NewAccountPwd, $NewAccountPwdRe) !== false){
		header("location:Profile_Edit.php?error=passworddontmatch");
		exit();
	}

	UpdatePassword($conn, $AccountPwd, $NewAccountPwd, $NewAccountPwdRe);
}
else{
	header("location:Profile.php");
	exit();
}