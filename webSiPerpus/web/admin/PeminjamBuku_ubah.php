<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>halaman Peminjaman Buku</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >PT. Pustaka Indonesia</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
							Selamat datang: <?php echo $_SESSION["nama_akun"]; ?> <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="logout.php">Logout</a></li>
					</ul>
				</li>
        	</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li><a href = "akun.php">Akun</a></li>
			<li class = "active"><a href = "PeminjamBuku.php">Peminjaman Buku</a></li>
			<li><a href = "buku.php">Tambah Buku</a></li>		
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Halaman Peminjaman Buku</div>
				<br />
				<div class = "col-md-4">
					<?php 
						$qDataPinjam = "SELECT * FROM pinjam_buku pb INNER JOIN buku b ON pb.id_buku = b.id_buku INNER JOIN pengguna p ON pb.id_pengguna = p.id_pengguna WHERE pb.id_pinjam = $_REQUEST[id_pinjam]";
						$qDataPinjamHasil = mysqli_query($KoneksiDB, $qDataPinjam);
						$fetch = mysqli_fetch_array($qDataPinjamHasil, MYSQLI_ASSOC);
						$fotoEncode = base64_encode($fetch['foto']);
					?>
					<form method = "POST" enctype = "multipart/form-data" action="PeminjamBuku_ubah_db.php?id_pinjam=<?php print($fetch['id_pinjam']);?>">
						<div class = "form-group">
							<label>Foto </label>
							<div id = "preview" style = "width:200px; height :200px; border:1px solid #000;">
								<img src="data:image/jpeg;base64,<?php print($fotoEncode); ?>" height = "200px" width = "300px">
							</div>
							<input type = "file"  id = "foto" name = "foto" disabled/>
						</div>
						<div class = "form-group">
							<label>Judul</label>
							<input type = "text" class = "form-control" name = "judul" value="<?php print($fetch['judul']);?>" disabled/>
						</div>
						<div class = "form-group">
							<label>Nama Peminjam</label>
							<input type = "text" class = "form-control" name = "nama_pengguna" value="<?php print($fetch['nama_pengguna']);?>" disabled/>
						</div>
						<div class = "form-group">
							<label>Tanggal Pinjam</label>
							<input type = "text" class = "form-control" name = "tanggal_pinjam" value="<?php print($fetch['tanggal_pinjam']);?>" disabled/>
						</div>
						<div class = "form-group">
							<label>Tanggal Dikembalikan</label>
							<input type = "date" class = "form-control" name = "tanggal_dikembalikan"/>
						</div>
						<div class = "form-group">
							<label>Tanggal Jatuh Tempo</label>
							<input type = "date" class = "form-control" name = "tanggal_jatuh_tempo" value="<?php print($fetch['tanggal_jatuh_tempo']);?>" disabled/>
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_dikembalikan" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Simpan Perubahan</button>
						</div>
					</form>
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