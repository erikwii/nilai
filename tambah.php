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

$nim = $_POST['nim'];
$nama = $_POST['nama'];
$absen = (int) $_POST['absen'];
$tugas = (int) $_POST['tugas'];
$uts = (int) $_POST['uts'];
$uas = (int) $_POST['uas'];

$akhir = $absen*(20/100) + $tugas*(20/100) + $uts*(30/100) + $uas*(30/100);

if ($akhir < 50) {
	$angka = 'E';
	$ket = 'Tidak Lulus';
}elseif($akhir >= 50 && $akhir < 60) {
	$angka = 'D';
	$ket = 'Tidak Lulus';
}elseif ($akhir >= 60 && $akhir < 70) {
	$angka = 'C';
	$ket = 'Lulus';
}elseif ($akhir >= 70 && $akhir < 80) {
	$angka = 'B';
	$ket = 'Lulus';
}else{
	$angka = 'A';
	$ket = 'Lulus';
}

$sql = "INSERT INTO nilai (NIM, nama, absen, tugas, uts, uas, akhir, angka, ket)
VALUES ('".$nim."', '".$nama."', '".$absen."', '".$tugas."', '".$uts."', '".$uas."', '".$akhir."', '".$angka."', '".$ket."');";

if ($conn->multi_query($sql) === TRUE) {
    header("Location: http://localhost/nilai/index.php");
	die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>