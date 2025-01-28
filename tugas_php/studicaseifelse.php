<?php
//Menu:
//1 .Pertambahan
//2. Pengurangan
//3. Perkalian
//4. Pembagian

$menu = 4;
$angka1 = 100;
$angka2 = 150;

if ($menu == 1) {
    echo $angka1 + $angka2;
} elseif ($menu == 2) {
    echo $angka1 - $angka2;
} elseif ($menu == 3) {
    echo $angka1 * $angka2;
} elseif ($menu == 4){
    echo $angka1 / $angka2;
} else{
    echo"error: Menu";
}
