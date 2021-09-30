<?php
	if(ISSET ($_POST['tombol_login'])){
		$nama_akun 	= $_POST['nama_akun'];
		$kata_sandi = $_POST['kata_sandi'];
		$query = $conn->query("SELECT * FROM `admin` WHERE `nama_akun` = '$nama_akun' && `kata_sandi` = '$kata_sandi'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$row = $query->num_rows;
		
		if($row > 0){
			session_start();
			$_SESSION['admin_id'] = $fetch['admin_id'];
			header('location:beranda.php');
		}else{
			echo "<center><labe style = 'color:red;'>Ulangi, Nama Akun dan Kata Sandi salah</label></center>";
		}
	}
?>