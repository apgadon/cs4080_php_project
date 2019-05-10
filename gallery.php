<link href="loginstyle.css" type="text/css" rel="stylesheet"/>

<?php 
session_start();
?>
<title>Gallery! </title>

<div class="container">	
	
	<div class="row">
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
			<h2>Image Gallery</h2>	
			<?php if (isset($_SESSION['userid'])) { ?>
			<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<li><a href="upload.php"><strong>Upload More Images</strong></a></li>
			<li><a href="sort_name.php">Sort by Name</a></li>
			<li><a href="sort_entered.php">Sort by Order Entered</a></li>
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
					//$_SESSION['deleteid'] = $rows["image_title"];
					if(isset($_SESSION['namesort'])){
						$sql_query = $_SESSION['namesort'];
					}
					$resultset = mysqli_query($conn, $sql_query) or die("database error:". mysqli_error($conn));
					while($rows = mysqli_fetch_array($resultset) ) { 
						if($_SESSION["userid"] == $rows["user_id"]) {?>
					<li class="tooltip">					
						<a href="imageUploads/<?php echo $rows["image_name"]; ?>" data-lightbox="<?php echo $_SESSION['userid']; ?>" data-title="<?php echo $rows["image_title"]; ?>">
							<img src="imageUploads/<?php echo $rows["image_name"]; ?>" class="images" width="200" height="200">
						</a>
						<h5>
							<?php echo $rows["title"]; ?>
						</h5>
						<span id="safeInfo" class="tooltiptext"><?php echo $rows["description"];?></span>
						<form action="delete.php" method="post">
							<button value="<?php echo $rows["title"];?>" name="delete">Delete</button>
						</form><br/>
						
					</li>
					<?php 
						}
					}
					?>
				</ul>			
			</div>
		</div>
	<?php } ?>
	
	
</div>

