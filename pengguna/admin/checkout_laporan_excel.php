<?php
require_once 'connect.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=laporan_checkout.xls");

?>
<h2><center>Laporan checkout</center></h2>
<br />
				<br />
				<table id = "table" class = "table table-bordered" border="1">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Tipe Kamar</th>
							<th>Nomor Kamar</th>
							<th>Check In</th>
							<th>Lama Menginap</th>
							<th>Check Out</th>
							<th>Status</th>
							<th>Extra Bed</th>
							<th>Total Bayar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$query = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `status` = 'Check Out'") or die(mysqli_query());
							while($fetch = $query->fetch_array()){
						?>
						<tr>
							<td><?php echo $fetch['nama_depan']." ".$fetch['nama_belakang']?></td>
							<td><?php echo $fetch['tipe_kamar']?></td>
							<td><?php echo $fetch['nomor_kamar']?></td>
							<td><?php echo "<label style = 'color:#00ff00;'>".date("d M Y", strtotime($fetch['checkin']))."</label>"." jam "."<label>".date("H:i:s", strtotime($fetch['waktu_checkin']))."</label>"?></td>
							<td><?php echo $fetch['lama_menginap']?> Hari</td>
							<td><?php echo "<label style = 'color:#ff0000;'>".date("d M Y", strtotime($fetch['checkin']."+".$fetch['lama_menginap']."Hari"))."</label>"." Jam "."<label>".date("H:i:s", strtotime($fetch['waktu_checkout']))."</label>"?></td>
							<td><?php echo $fetch['status']?></td>
							<td><?php if($fetch['extra_bed'] == "0"){ echo "Tidak Pakai";}else{echo $fetch['extra_bed'];}?></td>
							<td><?php echo "Rp. ".number_format($fetch['tagihan'], 0, ",", ".")?></td>
							<td><label class = "">Lunas</label></td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>