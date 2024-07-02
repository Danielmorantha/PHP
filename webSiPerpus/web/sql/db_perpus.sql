CREATE DATABASE perpus;

USE perpus;



-- Create the table in the specified schema
CREATE TABLE level_pengguna
(
    id_level INT NOT NULL AUTO_INCREMENT,
    nama_level VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_level)
);

CREATE TABLE pengguna
(
    id_pengguna INT NOT NULL AUTO_INCREMENT,
    id_level INT NOT NULL,
    nama_akun VARCHAR(15) NOT NULL,
    kata_sandi VARCHAR(50) NOT NULL,
    nama_pengguna VARCHAR(30) NOT NULL,
    alamat VARCHAR(200) NOT NULL,
    no_ktp VARCHAR(15) NOT NULL,
    no_hp VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    PRIMARY KEY (id_pengguna),
    FOREIGN KEY (id_level)
        REFERENCES level_pengguna (id_level)
        ON UPDATE CASCADE
        ON DELETE NO ACTION
);


CREATE TABLE kategori_buku
(
    id_kategori INT NOT NULL AUTO_INCREMENT,
    nama_kategori VARCHAR(50) NOT NULL,
    PRIMARY KEY (id_kategori)
);


CREATE TABLE buku (
    id_buku INT NOT NULL AUTO_INCREMENT,
    id_kategori INT NOT NULL,
    judul VARCHAR(100) NOT NULL,
    pengarang VARCHAR(50) NOT NULL,
    penerbit VARCHAR(50) NOT NULL,
    sinopsis TEXT,
    ISBN VARCHAR(25) NOT NULL,
    tahun_terbit INT(4) NOT NULL,
    jumlah_buku_tersedia INT NOT NULL,
    foto LONGBLOB,
    status ENUM('tersedia', 'dipinjam') NOT NULL,
    PRIMARY KEY (id_buku),
    FOREIGN KEY (id_kategori)
        REFERENCES kategori_buku (id_kategori)
        ON UPDATE CASCADE
        ON DELETE NO ACTION
);



CREATE TABLE pinjam_buku (
    id_pinjam INT NOT NULL AUTO_INCREMENT,
    id_buku INT NOT NULL,
    id_pengguna INT NOT NULL,
    tanggal_pinjam DATE NOT NULL,
    tanggal_dikembalikan DATE,
    tanggal_jatuh_tempo DATE NOT NULL,
    denda INT,
    PRIMARY KEY (id_pinjam),
    FOREIGN KEY (id_buku)
        REFERENCES buku (id_buku)
        ON UPDATE CASCADE
        ON DELETE NO ACTION,
    FOREIGN KEY (id_pengguna)
        REFERENCES pengguna (id_pengguna)
        ON UPDATE CASCADE
        ON DELETE NO ACTION
);


INSERT INTO level_pengguna
( 
 nama_level
)
VALUES
("admin"),("anggota");


INSERT INTO pengguna
( 
 id_level, nama_akun, kata_sandi, nama_pengguna, alamat, no_ktp, no_hp, email
)
VALUES
(1,"daniel morantha", "12345678", "daniel12", "malaka jaya", "312221212121", "081212121212", "daniel@gmail.com"),
(2,"saep", "1112223", "saep", "malaka sari", "321425121", "0812132432", "aep@gmail.com"),
(2,"regina", "3332221", "gina", "pondok kopi", "35672823", "08123244453", "gina@gmail.com"),
(1,"pratiwi", "12345678", "pratiwi12", "pondok kelapa", "31723231313", "08123445646", "pratiwi12@gmail.com"),
(2,"munar", "1112223", "munar12", "manggarai selatan", "3172328342", "08127845634", "munar12@gmail.com"),
(2,"ruki", "3332221", "ruki13", "bintara", "317423232123", "0812246553", "ruki13@gmail.com");


INSERT INTO kategori_buku
( 
 nama_kategori
)
VALUES
("Fiksi Ilmiah"),("Romantis"),("Filsafat"),("Komputer"),("Pengembangan Diri");


INSERT INTO buku
( 
 id_kategori, judul, pengarang, penerbit, sinopsis, ISBN, tahun_terbit, jumlah_buku_tersedia, foto, status
)
VALUES
(4,"belajar DATABASE menggunakan MySQL", "Abdul Kadir", "Penerbit Andi", "memahami pembuatan & operasi database dengan MySQL", "978-979-29-0447-5", 2008, 12, NULL ,"tersedia"),
(4,"Deep Learning with Python", "Francois Chollet", "Manning", "This book was written for anyone who wishes to explore deep learning from scratch or broaden their understanding of deep learning.", "9781617294433", 2017, 5, NULL ,"tersedia"),
(4,"Hands-On Machine Learning with Scikit-Learn, Keras, and TensorFlow 3rd Edition", "Aurélien Géron", "O'Reilly Media", "This book assumes that you know close to nothing about Machine Learning.", "978-1098125974", 2022, 8, NULL ,"tersedia"),
(5,"Sukses Menjalin Relasi", "Dale Carnegie & Associate", "Gramedia Pustaka Utama", "Beberapa orang memiliki sifat seperti magnet; sangat bercahaya, riang, dan menarik. Kehadiran mereka menjadikan suasana ceria. Mereka populer di antara teman, masyarakat, dan pekerjaan, serta karier mereka maju dengan cepat.", "9781617294433", 2020, 6, NULL ,"tersedia"),
(5,"Sukses Berkomunikasi", "Dale Carnegie & Associate", "Gramedia Pustaka Utama", "Saat ini, komunikasiapa yang kita sampaikan dan cara kitamenyampaikannyaadalah faktor utama yang menentukanapakah kita akan berhasil atau gagal. Kemampuan itu belumtentu dimiliki sejak lahir, tapi semua orang yang menginginkannyabisa memilikinya. Yang diperlukan hanyalah keinginan dan tekad", "9781617294433", 2020, 6, NULL ,"tersedia"),
(1, "Dune", "Frank Herbert", "Chilton Books", "A science fiction novel about the son of a noble family entrusted with the protection of the most valuable asset and most vital element in the galaxy.", "978-0441172719", 1965, 10, NULL, "tersedia"),
(2, "Pride and Prejudice", "Jane Austen", "T. Egerton, Whitehall", "A romantic novel of manners that depicts the British Regency era.", "978-1503290563", 1813, 7, NULL, "tersedia"),
(3, "Meditations", "Marcus Aurelius", "Penguin Classics", "A series of personal writings by the Roman Emperor Marcus Aurelius, setting forth his ideas on Stoic philosophy.", "978-0140449334", 1800, 9, NULL, "tersedia"),
(5, "The Power of Now", "Eckhart Tolle", "New World Library", "A guide to spiritual enlightenment and personal growth.", "978-1577314806", 1997, 8, NULL, "tersedia"),
(2, "The Notebook", "Nicholas Sparks", "Warner Books", "A romantic novel that depicts the enduring power of love.", "978-0446605236", 1996, 6, NULL, "tersedia");


-- 1. Tampilkan daftar buku yang tidak pernah dipinjam di oleh siapapun. (Expected output buku ke-10)

SELECT b.judul AS judul_buku FROM buku b LEFT JOIN pinjam_buku pb ON b.id_buku = pb.id_buku 
WHERE pb.id_buku IS NULL 
GROUP BY judul_buku;


-- |**Buku**|
-- | - |
-- |Buku 10|

-- 2. Tampilkan user yang pernah mengembalikan buku terlambat beserta dendanya. (Expected output user 3 dan denda Rp5.000)
SELECT p.nama_pengguna AS nama_pengguna, pb.denda AS denda FROM pengguna p INNER JOIN pinjam_buku pb ON p.id_pengguna = pb.id_pengguna 
WHERE denda > 0 
GROUP BY pb.id_pengguna;


-- |**User**|**Denda**|
-- | - | - |
-- |User 3|Rp5000|

-- 3. Tampilkan user dengan daftar buku yang dipinjam nya. Expected output seperti dibawah
SELECT pb.id_pinjam as no, 
p.nama_pengguna AS user, 
GROUP_CONCAT(b.judul ORDER BY b.judul SEPARATOR ', ') AS judul_buku
FROM pinjam_buku pb 
INNER JOIN buku b ON pb.id_buku = b.id_buku 
INNER JOIN pengguna p ON pb.id_pengguna = p.id_pengguna 
GROUP BY pb.id_pengguna;

-- |**No**|**User**|**Buku**|
-- | - | - | - |
-- |1|User 1|Buku 3, Buku 2, Buku 1|
-- |2|User 2|Buku 6, Buku 5, Buku 4|
-- |3|User 3|Buku 9, Buku 8, Buku 7|



