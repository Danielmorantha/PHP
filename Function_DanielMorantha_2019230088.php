<?php
echo "<head><title> Form Pelunasan Hutang </title></head>";
echo "<b> Nama </b> &nbsp &nbsp : Daniel Morantha";
echo "<br/>";
echo "<b>NIM </b> &nbsp  &nbsp &nbsp  : 2019230088";
echo "<br/>";
echo "<br/>";

echo "<hr/>"; // Garis

echo "<br/>";
echo "Form Pelunasan Hutang dengan Function<br/>";
echo "</br>";



//Form Pelunasan Hutang
echo    "<form action ='' method ='POST'>
        Jumlah Hutang&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
        <input type='text' name='Hutang' size=20 placeholder='Masukan Jumlah Hutang'><br> 
        <br>Lama Angsuran&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp;
        <input type='text' name='Angsuran' size=20 placeholder='Masukan Lama Angsuran'>  Bulan <br><br/>
        Besar Bunga Pinjaman&nbsp;
        <input type='text' name='Bunga' size=20 placeholder='Masukan Besar Bunga'>  % <br><br/>
        <input type='submit' name='submit' value='Kalkulasi'><br></br><hr/> 
        </form>";
    
echo "Rincian Pelunasan :";
echo "</br>";


//Kondisi Mencocokan dengan yang disi di form
if (isset($_POST["submit"])) {
    $Hutang       = $_POST["Hutang"];
    $LamaPinjaman = $_POST["Angsuran"];
    $Bunga        = $_POST["Bunga"];
    Perhitungan_Hutang($Hutang, $LamaPinjaman, $Bunga);
  }


function Perhitungan_Hutang($Hutang, $LamaPinjaman, $Bunga)
{

  $n            = 0;
  $Bunga1       = 0;
  $Total_Hutang = 0;
  $Bayar        = 0;
  for ($i=0; $i < $LamaPinjaman ; $i++) {
    $Bunga1       = $Bunga/100; 
    $Total_Bunga = $Hutang * $Bunga1;
    $Total_Hutang= $Hutang+$Total_Bunga;
    $Bayar       = $Total_Hutang/$LamaPinjaman;
    $n += $Bayar;

    echo "Angsuran ke - " .($i+1).  "  Bayar  = <b>Rp. " . number_format($Bayar, 0, ",", "."). "</b>  Sisa Hutangnya adalah <b>Rp. " . number_format($Total_Hutang-$n, 0, ",", "."). "</b>";
    echo "<br>";
    // Angsuran ke-1  bayar $bayar , sisanya adalah $Total_Hutang-$n
    //.......
    // Angsuran ke-10  bayar $bayar , sisanya adalah $Total_Hutang-$n
  }

if ($Total_Hutang != 0) {
  echo "<br>";
  echo "Hutang  <b>Rp." . number_format($Total_Hutang, 0, ",", ".").  "</b> Anda Sudah  LUNAS";
  echo "<br>";
  }
elseif ($Total_Hutang == 0 ) {
  echo "<script>alert('Anda Belum Mengisikan apa-apa')</script>";
  }

}  
?>