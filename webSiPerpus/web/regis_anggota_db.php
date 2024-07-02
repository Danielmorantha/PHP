<?php

include "konekDB.php";


	if(isset($_POST['tombol_login_regis'])){
		$nama_akun		= $_POST['nama_akun'];
		$kata_sandi		= $_POST['kata_sandi'];
		$nama_pengguna	= $_POST['nama_pengguna'];
		$alamat			= $_POST['alamat'];
		$no_ktp			= $_POST['no_ktp'];
		$no_hp			= $_POST['no_hp'];
		$email			= $_POST['email'];
		$qCekAkun = "SELECT * FROM `pengguna` WHERE `nama_akun` = '$nama_akun'";
		$hasil	  = mysqli_query($KoneksiDB, $qCekAkun);
		if(mysqli_num_rows($hasil) > 0){
			echo "<center><label style = 'color:red;'>Ulangi, Akun admin sudah ada</center></label>";
		}else{
			$KoneksiDB->query("INSERT INTO `pengguna` (id_level, nama_akun, kata_sandi, nama_pengguna, alamat, no_ktp, no_hp, email) VALUES(2, '$nama_akun', '$kata_sandi', '$nama_pengguna', '$alamat', '$no_ktp', '$no_hp', '$email')") or die(mysqli_error());
			header("location:index.php");
		}
	}
?>