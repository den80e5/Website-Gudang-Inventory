<?php require 'koneksi/koneksi.php';
session_start();
// if(isset($_SESSION['tingkatan'], $_SESSION['tingkatan_ppic']))
// {
//     header('location:index.php');
//     exit();
// }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gudang Tinta | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Gudang </b>Tinta</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Silahkan Login Terlebih Dahulu</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Masukan Username Anda" aria-label="Username" aria-describedby="basic-addon1" name="username" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Masukan Kata Sandi" aria-label="Password" aria-describedby="basic-addon1" name="password" required="">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
          </div>

          <!-- /.col -->
        </div>
      </form>
      <br>
<?php
  if(isset($_POST['login']))
    {
      $login = $koneksi->query("SELECT * FROM user WHERE username='$_POST[username]' AND password ='$_POST[password]'");
      $cek = mysqli_num_rows($login);
       
      if($cek > 0){
       
        $data = mysqli_fetch_assoc($login);
        $username = $_POST['username'];
        $password = $_POST['password'];
       

        if($data['tingkatan']=="gudang"){
       

          $_SESSION['username'] = $username;
          $_SESSION['tingkatan'] = "gudang";
          $_SESSION['userna'] = "$_POST[username]";

          echo "<div class='alert alert-info' role='alert'>Login Sebagai Gudang Sukses</div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php'>";
       

        }elseif($data['tingkatan']=="ppic"){
       

          $_SESSION['username'] = $username;
          $_SESSION['tingkatan'] = "ppic";
          $_SESSION['userna'] = "$_POST[username]";

          echo "<div class='alert alert-info' role='alert'>Login Sebagai PPIC Sukses</div>";
          echo "<meta http-equiv='refresh' content='1;url=index.php'>";
       

        }else{
       
          echo "<div class='alert alert-danger' role='alert'>Login Gagal</div>";
          echo "<meta http-equiv='refresh' content='1;url=login.php'>";
        } 
      }else{
        echo "<div class='alert alert-danger' role='alert'>Login Gagal</div>";
        echo "<meta http-equiv='refresh' content='1;url=login.php'>";
      }
                      
      }    
?>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
