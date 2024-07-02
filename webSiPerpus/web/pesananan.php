<!DOCTYPE html>
<?php

	include_once "cekSesi.php";
	include "konekDB.php";
	
?>
<html lang = "en">
	<head>
		<title>Pinjam Buku</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style="background-color:rgba(0, 0, 0, 0.1);" class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">PT. Pustaka Indonesia</a>
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
				<?php
					
					$qBuku  = "SELECT b.id_buku as id_buku, b.id_kategori as id_kategori, kb.nama_kategori as nama_kategori, b.judul as judul_buku, b.pengarang as pengarang, b.penerbit as nama_penerbit, b.sinopsis as sinopsis, b.ISBN as ISBN, b.tahun_terbit as tahun_terbit, b.jumlah_buku_tersedia as jumlah_buku_avai, b.foto as foto, b.status as status FROM buku b INNER JOIN kategori_buku kb ON b.id_kategori = kb.id_kategori ORDER BY b.tahun_terbit ASC";
					$qHasil = mysqli_query($KoneksiDB, $qBuku);
					while($fetch = mysqli_fetch_array($qHasil, MYSQLI_ASSOC))
					{
						$fotoEncode = base64_encode($fetch['foto']);
				?>
						<div class = "book-container well">
							<div class="book-image">
									<img src="data:image/jpeg;base64,<?php print($fotoEncode); ?>" height="150" width="150" />
							</div>
							<div class="book-details">
								<h3>
									<?php print("Judul Buku:".$fetch['judul_buku']);?>
								</h3>
								<?php 
									$arrayData = [
										"Kategori" => $fetch['nama_kategori'],
										"Pengarang" => $fetch['pengarang'],
										"Penerbit" => $fetch['nama_penerbit'],
										"Tentang buku" => $fetch['sinopsis'],
										"ISBN" => $fetch['ISBN'],
										"Tahun" => $fetch['tahun_terbit'],
										"Jumlah ketersediaan" => $fetch['jumlah_buku_avai'],
										"Status" => $fetch['status']
									];
									
									foreach ($arrayData as $namaKolom => $isi) 
									{
										if ($namaKolom == "Jumlah Ketersediaan") 
										{
											print("<h4 style='color:#158750;'>$namaKolom: $isi</h4>");
											continue;
										}
										print("<h4 style='color:#0D192A;'>$namaKolom: $isi</h4>");
									}
								?>
								<br/>
								<div class="book-action">
									<a href = "pinjaman_form.php?id_buku=<?php print($fetch['id_buku']);?>" class = "btn btn-info">
										<i class = "glyphicon glyphicon-list"></i> 
										Pinjam
									</a>
								</div>
							</div>
						</div>
				<?php
					}
				?>
			</div>
		</div>
	</div>
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2024 </label>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>