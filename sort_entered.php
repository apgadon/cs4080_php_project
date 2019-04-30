<?php
session_start();
if (isset($_SESSION['userid'])) { 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "phpproject_database";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);		
	$sql_sort_query="SELECT id, user_id,title, description, image_name FROM imagedescription ORDER BY id ASC";
	$conn->query($sql_sort_query);
	$_SESSION['namesort']=$sql_sort_query;
	header("location:gallery.php");
}
?>