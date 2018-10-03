<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "nilai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$nim = $_GET['nim'];
$conn->query("DELETE FROM nilai WHERE nim='$nim'");
 
header("Location: http://localhost/nilai/index.php");
?>