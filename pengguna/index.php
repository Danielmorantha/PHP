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
	<div id="myCarousel" class="carousel slide container-fluid" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
			<li data-target="#myCarousel" data-slide-to="4"></li>
			<li data-target="#myCarousel" data-slide-to="5"></li>
			<li data-target="#myCarousel" data-slide-to="6"></li>
		</ol>
		<div style = "margin:auto;" class="carousel-inner" role="listbox">
			<div class="item active">
				<img src="Foto/a.jpg" style = "width:100%; height:450px;" />
			</div>
		
			<div class="item">
				<img src="Foto/b.jpg" style = "width:100%; height:450px;"  />
			</div>
		
			<div class="item">
				<img src="Foto/c.jpg" style = "width:100%; height:450px;" />
			</div>
		
			<div class="item">
				<img src="Foto/d.jpg" style = "width:100%; height:450px;" />
			</div>
			
			<div class="item">
				<img src="Foto/e.jpg" style = "width:100%; height:450px;" />
			</div>
			
			<div class="item">
				<img src="Foto/f.jpeg" style = "width:100%; height:450px;" />
			</div>
			
			<div class="item">
				<img src="Foto/g.png" style = "width:100%; height:450px;" />
			</div>
			
			
		</div>
		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>	
	</div>
	<br />
	<br />

	<strong><h3>Kamar Kami</h3></strong>
	<?php

	require_once 'admin/connect.php';
	$query = $conn->query("SELECT * FROM `room` ORDER BY `harga` ASC") or die(mysqli_error());
	$fetch = $query->fetch_array();

	?>
	<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/1.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Standard</h4></center>
					<center><label>Small Size Bed</label> <label style = "color:red;">Rp. 1,000,000</label></center>
				</div>
				<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/2.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Extra Bed</h4></center>
					<center><label style = "color:red;">Rp. 3,000,000</label></center>
				</div>
				<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/3.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Superior</h4></center>
					<center><label>1 Medium Size Bed</label> <label style = "color:red;">Rp. 4,000,000</label></center>
				</div>
				<br style = "clear:both;"/>
				<br />
				<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/4.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Super Deluxe</h4></center>
					<center><label>2 Medium Size Bed</label> <label style = "color:red;">Rp. 5,000,000 </label></center>
				</div>
				<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/5.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Jr. Suite</h4></center>
					<center><label>Matrimonial</label> <label style = "color:red;">Rp. 1,200,000 </label></center>
				</div>
				<div style = "float:left; margin-left:40px; width:300px; height:300px; ">
					<center><img src = "Foto/6.jpg" width = "250px" height = "250px"  style = "margin-top:5px;"/></center>
					<center><h4 style = "color:rgba(0, 255, 0, 1);">Executive Suite</h4></center>
					<center><label>Matrimonial</label> <label style = "color:red;">Rp. 6,000,000 </label></center>
				</div>
				<br style = "clear:both;"/>
				<br />
				<br />

	<?php echo "</br>";
		echo "</br>";
	?>

	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2021 </label>
	</div>
</body>
<script src = "js/jquery.js"></script>
<script src = "js/bootstrap.js"></script>	
</html>