<?php
include_once'Header.inc.php';
?>


	
		
		
		<div class="neat">
			<h2>Register</h2>

			<form action="Register.inc.php" method="post" class="reg">
			<hr class="whole"> <br>

			


			<div class ="">
				
			
				<input type="text" id="name" name="name" autocomplete="on"  placeholder="Name"> <br> <br> 

				<input type="text" id="surname" name="surname" autocomplete="on"  placeholder="Surname"> <br> <br> 

				<input type="text" id="username" name="username" autocomplete="on"  placeholder="Username"> <br> <br> 

				<input type="text" id="email" name="email" autocomplete="on"  placeholder="Email"> <br> <br> 

				<input type="password" id="password" name="password" autocomplete="on"  placeholder="Password"> <br>  <br> 

				<input type="password" id="repassword" name="repassword" autocomplete="on"  placeholder="Repeat password"> <br>  

				
			</div>

			<br>
				<hr class="whole">

			<?php
				if (isset($_GET["error"])){
					if($_GET["error"] == "emptyinput"){
						echo "<p>Please fill in the empty fields.</p>";
					}
					elseif ($_GET["error"] == "invalidaccountname"){
						echo "<p>This username is invalid.</p>";
					}
					elseif ($_GET["error"] == "invalidemail"){
						echo "<p>This email is invalid.</p>";
					}
					elseif ($_GET["error"] == "passworddontmatch"){
						echo "<p>The passwords do not match.</p>";
					}
					elseif ($_GET["error"]=="usernametaken"){
						echo "<p>This username is already taken.</p>";
					}
					elseif ($_GET["error"]=="stmtfailed"){
						echo "<p>Something went wrong, please try again.</p>";
					}
					elseif ($_GET["error"]=="none"){
						echo "<p>Account register successful.</p>";
					}

				}

				?>

			<div class="">
					<?php $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
					$url = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
					if ($url =="http://localhost/app/Register.php"){echo"<br>";}?>
					<button type="submit" id="submit" name="submitF">Finish</button> 
					<button id="login" onclick="location.href = 'http://localhost/app/Login.php';">Login</button>
					
				
			</div>

			</form>
			
		</div>

<?php
include_once'Footer.inc.php';
?>