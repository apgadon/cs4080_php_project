<link href="loginstyle.css" type="text/css" rel="stylesheet"/>
<div class="container">
	<h2>RANGELEK Image Gallery</h2>
	<div class="row">
		<div class="navbar">
			<form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
				<fieldset>
					<legend>Login to Your Account</legend>
					<div class="form-group">
						<label for="name">Email Address: </label>
						<input type="text" name="email" placeholder="Enter Your Email" required class="form-control" />
					</div>
					<div class="form-group">
						<label for="name">Password</label>
						<input type="password" name="password" placeholder="Enter Your Password" required class="form-control" />
					</div>
					<div class="form-group">
						<input type="submit" name="login" value="Log in"/>
					</div>
				</fieldset>
			</form>
			<div class="form-group">
				<a href="createaccount.php"><button>Create a New Account</button></a>
			</div>
		</div>
	</div>
</div>

<?php
	session_start();
	$servername="localhost";
	$username="root";
	$password="";
	$dataBase="phpproject_database";
	$conn = new mysqli($servername, $username, $password, $dataBase);
	if(isset($_POST["login"])) {
		$email=$_POST["email"];
		$password=$_POST["password"];
		$sql_query="SELECT id, email, password, firstName, lastName FROM userInfo WHERE email='$email' AND password='$password'";
		$resultset = $conn->query($sql_query) or die("database error:". mysqli_error($conn));
		$row=mysqli_fetch_array($resultset);
		if(mysqli_num_rows($resultset)>0) {
		$_SESSION["userid"]=$row["id"];
		$_SESSION["name"]=$row["firstName"]. " " .$row["lastName"];
		header("location:gallery.php");
	}
	else{
		echo "Login details not correct! Please try again.";
	}
	$conn->close();
	}

?>