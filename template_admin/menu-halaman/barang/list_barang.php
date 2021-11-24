<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
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
          <a class="nav-link" href="../../index.html">
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
              <li class="nav-item"> <a class="nav-link" href="../barang/add_barang.html">Tambah</a></li>
              <li class="nav-item"> <a class="nav-link" href="../barang/list_barang.html">Lihat</a></li>
              <li class="nav-item"> <a class="nav-link" href="../barang/z_list_caraousel.html">Carousel</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="../user/add_user.html">Tambah</a></li>
              <li class="nav-item"> <a class="nav-link" href="../user/list_user.html">Lihat</a></li>
              <li class="nav-item"> <a class="nav-link" href="../user/z_list_blacklist.html">BlackList</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>Administrasi</p>
          <span></span>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="../admin/list_admin.html">
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
              <li class="nav-item"> <a class="nav-link" href="../laporan/rcd_keuntungan.html">Record Keuntungan</a></li>
              <li class="nav-item"> <a class="nav-link" href="../laporan/rcd_penjualan.html">Record Penjualan</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#ui-basic4" aria-expanded="false" aria-controls="ui-basic3">
            <i class="mdi mdi-cart-outline menu-icon"></i>
            <span class="menu-title">Transaksi toko</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic4">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../pesanan/list_pesanan.html">Pesanan</a></li>
              <li class="nav-item"> <a class="nav-link" href="../transaksi/list_transaksi.html">Transaksi</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item sidebar-category">
          <p>lain lain</p>
          <span></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/samples/login-2.html">
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
                <a class="navbar-brand brand-logo" href="index.html"><img src="../../images/logo_poloskuy1.png" alt="logo"/></a>
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../../images/logo_poloskuy2.png" alt="logo"/></a>
              </div>
              <h4 class="font-weight-bold mb-0 d-none d-md-block mt-1">Welcome Home Admin</h4>
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
                    <img src="../../images/faces/face_admin.jpg" alt="profile"/>
                    <span class="nav-profile-name">Muhammad Akbar Rayyan</span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                    <a class="dropdown-item">
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
                  <h4 style="text-align: center; font-size: 230%;" class="card-title">DATA BARANG</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-dark table-hover table-striped" >
                      <thead>
                        <tr>
                          <th style="text-align: center;">
                            No
                          </th>
                          <th style="text-align: center;">
                            ID Produk
                          </th>
                          <th style="text-align: center;">
                            Nama Produk
                          </th>
                          <th style="text-align: center;">
                            Harga Produk
                          </th>
                          <th style="text-align: center;">
                            Stok Produk
                          </th>
                          <th style="text-align: center;">
                            Tanggal Masuk
                          </th>
                          <th style="text-align: center;">
                            Deskripsi Produk
                          </th>
                          <th style="text-align: center;">
                            ID Kategori
                          </th>
                          <th style="text-align: center;">
                            Rating
                          </th>
                          <th style="text-align: center;">
                            Foto Produk
                          </th>
                          <th style="text-align: center;">
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td style="text-align: center;">
                            1
                          </td>
                          <td style="text-align: center;">
                            P11
                          </td>
                          <td style="text-align: center;">
                            Hoodie Jumper
                          </td>
                          <td>
                            Rp. 115.000
                          </td>
                          <td style="text-align: center;">
                            50
                          </td>
                          <td style="text-align: center;">
                            10/11/2001
                          </td>
                          <td>
                            Bahan : Katun Fleece Tebel, Lembut, nyerep keringat, nyaman digunakan dan warnanya dijamin nggak pudar/luntur.
                          </td>
                          <td>
                            H11
                          </td>
                          <td style="text-align: center;">
                            4
                          </td>
                          <td style="text-align: center;">
                            Picture
                          </td>
                          <td style="text-align:center;">
                            <div class="mt">
                              <a class="btn btn-dark font-weight-medium auth-form-btn btn-icon-append btn-sm" href="../barang/edit_barang.html">
                                <i class="mdi mdi-pencil"></i>
                            </a><br>
                              <br><a class="btn btn-danger font-weight-medium auth-form-btn btn-icon-append btn-sm" href="../barang/list_barang.html">
                                <i class="mdi mdi-delete"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td style="text-align: center;">
                            2
                          </td>
                          <td>
                            P22
                          </td>
                          <td style="text-align: center;">
                            Zipper Jumper
                          </td>
                          <td>
                            Rp. 120.000
                          </td>
                          <td style="text-align: center;">
                            20
                          </td>
                          <td style="text-align: center;">
                            10/11/2001
                          </td>
                          <td>
                            Bahan : Katun Fleece Tebel, Lembut, nyerep keringat, nyaman digunakan dan warnanya dijamin nggak pudar/luntur.
                          </td>
                          <td style="text-align: center;">
                            H22
                          </td>
                          <td style="text-align: center;">
                            4
                          </td>
                          <td style="text-align: center;">
                            Picture
                          </td>
                          <td style="text-align:center;">
                            <div class="mt">
                              <a class="btn btn-dark font-weight-medium auth-form-btn btn-icon-append btn-sm" href="../barang/edit_barang.html">
                                <i class="mdi mdi-pencil"></i>
                              </a><br>
                              <br><a class="btn btn-danger font-weight-medium auth-form-btn btn-icon-append btn-sm" href="../barang/list_barang.html">
                                <i class="mdi mdi-delete"></i>
                              </a>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <br><button type="button" class="btn btn-dark btn-icon-text">
                    CETAK
                    <i class="mdi mdi-printer btn-icon-append"></i>                                                                              
                  </button>
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