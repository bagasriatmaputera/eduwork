<?php
$host = 'localhost'; 
$username = 'root'; 
$password = ''; 
$database = 'perpus'; 

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Could not connect to server: " . mysqli_connect_error());
}
//     echo "Connecting to server";
//     mysqli_close($conn);
// }

$sql = "SELECT * FROM anggota";
$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Anggota: " . $row['nama'] . " " . $row['alamat'] . " " . $row['telp'] . "<br>";
    }
} else {
    echo "0 result";
}

echo"<br>";
echo"<br>";


$sql1 = "SELECT * FROM buku";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    while($row1 = $result1->fetch_assoc()) {
        echo"Buku: " . $row1['judul'] . " " . $row1['tahun'] . " " . $row1['harga_pinjam'] . "<br>";
    }
}else{
    echo "0 result";
}
$conn->close();

?>
