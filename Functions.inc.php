<?php


function emptyInputSignup($AccountName, $AccountSurname, $AccountEmail, $AccountUsername, $AccountPwd, $AccountPwdRe){
	$results;

	if(empty($AccountName) || empty($AccountEmail) || empty($AccountUsername) || empty($AccountPwd) || empty($AccountPwdRe)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function InvalidAcName($AccountUsername){
	$results;

	if(!preg_match("/^[a-zA-Z0-9]*$/", $AccountUsername)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function InvalidEmail($AccountEmail){
	$results;

	if(!filter_var($AccountEmail, FILTER_VALIDATE_EMAIL)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}


	function PwdCheck($AccountPwd, $AccountPwdRe){


	if($AccountPwd !== $AccountPwdRe){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function AccountTaken($conn, $AccountUsername, $AccountEmail){
	$sql = "SELECT * FROM accounts WHERE AccountUsername = ? OR AccountEmail = ?;";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Register.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt,"ss", $AccountUsername, $AccountEmail);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	if($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
	else{
		$results = false;
		return $results;
	}
	mysqli_stmt_close($stmt);
}

function CreateUser($conn, $AccountName, $AccountSurname, $AccountEmail, $AccountUsername, $AccountPwd){
	$sql = "INSERT INTO accounts (AccountName,AccountSurname, AccountEmail, AccountUsername, AccountPwd) VALUES (?,?,?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Register.php?error=stmtfailed");
		exit();
	}

	$hashedPwd = password_hash($AccountPwd, PASSWORD_DEFAULT);


	mysqli_stmt_bind_param($stmt,"sssss", $AccountName, $AccountSurname, $AccountEmail, $AccountUsername, $hashedPwd);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("location:Register.php?error=none");
	exit();

}

function emptyInputLogin($AccountUsername, $AccountPwd){
	$results;

	if(empty($AccountUsername) || empty($AccountPwd)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function LoginAccount($conn, $AccountUsername, $AccountPwd){
	$uidExists = AccountTaken($conn, $AccountUsername, $AccountUsername);

	if ($uidExists === false){
	header("location:Login.php?error=wrongLogin");
	exit();
	}

	$hashedPwd = $uidExists["AccountPwd"];
	$PwdCheck = password_verify($AccountPwd, $hashedPwd);

	if ($PwdCheck === false){
	header("location:Login.php?error=wrongPassword");
	exit();
	}
	elseif ($PwdCheck === true) {
	session_start();
	$_SESSION["accountid"] = $uidExists["AccountId"];
	$_SESSION["accountun"] = $uidExists["AccountUsername"];
	$_SESSION["accountperms"] = $uidExists["AccountPerms"];

	header("location:Home.php");
	exit();
	}
}

function GetInfo($conn, $AccountId){
	$sql = "SELECT AccountName,AccountSurname,AccountClass,AccountEmail,AccountPwd,AccountPerms FROM accounts WHERE AccountId = ?;";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Profile.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt,"i", $AccountId);
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);


	if($row = mysqli_fetch_assoc($resultData)){
        $_SESSION["accountn"] = $row["AccountName"];
        $_SESSION["accounts"] = $row["AccountSurname"];
		$_SESSION["accounte"] = $row["AccountEmail"];
		$_SESSION["accountcla"] = $row["AccountClass"];
		$_SESSION["accountperms"] = $row["AccountPerms"];
		return $row;

	}
	else{
		$results = false;
		return $results;
	}

	mysqli_stmt_close($stmt);
}

function emptyInputUpload($ModelName, $ModelFile){
	$results;

	if(empty($ModelName) || empty($_FILES($ModelFile))){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function UploadModel($conn, $ModelName, $ModelFile, $ModelText, $ModelPic, $ModelDatePosted, $CreatorId, $MTags){

	$sql = "INSERT INTO models (ModelName, ModelPic, ModelFile, ModelDatePosted, ModelText, CreatorId) VALUES (?,?,?,?,?,?);";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Upload.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt,"sssssi", $ModelName, $ModelPic, $ModelFile, $ModelDatePosted, $ModelText, $CreatorId);
	
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	$tags = explode(' ', $MTags);

	foreach ($tags as $tag) {
		InsertTag($conn, $tag, $ModelName);
	}
	

	header("location:Upload.php?error=none");
	exit();

}

function GetModelId($conn, $ModelName){

	$sql = "SELECT ModelId, ModelName FROM models WHERE ModelName =' ". $ModelName ."';";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Upload.php?error=stmtfailed");
		exit();
	}
	
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	while ($row = mysqli_fetch_assoc($resultData)){
		return $row;
	}
}



function MoveFile($conn,$MFileNameTmp,$MFileBaseName, $targetDir, $MPicName){

		$targetFilePath = $targetDir . $MPicName;

		move_uploaded_file($MFileNameTmp, $targetFilePath);
	            	
	   return $targetFilePath;

}


function UploadNews($conn, $AuthorId, $NewsTitle, $NewsCaption, $NewsText, $NewsDate){

	$sql = "INSERT INTO news (AuthorId, NewsTitle, NewsCaption, NewsText, NewDate) VALUES (?,?,?,?,?);";

	$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Upload.php?error=stmtfailed");
		exit();
	}

	mysqli_stmt_bind_param($stmt,"issss", $AuthorId, $NewsTitle, $NewsCaption, $NewsText, $NewsDate);
	
	mysqli_stmt_execute($stmt);
	$resultData = mysqli_stmt_get_result($stmt);

	$tags = explode(' ', $MTags);
	

	header("location:Upload.php?error=none");
	exit();

}

function DisplayNews($conn){


$sql = "SELECT AccountId, AccountUsername, AuthorId, NewsTitle, NewsCaption, NewsText, NewDate FROM accounts,news WHERE AccountId = AuthorId ORDER BY NewDate DESC";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function



echo "<div class = 'news'>";
echo "<br>";
while ($row = mysqli_fetch_assoc($result)) { 

	$previewtext = substr($row['NewsText'],0,500).'...';	
   
    echo "<div class = 'newsletter'>";
    	echo "<div class='row'>";
    		echo "<div class = 'newstitle'>";
        		echo $row['NewsTitle'];
        	echo "</div>";	

        	echo "<div class = 'newsdate'>";
        		echo "Date posted: ".$row['NewDate'];
        	echo "</div>";	
        echo "</div>";	

        echo"<hr class='newshl'>";

		echo "<div class='row'>";
        	echo "<div class = 'newscaption'>";
        		echo $row['NewsCaption'];
       		echo "</div>";	

        	echo "<div class = 'newsauthor'>";
        		echo "Written by: ".$row['AccountUsername'];
        	echo "</div>";	
        echo "</div>";

        echo"<div class = 'previewnews'>";
        	echo $previewtext;
        echo"</div>";	

    echo "</div>";
    
 echo "<br>";
}
echo "</div>";

}

function DisplayModels($conn){


$sql = "SELECT AccountId, AccountUsername, CreatorId, ModelName, ModelPic, ModelFile, ModelDatePosted, ModelText, Downloads FROM accounts, models WHERE AccountId = CreatorId ORDER BY ModelDatePosted DESC";
$result = mysqli_query($conn, $sql); // First parameter is just return of "mysqli_connect()" function



echo "<div class = 'models'>";

while ($row = mysqli_fetch_assoc($result)) { 

	$previewtext =strlen($row['ModelText']) > 50 ? substr($row['ModelText'],0,150)."..." : $row['ModelText'];
   
    echo "<div class = 'modelcontainer'>";

    	echo "<div class='bubble modeltexties'>";
    		echo "<div class = 'modelname'>";
        		echo $row['ModelName'];
        	echo "</div>";	

        	echo"<hr class='mol'>";

        	echo "<div class = ''>";
        		echo "Made by: ".$row['AccountUsername'];
        	echo "</div>";	

        	echo "<div class = 'modeldate'>";
        		echo "Date posted: ".$row['ModelDatePosted'];
        	echo "</div>";	

        	echo "<div class = 'modeltext'>";	
        		echo $previewtext;
        		if (strlen($previewtext) < 75){
        			echo"<br><br>";
        		}
        	echo "</div>";	

        	echo"<hr class='mol'>";

        	echo "<div class = 'download'>";
        		//echo "Number of downloads: ".$row['Downloads']."<br>";
        		echo "<a download href='http://localhost/3drus/".$row['ModelFile']."'> Download model </a>";
        	echo "</div>";

        	echo"<hr class='mol'>";

        echo "</div>";	

        

		echo "<div class='modelpic'>";
        	echo "<div class = ''>";
        		echo "<img class='box' src='http://localhost/3drus/".$row['ModelPic']."'>";
       		echo "</div>";	

    
        echo "</div>";

  

    echo "</div>";
    
 echo "<br>";
}
echo "</div>";

}

function emptyInputProfileEdit($AccountName, $AccountSurname, $AccountEmail, $AccountUsername){
	$results;

	if(empty($AccountName) || empty($AccountSurname) || empty($AccountEmail) || empty($AccountUsername)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function emptyInputPwdChange($AccountPwd, $NewAccountPwd, $NewAccountPwdRe){
	$results;

	if(empty($AccountPwd) || empty($NewAccountPwd)|| empty($NewAccountPwdRe)){
		$results = true;
	}
	else{
		$results = false;
	}
	return $results;
}

function UpdatePassword($conn, $AccountPwd, $NewAccountPwd, $NewAccountPwdRe){

	session_start();
	$uidExists = AccountTaken($conn, $_SESSION['accountun'], $_SESSION['accountun']);

	$AccountId = $uidExists['AccountId'];

	if ($uidExists === false){
	header("location:Profile_Edit.php?error=wrongLogin");
	exit();
	}

	$hashedPwd = $uidExists["AccountPwd"];
	$PwdCheck = password_verify($AccountPwd, $hashedPwd);

	if ($PwdCheck === false){
	header("location:Profile_Edit.php?error=wrongPassword");
	exit();
	}
	elseif ($PwdCheck === true) {
		$newPwdHashed = password_hash($NewAccountPwd, PASSWORD_DEFAULT);
		$sql = "UPDATE accounts SET AccountPwd = '?' WHERE AccountId = '?';";
		$result = mysqli_query($conn, $sql);

		$stmt = mysqli_stmt_init($conn);
	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Register.php?error=stmtfailed");
		exit();
		}

		mysqli_stmt_bind_param($stmt,"si", $newPwdHashed, $AccountId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location:Profile.php?error=none");
		exit();
	}
}

function DisplayUsers($conn){


$sql = "SELECT AccountId, AccountName, AccountSurname, AccountClass, AccountEmail, AccountUsername, AccountPerms FROM accounts ORDER BY AccountId ASC";
$result = mysqli_query($conn, $sql); 



echo "<div class = 'neat'>";
echo "<table>";

    	echo "<tr class='onerow'>";
    		echo "<th>";
        		echo "Id";
        	echo "</th>";	

    		echo "<th>";
        		echo 'Name Surname';
        	echo "</th>";	

        	echo "<th>";
        		echo "Username";
        	echo "</th>";	

        	echo "<th>";
        		echo 'Account Email';
        	echo "</th>";	

        	echo "<th>";
        		echo 'Account Class';
        	echo "</th>";	

        	echo "<th>";
        		echo 'Account Perms';
        	echo "</th>";	

        	echo "<th>";
        		echo '';
        	echo "</th>";

        echo "</tr>";	



while ($row = mysqli_fetch_assoc($result)) { 

    	echo "<tr class='onerow'>";
    		echo "<td>";
        		echo $row['AccountId'];
        	echo "</td>";	

    		echo "<td>";
        		echo $row['AccountName']." ".$row['AccountSurname'];
        	echo "</td>";	

        	echo "<td>";
        		echo $row['AccountUsername'];
        	echo "</td>";	

        	echo "<td>";
        		echo $row['AccountEmail'];
        	echo "</td>";	

        	echo "<td>";
        		echo $row['AccountClass'];
        	echo "</td>";

        	echo "<td>";
        		echo $row['AccountPerms'];
        	echo "</td>";

        	echo "<td><button formaction='AdminEdit.inc.php' formmethod='post' type='submit' id='".$row['AccountId']."'>";
        		echo 'edit';
        	echo "</button></td>";		

        echo "</tr>";	

    
}
echo "</table>";
echo "</div>";

}

function DisplayStudents($conn){


$sql = "SELECT AccountId, AccountName, AccountSurname, AccountClass, AccountEmail, AccountUsername, AccountPerms FROM accounts WHERE AccountPerms = 'Student' ORDER BY AccountId ASC";
$result = mysqli_query($conn, $sql); 



echo "<div class = 'neat'>";
echo "<table>";

    	echo "<tr class='onerow'>";
    		echo "<th>";
        		echo "Id";
        	echo "</th>";	

    		echo "<th>";
        		echo 'Name Surname';
        	echo "</th>";	

        	echo "<th>";
        		echo "Username";
        	echo "</th>";	

        	echo "<th>";
        		echo 'Account Email';
        	echo "</th>";	

        	echo "<th>";
        		echo 'Account Class';
        	echo "</th>";	

        	echo "<th>";
        		echo '';
        	echo "</th>";

        echo "</tr>";	



while ($row = mysqli_fetch_assoc($result)) { 

    	echo "<tr class='onerow'>";
    		echo "<td>";
        		echo $row['AccountId'];
        	echo "</td>";	

    		echo "<td>";
        		echo $row['AccountName']." ".$row['AccountSurname'];
        	echo "</td>";	

        	echo "<td>";
        		echo $row['AccountUsername'];
        	echo "</td>";	

        	echo "<td>";
        		echo $row['AccountEmail'];
        	echo "</td>";	

        	echo "<td>";
        		echo "<select>";
        		ShowOptions($conn);
        	echo "</select></td>";	

	

        echo "</tr>";	
  
}
echo "</table>";
echo "</div>";

}

function UpdateProfile($conn, $AccountName, $AccountSurname, $AccountEmail, $AccountUsername, $AccountId){


	$sql = "UPDATE accounts SET AccountName = ?, AccountSurname = ?, AccountEmail = ?, AccountUsername = ? WHERE AccountId = ?";

		$result = mysqli_query($conn, $sql);

		$stmt = mysqli_stmt_init($conn);

	if(!mysqli_stmt_prepare($stmt,$sql)){
		header("location:Profile.php?error=stmtfailed");
		exit();
    }

		mysqli_stmt_bind_param($stmt,"ssssi", $AccountName, $AccountSurname, $AccountUsername, $AccountEmail, $AccountId);
		mysqli_stmt_execute($stmt);
		mysqli_stmt_close($stmt);
		header("location:Profile.php?error=none");
		exit();
}

function get_session_user(){
    $username=$_SESSION["accountun"];
    $result=$conn->query("select * from login where username='$accountun'");
    return $result->fetch_assoc();

}

function sqli_takefirst($sqli){
    while ($row = $sqli->fetch_assoc()) {
        foreach($row as $first){
            return $first;
        }
      }
}

function ShowOptions($conn){
	$sql = "SELECT DISTINCT AccountClass FROM accounts ORDER BY AccountClass ASC";
$result = mysqli_query($conn, $sql); 

while ($row = mysqli_fetch_assoc($result)) { 
	if($row['AccountClass'] != null){
		echo "<option value='".$row['AccountClass']."'>".$row['AccountClass']."</option>";
	}

}

}






