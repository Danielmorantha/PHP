<?php
	if(ISSET($_POST['tombol_tambah_kamar'])){
		$tipe_kamar = $_POST['tipe_kamar'];
		$harga 		= $_POST['harga'];
		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);
		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("INSERT INTO `room` (tipe_kamar, harga, foto) VALUES('$tipe_kamar', '$harga', '$photo_name')") or die(mysqli_error());
		header("location:kamar.php");
	}
?>