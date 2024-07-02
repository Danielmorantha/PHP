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
				<div class = "alert alert-info">Halaman tambah buku</div>
				<a class = "btn btn-success" href = "buku_tambah.php"><i class = "glyphicon glyphicon-plus"></i> Tambah Buku</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Judul</th>
							<th>Kategori</th>
							<th>Pengarang</th>
							<th>Penerbit</th>
							<th>Sinopsis</th>
							<th>ISBN</th>
							<th>Tahun Terbit</th>
							<th>Jumlah Buku Tersedia</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
					<?php
						$qBuku  = "SELECT b.id_buku as id_buku, b.id_kategori as id_kategori, kb.nama_kategori as nama_kategori, b.judul as judul_buku, b.pengarang as pengarang, b.penerbit as nama_penerbit, b.sinopsis as sinopsis, b.ISBN as ISBN, b.tahun_terbit as tahun_terbit, b.jumlah_buku_tersedia as jumlah_buku_avai, b.foto as foto, b.status as status FROM buku b INNER JOIN kategori_buku kb ON b.id_kategori = kb.id_kategori ORDER BY b.tahun_terbit DESC";
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
							<td><?php echo $fetch['judul_buku']; ?></td>
							<td><?php echo $fetch['nama_kategori']; ?></td>
							<td><?php echo $fetch['pengarang']; ?></td>
							<td><?php echo $fetch['nama_penerbit']; ?></td>
							<td><?php echo $fetch['sinopsis']; ?></td>
							<td><?php echo $fetch['ISBN']; ?></td>
							<td><?php echo $fetch['tahun_terbit']; ?></td>
							<td><?php echo $fetch['jumlah_buku_avai']; ?></td>
							<td><?php echo $fetch['status']; ?></td>
							<td>
								<center>
									<a class = "btn btn-warning" href = "buku_ubah.php?id_buku=<?php print($fetch['id_buku']);?>">
										<i class = "glyphicon glyphicon-edit"></i> Ubah
									</a> 
									<a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "buku_hapus.php?id_buku=<?php print($fetch['id_buku']);?>">
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