<?php
include 'konekDB.php';


// Periksa koneksi
if ($KoneksiDB->connect_error) {
    die("Koneksi gagal: " . $KoneksiDB->connect_error);
}

// Query untuk mendapatkan data
$sql = "SELECT b.judul AS judul, kb.nama_kategori AS kategoriBuku, b.pengarang AS pengarang, p.nama_pengguna, pb.tanggal_pinjam, pb.denda 
        FROM pinjam_buku pb 
        INNER JOIN buku b USING(id_buku) 
        INNER JOIN kategori_buku kb USING(id_kategori) 
        INNER JOIN pengguna p USING(id_pengguna)";

$result = $KoneksiDB->query($sql);

if ($result->num_rows > 0) {
    // Nama file CSV
    $filename = "dataBuku.csv";
    
    // Lokasi folder download lokal
    $local_download_folder = "D:/Hari Ini/Semester 8/Tugas/Thrive";

    // Buka file CSV untuk ditulis di folder download lokal
    $file = fopen($local_download_folder . $filename, "w");

    // Header kolom
    $header = array("Judul", "Kategori Buku", "Pengarang", "Nama Pengguna", "Tanggal Pinjam", "Denda");
    fputcsv($file, $header);

    // Tulis data ke file CSV
    while ($row = $result->fetch_assoc()) {
        fputcsv($file, $row);
    }

    // Tutup file CSV
    fclose($file);

    echo "Data berhasil diekspor ke file CSV di folder download lokal Anda.";
} else {
    echo "Tidak ada data yang ditemukan.";
}

// Tutup koneksi
$KoneksiDB->close();
?>
