<?php 

require("../func_web.php");
$db = new fitur();
if(isset($_POST["cetak"])) {
    header("location: cetak-pdf.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->

    <title>Hello, world!</title>
  </head>
  <style>
    table{
      border-collapse : collapse;
      width: 110%;
    }
  </style>
  <body>
    <table border="1">
    <thead>
    <tr style="text-align: center;">
        <th style="width: 10%;">
        No
        </th>
        <th>
        ID Admin
        </th>
        <th>
        Nama Admin
        </th>
        <th>
        Email
        </th>
        <th>
        Username
        </th>
        <th>
        Password
        </th>
        <th>
        Level
        </th>
    </tr>
    </thead>
    <tbody>
    <?php

        $no = $posisi+1;
        $lht_Admin = $db->getData("admin","*");
        foreach ($lht_Admin as $key => $res) {
    ?>
    <tr style="text-align: center;">
        <td style="width: 10%;">
        <?=$no?>
        </td>
        <td>
        <?=$res["id_admin"]?>
        </td>
        <td>
        <?=$res["nama_admin"]?>
        </td>
        <td>
        <?=$res["email"]?>
        </td>
        <td>
        <?=$res["username"]?>
        </td>
        <td>
        <?=$res["password"]?>
        </td>
        <td>
        <?= (($res["id_level"] == "1") ? "Owner" : "Admin" )?>
        </td>
    </tr>
    <?php $no++;}?>
    </tbody>
    </table>
  </body>
</html>