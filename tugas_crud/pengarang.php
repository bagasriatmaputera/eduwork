<?php
include 'layouts/header.php';
include 'connection.php';
//menampilkan data dari database
$data_pengarang = mysqli_query($conn, "SELECT * FROM pengarang Order BY nama_pengarang ASC");

//add data ke database
if (isset($_POST['add_data'])) {
    $id_pengarang = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email_pengarang = $_POST['email_pengarang'];
    $telp_pengarang = $_POST['telp_pengarang'];
    $alamat_pengarang = $_POST['alamat_pengarang'];

    $sql = "INSERT INTO pengarang (id_pengarang, nama_pengarang, email, telp, alamat) VALUES ('$id_pengarang', '$nama_pengarang', '$email_pengarang', '$telp_pengarang', '$alamat_pengarang')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data berhasil ditambahkan";
        //autoreload
        header('Location:'.$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Data gagal ditambahkan";
    }
}
//update data database
if (isset($_POST['edit_data'])) {
    $id_pengarang = $_POST['id_pengarang'];
    $nama_pengarang = $_POST['nama_pengarang'];
    $email_pengarang = $_POST['email_pengarang'];
    $telp_pengarang = $_POST['telp_pengarang'];
    $alamat_pengarang = $_POST['alamat_pengarang'];
    
    $sql = "UPDATE pengarang SET id_pengarang = '$id_pengarang', nama_pengarang = '$nama_pengarang', email ='$email_pengarang', alamat = '$alamat_pengarang'
    WHERE id_pengarang='$id_pengarang'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data berhasil ditambahkan";
        //autoreload
        header('Location:'.$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Data gagal ditambahkan";
    }
}
//hapus data
if(isset($_GET['delete']) && $_GET['delete'] == 'true'){
    $id = $_GET['id'];

    $sql = "DELETE FROM pengarang WHERE id_pengarang = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Data berhasil dihapus";
        //autoreload
        header('Location:'.$_SERVER['PHP_SELF']);
        exit();
    } else {    
        echo "Data gagal dihapus";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pengarang</title>
    <style>
    </style>
</head>

<body>
    <a href="?add=true" style="color:black">Tambah Data</a>
    <?php
    if (isset($_GET['add']) && $_GET['add'] == 'true') {
    ?>
        <form method="post" action="">
            <label>
                ID Pengarang :--
                <input type="text" name="id_pengarang" />

            </label> <br>
            <label>
                nama pengarang :--
                <input type="text" name="nama_pengarang" />

            </label><br>
            <label>
                email pengarang :--
                <input type="text" name="email_pengarang" />

            </label><br>
            <label>
                telp pengarang :--
                <input type="text" name="telp_pengarang" />

            </label><br>

            <label>
                alamat pengarang :--
                <input type="text" name="alamat_pengarang" />

            </label>

            <input type="submit" name="add_data" value="Simpan" />
        </form>
    <?php
    }
    ?>

    <?php
    if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM pengarang WHERE id_pengarang='$id'";
        $result = $conn->query($sql);
        $row = mysqli_fetch_array($result);
    ?>
        <form method="post" action="">
            <label>
                ID Pengarang :--
                <input type="text" name="id_pengarang" value="<?= $row['id_pengarang'] ?>" />

            </label> <br>
            <label>
                nama pengarang :--
                <input type="text" name="nama_pengarang" value="<?= $row['nama_pengarang'] ?>" />

            </label><br>
            <label>
                email pengarang :--
                <input type="text" name="email_pengarang" value="<?= $row['email'] ?>" />

            </label><br>
            <label>
                telp pengarang :--
                <input type="text" name="telp_pengarang" value="<?= $row['telp'] ?>" />

            </label><br>

            <label>
                alamat pengarang :--
                <input type="text" name="alamat_pengarang" value="<?= $row['alamat'] ?>" />

            </label>

            <input type="submit" name="edit_data" value="Simpan" />
        </form>
    <?php
    }
    ?>
    <table class="table mt-20 " width="50%" border="1">
        <tr class="tableHead ">
            <th>ID</th>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
        </tr>
        <?php
        while ($pengarang = mysqli_fetch_array($data_pengarang)) {
            echo "<tr>";
            echo "<td>" . $pengarang['id_pengarang'] . "</td>";
            echo "<td>" . $pengarang['nama_pengarang'] . "</td>";
            echo "<td>" . $pengarang['email'] . "</td>";
            echo "<td>" . $pengarang['telp'] . "</td>";
            echo "<td>" . $pengarang['alamat'] . "</td>";
            echo "<td> <a style='color:black' href='?edit=true&id=" . $pengarang['id_pengarang'] . "'>EDIT DATA</a> |
            <a style='color:black' href='?delete=true&id=" . $pengarang['id_pengarang'] . "'>DELETE DATA</a> </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>