<?php
function hitungVolumeBalok($panjang,$lebar,$tinggi){
    $hasil=$panjang*$lebar*$tinggi;
    echo"Volumen Balok Adalah: $hasil";
}

hitungVolumeBalok(10,15,7);
echo"<br>";
function hitungVolumeTabung($jariJari,$tinggi){
    $hasil = pow($jariJari,2) * $tinggi;
    echo"Volumen Tabung Adalah: $hasil";
}

hitungVolumeTabung(7,15);
echo"<br>";
function hitungVolumeKubus($sisi){
    $hasil = pow($sisi,3);
    echo"Volumen Kubus Adalah: $hasil";
}

hitungVolumeKubus(12);
echo"<br>";
function hitungKelilingLingkaran($jariJari){
    $hasil = 2 * 22/7 * $jariJari;
    echo"Keliling Lingkaran Adalah: $hasil";
}

hitungKelilingLingkaran(14);
echo"<br>";
function hitungKelilingSegitiga($sisi1,$sisi2,$sisi3){
    $hasil = $sisi1*$sisi2*$sisi3;
    echo"Keliling Segitiga Adalah: $hasil";

}
hitungKelilingSegitiga(7,7,7);

?>