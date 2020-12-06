<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Akhil";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo ($_POST['model']);
$sql="INSERT INTO info (company,model, id, tow_sec, comments, img)VALUES('{$_POST['company']}','{$_POST['model']}','{$_POST['id']}','{$_POST['tow_sec']}','{$_POST[comments]}','{$_FILES["img"]["name"]}')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $filename = $_FILES["img"]["name"]; 

    $tempname = $_FILES["img"]["tmp_name"];	 
    $folder = "image/".$filename; 
    if (move_uploaded_file($tempname, $folder)) { 
        $msg = "Image uploaded successfully"; 
    }else{ 
        $msg = "Failed to upload image"; 
	}
  
  $conn->close();
?>