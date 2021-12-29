<?php
include_once '../func_web.php';

class ApiSistem extends fitur {

    public function userBaru($email)
    {
        $sql = $this->execute("SELECT email FROM user WHERE email='$email'");
        $jml = mysqli_num_rows($sql);

        if($jml > 0){
            return true;
        } else {
            return false;
        }
        
    }

    // public function simpanUser($email,$username,$password,$nama,$tgl,$noTelp,$gender,$alamat)
    // {
    //     # code...
    // }

    // public function isUserExisted($email) {
    //     $stmt = $this->conn->prepare("SELECT email from tbl_user WHERE email = ?");
 
    //     $stmt->bind_param("s", $email);
 
    //     $stmt->execute();
 
    //     $stmt->store_result();
 
    //     if ($stmt->num_rows > 0) {
    //         // user telah ada 
    //         $stmt->close();
    //         return true;
    //     } else {
    //         // user belum ada 
    //         $stmt->close();
    //         return false;
    //     }
    // }

}
?>