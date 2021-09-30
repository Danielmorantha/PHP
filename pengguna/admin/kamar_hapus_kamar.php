<?php
	require_once 'connect.php';
	$conn->query("DELETE FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysqli_error());
	header("location:kamar.php");
?>