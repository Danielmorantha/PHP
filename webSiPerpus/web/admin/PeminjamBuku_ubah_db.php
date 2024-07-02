<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";
	include_once "../functionPerpus.php";

	if(isset($_POST['tombol_dikembalikan'])){
		$tanggalPinjam  		= $_POST['tanggal_pinjam'];
		$tanggal_jatuh_tempo	= $_POST['tanggal_jatuh_tempo'];
		$tanggal_dikembalikan	= $_POST['tanggal_dikembalikan'];

		$denda = dendaHarian($tanggal_dikembalikan, $tanggal_jatuh_tempo);
		

		$qDikembalikan = "UPDATE pinjam_buku SET tanggal_dikembalikan = '$tanggal_dikembalikan', denda=$denda WHERE id_pinjam = $_REQUEST[id_pinjam]";
		$qDikembalikanHasil = mysqli_query($KoneksiDB, $qDikembalikan);

		if ($qDikembalikanHasil) 
		{
			$qLihatPinjam = "SELECT id_buku FROM pinjam_buku WHERE id_pinjam = $_REQUEST[id_pinjam]";
			$qHasilLihatPinjam = mysqli_query($KoneksiDB, $qLihatPinjam);

			if (mysqli_num_rows($qHasilLihatPinjam) > 0) 
			{
				$fetch = mysqli_fetch_array($qHasilLihatPinjam, MYSQLI_ASSOC);
				$id_buku = $fetch['id_buku'];
				$qUpdateJmlBuku = "UPDATE buku SET jumlah_buku_tersedia = jumlah_buku_tersedia+1 WHERE id_buku = $id_buku";
            	$qHasilUpdate   = mysqli_query($KoneksiDB, $qUpdateJmlBuku);
				mysqli_commit($KoneksiDB);
				header("Location: PeminjamBuku.php");
			} else 
			{
				print("Error fetching id_buku: " . mysqli_error($KoneksiDB));
				header("Location: PeminjamBuku.php");
			}
		} else 
		{
			print("Error: " . mysqli_error($KoneksiDB));
			header("Location: PeminjamBuku.php");
		}
	}
?>