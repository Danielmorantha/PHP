<?php
	require_once 'connect.php';
	if(ISSET($_POST['tombol_ubah_kamar'])){
		$tipe_kamar 	= $_POST['tipe_kamar'];
		$harga 			= $_POST['harga'];
		$photo 			= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name 	= addslashes($_FILES['photo']['name']);
		$photo_size 	= getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("UPDATE `room` SET `tipe_kamar` = '$tipe_kamar', `harga` = '$harga', `foto` = '$photo_name' WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
		header("location:kamar.php");
	}
?>