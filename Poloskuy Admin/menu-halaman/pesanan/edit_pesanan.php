<?php
require "../../system/func_web.php";
$id = $_GET["id"];
$updt = new fitur();

session_start();
if (!isset($_SESSION['id_admin'])) {
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: ../navigasi/login.php');
}
$sysId    = $_SESSION["id_admin"];
$sysEmail = $_SESSION["email"];
$sysUser  = $_SESSION["username"];
$sysFname = $_SESSION["fullname"];
$sysFoto  = $_SESSION["foto"];
$sysLevel = $_SESSION["id_level"];
if(isset($_GET["id"])){

  $editKonf = $updt->update('transaksi',['id_admin'=>$sysId,'id_status'=>'2'],"id_transaksi='$id'");


  if($editKonf){
    ?>
    <script>alert("Berhasil mengkonfirmasi data");
    location.href = "list_pesanan.php";
    </script>

    <?php
  } else {
    ?>
    <script>alert("gagal mengkonfirmasi data");
    location.href = "list_pesanan.php";
    </script>
    <?php
}

}


?>