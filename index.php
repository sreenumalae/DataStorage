<!DOCTYPE html>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anon>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

		<style>
			#customers {
			font-family: Arial, Helvetica, sans-serif;
			border-collapse: collapse;
			width: 100%;
			height: 100%;
			}

			#customers td, #customers th {
			border: 1px solid #ddd;
			padding: 8px;
			}

			#customers tr:nth-child(even){background-color: #f2f2f2;}

			#customers tr:hover {background-color: #ddd;}

			#customers th {
			padding-top: 12px;
			padding-bottom: 12px;
			text-align: left;
			background-color: #4CAF50;
			color: white;
			}
		</style>
	</head>
<body>

<h1>Stored Data</h1>

<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
	echo "<p><a style='font-size: initial;' href='./logout.php'>Logout</a></p>";

	$servername = "localhost";
	$username = "root";
	$password = "password";
	$dbname = "Akhil";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * from info";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// output data of each row
		echo "<table id='customers'>
			<tr>
			<th>DateTime</th>
			<th>Company</th>
			<th>Model</th>
			<th>Id</th>
			<th>Tower/Section</th>
			<th>Comments</th>
			<th>Image</th>
			</tr>";
		while($row = $result->fetch_assoc()) {
			echo "<tr>
		<td>".$row['dt_created']."</td>
		<td>".$row['company']."</td>
		<td>".$row['model']."</td>
		<td>".$row['id']."</td>
		<td>".$row['tow_sec']."</td>
		<td>".$row['comments']."</td>
		<td><a href='image/".$row['img']."'><img style='display:block; height:10%;' src='image/".$row['img']."'></a></td>
		</tr>";
		}
	} else {
		echo "0 results";
	}
	echo "<p><a href='./akhil.html'>To Store Values</a></p>";
	$conn->close();
} else {
   //echo "<p>Please <a href='./login.html'>Login</a></p>";
   header('Location: ./login.html');
}
  
?>


</body>
