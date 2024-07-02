<?php

session_start();

if ( !isset($_SESSION["id_pengguna"]) && !isset($_SESSION["nama_akun"]) ) {
    header("location: page-error-404.php");
    exit();
}

$id_level = $_SESSION["id_level"] ?? "";
$id_pengguna = $_SESSION["id_pengguna"] ?? "";
$nama_akun = $_SESSION["nama_akun"] ?? "";

?>
