<!DOCTYPE html>
<?php

include_once "cekSesi.php";
include "konekDB.php";

?>

<html lang = "en">
	<head>
		<title>Halaman Peminjaman Buku</title>
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
	<li><a href = "index.php">Beranda</a></li> |			
		<li><a href = "pesananan.php">Halaman Peminjaman Buku</a></li>
	</ul>
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Halaman Peminjaman Buku</h3></strong>
				<br />
				<div class = "col-md-4"></div>
				<div class = "well col-md-4">
					<?php
					$qPinjam		= "SELECT id_pinjam FROM pinjam_buku";
					$qPinjamHasil	= mysqli_query($KoneksiDB, $qPinjam);
					$fetch 			= mysqli_fetch_array($qPinjamHasil, MYSQLI_ASSOC);
					?>
					<center>
						<h3>
							Data anda sudah dicatat dan 
							harap diingat kode pinjam adalah <?php print($fetch['id_pinjam']."\n");?>
							. kode pinjam digunakan saat pengembalian buku
						</h3>
					</center>
					<br />
					<center>
						<h4>Terima Kasih!</h4>
					</center>
					<br />
					<center><a href = "pesananan.php" class = "btn btn-success"><i class = "glphyicon glyphicon-check"></i> Tutup</a></center>
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