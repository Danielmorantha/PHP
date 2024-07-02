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
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Judul</th>
							<th>Nama Peminjam</th>
							<th>Tanggal Pinjam</th>
							<th>Tanggal Dikembalikan</th>
							<th>Tanggal Jatuh Tempo</th>
							<th>Denda</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$qBuku  = "SELECT * FROM pinjam_buku pb INNER JOIN buku b ON pb.id_buku = b.id_buku INNER JOIN pengguna p ON pb.id_pengguna = p.id_pengguna GROUP BY pb.id_pinjam";
						$qHasil = mysqli_query($KoneksiDB, $qBuku);
						while($fetch = mysqli_fetch_array($qHasil, MYSQLI_ASSOC))
						{
							$fotoEncode = base64_encode($fetch['foto']);
					?>	
						<tr>
							<td>
								<center>
									<img src="data:image/jpeg;base64,<?php print($fotoEncode); ?>" height="150" width="150" />
								</center>
							</td>
							<td><?php print($fetch['judul']); ?></td>
							<td><?php print($fetch['nama_pengguna']); ?></td>
							<td><?php print($fetch['tanggal_pinjam']); ?></td>
							<td><?php print($fetch['tanggal_dikembalikan']); ?></td>
							<td><?php print($fetch['tanggal_jatuh_tempo']); ?></td>
							<td><?php print("Rp. ".number_format($fetch['denda'], 0, ",", ".")); ?></td>
							<td>
								<center>
									<a class = "btn btn-warning" href = "PeminjamBuku_ubah.php?id_pinjam=<?php print($fetch['id_pinjam']);?>">
										<i class = "glyphicon glyphicon-edit"></i> Ubah
									</a> 
									<a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "PeminjamBuku_hapus_db.php?id_pinjam=<?php print($fetch['id_pinjam']);?>">
										<i class = "glyphicon glyphicon-remove"></i> Hapus
									</a>
								</center>
							</td>
						</tr>
					<?php
						}
					?>	
					</tbody>
				</table>
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
<script src = "../js/jquery.dataTables.js"></script>
<script src = "../js/dataTables.bootstrap.js"></script>	
<script type = "text/javascript">
	function confirmationDelete(anchor){
		var conf = confirm("Apakah anda yakin ingin menghapus?");
		if(conf){
			window.location = anchor.attr("href");
		}
	} 
</script>

<script type = "text/javascript">
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
</html>