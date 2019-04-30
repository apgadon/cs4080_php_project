<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<style>
.nav {
	color: white;
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #666;
}
img{
	cursor:zoom-in;
}

.tooltip {
  position: relative;
  display: inline-block;
  /* Fade in tooltip */
  opacity: 1;
  transition: opacity 1s;
}

.tooltip .tooltiptext {
  visibility: hidden;
  background-color: grey;
  color: #fff;
  height: 15px;
  width: 300px;
  border-radius: 5px;
  padding: 2.5px;
  
  z-index: 3;
  
  margin-left: 10px;
  overflow: hidden;
  
  /* Fade in tooltip */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: .90;
}
</style>

<?php 
session_start();
?>
<title>phpzag.com : Gallery! </title>

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
						<!--form method="post">
						    <input type="submit" name="deleteName" id="delete" value="Delete" /><br/>
						</form-->
					</li>
					<?php }} 
					/*
					function testfun()
					{
					   echo $rows["image_title"];
						$sqldel = "DELETE FROM imagedescription WHERE title='".$rows["image_title"]."'";
						$conn->query($sqldel);
					}

					if(array_key_exists('delete',$_POST)){
					   testfun();
					}
					/*
					function php_delete(){
						echo $rows["image_title"];
						$sqldel = "DELETE FROM imagedescription WHERE title='".$rows["image_title"]."'";
						$conn->query($sqldel);
					}
					*/
					?>
				</ul>			
			</div>
		</div>
	<?php } ?>
	
	
</div>

