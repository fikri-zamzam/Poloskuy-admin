<?php
require("connection.php");
$connection = new PDO('mysql:host=localhost;dbname=db_poloskuy', "root", "");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$hasilDB = $connection->query('SELECT * FROM user');

if ($connection > 0) {
    $response["kode"] = 1;
    $response["pesan"] = "Data Tersedia";
    $response["data"] = array();

    while ($ambil = $hasilDB->fetch(PDO::FETCH_ASSOC)) {
        $F["id_user"] = $ambil->id_user;
        $F["user_fullname"] = $ambil->user_fullname;
        $F["alamat"] = $ambil->alamat;
        $F["no_telp"] = $ambil->no_telp;

        array_push($response["data"], $F);
    }
} else {
    $response["kode"] = 0;
    $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
