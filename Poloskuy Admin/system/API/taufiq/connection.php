<?php
// //menyambungkan file config php
// include 'configDB.php';
// //membuat varibale connection berisi variable yang tadi
// $con = mysqli_connect(SERVER,UID,PASSWORD,DB_Name);
$connection = null;
try {
   //config
   $host = "localhost"; //jika lokal
   $username = "root";
   $password = "";
   $dbname = "db_poloskuy";

   // $host = "localhost"; //jika online
   // $username = "id18032325_db_userpoloskuy";
   // $password = "<#+%$0a]z*92)xrB";
   // $dbname = "id18032325_poloskuy";


   $database = "mysql:dbname=$dbname;host=$host";
   $connection = new PDO($database, $username, $password);
   $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   if ($connection) {
      echo "Koneksi Berhasil";
   } else {
      echo "Koneksi Gagal";
   }
} catch (PDOException $e) {
   echo "Error !" . $e->getMessage();
   die;
}
