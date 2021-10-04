<?php

echo "<b> Nama </b> &nbsp &nbsp : Daniel Morantha";
echo "<br/>";
echo "<b>NIM </b> &nbsp  &nbsp &nbsp  : 2019230088";
echo "<br/>";
echo "<br/>";
echo "<br/>";


echo "<b>1. kondisi mengetahui hari ini menggunakan logika IF php dengan coding (date). </b>";
echo "<br/>";
//1.	Buatkan saya sebuah kondisi dengan cara mengetahui hari ini menggunakan logika IF php dengan coding (date).

date_default_timezone_set('Asia/Jakarta');
$hari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"];
echo "Hari : <b>" . $hari[date("w")] . "</b> ";
echo "| Tanggal : <b>" . date("d-m-Y") . "</b> ";
echo "| Pukul : <b>" . date("H:i:s") . "</b>";
$jam = date("H");
if (($jam >= 6) && ($jam <= 11)) {
    echo "<b>, Selamat Pagi !!</b>";
} elseif (($jam > 11) && ($jam <= 15)) {
    echo ", Selamat Siang !!";
} elseif (($jam > 15) && ($jam <= 18)) {
    echo ", Selamat Sore !!";
} else {
    echo ", <b> Selamat Malam </b>";
}
echo "<br/>";
echo "<br/>";



echo "<b> 2. Menghitung gaji karyawan yang sudah ditentukan Angka Statis.</b></br>";
//2.	Buatkan saya sebuah kondisi gaji karyawan (angka statis = sudah ditentukan), dengan aturan bahwa batasan 
//jam kerja normal adalah 50 sampai 60 jam/minggu dengan upah Rp.5000/jam. Jika lebih dari batas tersebut, 
//maka kelebihan perjamnya dibayar Rp 7500/jam. 
//Tetapi jika jam kerjanya kurang dari 50 jam/minggu, maka dikenakan potongan Rp.2500/jam nya.

$Jam_Normal_Min = 50;
$Jam_Normal_Maks = 60;
$Upah_Per_Jam = 5000;
$Jumlah_Jam_Kerja = 68;
echo "Jam Kerja : ". $Jumlah_Jam_Kerja. " Jam<br />";
if ($Jumlah_Jam_Kerja <= $Jam_Normal_Maks && $Jumlah_Jam_Kerja >= $Jam_Normal_Min) { //Jam kerja normal 50 sampai 60
    $Upah = $Jumlah_Jam_Kerja * 5000;
    echo "Upah Total : Rp. ". number_format($Upah, 0, ",", ".");
    echo "<br/>";
} elseif ($Jumlah_Jam_Kerja > $Jam_Normal_Maks) { //Jam Kerja Lembur
    $JamLembur = $Jumlah_Jam_Kerja - $Jam_Normal_Maks;
    $Upah = $Jam_Normal_Maks * 5000;
    $Lembur = $JamLembur * 7500;
    echo "Upah : Rp. ". number_format($Upah, 0, ",", ".")."<br />";
    echo "Lembur : ". $JamLembur ." Jam <br />";
    echo "Upah Lembur : Rp. ". number_format($Lembur, 0, ",", "."). " <br />";
    echo "Upah Total : Rp. ". number_format($Lembur+$Upah, 0, ",", ".");
} else { //Jam Kurang Kerja
    $Upah = $Jumlah_Jam_Kerja * 5000;
    $PotonganUpah = $Jumlah_Jam_Kerja * 2500;
    $TotalUpah = $Upah - $PotonganUpah;
    echo "Upah : Rp. ". number_format($Upah, 0, ",", ".")."<br />";
    echo "Potongan : Rp. ". number_format($PotonganUpah, 0, ",", ".")."<br />";
    echo "Upah Total : Rp. ". number_format($TotalUpah, 0, ",", ".");
}
echo "</br>";
echo "</br>";



//array untuk Combo Box bulan
$bln=array(1=>"Januari","Februari","Maret","April","Mei",
"Juni","July","Agustus","September","Oktober",
"November","Desember");

//untuk Combo Box tanggal dan membuat tanggal 1 s/d 31
echo "Tanggal:<select name=tanggal>
<option value=01 selected>01</option>";
for($tgl=2; $tgl<=31; $tgl++){
$tgl_leng=strlen($tgl);
if ($tgl_leng==1)
$i="0".$tgl;
else
$i=$tgl;
echo "<option value=$i>$i</option>";}
echo "</select>";

//untuk membuat bulan ComboBox
echo "<select name=bln>
<option value=Januari selected>Januari</option>";
for($bulan=2; $bulan<=12; $bulan++){
echo "<option value=$bulan>$bln[$bulan]</option>";}
echo "</select>";

//Membuat tahun 1800 sampai tahun saat ini
$now=date("Y");
echo "<select name=th>
<option value=1800 selected>1800</option>";
for($thn=1801; $thn<=$now; $thn++){
echo "<option value=$thn>$thn</option>";}
echo "</select>";
?>