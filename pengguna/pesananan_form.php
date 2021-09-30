<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Morantha Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Morantha Hotel</a>
			</div>
		</div>
	</nav>	
	<ul id = "menu">
	<li><a href = "index.php">Beranda</a></li> |
		<li><a href = "tentang_kami.php">Tentang Kami</a></li> |
		<li><a href = "hubungi_kami.php">Hubungi Kami</a></li> |
		<li><a href = "fasilitas_kami.php">Fasilitas Kami</a></li> |
		<li><a href = "hidangan_kami.php">Hidangan kami</a></li> |			
		<li><a href = "pesananan.php">Pesan Sekarang</a></li> |
		<li><a href = "aturan_kami.php">Aturan Kami</a></li>

	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Buat Pesanan</h3></strong>
				<br />
				<?php 
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
					$query2 = $conn->query("SELECT * FROM `room`") or die(mysqli_error());
					$fetch = $query->fetch_array();
					$fetch2 = $query2->fetch_array();
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src = "photo/<?php echo $fetch['foto']?>" height = "300px" width = "400px">
					</div>
					<div style = "float:left; margin-left:10px;">
						<h3><?php echo $fetch2['tipe_kamar']?></h3>
						<h3 style = "color:#00ff00;"><?php echo "Rp. ".number_format($fetch['harga'], 0, ",", ".");?></h3>
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-4">
					<form method = "POST" enctype = "multipart/form-data">
						<div class = "form-group">
							<label>Nama Depan</label>
							<input type = "text" class = "form-control" name = "nama_depan" required = "required" />
						</div>
						<div class = "form-group">
							<label>Nama Tengah</label>
							<input type = "text" class = "form-control" name = "nama_tengah" required = "required" />
						</div>
						<div class = "form-group">
							<label>Nama Belakang</label>
							<input type = "text" class = "form-control" name = "nama_belakang" required = "required" />
						</div>
						<div class = "form-group">
							<label>Alamat</label>
							<input type = "text" class = "form-control" name = "alamat" required = "required" />
						</div>
						<div class = "form-group">
							<label>Nomor Telepon</label>
							<input type = "text" class = "form-control" name = "nomor_telepon" required = "required" />
						</div>
						<div class = "form-group">
							<label>Check in</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "tombol_tamu"><i class = "glyphicon glyphicon-save"></i> Pesan</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
				<?php require_once 'pesananan_tambah_db.php'?>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2021 </label>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>