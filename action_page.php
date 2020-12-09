<?php
$servername = "localhost:3306";
$username = "root";
$password = "password";
$dbname = "Akhil";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
//  die("Connection failed: " . $conn->connect_error);
}
// echo ($_POST['model']);
 $filename = $_FILES["img"]["name"];
$t=time(); 
$filename = $t.$filename;
$sql="INSERT INTO info (company,model, id, tow_sec, comments, img)VALUES('{$_POST['company']}','{$_POST['model']}','{$_POST['id']}','{$_POST['tow_sec']}','{$_POST[comments]}','$filename')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    $tempname = $_FILES["img"]["tmp_name"];
	echo $tempname;
    $folder = "/home/ubuntu/DataStorage/image/".$filename;
    if (move_uploaded_file($tempname, $folder)) {
   // if (copy($tempname, $folder)) {
        echo "Image uploaded successfully";
	header('Location: /index.php');
    }else{
        echo "Failed to upload image";
	echo "<p>Sorry, Please Upload data again <a href='./akhil.html'>here</a></p>";
	sleep(30);
	header('Location: /index.php');
	}
 $conn->close();
?>
