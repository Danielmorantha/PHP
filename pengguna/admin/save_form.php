<?php
	require_once 'connect.php';
	if(ISSET($_POST['tombol_kirim'])){
		$nomor_kamar 	= $_POST['nomor_kamar'];
		$days 			= $_POST['days'];
		$kasur_besar 	= $_POST['kasur_besar'];
		$query = $conn->query("SELECT * FROM `transaction` WHERE `nomor_kamar` = '$nomor_kamar' && `status` = 'Check In'") or die(mysqli_error());
		$row = $query->num_rows;
		$time = date("H:i:s", strtotime("+8 HOURS"));
		if($row > 0){
			echo "<script>alert('Kamar Tidak tersedia')</script>";
		}else{
			$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$total = $fetch2['harga'] * $days;
			$total2 = 50000 * $kasur_besar;
			$total3 = $total + $total2;
			$checkout = date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
			$conn->query("UPDATE `transaction` SET `nomor_kamar` = '$nomor_kamar', `lama_menginap` = '$days', `extra_bed` = '$kasur_besar', `status` = 'Check In', `waktu_checkin` = '$time', `checkout` = '$checkout', `tagihan` = '$total3' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			header("location:checkin.php");
		}
	}
?>