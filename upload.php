<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<?php 
session_start();
?>
<div class="container">
	<div class="row">
		<div">
		<ul class="nav">
			<h2>Image Upload</h2>
			<?php if (isset($_SESSION['userid'])) { ?>
			<li><p><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<li><strong><a href="gallery.php">Back to Image Gallery</a> </strong></li>
			<li><a href="logout.php">Log Out</a></li>	
			<?php } else { ?>
			<li><p>You are Logged Out!</p></li><br>
			<li><a href="logIn.php">Login</a></li>				
			<?php } ?>		
		</ul>
		<?php if (isset($_SESSION['userid'])) { ?>
		<form role="form" enctype='multipart/form-data' action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
		
		<fieldset>
			<legend>Upload Images</legend>
			<div class="form-group">
				<label for="name">Image Title</label>
				<input type="text" name="image_title" placeholder="Image Title" class="form-control" />
			</div>
			<div class="form-group">
				<label for="name">Image Description:</label>
				<input type="text" name="img_description" placeholder="Image Description" class="form-control" />
			</div>
			<div class="form-group">
				<label for="name">Choose Image:</label>
				<input type="file" name="uploaded_file" placeholder="Choose file" class="form-control" />
			</div>
			<div class="form-group">
				<input type="submit" name="upload" value="upload" class="btn btn-primary" />
			</div>
		</fieldset>
		</form>
		<?php } ?>		
		</div>
	</div>
</div>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpproject_database";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);	
if(isset($_POST["upload"]) && $_SESSION["userid"]) {
	$image_title=$_POST["image_title"];
	$img_description=$_POST["img_description"];
	$fk_uid=$_SESSION["userid"];
	$image_name=$_FILES["uploaded_file"]["name"];
	if ($_FILES["uploaded_file"]["type"]=="image/gif"
	|| $_FILES["uploaded_file"]["type"]=="image/jpeg"
	|| $_FILES["uploaded_file"]["type"]=="image/pjpeg"
	|| $_FILES["uploaded_file"]["type"]=="image/png"
	|| $_FILES["uploaded_file"]["type"]=="image/pdf"
	&& $_FILES["uploaded_file"]["size"]<200000) { if ($_FILES["uploaded_file"]["error"]>0) {
		echo "Return Code:".$_FILES["uploaded_file"]["error"]."";
	} 
	else {
		$i=1;
		$success = false;
		$new_image_name=$image_name;
		while(!$success) {
			if (file_exists("uploads/".$new_image_name)) {
				$i++;
				$new_image_name="$i".$image_name;
			} 
			else {
				$success=true;
				echo "Image uploaded successfully.";
			}
		}
		move_uploaded_file($_FILES["uploaded_file"]["tmp_name"],"imageUploads/".$new_image_name);
		// image details into database table
		$insert_sql = "INSERT INTO imagedescription(id, user_id, title, description, image_name)
		VALUES('', '". $_SESSION["userid"]."', '".$image_title."', '".$img_description."', '".$image_name."')";
		mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
	}
	} else {
	echo "Invalid file.";
	}
}
?>
