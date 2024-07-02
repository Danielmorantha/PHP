<!DOCTYPE html>
<html lang = "en">
	<head>
		<title>LMS | Registrasi Anggota</title>
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
		</div>
	</nav>
	<div class = "container">
		<br />
		<br />
		<div class = "col-md-4"></div>
		<div class = "col-md-4">
			<div class = "panel panel-danger">
				<div class = "panel-heading">
					<h4>Registrasi Anggota</h4>
				</div>
                <!-- form yang dibutuhkan id_level, Nama, Alamat, No KTP,No Hp, Email -->
				<div class = "panel-body">
					<form method = "POST" action="regis_anggota_db.php">
                        <div class = "form-group">
							<label>Nama Akun</label>
							<input type = "text" placeholder="id buat login" name = "nama_akun" class = "form-control" required = "required" />
						</div>
                        <div class = "form-group">
							<label>Kata Sandi</label>
							<input type = "password" name = "kata_sandi" class = "form-control" required = "required" />
						</div>
						<div class = "form-group">
							<label>Nama Pengguna</label>
							<input type = "text" placeholder="Nama anda" name = "nama_pengguna" class = "form-control" required = "required" />
						</div>
						<div class = "form-group">
							<label>Alamat</label>
							<input type = "text" placeholder="alamat anda" name = "alamat" class = "form-control" required = "required" />
						</div>
                        <div class = "form-group">
							<label>No KTP</label>
							<input type = "number" placeholder="no ktp anda" name = "no_ktp" class = "form-control" required = "required" />
						</div>
                        <div class = "form-group">
							<label>No HP</label>
							<input type = "number" placeholder="no hp anda" name = "no_hp" class = "form-control" required = "required" />
						</div>
                        <div class = "form-group">
							<label>Email</label>
							<input type = "email" placeholder="email anda" name = "email" class = "form-control" required = "required" />
						</div>
						<div class="form-group">
							sudah regis? <a href="index.php">klik login</a>
						</div>
						<div class = "form-group">
							<button name = "tombol_login_regis" class = "form-control btn btn-primary"><i class = "glyphicon glyphicon-log-in"> Registrasi</i></button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class = "col-md-4"></div>
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