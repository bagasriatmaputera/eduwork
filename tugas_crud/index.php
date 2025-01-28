<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        .table {
            text-align: center;
        }
    </style>
</head>

<body>
    <?php
    include 'layouts/header.php';
    include 'connection.php';
    $buku = mysqli_query($conn, "SELECT buku.*, nama_pengarang, nama_penerbit, katalog.nama as nama_katalog FROM buku 
                                        LEFT JOIN  pengarang ON pengarang.id_pengarang = buku.id_pengarang
                                        LEFT JOIN  penerbit ON penerbit.id_penerbit = buku.id_penerbit
                                        LEFT JOIN  katalog ON katalog.id_katalog = buku.id_katalog
                                        ORDER BY judul ASC");
    //hapus data
    if (isset($_GET['delete']) && ($_GET['delete']) == 'true') {
        $isbn = $_GET['isbn'];

        //hapus isbn terlebih dahulu karena FK
        mysqli_query($conn, "DELETE FROM detail_peminjaman WHERE isbn='$isbn'");

        $result = mysqli_query($conn, "DELETE FROM buku WHERE isbn='$isbn'");


        if ($result) {
            echo "Berhasi menghapus <br>";
            //auto reload
            header('Location:' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Gagal Menghapus:" . mysqli_error($conn);
        }
    }

    //men edit data
    if (isset($_POST['submit'])) {
        $isbn = mysqli_real_escape_string($conn, $_POST['isbn']);
        $judul = mysqli_real_escape_string($conn, $_POST['judul']);
        $tahun = mysqli_real_escape_string($conn, $_POST['tahun']);
        $id_pengarang = mysqli_real_escape_string($conn, $_POST['id_pengarang']);
        $id_penerbit = mysqli_real_escape_string($conn, $_POST['id_penerbit']);
        $id_katalog = mysqli_real_escape_string($conn, $_POST['id_katalog']);
        $qty_stok = mysqli_real_escape_string($conn, $_POST['qty_stok']);
        $harga_pinjam = mysqli_real_escape_string($conn, $_POST['harga_pinjam']);

        $id = mysqli_real_escape_string($conn, $_GET['isbn']);

        $result = mysqli_query($conn, "UPDATE buku 
    SET 
        isbn = '$isbn', 
        judul = '$judul', 
        tahun = '$tahun', 
        id_pengarang = '$id_pengarang', 
        id_penerbit = '$id_penerbit', 
        id_katalog = '$id_katalog', 
        qty_stok = '$qty_stok', 
        harga_pinjam = '$harga_pinjam'
    WHERE 
        isbn = '$id'
");
        if ($result) {
            echo "Berhasil merubah";
            header('Location:' . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Gagal merubah: " .  mysqli_error($conn);
        }
    }

    ?>
    <!-- edit form -->
    <?php
    if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
        $isbn = $_GET['isbn'];
        $result = mysqli_query($conn, "SELECT * FROM buku WHERE isbn= '$isbn' ");
        $row = mysqli_fetch_array($result);
    ?>

        <form method="post">
            <label>
                ISNB :--
                <input type="text" name="isbn" value="<?= $row['isbn'] ?>" required>
            </label> <br>
            <label>
                JUDUL :--
                <input type="text" name="judul" value="<?= $row['judul'] ?>" required>
            </label> <br>
            <label>
                TAHUN :--
                <input type="text" name="tahun" value="<?= $row['tahun'] ?>" required>
            </label> <br>
            <label>
                PENGARANG :--
                <input type="text" name="id_pengarang" value="<?= $row['id_pengarang'] ?>" required>
            </label> <br>
            <label>
                PENERBIT :--
                <input type="text" name="id_penerbit" value="<?= $row['id_penerbit'] ?>" required>
            </label> <br>
            <label>
                KATALOG :--
                <input type="text" name="id_katalog" value="<?= $row['id_katalog'] ?>" required>
            </label> <br>
            <label>
                STOK :--
                <input type="text" name="qty_stok" value="<?= $row['qty_stok'] ?>" required>
            </label> <br>
            <label>
                HARGA PINJAM :--
                <input type="text" name="harga_pinjam" value="<?= $row['harga_pinjam'] ?>" required>
            </label> <br>
            <input type="submit" class="btn btn-success" name="submit">
        </form>

    <?php
    }

    ?>

    <div class="table_buku">

        <table class="table" width='80%' border=1>
            <tr>
                <th>ISBN</th>
                <th>Judul</th>
                <th>Tahun</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Katalog</th>
                <th>Stok</th>
                <th>Harga Pinjam</th>
                <th>Aksi</th>
            </tr>
            <!-- Data disini akan ditampilkan -->
            <?php
            while ($data_buku = mysqli_fetch_array($buku)) {
                echo "<tr>";
                echo "<td>" . $data_buku['isbn'] . "</td>";
                echo "<td>" . $data_buku['judul'] . "</td>";
                echo "<td>" . $data_buku['tahun'] . "</td>";
                echo "<td>" . $data_buku['nama_pengarang'] . "</td>";
                echo "<td>" . $data_buku['nama_penerbit'] . "</td>";
                echo "<td>" . $data_buku['nama_katalog'] . "</td>";
                echo "<td>" . $data_buku['qty_stok'] . "</td>";
                echo "<td>" . $data_buku['harga_pinjam'] . "</td>";
                echo "<td><a class='btn btn-primary' href='?edit=true&isbn=$data_buku[isbn]'>Edit</a> | <a class='btn btn-danger' href='?delete=true&isbn=$data_buku[isbn]'>Delete</a></td></tr>";
            }
            ?>
        </table>
    </div>

</body>

</html>