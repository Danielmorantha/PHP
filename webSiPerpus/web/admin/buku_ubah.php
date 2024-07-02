<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>halaman ubah buku</title>
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
				<div class = "alert alert-info">Ubah Buku</div>
				<br />
				<div class = "col-md-4">
					<?php 
						$qDataBuku = "SELECT b.id_buku as id_buku, b.id_kategori as id_kategori, kb.nama_kategori as nama_kategori, b.judul as judul, b.pengarang as pengarang, b.penerbit as penerbit, b.sinopsis as sinopsis, b.ISBN as ISBN, b.tahun_terbit as tahun_terbit, b.jumlah_buku_tersedia as jumlah_buku_tersedia, b.foto as foto, b.status as status FROM buku b INNER JOIN kategori_buku kb ON b.id_kategori = kb.id_kategori WHERE b.id_buku = $_REQUEST[id_buku]";
						$qDataBukuHasil = mysqli_query($KoneksiDB, $qDataBuku);
						$fetch = mysqli_fetch_array($qDataBukuHasil, MYSQLI_ASSOC);
						$fotoEncode = base64_encode($fetch['foto']);
					?>
					<form method = "POST" enctype = "multipart/form-data" action="buku_ubah_db.php?id_buku=<?php echo $fetch['id_buku'];?>">
						<div class = "form-group">
							<label>Judul</label>
							<input type = "text" class = "form-control" name = "judul" value="<?php print($fetch['judul']);?>"/>
						</div>
						<div class = "form-group">
							<label>Foto </label>
							<div id = "preview" style = "width:200px; height :200px; border:1px solid #000;">
								<img src="data:image/jpeg;base64,<?php print($fotoEncode); ?>" height = "200px" width = "300px">
							</div>
							<input type = "file"  id = "foto" name = "foto" />
						</div>
						<div class = "form-group">
							<label>Pengarang</label>
							<input type = "text" class = "form-control" name = "pengarang" value="<?php print($fetch['pengarang']);?>"/>
						</div>
						<div class = "form-group">
							<label>Penerbit</label>
							<input type = "text" class = "form-control" name = "penerbit" value="<?php print($fetch['penerbit']);?>"/>
						</div>
						<div class = "form-group">
							<label>Sinopsis</label>
							<input type = "text" class = "form-control" name = "sinopsis" value="<?php print($fetch['sinopsis']);?>"/>
						</div>
						<div class = "form-group">
							<label>ISBN</label>
							<input type = "text" class = "form-control" name = "ISBN" value="<?php print($fetch['ISBN']);?>"/>
						</div>
						<div class = "form-group">
							<label>Tahun Terbit</label>
							<input type = "text" class = "form-control" name = "tahun_terbit" value="<?php print($fetch['tahun_terbit']);?>"/>
						</div>
						<div class = "form-group">
							<label>Jumlah Buku Tersedia</label>
							<input type = "text" class = "form-control" name = "jumlah_buku_tersedia" value="<?php print($fetch['jumlah_buku_tersedia']);?>"/>
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_ubah_buku" class = "btn btn-warning form-control"><i class = "glyphicon glyphicon-edit"></i> Simpan Perubahan</button>
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
<script type = "text/javascript">
	$(document).ready(function(){
		$pic = $('<img id = "image" width = "100%" height = "100%"/>');
		$lbl = $('<center id = "lbl">[Upload]</center>');
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