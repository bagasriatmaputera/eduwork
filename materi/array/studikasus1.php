<?php
$array = array(
    array(
        'nama' => 'Bagas',
        'umur' => 21,
        'kelas' => 'Laravel'
    ),
    array(
        'nama' => 'Clara',
        'umur' => 21,
        'kelas' => 'Komunikasi'
    ),
    array(
        'nama' => 'Ahmad',
        'umur' => 21,
        'kelas' => 'Sales Marketing'
    )
);

foreach ($array as $key => $value) {
    echo "Nama: ". $value['nama']. ", Umur: ". $value['umur']. ", Kelas: ". $value['kelas']. "<br>";
}

?>