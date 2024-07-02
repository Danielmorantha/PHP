<?php
if (isset($_POST['submit'])) {
    include 'konekDB.php';

    // Ambil data dari form
    $id_buku = $_POST['id_buku'];

    // Validasi input ID Buku
    if (empty($id_buku) || !is_numeric($id_buku)) {
        die("ID Buku tidak valid.");
    }

    // Ambil data file
    $fileName = $_FILES['foto']['name'];
    $fileTmpName = $_FILES['foto']['tmp_name'];
    $fileSize = $_FILES['foto']['size'];
    $fileError = $_FILES['foto']['error'];
    $fileType = $_FILES['foto']['type'];

    // Ekstensi yang diizinkan
    $allowed = array('jpg', 'jpeg', 'png', 'gif');

    // Memisahkan nama file dan ekstensi
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    // Mengecek ekstensi file
    if (in_array($fileActualExt, $allowed)) {
        // Mengecek apakah ada error pada file
        if ($fileError === 0) {
            // Mengecek ukuran file (dalam bytes)
            if ($fileSize < 1000000) { // Maksimal 1MB
                // Membaca file dan mengkonversi ke format biner
                $fileContent = addslashes(file_get_contents($fileTmpName));

                // Query untuk memasukkan data ke dalam database
                $sql = "UPDATE buku SET foto='$fileContent' WHERE id_buku=$id_buku";
                if (mysqli_query($KoneksiDB, $sql)) {
                    echo "Foto berhasil diunggah!";
                } else {
                    echo "Terjadi kesalahan: " . mysqli_error($KoneksiDB);
                }
            } else {
                echo "Ukuran file terlalu besar!";
            }
        } else {
            echo "Terjadi kesalahan saat mengunggah file!";
        }
    } else {
        echo "Ekstensi file tidak diizinkan!";
    }

    // Menutup koneksi
    mysqli_close($KoneksiDB);
}
?>
