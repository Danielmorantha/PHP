<?php
session_start();

include "konekDB.php";


if (isset($_POST['tombol_login'])) 
{
    $namaAkun  = $_POST['nama_akun'];
    $kataSandi = $_POST['kata_sandi'];

    $qCekLogin = "SELECT id_pengguna, id_level, nama_akun, kata_sandi FROM pengguna WHERE nama_akun='$namaAkun' AND kata_sandi='$kataSandi'";
    $hasil = mysqli_query($KoneksiDB, $qCekLogin);

    # Cek apakah akun user ada
    if (mysqli_num_rows($hasil)>0) 
    {
        $baris = mysqli_fetch_assoc($hasil);
        $_SESSION['id_level']       = $baris['id_level'];
        $_SESSION['id_pengguna']    = $baris['id_pengguna'];
        $_SESSION['nama_akun']      = $baris['nama_akun'];
        $sesiIdLevel    = $_SESSION['id_level'];
        $sesiIdPengguna = $_SESSION['id_pengguna'];
        $sesiNamaAkun   =  $_SESSION['nama_akun'];


        if ($baris['id_level'] == 1) 
        {
            header("location: ./admin/akun.php");
        }elseif ($baris['id_level'] == 2) 
        {
            header("location: pesananan.php");
        }else 
        {
            header("location: index.php?pesan=gagal");
        }

    }else 
    {
        print("<center><label style='color:red;'>Ulangi, Nama Akun dan Kata Sandi salah</label></center>");
    }

    mysqli_close($KoneksiDB);

}


?>