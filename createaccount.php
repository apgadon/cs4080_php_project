<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<?php 
session_start();
?>
<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<div class="container">
	<h2>RANGELEK Image Gallery</h2>
	<div class="row">
		<div class="navbar">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Create an Account</legend>
					<div class="form-group">
						<label for="name">First Name</label>
						<input type="text" name="firstname" placeholder="Enter Your First Name" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Last Name</label>
						<input type="text" name="lastname" placeholder="Enter Your Last Name" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Email Address: </label>
						<input type="text" name="newemail" placeholder="Enter Your Email" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="newpassword" placeholder="Enter Your Password" required class="form-control" />
					</div>
					<div class="form-group">
						<input type="submit" name="createaccount" value="create account"/>
					</div>
				</fieldset>
			</form>
			<div class="form-group">
				<a href="logIn.php"><button>Back to Login page</button></a>
			</div>
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
if(isset($_POST["createaccount"])) {
		$insert_sql = "INSERT INTO userinfo(id, firstname, lastname, email, password)
		VALUES('', '". $_POST["firstname"]."', '".$_POST["lastname"]."', '".$_POST["newemail"]."', '".$_POST["newpassword"]."')";
		mysqli_query($conn, $insert_sql) or die("database error: ". mysqli_error($conn));
} ?>
