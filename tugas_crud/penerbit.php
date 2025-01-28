<?php
include 'layouts/header.php';
include 'connection.php';
$data_penerbit = mysqli_query($conn, 'SELECT * FROM penerbit Order by nama_penerbit ASC');

//add data penerbit
if (isset($_POST['submit'])) {
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $email_penerbit = $_POST['email_penerbit'];
    $telp_penerbit = $_POST['telp_penerbit'];
    $alamat_penerbit = $_POST['alamat_penerbit'];

    $sql = "INSERT INTO penerbit (id_penerbit,nama_penerbit,email,telp,alamat) VALUES ('$id_penerbit','$nama_penerbit','$email_penerbit','$telp_penerbit','$alamat_penerbit')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Data Berhasil Ditambahkan";
        header('Location:' . $_SERVER['PHP_SELF']);
    } else {
        echo "Data Gagal Ditambahkan";
    }
}
//edit data
if(isset($_POST['edit_data'])){
    $id = $_GET['id'];
    $id_penerbit = mysqli_escape_string($conn,$_POST['id_penerbit']);
    $nama_penerbit = mysqli_escape_string($conn,$_POST['nama_penerbit']);
    $email_penerbit = mysqli_escape_string($conn,$_POST['email_penerbit']);
    $telp_penerbit = mysqli_escape_string($conn,$_POST['telp_penerbit']);
    $alamat_penerbit = mysqli_escape_string($conn,$_POST['alamat_penerbit']);

    $result = mysqli_query($conn,"UPDATE penerbit SET id_penerbit = '$id_penerbit', nama_penerbit = '$nama_penerbit', email = '$email_penerbit', telp = '$telp_penerbit', alamat = '$alamat_penerbit' WHERE id_penerbit = '$id'");

    if($result){
        echo"Berhasil mengubah";
        header('Location:' . $_SERVER['PHP_SELF']);
        exit();
    }else{
        echo"Gagal merubah";
    }
}

//hapus data
if (isset($_GET['delete']) && ($_GET['delete']) == 'true') {
    $id = $_GET['id'];
    $sql = "DELETE FROM penerbit WHERE id_penerbit = '$id'";
    $result = mysqli_query($conn, $sql);
    var_dump($result);

    if ($result) {
        echo "Berhasil Menghapus";
        header('Location:' . $_SERVER['PHP_SELF']);
    } else {
        echo "Gagal mengahapus";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>penerbit</title>
</head>

<body>
    <a class='btn btn-primary' href="?add=true">Tambah Data</a>
    <?php
    if (isset($_GET['add']) && $_GET['add'] == 'true') {
    ?>
        <form method="post" action="">
            <label>
                ID Penerbit:--
                <input type="text" name="id_penerbit" required />
            </label> <br>
            <label>
                Nama Penerbit:--
                <input type="text" name="nama_penerbit" required />
            </label> <br>
            <label>
                Email:--
                <input type="text" name="email_penerbit" required />
            </label> <br>
            <label>
                Telpon:--
                <input type="text" name="telp_penerbit" required />
            </label> <br>
            <label>
                Alamat:--
                <input type="text" name="alamat_penerbit" required />
            </label> <br>
            <label>
                <input type="submit" name="submit" value="Simpan" />
            </label>
        </form>

    <?php
    }
    ?>

    <?php
    //edit form
    if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM penerbit WHERE id_penerbit = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    ?>
        <form method="post">
            <label>
            ID Penerbit:--
            <input type="text" name="id_penerbit" value="<?= $row['id_penerbit'] ?>" required />
        </label> <br>
        <label>
            Nama Penerbit:--
            <input type="text" name="nama_penerbit" value="<?= $row['nama_penerbit'] ?>" required />
        </label> <br>
        <label>
            Email:--
            <input type="text" name="email_penerbit" value="<?= $row['email'] ?>" required />
        </label> <br>
        <label>
            Telpon:--
            <input type="text" name="telp_penerbit" value="<?= $row['telp'] ?>" required />
        </label> <br>
        <label>
            Alamat:--
            <input type="text" name="alamat_penerbit" value="<?= $row['alamat'] ?>" required />
        </label> <br>
        <label>
            <input type="submit" class="btn btn-success" name="edit_data" value="Simpan Perubahan" />
        </label>
        </form>
        
    <?php
    }

    ?>
    <table class="table" width="50%" border="1">
        <tr>
            <th>ID</th>
            <th>Nama Penerbit</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($penerbit = mysqli_fetch_array($data_penerbit)) {
            echo "<tr>";
            echo "<td>" . $penerbit['id_penerbit'] . "</td>";
            echo "<td>" . $penerbit['nama_penerbit'] . "</td>";
            echo "<td>" . $penerbit['email'] . "</td>";
            echo "<td>" . $penerbit['telp'] . "</td>";
            echo "<td>" . $penerbit['alamat'] . "</td>";
            echo "<td> <a class='btn btn-primary' href='?edit=true&id=" . $penerbit['id_penerbit'] . "'>Edit</a> | <a class='btn btn-danger' href='?delete=true&id=" . $penerbit['id_penerbit'] . "' >Hapus</a> </td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>