<?php
$servername = "localhost";
$username = "wasenhance";
$password = "wasadmin123";
$dbname = "healthywebsite";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>