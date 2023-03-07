<?php

  session_start();

  include 'config/app.php';

  // check apakah tombol login ditekan
  if (isset($_POST['login'])) {
    // ambil input username dan password
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

  // secret key
  $secret_key = "6LfmkLwkAAAAAKflG7hkDJm4D15TiTEIDrCoI87q";

  $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret_key. '&response='.$_POST['g-recaptcha-response']);
   $response = json_decode($verify);

  if ($response->success) {
      // check username
      $result = mysqli_query($db, "SELECT * FROM akun WHERE username = '$username'");
    
      // jika ada usernya
      if (mysqli_num_rows($result) == 1) {
        // check passwordnya
        $hasil = mysqli_fetch_assoc($result);
  
        if (password_verify($password, $hasil['password'])) {
          // set session
          $_SESSION['login']    = true;
          $_SESSION['id_akun']  = $hasil['id_akun'];
          $_SESSION['nama']     = $hasil['nama'];
          $_SESSION['username'] = $hasil['username'];
          $_SESSION['email']    = $hasil['email'];
          $_SESSION['level']    = $hasil['level'];
  
          // jika login benar arahkan ke file index.php
          header("Location: index.php");
          exit;
        } else {
          // jika usernya/password salah
             $error = true;
      }
      
    }
  } else {
       // jika recaptcha tidak valid
       $errorRecaptcha = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>

     <!-- Font Awesome -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets-template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Thema style -->
    <link rel="stylesheet" href="assets-template/dist/css/adminlte.min.css">
    <!-- Favicons -->
    <link rel="icon" href="assets/img/bootstrap-logo.svg">
</head>

<script nonce="b2388bbb-7dfd-4886-b4a3-c0849b1a5497">(function(w,d){!function(f,g,h,i){f[h]=f[h]||{};f[h].executed=[];f.zaraz={deferred:[],listeners:[]};f.zaraz.q=[];f.zaraz._f=function(j){return function(){var k=Array.prototype.slice.call(arguments);f.zaraz.q.push({m:j,a:k})}};for(const l of["track","set","debug"])f.zaraz[l]=f.zaraz._f(l);f.zaraz.init=()=>{var m=g.getElementsByTagName(i)[0],n=g.createElement(i),o=g.getElementsByTagName("title")[0];o&&(f[h].t=g.getElementsByTagName("title")[0].text);f[h].x=Math.random();f[h].w=f.screen.width;f[h].h=f.screen.height;f[h].j=f.innerHeight;f[h].e=f.innerWidth;f[h].l=f.location.href;f[h].r=g.referrer;f[h].k=f.screen.colorDepth;f[h].n=g.characterSet;f[h].o=(new Date).getTimezoneOffset();if(f.dataLayer)for(const s of Object.entries(Object.entries(dataLayer).reduce(((t,u)=>({...t[1],...u[1]})))))zaraz.set(s[0],s[1],{scope:"page"});f[h].q=[];for(;f.zaraz.q.length;){const v=f.zaraz.q.shift();f[h].q.push(v)}n.defer=!0;for(const w of[localStorage,sessionStorage])Object.keys(w||{}).filter((y=>y.startsWith("_zaraz_"))).forEach((x=>{try{f[h]["z_"+x.slice(7)]=JSON.parse(w.getItem(x))}catch{f[h]["z_"+x.slice(7)]=w.getItem(x)}}));n.referrerPolicy="origin";n.src="/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(f[h])));m.parentNode.insertBefore(n,m)};["complete","interactive"].includes(g.readyState)?zaraz.init():f.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,"zarazData","script");})(window,document);</script>
<body class="hold-transition login-page">
<div class="login-box">
<div class="login-logo">
<div class="text-center">
<img class="mb-4" src="assets/img/bootstrap-logo.svg" alt="" width="72" height="57">
<a href="#"><b>Admin</b>LTE</a>
</div>
</div>  

     <!-- /.login-logo -->
     <div class="card ">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Masukan username dan password</p>
      
        <?php if (isset($error)) : ?>
          <div class="alert alert-danger text-center">
            <b>Username/Password SALAH</b>
          </div>
          <?php endif; ?>

          <?php if (isset($errorRecaptcha)) : ?>
          <div class="alert alert-danger text-center">
            <b>Recaptcha Tidak Valid</b>
          </div>
          <?php endif; ?>

          <form action="" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password..." required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="mb-3">
        <div class="g-recaptcha" data-sitekey="6LfmkLwkAAAAAL54TiymIvlYdqleJ1v4ZThLD6_Y"></div>
        </div>

        <div class="row">
          <div class="col-8">
        </div>

        <!--/.col -->
        <div class="col-4">
          <button type="submit" name="login" class="btn btn-primary btn-block">Masuk</button>
        </div>
        <!-- /.col -->
        </div>
      </form>
    
      <hr>
      <p class="mb-1 text-center">
        <span class="mt-5 mb-3 text-muted">Developer &copy;
          <a href="https://erikaampmei.com">Erikaamp</a> <?= date('Y') ?>
        </span>
      </div>
      <!-- /.login-card-body -->
     </div>
    </div>
    <!--/.login-box -->

    <!-- jQuery -->
    <script src="assest-template/plugins/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assest-template/plugins/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE APP -->
    <script src="assets-template/dist/js/adminlte.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </body>

</html>