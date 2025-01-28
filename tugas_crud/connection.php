<?php
$username = "root";
$hostname = "localhost";
$database = "perpus";
$password = "";

$conn = mysqli_connect($hostname, $username, $password, $database);

if(!$conn){
    echo "Could not connect to db, plase tell administrator";
}
?>