<?php

require "../../system/func_web.php";
$id = $_GET["id"];
$del = new fitur();

session_start();
if (!isset($_SESSION['id_admin'])) {
  $_SESSION['msg'] = 'anda harus login untuk mengakses halaman ini';
  header('Location: ../navigasi/login.php');
}


if(isset($_GET["id"])){
  $hapus = $del->delete('user',"id_user='$id'");
}


if($hapus){
    ?>
    <script>alert("Berhasil menghapus data");
    location.href = "list_user.php";
    </script>

    <?php
  } else {
    ?>
    <script>alert("gagal menghapus data");
    location.href = "list_user.php";
    </script>
    <?php
}
?>