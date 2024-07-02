<?php
include "konekDB.php";
include_once "cekSesi.php";



if (isset($_POST['tombol_pinjam'])) {
    $tanggalPinjam  = $_POST['date'];
    $id_buku        = $_REQUEST['id_buku'];
    $id_pengguna    = $_SESSION['id_pengguna'];
    

    // Menghitung tanggal jatuh tempo
    $tanggalJatuhTempo = date('Y-m-d', strtotime($tanggalPinjam . ' + 14 days'));


    $tanggalHariIni = date("Y-m-d");
    $tanggalDuaMingguKedepan = date("Y-m-d", strtotime('+14 days'));

    if ($tanggalPinjam >= $tanggalHariIni && $tanggalPinjam <= $tanggalDuaMingguKedepan) 
    {
        if ($id_pengguna) 
        {
            // Input ke dalam pinjam_buku
            $qInputPinjamBuku = "INSERT INTO pinjam_buku (id_pengguna, id_buku, tanggal_pinjam, tanggal_jatuh_tempo) VALUES ($id_pengguna, $id_buku, '$tanggalPinjam', '$tanggalJatuhTempo')";
            $qHasilInput = mysqli_query($KoneksiDB, $qInputPinjamBuku);
            

            if ($qHasilInput) 
            {
                $qUpdateJmlBuku = "UPDATE buku SET jumlah_buku_tersedia = jumlah_buku_tersedia-1 WHERE id_buku = $id_buku";
                $qHasilUpdate   = mysqli_query($KoneksiDB, $qUpdateJmlBuku);
                if ($qHasilUpdate) 
                {
                    mysqli_commit($KoneksiDB);
                    header("location: pinjaman_buku_rekap.php");
                } else 
                {
                    print("<script>alert('Terjadi kesalahan saat mengupdate jumlah buku: " . mysqli_error($KoneksiDB) . "')</script>");
                }
                
            }else 
            {
                echo "<script>alert('Terjadi kesalahan saat input pinjam buku: " . mysqli_error($KoneksiDB) . "')</script>";
            }
        }else 
        {
            echo "<script>alert('Error!')</script>";
        }
    }else 
    {
        echo "<script>alert('Pilihlah tanggal hari ini atau h+14!.')</script>";
    }
}
?>
