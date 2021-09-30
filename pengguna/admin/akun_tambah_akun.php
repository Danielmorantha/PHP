<!DOCTYPE html>
<?php
	require_once 'cek_session.php';
	require 'nama_admin.php';
?>
<html lang = "en">
	<head>
		<title>Morantha Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Morantha Hotel</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li><a href = "beranda.php">Beranda</a></li>
			<li class = "active"><a href = "akun.php">Akun</a></li>
			<li><a href = "pesanan.php">Pesanan</a></li>
			<li><a href = "kamar.php">Kamar</a></li>			
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Tambah Akun Admin</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST">
						<div class = "form-group">
							<label>Nama </label>
							<input type = "text" class = "form-control" name = "nama" />
						</div>
						<div class = "form-group">
							<label>Nama Akun </label>
							<input type = "text" class = "form-control" name = "nama_akun" />
						</div>
						<div class = "form-group">
							<label>Kata Sandi </label>
							<input type = "password" class = "form-control" name = "kata_sandi" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_tambah_admin" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Simpan</button>
						</div>
					</form>
					<?php require_once 'akun_tambah_akun_db.php'?>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2021 </label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</html>