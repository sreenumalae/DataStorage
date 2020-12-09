<?php
$servername = "p:127.0.0.1:3306";
$username = "root";
$password = "password";

// Create connection
$conn = mysqli_connect("127.0.0.1", $username, $password,"Akhil");

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
mysqli_close($conn);
?>
