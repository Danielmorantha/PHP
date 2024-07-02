<?php
	include "../konekDB.php";
	if(ISSET($_POST['tombol_tambah_admin'])){
		$idLevel		= $_POST['id_level'];
		$namaAkun 		= $_POST['nama_akun'];
		$kataSandi		= $_POST['kata_sandi'];
		$namaPengguna	= $_POST['nama_pengguna'];
		$alamat			= $_POST['alamat'];
		$noKtp			= $_POST['no_ktp'];
		$noHp			= $_POST['no_hp'];
		$email			= $_POST['email'];
		$qPengguna = "SELECT * FROM pengguna WHERE nama_akun = '$namaAkun'";
		$qHasilPengguna = mysqli_query($KoneksiDB, $qPengguna);
		if(mysqli_num_rows($qHasilPengguna)>0){
			echo "<center><label style = 'color:red;'>Ulangi, Akun sudah ada</center></label>";
		}else{
			$qInputAkun = "INSERT INTO pengguna (id_level, nama_akun, kata_sandi, nama_pengguna, alamat, no_ktp, no_hp, email) VALUES ($idLevel,'$namaAkun', '$kataSandi', '$namaPengguna', '$alamat', '$noKtp', '$noHp', '$email')";
			$qHasilInputAkun = mysqli_query($KoneksiDB, $qInputAkun);
			mysqli_commit($KoneksiDB);
			header("location:akun.php");
		}
	}
?>