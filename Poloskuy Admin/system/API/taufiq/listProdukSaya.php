<?php
require("koneksi_native.php");
$perintah = "SELECT * FROM produk";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if ($cek > 0) {
   $response["kode"] = 1;
   $response["pesan"] = "Data Tersedia";

   $response["dataProduk"] = array();

   while ($ambil = mysqli_fetch_object($eksekusi)) {
      $FI["id_produk"] = $ambil->id_produk;
      $FI["nama_produk"] = $ambil->nama_produk;
      $FI["harga"] = $ambil->harga;
      $FI["id_kategori"] = $ambil->id_kategori;
      $FI["deskripsi"] = $ambil->deskripsi;
      $FI["img"] = $ambil->img;

      array_push($response["dataProduk"], $FI);
   }
} else {
   $response["kode"] = 0;
   $response["pesan"] = "Data Tidak Tersedia";
}

echo json_encode($response);
mysqli_close($konek);
