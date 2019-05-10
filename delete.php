<?php
	echo $_POST["delete"];
	session_start();
	if (isset($_SESSION['userid'])) { 
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "phpproject_database";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);		
		$sql_del_query="DELETE FROM imagedescription WHERE title='".$_POST["delete"]."'";
		$conn->query($sql_del_query);
		$_SESSION['del']=$sql_del_query;
		header("location:gallery.php");
	}
?>