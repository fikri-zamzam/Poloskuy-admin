<!DOCTYPE html>
<html lang="en">

<?php 
require("../../system/func_web.php");
require("../../system/upload-oop.php");
$db = new fitur();
$img = new ClassUpload();
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
?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Laporan Penjualan</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/Logo_poloskuy1.png" />
</head>

<body>
  <div class="container-scroller d-flex">
    <!-- partial:../../partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        
        <li class="nav-item sidebar-category">
          <p>Navigation</p>
          <span></span>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../../index.php">
            <i class="mdi mdi-view-quilt menu-icon"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item sidebar-category">
          <p>Management</p>
          <span></span>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="mdi mdi-shopping menu-icon"></i>
            <span class="menu-title">Menu Barang</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../barang/add_barang.php">Tambah</a></li>
              <li class="nav-item"> <a class="nav-link" href="../barang/list_barang.php">Lihat</a></li>
              <li class="nav-item"> <a class="nav-link" href="../barang/z_list_kategori.php">Kategori</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic2">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Menu User</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic2">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../user/add_user.php">Tambah</a></li>
              <li class="nav-item"> <a class="nav-link" href="../user/list_user.php">Lihat</a></li>
              <li class="nav-item"> <a class="nav-link" href="../user/z_list_blacklist.php">BlackList</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>Administrasi</p>
          <span></span>
        </li>
        <?php if($sysLevel == 1) { ?>
        <li class="nav-item">
          <a class="nav-link" href="../admin/list_admin.php">
            <i class="mdi mdi-clipboard-account menu-icon"></i>
            <span class="menu-title">Menu Admin</span>
            <div class="badge badge-info badge-pill"></div>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic3">
            <i class="mdi mdi-chart-line menu-icon"></i>
            <span class="menu-title">Laporan</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic3">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../laporan/rcd_keuntungan.php">Record Keuntungan</a></li>
              <li class="nav-item"> <a class="nav-link" href="../laporan/rcd_penjualan.php">Record Penjualan</a></li>
            </ul>
          </div>
        </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic3">
            <i class="mdi mdi-cart-outline menu-icon"></i>
            <span class="menu-title">Transaksi toko</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic4">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../pesanan/list_pesanan.php">Pesanan</a></li>
              <li class="nav-item"> <a class="nav-link" href="../transaksi/list_transaksi.php">Transaksi</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>lain lain</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../../navigasi/logout.php">
            <i class="mdi mdi mdi-logout menu-icon"></i>
            <span class="menu-title">Keluar</span>
            <div class="badge badge-info badge-pill"></div>
          </a>
        </li>
        
      </ul>
    </nav>
<!-- partial -->
<div class="container-fluid page-body-wrapper">
  <!-- partial:./partials/_navbar.html -->
  <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
      <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
        <span class="mdi mdi-menu"></span>
      </button>
      <div class="navbar-brand-wrapper">
        <a class="navbar-brand brand-logo" href="index.php"><img src="../../images/logo_poloskuy1.png" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../../images/logo_poloskuy2.png" alt="logo"/></a>
      </div>
      <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome Home Admin <?=$sysUser?></h4>
      <ul class="navbar-nav navbar-nav-right">
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
    <div class="navbar-menu-wrapper navbar-search-wrapper d-none d-lg-flex align-items-center">
      <ul class="navbar-nav mr-lg-2">
        <li class="nav-item nav-search d-none d-lg-block">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search Here..." aria-label="search" aria-describedby="search">
          </div>
        </li>
      </ul>
      <ul class="navbar-nav navbar-nav-right">
        <li class="nav-item nav-profile dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
            <img src="../../images/db/admin/<?=$sysFoto?>" alt="profile"/>
            <span class="nav-profile-name"><?=$sysFname?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
            <a href="../../navigasi/logout.php" class="dropdown-item">
              <i class="mdi mdi-logout text-primary"></i>
              Logout
            </a>
          </div>
        </li>
        <li class="nav-item">
          <ul class="navbar-nav mr-lg-2">
          <b><p style="color:black; font-family:sans-serif;" >Date : <span id="tanggalwaktu"></span></p></b>
          <script>
          var dt = new Date();
          document.getElementById("tanggalwaktu").innerHTML = (("0"+dt.getDate()).slice(-2)) +"."+ (("0"+(dt.getMonth()+1)).slice(-2)) +"."+ (dt.getFullYear()) +" "+ (("0"+dt.getHours()).slice(-2)) +":"+ (("0"+dt.getMinutes()).slice(-2));
          </script>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 style="text-align: center; font-size: 180%;" class="card-title">POLOSKUY</h4>
                  <h4 style="text-align: center; font-size: 180%;" class="card-title">Record Penjualan</h4>
                  <h5 style="text-align: center; font-size: 100%;" class="card-title">Per 31 Agustus - 30 November 2021</h5><br>
                  <div class="table-responsive">
                    <table class="table table-bordered ">
                      <thead>
                      <tr class="table-primary" style="text-align: center;">
                          <th>
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
                          <th>
                            Nama Produk
                          </th>
                          <th>
                            Sub Total
                          </th>
                          <th>
                            Tanggal
                          </th>
                          <th>
                            Kuantitas
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
                          <td>
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
                          <td>
                            <?= $db->FindID("nama_produk",$res["id_produk"]) ?>
                          </td>
                          <td >
                            <?= $res["sub_total"] ?>
                          </td>
                          <td>
                            <?= $res["tanggal"] ?>
                          </td>
                          <td>
                            <?= $res["kuantitas"] ?>
                          </td>

                        </tr>
                        <?php $no++;} ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="mt-3">
            <a class="btn btn-dark font-weight-medium auth-form-btn" href="../../system/cetak-pdf.php?id=cetakPenjualan.php&jd=Data Penjualan">
              <i class="mdi mdi-printer btn-icon-append"></i>
              CETAK
            </a>
          </div>
        </div>
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © poloskuy.com 2021</span>
          </div>
        </footer>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- End custom js for this page-->
</body>

</html>