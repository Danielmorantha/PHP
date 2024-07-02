<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>Ubah Akun</title>
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
						<li><a href="./admin/logout.php">Logout</a></li>
					</ul>
				</li>
        	</ul>	
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li class = "active"><a href = "akun.php">Akun</a></li>
			<li><a href = "PeminjamBuku.php">Peminjaman Buku</a></li>
			<li><a href = "buku.php">Tambah Buku</a></li>		
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Ubah Akun</div>
				<?php
					$qAkun = "SELECT p.id_pengguna as id_pengguna, p.nama_pengguna, p.nama_akun as nama_akun, p.kata_sandi as kata_sandi FROM pengguna p INNER JOIN level_pengguna lvl ON p.id_level = lvl.id_level WHERE p.id_pengguna=$_REQUEST[id_pengguna]";
					$qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
					$fetch = mysqli_fetch_array($qAkunHasil, MYSQLI_ASSOC);
				?>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" action = "akun_ubah_db.php?id_pengguna=<?php echo $fetch['id_pengguna'];?>">
						<div class = "form-group">
							<label>Nama </label>
							<input type = "text" class = "form-control" value = "<?php echo $fetch['nama_pengguna'];?>" disabled />
						</div>
						<div class = "form-group">
							<label>Nama Akun </label>
							<input type = "text" class = "form-control" value = "<?php echo $fetch['nama_akun'];?>" name = "nama_akun" />
						</div>
						<div class = "form-group">
							<label>Kata Sandi </label>
							<input type = "txt" class = "form-control" value = "<?php echo $fetch['kata_sandi'];?>" name = "kata_sandi" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_ubah_akun_admin" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Simpan Perubahan</button>
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