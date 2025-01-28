<?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];

        echo "Nama: $nama <br>";
        echo "Umur: $umur tahun <br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>input data</title>
</head>
<body>
    <h3>Silahkan isi</h3>
    <form action="input.php" method="post">
        <input type="text" name="nama" placeholder="Masukan Nama">
        <input type="text" name="umur" placeholder="Masukan Umur">
        <button type="submit" name="submit">Submit</button>
    </form>    
</body>
</html>