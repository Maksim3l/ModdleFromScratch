
<?php
include_once'Header.inc.php';

include_once'Profile.inc.php';

if(isset($_SESSION["accountid"]) != true){
 header("location:Login.php");
}
?>


<div>


	<div class="neat">
		<h2>Edit profile</h2>
		
		
		<br>
		<table class ="Profile">
		<tr class ="">
			
			<td class ="">
				<form action="ProfileChangeCred.php" method="post">
			
					<input type="text" id="name" name="name" autocomplete="on"  placeholder=<?php echo $_SESSION['accountn'];?>> <br> <br> 

					<input type="text" id="surname" name="surname" autocomplete="on"  placeholder="<?php echo $_SESSION['accounts'];?>"> <br> <br> 

					<input type="text" id="username" name="username" autocomplete="on"  placeholder=<?php echo $_SESSION['accountun'];?>> <br> <br> 
					<input type="text" id="email" name="email" autocomplete="on"  placeholder=<?php echo $_SESSION['accounte'];?>> <br> <br> 

				
					<button type="submit" id="UpdateCred" name="UpdateCred">Save</button>

				</form>
			</td>

		

		
			<br>
		
			<td class ="">
				<form action="ProfileChangePas.php" method="post">	
			
				<input type="password" id="password" name="password" autocomplete="on"  placeholder="Current password"> <br>  <br> 

				<input type="password" id="newpassword" name="newpassword" autocomplete="on"  placeholder="New password"> <br>  <br> 

				<input type="password" id="newrepassword" name="newrepassword" autocomplete="on"  placeholder="Repeat new password"> <br>  <br>
				
				<button type="submit" id="UpdatePas" name="UpdatePas">Save</button>

				</form>
			</td>
		</table>
			

		</div>


			


				
			
		<br>
		
		<br>
			
	</div>

</div>

<?php
include_once'Footer.inc.php';
?>


