<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">
	<title>Aplikasi Penilaian Mahasiswa</title>
	<script type="text/javascript" src="assets/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript" src="assets/popper.min.js"></script>
	<script type="text/javascript" src="assets/bootstrap.min.js"></script>

	<!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
</head>
<body>
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

	$sql = "SELECT * FROM nilai";
	$result = $conn->query($sql);
	?>

	<div class="jumbotron">
  		<h1 class="display-4">Aplikasi Penilaian Mahasiswa!</h1>
  		<p>Program ini dibuat untuk memenuhi tugas mata kuliah pemrograman web.</p>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<button class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModalCenter">Tambah Data</button>
			</div>
		</div>
		<div class="rom">
			<div class="col-12">
				<table class="table table-striped table-responsive w-100">
					<thead>
						<tr>
							<td>NIM</td>
							<td>Nama Mahasiswa</td>
							<td>Nilai Absen</td>
							<td>Nilai Tugas</td>
							<td>Nilai UTS</td>
							<td>Nilai UAS</td>
							<td>Nilai Akhir</td>
							<td>Nilai Huruf</td>
							<td>Keterangan</td>
							<td>Hapus</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						        echo "
								<tr>
									<td>".$row['NIM']."</td>
									<td>".$row['nama']."</td>
									<td>".$row['absen']."</td>
									<td>".$row['tugas']."</td>
									<td>".$row['uts']."</td>
									<td>".$row['uas']."</td>
									<td>".$row['akhir']."</td>
									<td>".$row['angka']."</td>
									<td>".$row['ket']."</td>
									<td><a href='hapus.php?nim=".$row['NIM']."'>Hapus</a></td>
								</tr>
								";
						    }
						} else {
						    echo "
							<tr>
								<td colspan='6' class='text-center'>Tidak ada data</td>
							</tr>
						    ";
						}
						 ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  	<div class="modal-dialog modal-dialog-centered" role="document">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<h5 class="modal-title" id="exampleModalCenterTitle">Tambah Data</h5>
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          			<span aria-hidden="true">&times;</span>
	        		</button>
	      		</div>
	      		<div class="modal-body">
	      			<form action="tambah.php" method="post" class="needs-validation">
	      				<div class="form-row">
					    	<div class="form-group col-md-12">
					      		<label for="nama">NIM</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control" id="nim" name="nim" placeholder="NIM" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
									</div>
					      		</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					    	<div class="form-group col-md-12">
					      		<label for="nama">Nama Mahasiswa</label>
					      		<div class="input-group">
					      			<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Mahasiswa" required>
					      			<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-user"></i></span>
									</div>
					      		</div>
					    	</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-6">
					  			<label for="email">Nilai Absen</label>
					  			<div class="input-group">
								    <input type="number" class="form-control" id="absen" name="absen" placeholder="Nilai Absen" min="0" max="100" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
									</div>
					  			</div>
							</div>
					  		<div class="form-group col-md-6">
					  			<label for="password">Nilai Tugas</label>
					  			<div class="input-group">
					  				<input type="number" class="form-control" id="tugas" name="tugas" placeholder="Nilai Tugas" min="0" max="100" required>
					  				<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
									</div>
					  			</div>
							</div>
					  	</div>
					  	<div class="form-row">
					  		<div class="form-group col-md-6">
					  			<label for="email">Nilai UTS</label>
					  			<div class="input-group">
								    <input type="number" class="form-control" id="uts" name="uts" placeholder="Nilai UTS" min="0" max="100" required>
								    <div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
									</div>
					  			</div>
							</div>
					  		<div class="form-group col-md-6">
					  			<label for="password">Nilai UAS</label>
					  			<div class="input-group">
					  				<input type="number" class="form-control" id="uas" name="uas" placeholder="Jumlah" min="1" max="100" required>
					  				<div class="input-group-append">
									    <span class="input-group-text" id="basic-addon2"><i class="fa fa-tag"></i></span>
									</div>
					  			</div>
							</div>
					  	</div>
					  	<button type="submit" class="btn btn-lg btn-block btn-primary">Tambah</button>
					</form>
	      		</div>
	    	</div>
	  	</div>
	</div>
	<!-- Modal -->
</body>
</html>