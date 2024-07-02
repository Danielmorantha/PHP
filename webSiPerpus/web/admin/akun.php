<!DOCTYPE html>
<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
?>
<html lang = "en">
	<head>
		<title>Akun</title>
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
				<div class = "alert alert-info">Akun</div>
				<a class = "btn btn-success" href = "akun_tambah.php"><i class = "glyphicon glyphicon-plus"></i> Tambah Akun</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>username</th>
							<th>kata sandi</th>
							<th>nama pengguna</th>
							<th>alamat</th>
							<th>no ktp</th>
							<th>no hp</th>
							<th>email</th>
							<th>nama level pengguna</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$qAkun = "SELECT * FROM pengguna p INNER JOIN level_pengguna lvl ON p.id_level = lvl.id_level";
							$qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
							while($fetch = mysqli_fetch_array($qAkunHasil, MYSQLI_ASSOC)){
						?>
						<tr>
							<td><?php print($fetch['nama_akun']);?></td>
							<td><?php print( md5($fetch['kata_sandi']) );?></td>
							<td><?php print($fetch['nama_pengguna']);?></td>
							<td><?php print($fetch['alamat']);?></td>
							<td><?php print($fetch['no_ktp']);?></td>
							<td><?php print($fetch['no_hp']);?></td>
							<td><?php print($fetch['email']);?></td>
							<td><?php print($fetch['nama_level']);?></td>
							
							<td>
								<center>
								<a class = "btn btn-warning" href = "akun_ubah.php?id_pengguna=<?php echo $fetch['id_pengguna']?>"><i class = "glyphicon glyphicon-edit"></i> Ubah</a> 
								<a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "akun_hapus.php?id_pengguna=<?php echo $fetch['id_pengguna']?>"><i class = "glyphicon glyphicon-remove"></i> Hapus</a>
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
		<label>&copy; Copyright Morantha 2024 </label>
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