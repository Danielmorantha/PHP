<?php
	 include "../konekDB.php";
	 $qAkun = "DELETE FROM pengguna WHERE id_pengguna = $_REQUEST[id_pengguna]";
	 $qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
	 mysqli_commit($KoneksiDB);
	 header("location: akun.php");
?>