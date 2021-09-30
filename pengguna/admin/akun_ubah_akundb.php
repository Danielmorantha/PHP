<?php
	require_once 'connect.php';
	if(ISSET($_POST['tombol_ubah_akun_admin'])){
		$nama 		= $_POST['nama'];
		$nama_akun 	= $_POST['nama_akun'];
		$kata_sandi = $_POST['kata_sandi'];
		$conn->query("UPDATE `admin` SET `nama` = '$nama', `nama_akun` = '$nama_akun', `kata_sandi` = '$kata_sandi' WHERE `admin_id` = '$_REQUEST[admin_id]'") or die(mysqli_error());
		header("location:akun.php");
	}	