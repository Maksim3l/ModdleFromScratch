<?php
include_once'Header.inc.php';
?>

	<div class="neat">
		<h2>Log In</h2>
		
			<hr class="whole">
			

			<form action="Login.inc.php" method="post">

				<br> 

				<div class ="">

					
					<input type="text" id="nameEm" name="nameEm" autocomplete="on"  placeholder="Username/Email"> <br> 

					<br> 
					<input type="password" id="password" name="password" autocomplete="on"  placeholder="Password">
					<br>

				</div>
		
				<br> <hr class="whole">	
		
				or 
		
				<br>
		
				<a href="http://localhost/app/Register.php">Register</a> <br> <br> 

				<?php
				if (isset($_GET["error"])){
					if($_GET["error"] == "emptyinput"){
						echo "<p>Please fill in all of the fields.</p>";
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
					elseif ($_GET["error"]=="wrongPassword"){
						echo "<p>Please insert the right password.</p>";
					}
					elseif ($_GET["error"]=="wrongLogin"){
						echo "<p>Please insert the right username or email.</p>";
					}

				}

				?>

				<div class="">
					<button type="submit" id="submit" name="submitL">Login</button>
					<button id="return" onclick="location.href = 'http://localhost/app/Home.php';">Home</button>
				
				</div>

			</form>


			
		</div>

<?php
include_once'Footer.inc.php';
?>