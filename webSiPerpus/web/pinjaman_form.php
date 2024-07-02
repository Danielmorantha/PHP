<!DOCTYPE html>

<?php
include "konekDB.php";
include_once "cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>Halamanan Peminjam buku</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
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
	<ul id = "menu">
	<li><a href = "index.php">Beranda</a></li>			
		<li><a href = "pesananan.php">Pesan Sekarang</a></li>

	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Rincian Peminjam</h3></strong>
				<br />
				<?php 
					$qBuku		= "SELECT * FROM buku, pengguna WHERE id_buku = '$_REQUEST[id_buku]' AND id_pengguna = '$id_pengguna'";
					$qHasilReq	= mysqli_query($KoneksiDB, $qBuku);
					$fetch 		= mysqli_fetch_array($qHasilReq, MYSQLI_ASSOC);
					$fotoEncode = base64_encode($fetch['foto']);
				?>
				<div style = "height:300px; width:800px;">
					<div style = "float:left;">
						<img src="data:image/jpeg;base64,<?php print($fotoEncode); ?>" height = "200px" width = "300px">
					</div>
				</div>
				<br style = "clear:both;" />
				<div class = "well col-md-4">
					<form method = "POST" enctype = "multipart/form-data" action="pinjaman_buku_db.php?id_buku=<?php print($fetch['id_buku']);?>">
						<div class = "form-group">
							<label>id pengguna</label>
							<input type = "text" value="<?php print($fetch['id_pengguna'])?>" class = "form-control" name = "id_pengguna" disabled />
						</div>
						<div class = "form-group">
							<label>id buku</label>
							<input type = "text" value="<?php print($fetch['id_buku'])?>" class = "form-control" name = "id_buku" disabled />
						</div>
						<div class = "form-group">
							<label>Nama pengguna</label>
							<input type = "text" value="<?php print($fetch['nama_pengguna'])?>" class = "form-control" name = "nama_pengguna" disabled />
						</div>
						<div class = "form-group">
							<label>alamat</label>
							<input type = "text" value="<?php print($fetch['alamat'])?>" class = "form-control" name = "alamat" disabled />
						</div>
						<div class = "form-group">
							<label>no_hp</label>
							<input type = "text" value="<?php print($fetch['no_hp'])?>" class = "form-control" name = "no_hp" disabled />
						</div>
						<div class = "form-group">
							<label>email</label>
							<input type = "text" value="<?php print($fetch['email'])?>" class = "form-control" name = "email" disabled />
						</div>
						<div class = "form-group">
							<label>Tanggal Pinjaman</label>
							<input type = "date" class = "form-control" name = "date" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button class = "btn btn-info form-control" name = "tombol_pinjam"><i class = "glyphicon glyphicon-save"></i> Pinjam</button>
						</div>
					</form>
				</div>
				<div class = "col-md-4"></div>
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