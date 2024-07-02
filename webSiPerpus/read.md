![ref1]

**Recruitment Test![ref1]**

Solecode Academy

**Petunjuk**

- Total ada 3 soal yang harus dikerjakan untuk mengukur kemampuan Anda dalam hal **HTML,CSS,SQL,**dan **Algoritma**
- Waktu untuk pengerjaan soal ini adalah maksimal **72 jam** sejak soal ini diberikan
- Beberapa komponen penilaian adalah sebagai berikut :
  - Kesesuaian jawaban dengan instruksi
  - Originalitas jawaban
  - Kerapian code
  - Efektivitas code
  - Penjelasan terkait jawaban pada saat Interview
- Source code dapat dikirim dalam bentuk zip ataupun link ke gitlab/github. Sertakan link ke dalam dokumen (doc, pdf) yang dikumpulkan.

PT. Pustaka Indonesia ingin membuka bisnis perpustakaan. Oleh karena itu, mereka membutuhkan sistem informasi perpustakaan (SIPERPUS) untuk menunjang bisnis mereka. Mereka akhirnya memintamu sebagai ITexpert untuk membantu membuatkan mereka sistem tersebut. Sistem yang ingin mereka buat memiliki kriteria sebagai berikut.

- Mereka ingin setiap orang yang meminjam buku di perpustakaan terdaftar di sistem sebagai anggota. Informasi yang tercatat minimal informasi dasar seperti id_level, Nama, Alamat, No KTP,No Hp, Email
- Mereka ingin setiap buku yang mereka punya tercatat di sistem. Data yang ada pada mereka saat ini yang wajib tercatat adalah, Judul, Pengarang, Penerbit, ISBN, Tahun Terbit, Jumlah buku tersedia. Kamu bebas menambahkan informasi lainnya yang sekiranya kamu perlukan. Setiap buku memiliki kategori, dan mereka ingin agar kategori ini dapat ditambah ataupun dikurangi sewaktu-waktu.
- Setiap pengunjung yang meminjam buku, maka akan disimpan di sistem. Informasi yang diperlukan adalah Kapan dipinjam, sampai kapan buku dapat dipinjam, waktu pengembalian buku oleh si peminjam.
- Setiap keterlambatan pengembalian buku akan didenda sebesar Rp1.000/hari.

**1. HTML&CSS (Weight : 30%)**

Buatlah halaman website sistem informasi perpustakaan (SIPERPUS). Silakan pilih salah satu form berikut:

1. **Halaman Registrasi Anggota**

   Buatlah sebuah halaman web yang memungkinkan pengunjung untuk mendaftar sebagai anggota perpustakaan.

2. **Halaman Tambah Buku**

   Buatlah sebuah halaman web yang memungkinkan admin untuk menambahkan buku baru ke dalam sistem.

3. **Halaman Peminjaman Buku**

   Buatlah sebuah halaman web yang memungkinkan anggota untuk meminjam buku. Halaman ini harus menampilkan daftar buku yang tersedia dan memungkinkan anggota untuk memilih buku yang ingin dipinjam. Setelah memilih buku, sistem harus mencatat informasi peminjaman seperti tanggal peminjaman, tanggal jatuh tempo, dan informasi anggota yang meminjam.

4. **Halaman Daftar Kategori**

   Buatlah sebuah halaman web yang menampilkan daftar kategori buku

   yang tersedia di perpustakaan. Halaman ini harus memungkinkan admin untuk menambah, mengubah, atau menghapus kategori buku.

Silakan gunakan HTMLdan CSSataupun framework (contoh Bootstrap, Tailwind, dll) untuk membuat halaman web tersebut.

**2. SQL(Weight : 35%)**

jawaban sql berada di folder soalNomor2 -> soalSql.sql

Dari kriteria sistem informasi perpustakaan (SIPERPUS)di atas, buatlah:

1. Buatlah ERD sistem informasi perpustakaan (SIPERPUS)tersebut. Screenshot gambar ERDyang dihasilkan.
[ref1]: ERD-Perpus.jpg
1. Buatlah database, tabel dan relasi sesuai dengan ERD yang telah dirancang. Silakan menggunakan database RDBMS yang Anda kuasai (MySQL, PostgreSQL, dll)
1. Initial Data
- Masukkan data 5 Kategori ke dalam sistem
- Masukkan data 5 User ke dalam sistem
- Masukkan data 10 Buku ke dalam sistem
- Masukkan 9 data peminjaman
  - User 1 (3 peminjaman) (Buku 1-3)
  - User 2 (3 peminjaman) (Buku 4-6)
  - User 3 (3 peminjaman) (Buku 7-9)
- User 3 terlambat mengembalikan 1 Buku (5 hari)
4. Manipulasi Data

   Buatlah query dari kebutuhan data berikut, sertakan Screenshot dari masing-masing query.

1. Tampilkan daftar buku yang tidak pernah dipinjam di oleh siapapun. (Expected output buku ke-10)



|**Buku**|
| - |
|Buku 10|

2. Tampilkan user yang pernah mengembalikan buku terlambat beserta dendanya. (Expected output user 3 dan denda Rp5.000)



|**User**|**Denda**|
| - | - |
|User 3|Rp5000|

3. Tampilkan user dengan daftar buku yang dipinjam nya. Expected output seperti dibawah



|**No**|**User**|**Buku**|
| - | - | - |
|1|User 1|Buku 3, Buku 2, Buku 1|
|2|User 2|Buku 6, Buku 5, Buku 4|
|3|User 3|Buku 9, Buku 8, Buku 7|

Sertakan file .sql dalam submission test ini

**3. Algorithm (Weight : 35%)**

Buatlah sebuah *method* atau *function* dalam bahasa pemrograman yang dapat menghitung denda keterlambatan pengembalian buku di SIPERPUS. Anggota perpustakaan dapat meminjam beberapa buku sekaligus dalam satu waktu, sehingga denda keterlambatan dihitung per buku. *Method* ini harus dapat menangani aturan-aturan berikut:

1. **Batas Maksimum Peminjaman**: Terdapat batas maksimum hari peminjaman di mana anggota perpustakaan dapat meminjam buku sebelum dikenakan denda. Batas maksimum peminjaman adalah 14 hari.
1. **Denda Harian**: Jika buku dikembalikan setelah batas maksimum peminjaman, maka akan dikenakan denda harian. Denda harian adalah jumlah denda yang dibebankan untuk setiap hari keterlambatan pengembalian buku. Denda harian adalah Rp 1.000 per hari.
1. **Denda Maksimum**: Terdapat batasan denda maksimum yang dapat dikenakan kepada anggota perpustakaan, terlepas dari berapa lama keterlambatan pengembalian buku. Denda maksimum adalah Rp 30.000.

*Method* yang dibuat harus menerima input berupa:

- tanggalKembali: Tanggal saat buku dikembalikan oleh anggota perpustakaan.
- tanggalPinjam: Tanggal saat buku dipinjam oleh anggota perpustakaan.
- daftarBuku: Array objek Buku yang dipinjam oleh anggota perpustakaan
- batasMaxPinjaman: Batas maksimum hari peminjaman sebelum dikenakan denda (dalam hari).
- dendaHarian: Jumlah denda yang dibebankan untuk setiap hari keterlambatan pengembalian buku.
- dendaMaximum: Batasan denda maksimum yang dapat dikenakan kepada anggota perpustakaan.

Metode harus mengembalikan dua nilai sebagai output:

1. totalDenda: Total denda yang harus dibayarkan oleh anggota perpustakaan untuk semua buku yang dipinjam.
1. dendaPerBuku: Array yang berisi denda untuk setiap buku yang dipinjam, dengan urutan yang sama seperti daftarBuku.

Silakan menggunakan bahasa pemrograman yang dikuasai dalam menyelesaikan soal ini (direkomendasikan **Javascript**). Pastikan metode yang dibuat dapat menangani semua aturan dan kasus yang mungkin terjadi dalam penghitungan denda keterlambatan pengembalian buku.
Recruitment Test Solecode Academy v1.0 ©Solecode 2024

[ref1]: Aspose.Words.6f76de6e-8175-4fe3-aaae-82a9d600357d.001.png
