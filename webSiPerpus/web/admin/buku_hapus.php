<?php
	 include "../konekDB.php";
	 $qAkun = "DELETE FROM buku WHERE id_buku = $_REQUEST[id_buku]";
	 $qAkunHasil = mysqli_query($KoneksiDB, $qAkun);
	 mysqli_commit($KoneksiDB);
	 header("location: buku.php");
?>