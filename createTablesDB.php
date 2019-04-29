 <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpproject_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE userInfo (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstName VARCHAR(30) NOT NULL,
lastName VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL


)";

$sql = "CREATE TABLE ImageDescription (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id int(11) NOT NULL,
title VARCHAR(50) NOT NULL,
description VARCHAR(250) NOT NULL


)";






if ($conn->query($sql) === TRUE) {
    echo "Table USERS created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

