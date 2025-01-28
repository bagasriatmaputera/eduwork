<?php
function tampilkan_nama_saya($nama, $umur){
    echo"Nama Saya $nama ";
    echo"dan saya berumur $umur tahun <br>";
    
}

tampilkan_nama_saya("Bagas Riatma Putera",21);

function perkalian($angka1, $angka2){
    $hasil = $angka1 * $angka2;
    echo "$angka1 x $angka2 = " . $hasil;
}

perkalian(10, 5);
?>