<?php
function dendaHarian($tanggal_dikembalikan, $tanggal_jatuh_tempo) {
    $dendaPerHari = 1000;
    $denda = 0;

    $tanggalDikembalikan = new DateTime($tanggal_dikembalikan);
    $tanggalJatuhTempo = new DateTime($tanggal_jatuh_tempo);

    if ($tanggalDikembalikan > $tanggalJatuhTempo) {
        $interval = $tanggalJatuhTempo->diff($tanggalDikembalikan);
        $selisihHari = $interval->days;
        $denda = $dendaPerHari * $selisihHari;
    }

    return $denda;
}
?>
