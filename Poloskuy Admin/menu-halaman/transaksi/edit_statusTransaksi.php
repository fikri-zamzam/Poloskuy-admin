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

  $id = $_GET["id"];
  if(isset($_POST["edit"])){
    $stat = $db->penjernih($_POST["statKirim"]);
    $edit = $db->update('transaksi',['id_status'=>$stat],"id_transaksi='$id'");
    
    if ($edit){
      ?>
      <script>
        alert("Selamat status pesanan Berhasil diubah");
        location.href = "list_transaksi.php";
      </script>
      <?php
    } else {
      ?>
      <script>
        alert("Maaf status pesanan Gagal diubah");
        location.href = "list_barang.php";
      </script>
      <?php
    }
  }


$ambil = $db->getData("transaksi","*","id_transaksi='$id'");
foreach ($ambil as $key => $edt) {
  $id_trans = $edt["id_transaksi"];
  $id_admin = $edt["id_admin"];
  $id_user  = $edt["id_user"];
  $tgl      = $edt["tanggal_transaksi"];
  $stat   = $edt["id_status"];
  $totalHrg = $edt["total_harga"];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Edit Status Transaksi</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/Logo_poloskuy1.png"/>
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
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 style="text-align: center; font-size: 230%;" class="card-title">DETAIL TRANSAKSI</h4><br>
                  <form class="form-sample" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID Transaksi</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="id_trans" value="<?=$id_trans?>" placeholder="ID Transaksi" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID Admin</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="id_admin" value="<?= $db->FindID("nama_admin","$id_admin") ?>" placeholder="ID Admin" readonly/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">ID User</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="id_user" value="<?=$id_user?>" placeholder="ID User" readonly/>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Tanggal</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="tgl" value="<?=$tgl?>" readonly />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Status Pengiriman</label>
                          <div class="col-sm-9">
                            <select style="margin-top: 15px;" class="custom-select" name="statKirim">
                                <?php $lth_kat = $db->getData("status","*","id_status != 'STMKFXER' ");
                                foreach ($lth_kat as $key => $res) {
                                ?>
                                <option value="<?=$res["id_status"];?>" <?= (($stat == $res["id_status"] ) ? "selected" : ""); ?> > <?=$res["jenis_status"]; ?> </option>
                                <?php } ?>
                            </select>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    
                    <!-- tabel detail transaksi yang dilakukan -->
                    <div class="table-responsive pt-3">
                    <table class="table table-bordered ">
                      <thead class="thead-dark">
                        <tr style="text-align: center">
                          <th>
                            No
                          </th>
                          <th >
                            ID Detail Transaksi
                          </th>
                          <th >
                            ID Produk
                          </th>
                          <th >
                            Kuantitas
                          </th>
                          <th >
                            Tanggal Pemesanan
                          </th>
                          <th >
                            Sub Total
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                        $no = 1;
                        $lht_Produk = $db->getData("detail_transaksi","*","id_transaksi = '$id'");
                        foreach ($lht_Produk as $key => $res) {
                          
                        ?>
                        <tr style="text-align: center">
                          <td>
                            <?= $no ?>
                          </td>
                          <td>
                            <?= $res["id_detail_trans"] ?>
                          </td>
                          <td >
                            <?= $res["id_produk"] ?>
                          </td>
                          <td>
                            <?= $res["kuantitas"] ?>
                          </td>
                          <td>
                            <?= $res["tanggal"] ?>
                          </td>
                          <td >
                            <?= $db->rupiah($res["sub_total"]) ?>
                          </td>

                        </tr>
                        <?php $no++;} ?>
                        <tr style="text-align:center">
                          <td colspan="4" class="table-dark">

                          </td>
                          <td>
                            <b>Total Harga :</b>
                          </td>
                          <td>
                            <b><?=$db->rupiah($totalHrg)?></b>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                    <div class="mt-5" >
                      <button class="btn btn-dark font-weight-medium auth-form-btn" type="submit" name="edit">Ubah Status</button>
                      <a class="btn btn-light font-weight-medium auth-form-btn" href="list_transaksi.php">Batal</a>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © poloskuy.com 2021</span>
          </div>
    </footer>
    <!-- partial -->
      </div>
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="../../js/file-upload.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
