<?php
	if(ISSET($_POST['tombol_tambah_admin'])){
		$nama 		= $_POST['nama'];
		$nama_akun	= $_POST['nama_akun'];
		$kata_sandi	= $_POST['kata_sandi'];
		$query = $conn->query("SELECT * FROM `admin` WHERE `nama_akun` = '$nama_akun'") or die(mysqli_error());
		$valid = $conn->num_rows;
		if($valid > 0){
			echo "<center><label style = 'color:red;'>Ulangi, Akun admin sudah ada</center></label>";
		}else{
			$conn->query("INSERT INTO `admin` (nama, nama_akun, kata_sandi) VALUES('$nama', '$nama_akun', '$kata_sandi')") or die(mysqli_error());
			header("location:akun.php");
		}
	}
?>