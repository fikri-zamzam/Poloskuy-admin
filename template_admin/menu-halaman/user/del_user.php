<?php

require "../../system/func_web.php";
$id = $_GET["id"];
$del = new fitur();

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