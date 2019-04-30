<?php 
session_start();
?>
<title>phpzag.com : Gallery! </title>

<div class="container">	
	<h2>Create Dynamic Image Gallery with jQuery, PHP & MySQL</h2>	
	<div class="row">
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
			<?php if (isset($_SESSION['userid'])) { ?>
			<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<br>
			<li><a href="upload.php"><strong>Upload More Images in Gallery</strong></a></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php } else { ?>
			<li><p class="navbar-text">You are Logged Out!</p></li><br>
			<li><a href="logIn.php">Login</a></li>				
			<?php } ?>
		</ul>
	</div>	
	</div>
	<?php if (isset($_SESSION['userid'])) { ?>
		<div class="row">
			<div class="navbar-collapse gallery">			
				<ul>
					<?php	
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "phpproject_database";

					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);		
					$sql_query="SELECT id, user_id,title, description, image_name FROM imagedescription WHERE user_id='".$_SESSION["userid"]."'";
					$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
					while($rows = mysqli_fetch_array($resultset) ) { ?>
					<li>					
						<a href="http://localhost/phpProject/imageUploads/<?php echo $rows["image_name"]; ?>" data-lightbox="<?php echo $_SESSION['userid']; ?>" data-title="<?php echo $rows["image_title"]; ?>"><img
				src="http://localhost/phpProject/imageUploads/<?php echo $rows["image_name"]; ?>" class="images" width="200" height="200"></a>
					</li>
					<?php } ?>
				</ul>			
			</div>
		</div>
	<?php } ?>
	
	
</div>

