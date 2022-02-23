<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE loginsystem";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating database: " . $conn->error;
}

$conn->close();

$conn = new mysqli($servername, $username, $password, 'loginsystem');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// sql to create table
$sql = "CREATE TABLE users (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `username` varchar(50) NOT NULL,
 `password` varchar(50) NOT NULL,
 `create_datetime` datetime NOT NULL,
 PRIMARY KEY (`id`)
)";

if ($conn->query($sql) === TRUE) {
  echo "<br/>Table users created successfully";
} else {
  echo "<br/>Error creating table: " . $conn->error;
}

$conn->close();
?>
