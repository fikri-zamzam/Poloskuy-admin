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
      width: 100%;
    }
  </style>
  <body>
    <table border="1">
      <thead>
        <tr class="table-primary" style="text-align: center;">
            <th style="width: 7%">
              No
            </th>
            <th>
              ID Detil Transaksi
            </th>
            <th>
              ID Transaksi
            </th>
            <th>
              ID Produk
            </th>
            <th style="width: 20%">
              Nama Produk
            </th>
            <th>
              Sub Total
            </th>
            <th >
              Tanggal
            </th>
            <th style="width: 7%">
              QTT
            </th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $no = 1;
          $join = "transaksi INNER JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi";
          $where = "transaksi.id_status = 'STMKFXER'";
          $lht_Produk = $db->getData($join,"*",$where);
          foreach ($lht_Produk as $key => $res) {
            
          ?>
          <tr style="text-align: center">
            <td style="width: 7%">
              <?= $no ?>
            </td>
            <td>
              <?= $res["id_detail_trans"] ?>
            </td>
            <td>
              <?= $res["id_transaksi"] ?>
            </td>
            <td >
              <?= $res["id_produk"] ?>
            </td>
            <td style="width: 20%">
              <?= $db->FindID("nama_produk",$res["id_produk"]) ?>
            </td>
            <td >
              <?= $res["sub_total"] ?>
            </td>
            <td>
              <?= $res["tanggal"] ?>
            </td>
            <td style="width: 7%">
              <?= $res["kuantitas"] ?>
            </td>
          </tr>
        <?php $no++;} ?>
      </tbody>
    </table>
  </body>
</html>