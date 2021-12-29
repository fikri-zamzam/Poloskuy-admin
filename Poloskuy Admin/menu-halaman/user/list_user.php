<?php 
require("../../system/func_web.php");
$db = new fitur();

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

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Data User</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
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
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 style="text-align: center; font-size: 230%;" class="card-title">DATA USER</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark table-hover table-striped">
                      <thead>
                        <tr style="text-align: center;">
                          <th>
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
                          <th>
                            Foto
                          </th>
                          <th>
                          Action
                        </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $batas   = 5;
                          $halaman = @$_GET['halaman'];
                          if(empty($halaman)){
                              $posisi  = 0;
                              $halaman = 1;
                          }
                          else{
                              $posisi  = ($halaman-1) * $batas;
                          }
                          
                          $no = $posisi+1;
                          $lht_User = $db->getData("user order by id_user desc limit $posisi,$batas","*");
                          foreach ($lht_User as $key => $res) {
                        ?>
                        <tr style="text-align: center;">
                          <td >
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
                          <td>
                            <img src="../../images/db/user/<?=$res["img_resize"]?>" alt="">
                          </td>
                          <td>
                            <div class="mt-3">
                              <a class="btn btn-dark font-weight-medium auth-form-btn btn-icon-append btn-sm" href="edit_user.php?id=<?=$res["id_user"]?>">
                                <i class="mdi mdi-pencil"></i>
                              </a><br>
                              <br><a class="btn btn-danger font-weight-medium auth-form-btn btn-icon-append btn-sm" href="del_user.php?id=<?=$res["id_user"]?>">
                                <i class="mdi mdi-delete"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                          <?php $no++; } ?>
                      </tbody>
                    </table>
                  </div>
                  <?php 
                    $query2 = $db->execute("SELECT * FROM user");
                    $row  = mysqli_num_rows($query2);
                    $jmlhalaman = ceil($row/$batas);
                  ?>
                  <div class="mt-5">
                    <div class="text-center">
                      <ul class="pagination pagination-md justify-content-center">
                      <?php
                        for($i=1;$i<=$jmlhalaman;$i++) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' href='list_user.php?halaman=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item active'><a class='page-link' href='#'>$i</a></li>";
                            }
                        }
                        ?>
                      </ul>
                    </div>
                  </div>
                  <br><a href="../../system/cetak-pdf.php?id=cetakUser.php&jd=Data User">
                  <button type="button" class="btn btn-dark btn-icon-text">
                    CETAK
                    <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                  </button></a>
                </div>
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
