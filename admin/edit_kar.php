<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/css/mdb.min.css" rel="stylesheet">
	<!-- script -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.0/js/mdb.min.js"></script>
	<title>Edit Data Karyawan - Karisma</title>
	<style>
	.card {
		margin-right: auto;
		margin-left: auto;
		margin-bottom: 20px;
		width: 400px;
		padding: 10px;
		border: 1px solid #ccc;
	}
</style>

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark elegant-color">
		<!-- logo -->
		<a class="navbar-brand" href="index.php">Karisma</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
		aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="basicExampleNav">
		<!-- navbar -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				<a class="nav-link" href="index.php">Beranda
					<span class="sr-only">(current)</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="daftar_bk.php">Buku</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="daftar_atk.php">Alat Tulis Kantor</a>
			</li>
			<!-- dropdown -->
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Daftar</a>
				<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
					<a class="dropdown-item" href="daftar_bk.php">Buku</a>
					<a class="dropdown-item" href="daftar_jb.php">Jenis Buku</a>
					<a class="dropdown-item" href="daftar_atk.php">Alat Tulis Kantor</a>
					<a class="dropdown-item" href="daftar_merk.php">Merk Alat Tulis Kantor</a>
					<a class="dropdown-item" href="daftar_jatk.php">Jenis Alat Tulis Kantor</a>
					<a class="dropdown-item" href="daftar_pgr.php">Pengarang</a>
					<a class="dropdown-item" href="daftar_jabat.php">Jabatan</a>
					<a class="dropdown-item" href="daftar_kar.php">Karyawan</a>
				</div>
			</li>
		</ul>
		<ul class="navbar-nav ml-auto nav-flex-icons">
			<li class="nav-item avatar dropdown">
				<a class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
					<i class="fa fa-user rounded-circle z-depth-0"></i><?php 
					error_reporting(0);
					session_start();
					$user = $_SESSION['admin'];
					$id = $_SESSION['id'];
					$_SESSION['id'] = $id;
					if(isset($_SESSION['admin']))
						echo '<span>    ' .$user.'    </span>';					
					?>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Profil</a>
						<a class="dropdown-item" href="#">Privasi</a>
						<a class="dropdown-item" onclick="keluar()">Keluar</a>
					</div>
				</a>
			</li>
		</ul>
	</div>
</nav><br>
<div class="card">
	<div class="container">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan'] == "gagal"){
				echo "<div style='margin-bottom:55px' class='alert alert-danger text-center' role='alert'><span class='glyphicon glyphicon-warning-sign'></span>Data yang diinput telah digunakan</div>";
			}
		}
		?>
		<?php
		include "koneksi.php";
		$idkar = $_GET['idkar'];
		$query = "SELECT * FROM kar WHERE idkar='".$idkar."'";
		$sql = mysqli_query($conn, $query);
		$data = mysqli_fetch_array($sql);
		?>
		
		<form method="post" action="pro_edit_kar.php?idkar=<?php echo $idkar; ?>" enctype="multipart/form-data">
			<p class="h4 text-center py-4">Ubah Data Karyawan</p>
			<div class="md-form">
				<i class="fa fa-id-card-o prefix grey-text"></i>
				<input type="text" name="nkar" placeholder="Nama Karyawan" value="<?php echo $data['nkar'] ?>">
			</div>

			<div class="md-form">
				<i class="fa fa-list-ol prefix grey-text"></i>
				<input type="text" name="tlkar" placeholder="Tanggal Lahir Karyawan (yyyymmdd)" value="<?php echo $data['tlkar'] ?>">
			</div>
			<div class="md-form">
				<i class="fa fa-book prefix grey-text"></i>
				<input type="text" name="ukar" placeholder="Umur" value="<?php echo $data['ukar'] ?>">
			</div>
			<div class="md-form">
				<i class="fa fa-globe prefix grey-text"></i>
				<input type="text" name="akar" placeholder="Alamat Karyawan" value="<?php echo $data['akar'] ?>">
			</div>
			<div class="md-form">
				<i class="fa fa-sort-numeric-asc prefix grey-text"></i>
				<input type="text" name="njkar" placeholder="Jabatan Karyawan" value="<?php echo $data['njkar'] ?>">
			</div>
			<div class="md-form">
				<i class="fa fa-archive prefix grey-text"></i>
				<input type="text" name="telkar" placeholder="No Telepon" value="<?php echo $data['telkar'] ?>">
			</div>
			<br>
			<br><br>
			<center class="mb-3"><input type="submit" class="btn btn-primary" value="Simpan">
				<input class="btn btn-danger" type="button" onclick="konfirmasi()" value="Batal"></center>
			</form> 
			<script type='text/javascript'>
				function konfirmasi() {
					var answer = confirm('Ingin meninggalkan form?')
					if (answer){
						window.location = 'daftar_kar.php';
					}
				}
			</script>
			<script type='text/javascript'>
				function keluar() {
					var kel = confirm('Ingin keluar dari akun?')
					if (kel){
						window.location = '../index.php?pesan=keluar';
					}
				}
			</script>
		</body>
		</html>