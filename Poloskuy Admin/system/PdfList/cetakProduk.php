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
  <div class="table-responsive pt-3">
    <table border="1" >
      <thead>
        <tr style="text-align: center;">
          <th style="width: 5%">
            No
          </th>
          <th style="">
            ID Produk
          </th>
          <th style="">
            Nama Produk
          </th>
          <th style="">
            Harga Produk
          </th>
          <th style="">
            Stok Produk
          </th>
          <th style="">
            Tanggal Masuk
          </th>
          <th style="">
            Kategori
          </th>
        </tr>
      </thead>
      <tbody >
        <?php 

        $no =1;
        $lht_Produk = $db->getData("produk","*");
        foreach ($lht_Produk as $key => $res) {
          
        ?>
        <tr style="text-align: center;">
          <td style="width: 5%">
            <?= $no; ?>
          </td>
          <td style="">
            <?= $res["id_produk"]; ?>
          </td>
          <td style="">
            <?= $res["nama_produk"]; ?>
          </td>
          <td style="">
            <?= $res["harga"]; ?>
          </td>
          <td style="">
            <?= $res["stok"]; ?>
          </td>
          <td style="">
            <?= $res["tgl_masuk"]; ?>
          </td>
          <td style="">
            <?= $db->FindID("nama_kategori",$res["id_kategori"]) ?>
          </td>
        </tr>
        <?php $no++;} ?>
      </tbody>
    </table>
  </div>
  </body>
</html>