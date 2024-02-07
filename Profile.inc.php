<?php
	require_once 'Database_Con.inc.php';

	require_once 'Functions.inc.php';

	GetInfo($conn,$_SESSION["accountid"]);