<!DOCTYPE html>
<?php require_once "connect.php"?>
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
		</div>
	</nav>
	<div class = "container">
		<br />
		<br />
		<div class = "col-md-4"></div>
		<div class = "col-md-4">
			<div class = "panel panel-danger">
				<div class = "panel-heading">
					<h4>Administrator</h4>
				</div>
				<div class = "panel-body">
					<form method = "POST">
						<div class = "form-group">
							<label>Nama Akun</label>
							<input type = "text" name = "nama_akun" class = "form-control" required = "required" />
						</div>
						<div class = "form-group">
							<label>Kata Sandi</label>
							<input type = "password" name = "kata_sandi" class = "form-control" required = "required" />
						</div>
						<br />
						<div class = "form-group">
							<button name = "tombol_login" class = "form-control btn btn-primary"><i class = "glyphicon glyphicon-log-in"> Login</i></button>
						</div>
					</form>
					<?php require_once 'login.php'?>
				</div>
			</div>
		</div>
		<div class = "col-md-4"></div>
	</div>	
	<br />
	<br />
	<div style = "text-align:right; margin-right:10px;" class = "navbar navbar-default navbar-fixed-bottom">
		<label>&copy; Copyright Morantha 2021 </label>
	</div>
</body>
<script src = "../js/jquery.js"></script>
<script src = "../js/bootstrap.js"></script>	
</html>