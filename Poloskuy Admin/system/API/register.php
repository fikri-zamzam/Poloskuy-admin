<?php
require('../func_web.php');
require('sistemAPI.php');
$sysApi = new ApiSistem();
$db = new fitur();



if (isset($_POST['email']) && isset($_POST['password'])  ) {
    $id = $db->buatID("id_user");
    $email = $_POST["email"];
    $pass  = $_POST["password"];
    $fullname  = $_POST["fullname"];
    $telfon = $_POST["noTelp"];
    $gender = $_POST["jk"];
    $alamat = $_POST["alamat"];

    $cekUser = $sysApi->userBaru($email);
    $response = array();

    if($cekUser){
        array_push($response, array(
            'status' => 'Email sudah digunakan'
         ));
    }else {
       
       $masukData = $db->execute("INSERT INTO user VALUES ('$id','$email','$pass','$fullname','$telfon','$gender','$alamat','','')");

       if($masukData) {

        array_push($response, array(
            'status' => 'OK'
         ));

       } else {
        array_push($response, array(
            'status' => 'Data gagal masuk'
         ));

       }
    }

} else {
    array_push($response, array(
        'status' => 'Data tidak lengkap'
     ));
}

echo json_encode(array("server_response" => $response));
$db->Tutup();
?>