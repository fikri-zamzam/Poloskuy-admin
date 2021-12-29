<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db = 'db_poloskuy';

$konek = mysqli_connect($host, $username, $password, $db);

if (mysqli_connect_errno()) {
    echo "Koneksi gagal : " . mysqli_connect_error();
} else {
    echo "Koneksi Berhasil";
}
