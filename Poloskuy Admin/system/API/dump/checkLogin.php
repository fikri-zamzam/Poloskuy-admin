<?php
//memanggil koneksi
require('../func_web.php');
require('sistemAPI.php');
$sysApi = new ApiSistem();
$db = new fitur();

//jika sudah tersambung untuk request username dan password
if (isset($_POST["email"]) && $_POST["password"] ) {

   $email = $_POST['email'];
   $password = $_POST['password'];

   //membuat query untuk tersambung ke mysql
   $result = $db->execute("SELECT * FROM user WHERE email = '$email'");
   $row = mysqli_num_rows($result);

   while($data = mysqli_fetch_array($result)) {
      $id      = $data["id_user"];
      $emaildb = $data["email"];
      $passdb = $data["password"];
   }

   $response = array();

   //variable untuk baris untuk mengeluarkan jumlah baris yang terdeteksi result

   if($row != 0){
      if($email == $emaildb) {
        if($password == $passdb){
         $response['success'] = "1";
         $response['message'] = "Login Berhasil";
         $query = $db->execute("SELECT * FROM user WHERE id_user = '$id'");
         $data = mysqli_fetch_assoc($query);
         $response['details'] = $data;

        } else {
         $response['success'] = "1";
         $response['message'] = "Password yang anda masukan salah";

        }
      } 
    } else if($row == 0) {
      $response['success'] = "1";
      $response['message'] = "Tidak dapat menemukan email";

    }
}
echo json_encode($response);
$db->Tutup();
