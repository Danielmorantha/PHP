<?php
$host = 'localhost';
$namaDB = 'perpus';
$username = 'root';
$password = 'daniel';


$KoneksiDB = mysqli_connect($host, $username, $password, $namaDB);


if (!$KoneksiDB) {
    header('location: page-error-404.html');
    exit;
}
?>
