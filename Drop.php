<!DOCTYPE html>
<?php include_once "Header.inc.php"; 
include_once'Drop.inc.php'; ?>



<body>
	<form action="" method="post">
  <div class="drop">
    <span class="drop-zone__prompt">Drop file here or click to upload</span>
    <input type="file" name="myFile" class="drop_input">
  </div>
  <script src="drop.js"></script>

  <button type="submit" id="submit" name="submit" value="submit" default>Upload</button>
</form>
</body>

<?php include_once "Footer.inc.php";
?>
