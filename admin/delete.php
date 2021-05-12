<?php
$id = $_GET['id'];
$servername = "sql6.freesqldatabase.com";
$username = "sql6411812";
$password = "4QwNjmclyM";
$dbname = "sql6411812";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to delete a record
$qr = mysqli_query($conn,"DELETE FROM products WHERE id = '$id'");
if($qr){
    header('location: index.php');
}
?>
