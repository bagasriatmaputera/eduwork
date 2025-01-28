<?php
$nama = "Bagas Riatma Putera";
$beratBadan = 70;
$tinggiBadan = 166;

$tinggiBadanMeter = $tinggiBadan / 100;$bmi = $beratBadan / ($tinggiBadanMeter * $tinggiBadanMeter);

if ($bmi < 18.5) {
    $kategori = "Kurus";
} elseif ($bmi >= 18.5 && $bmi <= 24.9) {
    $kategori = "Normal";
} elseif ($bmi >= 25 && $bmi <= 29.9) {
    $kategori = "Kelebi
    han Berat Badan";
} else {
    $kategori = "Obesitas";
}

echo "Halo, $nama. Nilai BMI anda adalah $bmi , anda termasuk $kategori";
