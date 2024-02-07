<?php
include_once'Header.inc.php';

include_once'Profile.inc.php';

if(isset($_SESSION["accountid"]) != true){
 header("location:Login.php");
}

// ADD CLASS !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! yeet edition
?>


<div>


	<div class="neat">
		<h2><?php echo $_SESSION["accountn"]." ".$_SESSION["accounts"]." (".$_SESSION["accountun"].")";?></h2>
		<div>
			<button class="right" id="edit" onclick="location.href = 'http://localhost/app/Profile_Edit.php';">Edit</button>
			</div>
		<br>
		
		<br>
			<table class="Profile">

				
				<tr>
			
				 <td><?php echo $_SESSION["accountperms"];?></td>
				 
				 <td><?php echo $_SESSION["accounte"];?></td>

				 <?php if(isset($_SESSION["accountcla"])){

				 	 echo "<td>".$_SESSION["accountcla"]."</td>";
				 }?>



				</tr>
				 
				 

			</table>
		


	</div>

</div>

<hr class ="whole">

<?php
include_once'Footer.inc.php';
?>