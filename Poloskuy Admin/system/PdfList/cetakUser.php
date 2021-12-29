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
    /* th{
      background-color: #ffffff;
      color : #ffffff
      font-weight: bold;
    } */
    table{
      border-collapse : collapse;
      width: 110%;
    }
  </style>
  <body>
    <table border="1">
      <thead>
        <tr style="text-align: center;">
          <th style="width: 5%">
            No
          </th>
          <th>
            ID User
          </th>
          <th>
            Email
          </th>
          <th>
            Password
          </th>
          <th>
            Nama Lengkap
          </th>
          <th>
            No Telepon
          </th>
          <th>
            Jenis kelamin
          </th>
          <th >
            Alamat
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
          $no = 1;
          $lht_User = $db->getData("user","*");
          foreach ($lht_User as $key => $res) {
        ?>
        <tr style="text-align: center;">
          <td style="width: 5%">
            <?= $no; ?>
          </td>
          <td>
            <?= $res["id_user"]; ?>
          </td>
          <td>
            <?= $res["email"]; ?>
          </td>
          <td>
            <?= $res["password"]; ?>
          </td>
          <td>
            <?= $res["user_fullname"]; ?>
          </td>
          <td>
            <?= $res["no_telp"]; ?>
          </td>
          <td>
            <?= (($res["gender"] == "L") ? "Laki-laki" : "Perempuan" )?>
          </td>
          <td>
            <?= $res["alamat"]; ?>
          </td>
        </tr>
          <?php $no++; } ?>
      </tbody>
    </table>
  </body>
</html>