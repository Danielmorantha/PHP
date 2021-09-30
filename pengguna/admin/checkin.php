<!DOCTYPE html>
<?php
	require_once 'cek_session.php';
	require 'nama_admin.php';
?>
<html lang = "eng">
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
						<li><a href="logout.php"><i class = "glyphicon glyphicon-off"></i> Keluar</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
	<div class = "container-fluid">	
		<ul class = "nav nav-pills">
			<li><a href = "beranda.php">Beranda</a></li>
			<li><a href = "akun.php">Akun</a></li>
			<li class = "active"><a href = "pesanan.php">Pesanan</a></li>
			<li><a href = "kamar.php">Kamar</a></li>			
		</ul>	
	</div>
	<br />
	<div class = "container-fluid">	
		<div class = "panel panel-default">
			<?php
				$q_p = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
				$f_p = $q_p->fetch_array();
				$q_ci = $conn->query("SELECT COUNT(*) as total FROM `transaction` WHERE `status` = 'Check In'") or die(mysqli_error());
				$f_ci = $q_ci->fetch_array();
			?>
			<div class = "panel-body">
				<a class = "btn btn-success" href = "pesanan.php"><span class = "badge"><?php echo $f_p['total']?></span> Pendings</a>
				<a class = "btn btn-info disabled"><span class = "badge"><?php echo $f_ci['total']?></span> Check In</a>
				<a class = "btn btn-warning" href = "checkout.php"><i class = "glyphicon glyphicon-eye-open"></i> Check Out</a>
				<br />
				<br />
				<table id = "table" class = "table table-bordered">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Tipe Kamar</th>
							<th>Nomor Kamar</th>
							<th>Check In</th>
							<th>Lama Menginap</th>
							<th>Check Out</th>
							<th>Status</th>
							<th>Extra Bed</th>
							<th>Total Bayar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check In'") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['nama_depan']." ".$fetch['nama_belakang']?></td>
							<td><?php echo $fetch['tipe_kamar']?></td>
							<td><?php echo $fetch['nomor_kamar']?></td>
							<td><?php echo "<label style = 'color:#00ff00;'>".date("d M Y", strtotime($fetch['checkin']))."</label>"." jam "."<label>".date("H:i:s", strtotime($fetch['waktu_checkin']))."</label>"?></td>
							<td><?php echo $fetch['lama_menginap']?> Hari</td>
							<td><?php echo "<label style = 'color:#ff0000;'>".date("d M Y", strtotime($fetch['checkin']."+".$fetch['lama_menginap']."days"))."</label>"?></td>
							<td><?php echo $fetch['status']?></td>
							<td><?php if($fetch['extra_bed'] == "0"){ echo "Tidak Pakai";}else{echo $fetch['extra_bed'];}?></td>
							<td><?php echo "Rp. ".number_format($fetch['tagihan'], 0, ",", ".")?></td>
							<td><center><a class = "btn btn-warning" href = "checkout_query.php?transaction_id=<?php echo $fetch['transaction_id']?>" onclick = "confirmationCheckin(); return false;"><i class = "glyphicon glyphicon-check"></i> Check Out</a></center></td>
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
	$(document).ready(function(){
		$("#table").DataTable();
	});
</script>
<script type = "text/javascript">
	function confirmationCheckin(anchor){
		var conf = confirm("Apakah anda yakin ingin checkout?");
		if(conf){
			window.location = anchor.attr("href");
		}
	}
</script>
</html>