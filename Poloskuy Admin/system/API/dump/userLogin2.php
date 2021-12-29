<?php


// include 'connection.php';

require('../func_web.php');
require('sistemAPI.php');
$sysApi = new ApiSistem();
$db = new fitur();

if ($_POST) {

   //Data
   $email = $_POST['email'];
   $password = $_POST['password'];

   $response = []; //Data Response

   //Cek username didalam databse

   // $emailQuery = $connection->prepare("SELECT * FROM user where email = ?");
   // $emailQuery->execute(array($email));
   // $query = $emailQuery->fetch();

   $result = $db->execute("SELECT * FROM user WHERE email = '$email'");
   $rowDB = mysqli_fetch_array($result);

   if ($db->hitungRow($result) == 0) {
      $response['status'] = false;
      $response['message'] = "Email Tidak Terdaftar";
   } else {
      // Ambil password di db

      $passwordDB = $rowDB['password'];

      if (strcmp(md5($password), $passwordDB) === 0) {
         $response['status'] = true;
         $response['message'] = "Login Berhasil";
         $response['data'] = [
            'id' => $rowDB['id_user'],
            'email' => $rowDB['email'],
            'userfullname' => $rowDB['user_fullname'],
            'notelp' => ['no_telp'],
            'alamat' => ['alamat']
         ];
      } else {
         $response['status'] = false;
         $response['message'] = "Password anda salah";
      }
   }

   //Jadikan data JSON
   $json = json_encode($response, JSON_PRETTY_PRINT);

   //Print
   echo $json;
}
