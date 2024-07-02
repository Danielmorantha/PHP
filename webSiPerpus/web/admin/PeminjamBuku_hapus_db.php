<?php
	 include "../konekDB.php";
	 $qPinjamBuku = "DELETE FROM pinjam_buku WHERE id_pinjam = $_REQUEST[id_pinjam]";
	 $qPinjamBukuHasil = mysqli_query($KoneksiDB, $qPinjamBuku);
	 mysqli_commit($KoneksiDB);
	 header("location: PeminjamBuku.php");
?>