<?php
include_once'Header.php';
?>

<div>


	<div class="">
		<h2>Upload</h2>
		
		<hr class="">

		<br> <br>

			<div class ="">
				<br>
				<form method='GET'><br>
					Select your upload type <br> <br>
					<select class="" id="typeUp" name="typeUp">
						<option value="model">Model</option>		
    					<?php
    					if($_SESSION["admin_perms"] === 1){
    					echo"<option value='news'>Newsletter</option>";}
    					?>
 					</select><br> <br>
 					<?php if(!isset($_GET["typeUp"])){

						echo"  	";
					}?>
 					
 					<?php if(!isset($_GET["typeUp"])){

						echo"</div><br><br>
						
						<br></div><hr class=''>	";
					}?>
 					<div class =""><br><button class="" type='submit' name='Continue'>Continue</button></div></form>

 					<?php
 					if(isset($_GET["typeUp"])){
 					$Uploadtype = filter_input(INPUT_GET, 'typeUp', FILTER_SANITIZE_STRING);


 					if ($Uploadtype == "model")
 					{
 						echo"<hr class=''> 
 						<form action='Uploadmodel.inc.php' method='POST' enctype='multipart/form-data'>
 							<br>
								<input class='' type='text' id='ModelName' name='ModelName' placeholder='Model name'> <br> <br>

								<label for='MFile' class=''>
								<input type='file' id='MFile' name='MFile'  accept='.stl,.obj,.fbx,.amf,.3mf,.bae,.3ds,.igs, .iges,.stp,.ctb'>
								Add the model file</label> <br> <br>

								<textarea rows='7' cols='55' type='textarea' id='ModelText' name='ModelText' placeholder='Enter the models description'>  </textarea> <br> <br> 
				
								<input class='' type='text' id='Modeltags' name='Modeltags' placeholder='Model tags (seperate them with space)'> <br> <br>

								<label for='MPic' class=' '>
								<input type='file' id='MPic' name='MPic' accept='image/*,.jpg,.jpeg,.png,.gif'>
								Add a picture</label> <br> 
						
		
							<br> <hr class=''>	
					
							</div> 
							<div class=''>

								<br><button type='submit' name='UploadB'>Upload</button><br><br>

							</div>  			

						</form> </div></div>";}
						else if ($Uploadtype == "news")
						{
 						echo"<hr class=''> 
 						<form action='Uploadnews.inc.php' method='POST'>
 							<br>
								<input class='' type='text' id='NewsTitle' name='NewsTitle' placeholder='News title'> <br> <br>

								<input class='' type='text' id='NewsCaption' name='NewsCaption' placeholder='News caption'> <br> <br>

								<textarea rows='7' cols='55' type='textarea' id='NewsText' name='NewsText' placeholder='Enter the models description'>  </textarea> <br> 
						
		
							<br> <hr class=''>	
		
							<br>
							</div> 
							<div class=''>
								<br><button type='submit' name='UploadB'>Upload</button><br><br>
							</div>  			

						</form>

						</div></div>
						";}
					}



					
 					?>
					


				
				
</div>
	  	



<?php
include_once'Footer.php';
?>