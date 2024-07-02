<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Foto</title>
</head>
<body>
    <form action="uploadImageDB.php" method="post" enctype="multipart/form-data">
        ID Buku: <input type="number" name="id_buku" id="id_buku"><br><br>
        Pilih foto untuk diunggah:
        <input type="file" name="foto" id="foto"><br><br>
        <input type="submit" value="Upload Foto" name="submit">
    </form>
</body>
</html>
