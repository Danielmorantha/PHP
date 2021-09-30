<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>Morantha Hotel</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1.0" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "css/style.css" />
	</head>
<body>
	<nav style = "background-color:rgba(0, 0, 0, 0.1);" class = "navbar navbar-default">
		<div  class = "container-fluid">
			<div class = "navbar-header">
				<a class = "navbar-brand" >Morantha Hotel</a>
			</div>
		</div>
	</nav>	
	<ul id = "menu">
	<li><a href = "index.php">Beranda</a></li> |
		<li><a href = "tentang_kami.php">Tentang Kami</a></li> |
		<li><a href = "hubungi_kami.php">Hubungi Kami</a></li> |
		<li><a href = "fasilitas_kami.php">Fasilitas Kami</a></li> |
		<li><a href = "hidangan_kami.php">Hidangan kami</a></li> |			
		<li><a href = "pesananan.php">Pesan Sekarang</a></li> |
		<li><a href = "aturan_kami.php">Aturan Kami</a></li>
	</ul>
	<div style = "margin-left:0;" class = "container">
		<div class = "panel panel-default">
			<div class = "panel-body">
				<strong><h3>Buat Pesanan</h3></strong>
				<?php
					require_once 'admin/connect.php';
					$query = $conn->query("SELECT * FROM `room` ORDER BY `harga` ASC") or die(mysqli_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<img src = "photo/<?php echo $fetch['foto']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3><?php echo $fetch['tipe_kamar']?></h3>
							<h4 style = "color:#00ff00;"><?php echo "Harga: Rp. " .number_format($fetch['harga'], 0, ",", ".")?></h4>
							<br /><br /><br /><br /><br /><br />
							<a style = "margin-left:580px;" href = "pesananan_form.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i> Pesan</a>
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
		<label>&copy; Copyright Morantha 2021 </label>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>