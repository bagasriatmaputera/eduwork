<?php
include "layouts/header.php";
include "connection.php";
$data_katalog = mysqli_query($conn, "SELECT * FROM katalog");

//ambil input user
if (isset($_POST['add_data'])) {
    $id_katalog = $_POST['id_katalog'];
    $nama_katalog = $_POST['nama'];

    $id = $_GET['id'];

    //Mencegah SQL Injection
    $id_katalog = mysqli_real_escape_string($conn, $id_katalog);
    $nama_katalog = mysqli_real_escape_string($conn, $nama_katalog);

    $sql = "INSERT INTO katalog (id_katalog, nama) VALUES ('$id_katalog','$nama_katalog')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Berhasil menambahkan";
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Gagal menambahkan";
    }
}

//edit data
if (isset($_POST['edit_data'])) {
    $id_katalog = $_POST['id_katalog'];
    $nama_katalog = $_POST['nama'];

    $id = $_GET['id'];

    //Mencegah SQL Injection
    $id_katalog = mysqli_real_escape_string($conn, $id_katalog);
    $nama_katalog = mysqli_real_escape_string($conn, $nama_katalog);

    $sql = "UPDATE katalog SET id_katalog = '$id_katalog', nama = '$nama_katalog' WHERE id_katalog='$id'";
    $result= mysqli_query($conn,$sql);

    if($result){
        echo"Berhasil merubah";
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }else{
        echo"Gagal Merubah";
    }


}

//hapus data
if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
    $id = $_GET['id'];
    $sql = "DELETE FROM katalog where id_katalog = '$id'";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Gagal Menghapus";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>katalog</title>
</head>

<body>
    <a class="btn btn-primary" href="?add=true">Tambah Data</a>

    <?php
    if (isset($_GET['add']) && $_GET['add'] == 'true') {
    ?>
        <form method="post">
            <label>
                ID Katalog :--
                <input type="text" name="id_katalog" required>
            </label> <br>
            <label>
                Kategori :--
                <input type="text" name="nama" required>
            </label> <br>
            <input type="submit" class="btn btn-success" name="add_data" value="Simpan">
            <!-- <input type="submit" name="add_data" value="Simpan"> -->
        </form>
    <?php
    }
    ?>

    <!-- Edit Data -->
    <?php
    if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM katalog WHERE id_katalog = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>
        <form method="post">
            <label>
                ID Katalog :--
                <input type="text" name="id_katalog" value="<?= $row['id_katalog'] ?>" required>
            </label> <br>
            <label>
                Kategori :--
                <input type="text" name="nama" value="<?= $row['nama'] ?> " required>
            </label> <br>
            <input type="submit" class="btn btn-success" name="edit_data" value="Simpan Perubahan">
            <!-- <input type="submit" name="add_data" value="Simpan"> -->
        </form>
    <?php
    }
    ?>

    <table class="table" width="80%" border=1>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($katalog = mysqli_fetch_array($data_katalog)) {
            echo "<tr>";
            echo "<td>" . $katalog['id_katalog'] . "</td>";
            echo "<td>" . $katalog['nama'] . "</td>";
            echo "<td><a class='btn btn-primary' href='?edit=true&id=" . $katalog['id_katalog'] . "'>Edit</a> | <a class='btn btn-danger' href='?delete=true&id=" . $katalog['id_katalog'] . "'>Hapus</a></td>";
        }
        ?>
    </table>
</body>

</html>