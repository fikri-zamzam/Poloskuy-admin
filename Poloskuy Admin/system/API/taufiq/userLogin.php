<?php


include 'connection.php';

if ($_POST) {

   //Data
   $email = $_POST['email'] ?? '';
   $password = $_POST['password'] ?? '';

   $response = []; //Data Response

   //Cek username didalam databse
   $emailQuery = $connection->prepare("SELECT * FROM user where email = ?");
   $emailQuery->execute(array($email));
   $query = $emailQuery->fetch();

   if ($emailQuery->rowCount() == 0) {
      $response['status'] = false;
      $response['message'] = "Email Tidak Terdaftar";
   } else {
      // Ambil password di db

      $passwordDB = $query['password'];

      if (strcmp(md5($password), $passwordDB) === 0) {
         $response['status'] = true;
         $response['message'] = "Login Berhasil";
         $response['data'] = [
            'id' => $query['id_user'],
            'email' => $query['email'],
            'userfullname' => $query['user_fullname'],
            'notelp' => $query['no_telp'],
            'alamat' => $query['alamat']
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
