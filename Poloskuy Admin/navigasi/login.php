<?php
require "../system/func_web.php";
$db = new fitur();
session_start();
if(isset($_POST["login"])) {
    $email = $db->penjernih($_POST["email"]);
    $pass = $db->penjernih($_POST["password"]);
  
    if(!empty(trim($email)) && !empty(trim($pass))) {
      $result = $db->execute("SELECT * FROM admin WHERE email = '$email'");
      $num = mysqli_num_rows($result);



    while($row = mysqli_fetch_array($result)) {
        $id = $row["id_admin"];
        $emaildb = $row["email"];
        $userdb = $row["username"];
        $fullname = $row["nama_admin"];
        $passdb = $row["password"];
        $fotodb = $row["img"];
        $level  = $row["id_level"];  
    }
    

      if($num != 0){
        if($email == $emaildb) {
          if($pass == $passdb){
            $_SESSION["id_admin"] = $id;
            $_SESSION["email"] = $emaildb;
            $_SESSION["username"] = $userdb;
            $_SESSION["fullname"] = $fullname;
            $_SESSION["foto"]     = $fotodb;
            $_SESSION["id_level"]    = $level;
            header("Location: ../index.php");
          } else {
            $pesan = "Password yang anda masukan salah";
          }
        } 
      } else if($num == 0) {
        $pesan = "Email yang anda masukan salah";
      }
    
      ?>
      <script>
        confirm("<?=$pesan?>");
      </script>
      <?php
  }

  
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Spica Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/Logo_poloskuy1.png"/>
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <img src="../images/icon.jpeg" alt="logo">
              </div>
              <h4>Selamat Datang Kembali !</h4>
              <h6 class="font-weight-light">Sambut hari baru </h6>

              <form class="pt-3" method="POST" action="#">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" name="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" name="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" type="submit" name="login">LOGIN</button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Belum punya akun ? <a href="register-2.html" class="text-primary">Klik disini</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-none d-lg-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2018  All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/hoverable-collapse.js"></script>
  <script src="../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
