<?php
	require_once 'admin/connect.php';
	if(ISSET($_POST['tombol_tamu'])){
		$nama_depan 	= $_POST['nama_depan'];
		$nama_tengah 	= $_POST['nama_tengah'];
		$nama_belakang	= $_POST['nama_belakang'];
		$alamat 		= $_POST['alamat'];
		$nomor_telepon	= $_POST['nomor_telepon'];
		$checkin 		= $_POST['date'];


		$conn->query("INSERT INTO `guest` (nama_depan, nama_tengah, nama_belakang, alamat, nomor_telepon) VALUES('$nama_depan', '$nama_tengah', '$nama_belakang', '$alamat', '$nomor_telepon')") or die(mysqli_error());
		$query = $conn->query("SELECT * FROM `guest` WHERE `nama_depan` = '$nama_depan' && `nama_belakang` = '$nama_belakang' && `nomor_telepon` = '$nomor_telepon'") or die(mysqli_error());
		$fetch = $query->fetch_array();
		$query2 = $conn->query("SELECT * FROM `transaction` WHERE `checkin` = '$checkin' && `room_id` = '$_REQUEST[room_id]' && `status` = 'Pending'") or die(mysqli_error());
		$row = $query2->num_rows;
		if($checkin < date("Y-m-d", strtotime('+8 HOURS'))){	
				echo "<script>alert('Jadwal tidak tersedia')</script>";
			}else{
				if($row > 0){
					echo "<div class = 'col-md-4'>
								<label style = 'color:#ff0000;'>Jadwal tidak tersedia</label><br />";
							$q_date = $conn->query("SELECT * FROM `transaction` WHERE `status` = 'Pending'") or die(mysqli_error());
							while($f_date = $q_date->fetch_array()){
								echo "<ul>
										<li>	
											<label class = 'alert-danger'>".date("M d, Y", strtotime($f_date['checkin']."+8HOURS"))."</label>	
										</li>
									</ul>";
							}
						"</div>";
				}else{	
						if($guest_id = $fetch['guest_id']){
							$room_id = $_REQUEST['room_id'];
							$conn->query("INSERT INTO `transaction`(guest_id, room_id, status, checkin) VALUES('$guest_id', '$room_id', 'Pending', '$checkin')") or die(mysqli_error());
							header("location:pesananan_respon_form.php");
						}else{
							echo "<script>alert('Error!')</script>";
						}
				}	
			}	
	}	
?>