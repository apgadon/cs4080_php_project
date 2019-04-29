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

$sql = "INSERT INTO userInfo (firstName, lastName, email, password)
VALUES ('Rachael', 'Shima', 'reshima@cpp.edu', '12345')";





if ($conn->query($sql) === TRUE) {
    echo "added successfully";
} else {
    echo "Error KYS " . $conn->error;
}

$conn->close();
?>
