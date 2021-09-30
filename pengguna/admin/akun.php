<!DOCTYPE html>
<?php
	require_once 'cek_session.php';
	require 'nama_admin.php';
?>
<html lang = "en">
	<head>
		<title>Morantha Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Morantha Hotel</a>
			</div>
			<ul class = "nav navbar-nav pull-right ">
				<li class = "dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class = "glyphicon glyphicon-user"></i> <?php echo $name;?></a>
					<ul class="dropdown-menu">
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li><a href = "beranda.php">Beranda</a></li>
			<li class = "active"><a href = "akun.php">Akun</a></li>
			<li><a href = "pesanan.php">Pesanan</a></li>
			<li><a href = "kamar.php">Kamar</a></li>			
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<div class = "alert alert-info">Akun Admin</div>
				<a class = "btn btn-success" href = "akun_tambah_akun.php"><i class = "glyphicon glyphicon-plus"></i> Tambah Akun</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Nama Akun</th>
							<th>Kata Sandi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php  
							$query = $conn->query("SELECT * FROM `admin`") or die(mysqli_error());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['nama']?></td>
							<td><?php echo $fetch['nama_akun']?></td>
							<td><?php echo md5($fetch['kata_sandi'])?></td>
							<td><center><a class = "btn btn-warning" href = "akun_ubah_akun.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-edit"></i> Ubah</a> <a class = "btn btn-danger" onclick = "confirmationDelete(this); return false;" href = "akun_hapus_akun.php?admin_id=<?php echo $fetch['admin_id']?>"><i class = "glyphicon glyphicon-remove"></i> Hapus</a></center></td>
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