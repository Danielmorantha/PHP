<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>Akun Tambah</title>
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
			<li class = "active"><a href = "akun.php">Akun</a></li>
			<li><a href = "PeminjamBuku.php">Peminjaman Buku</a></li>
			<li><a href = "buku.php">Tambah Buku</a></li>		
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<?php 
					$qAkun = "SELECT * FROM pengguna p INNER JOIN level_pengguna lvl ON p.id_level = lvl.id_level GROUP BY lvl.nama_level";
					$qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
					$pIdLvl = [];
					if (mysqli_num_rows($qAkunHasil)>0) {
						while ($baris = mysqli_fetch_array($qAkunHasil, MYSQLI_ASSOC) ) {
							$pIdLvl[] = $baris;
						}
					}
				
				?>
				<div class = "alert alert-info">Tambah Akun</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" action="akun_tambah_db.php">
						<div class = "form-group">
							<label>Pilih hak akses </label>
							<select name="id_level" id="id_level" required>
								<?php 
									foreach ($pIdLvl as $idLvl) 
									{ 
								?>								
										<option value="<?php print($idLvl['id_level']);?>"><?php print($idLvl['nama_level']); ?></option>
								<?php
									}
								?>
							</select>
						</div>
						<div class = "form-group">
							<label>username</label>
							<input type = "text" class = "form-control" name = "nama_akun" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Kata Sandi </label>
							<input type = "password" class = "form-control" name = "kata_sandi" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Nama Pengguna</label>
							<input type = "text" class = "form-control" name = "nama_pengguna" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Alamat</label>
							<input type = "text" class = "form-control" name = "alamat" required = "required"/>
						</div>
						<div class = "form-group">
							<label>No KTP</label>
							<input type = "number" class = "form-control" name = "no_ktp" required = "required"/>
						</div>
						<div class = "form-group">
							<label>No HP</label>
							<input type = "number" class = "form-control" name = "no_hp" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Email</label>
							<input type = "email" class = "form-control" name = "email" required = "required"/>
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_tambah_admin" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2024 </label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
</html>