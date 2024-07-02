<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>halaman tambah buku</title>
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
			<li><a href = "PeminjamBuku.php">Peminjaman Buku</a></li>
			<li class = "active"><a href = "buku.php">Tambah Buku</a></li>	
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<?php 
					$qDataBuku = "SELECT * FROM buku b INNER JOIN kategori_buku kb ON b.id_kategori = kb.id_kategori GROUP BY kb.nama_kategori";
					$qDataBukuHasil = mysqli_query($KoneksiDB, $qDataBuku);
					$pIdKat = [];
					$pJenisStatus = [];
					if (mysqli_num_rows($qDataBukuHasil)>0) {
						while ($baris = mysqli_fetch_array($qDataBukuHasil, MYSQLI_ASSOC) ) {
							$pIdKat[] 		= $baris;
							$pJenisStatus[] = $baris;
						}
					}
				
				?>
				<div class = "alert alert-info">Tambah Buku</div>
				<br />
				<div class = "col-md-4">	
					<form method = "POST" enctype = "multipart/form-data" action="buku_tambah_db.php">
						<div class = "form-group">
							<label>Nama Kategori </label>
								<select name="id_kategori" id="id_kategori" required>
									<?php 
										foreach ($pIdKat as $idKategori) 
										{ 
									?>								
											<option value="<?php print($idKategori['id_kategori']);?>"><?php print($idKategori['nama_kategori']); ?></option>
									<?php
										}
									?>
								</select>
						</div>
						<div class = "form-group">
							<label>Judul</label>
							<input type = "text" class = "form-control" name = "judul" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Foto Buku</label>
							<div id = "preview" style = "width:150px; height :150px; border:1px solid #000;">
								<center id = "lbl">
									[unggah]
								</center>
							</div>
							<input type = "file" id = "foto" name = "foto" />
						</div>
						<div class = "form-group">
							<label>Pengarang</label>
							<input type = "text" class = "form-control" name = "pengarang" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Penerbit</label>
							<input type = "text" class = "form-control" name = "penerbit" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Sinopsis</label>
							<input type = "text" class = "form-control" name = "sinopsis" required = "required"/>
						</div>
						<div class = "form-group">
							<label>ISBN</label>
							<input type = "text" class = "form-control" name = "ISBN" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Tahun Terbit</label>
							<input type = "text" class = "form-control" name = "tahun_terbit" required = "required"/>
						</div>
						<div class = "form-group">
							<label>Jumlah Buku Tersedia</label>
							<input type = "text" class = "form-control" name = "jumlah_buku_tersedia" required = "required"/>
						</div>
						<div class = "form-group">
							<label>status</label>
								<select name="status" id="status" required>
									<?php 
										foreach ($pJenisStatus as $JenisStatus) 
										{ 
									?>								
											<option value="<?php print($JenisStatus['status']);?>"><?php print($JenisStatus['status']); ?></option>
									<?php
										}
									?>
								</select>
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_tambah_buku" class = "btn btn-info form-control"><i class = "glyphicon glyphicon-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2024</label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Photo]</center>');
		$("#photo").change(function(){
			$("#lbl").remove();
			var files = !!this.files ? this.files : [];
			if(!files.length || !window.FileReader){
				$("#image").remove();
				$lbl.appendTo("#preview");
			}
			if(/^image/.test(files[0].type)){
				var reader = new FileReader();
				reader.readAsDataURL(files[0]);
				reader.onloadend = function(){
					$pic.appendTo("#preview");
					$("#image").attr("src", this.result);
				}
			}
		});
	});
</script>
</html>