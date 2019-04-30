<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<style>
ul {
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
  background-color: #111;
}
</style>
<div class="container">
	<div class="collapse navbar-collapse" id="navbar1">
		<ul class="nav navbar-nav navbar-left">
		<?php session_start(); 
		if (isset($_SESSION['userid'])) { ?>
			<li><p class="navbar-text"><strong>Welcome!</strong> You're signed in as <strong><?php echo $_SESSION['name']; ?></strong></p></li>
			<li><a href="gallery.php"><strong>View Image Gallery</strong></a></li>
			<li><a href="logout.php">Log Out</a></li>
			<?php }
		else { 
			die("database error"); 
			?>
			<li><a href="logIn.php">Back to Login</a></li>
		<?php } ?>
		</ul>
	</div>
</div>