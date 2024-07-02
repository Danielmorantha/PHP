<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
	if(ISSET($_POST['tombol_ubah_akun_admin'])){
		$nama_akun 		= $_POST['nama_akun'];
		$kata_sandi 	= $_POST['kata_sandi'];
		$qAkun = "UPDATE pengguna SET nama_akun = '$nama_akun', kata_sandi = '$kata_sandi' WHERE id_pengguna = $_REQUEST[id_pengguna]";
		$qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
		mysqli_commit($KoneksiDB);
		header("location:akun.php");
	}	