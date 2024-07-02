<?php
	include "../konekDB.php";
	include_once "../cekSesi.php";

	if(isset($_POST['tombol_tambah_buku'])){
		$id_kategori			= $_POST['id_kategori'];
		$judul					= $_POST['judul'];
		$pengarang				= $_POST['pengarang'];
		$penerbit				= $_POST['penerbit'];
		$sinopsis				= $_POST['sinopsis'];
		$ISBN					= $_POST['ISBN'];
		$tahun_terbit			= $_POST['tahun_terbit'];
		$jumlah_buku_tersedia	= $_POST['jumlah_buku_tersedia'];
		$status					= $_POST['status'];

		//File foto
		$namaFile 		= $_FILES['foto']['name'];
    	$tmpFile 		= $_FILES['foto']['tmp_name'];
    	$ukuranFile 	= $_FILES['foto']['size'];
    	$errorFile 		= $_FILES['foto']['error'];
    	$tipeFile 		= $_FILES['foto']['type'];

		$izinEkstensi = array('jpg', 'jpeg', 'png', 'gif');


		//bedakan nama file dan ekstensi
		$fotoExt	= explode('.', $namaFile);
		$fileActualExt = strtolower(end($fotoExt));

		if (in_array($fileActualExt, $izinEkstensi)) 
		{
			if (!$errorFile) 
			{
				if ($ukuranFile < 1000000) /* cek ukuran file */ 
				{
					$uploadFoto 		= addslashes(file_get_contents($tmpFile));
					$qTambahBuku 		= "INSERT INTO buku (id_kategori, judul, pengarang, penerbit, sinopsis, ISBN, tahun_terbit, jumlah_buku_tersedia, foto, status) 
								   			VALUES ($id_kategori, '$judul', '$pengarang', '$penerbit', '$sinopsis', '$ISBN', $tahun_terbit, $jumlah_buku_tersedia, '$uploadFoto', '$status')";
					$qHasilInputBuku 	= mysqli_query($KoneksiDB, $qTambahBuku);
					mysqli_commit($KoneksiDB);
					header("location: buku.php");
				} else 
				{
					print("<script>alert('ukuran file lebih dari 1MB!')".$ukuranFile."</script>");
					header("location: buku_tambah.php");
				}
				
			} else 
			{
				print("<script>alert('ukuran file rusak !')".$errorFile."</script>");
				header("location: buku_tambah.php");
			}
			
		} else 
		{
			print("<script>alert('ekstensi file tidak diizinkan!')".$tipeFile."</script>");
			header("location: buku_tambah.php");
		}
	}
?>