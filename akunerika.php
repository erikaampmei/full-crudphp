<?php
session_start();

// membatasi halaman sebelum login 
if (!isset($_SESSION["login"])) {
    echo "<script>
        alert('Anda Harus Login Dahulu');
            document.location.href = 'login.php';
          </script>";
    exit;
}
// membatasi halaman sesuai user login 
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 3) {
    echo "<script>
        alert('Perhatian anda tidak punya hak akses');
            document.location.href = akun.php';
         </script>";
   exit;
}

$title ='Daftar Mahasiswa';

include 'layout/header.php';
?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-list"></i>Data Pribadi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Pribadi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<head>
	<title>Profil</title>
	<link href="assets/css/akunerika.css" rel="stylesheet" type="text/css">

</head>
<body>
	<header>
		<h1>UNIVERSITAS TARUMANEGARA</h1>
        <img src="assets/img/untar.jpg">
	</header>
	
	<article>
		<h1>Sistem Informasi Teknologi Informasi</h1>
		<img src="assets-template/dist/img/erika.jpeg">
	
		  <p>Nama: Erika Ardya Mesia Putri</p>
		  <p>NIM: 825200110</p>
		  <p>Program Studi: Sistem Informasi</p>
          <P>Tempat/Tgl.Lahir : Jakarta, 27-05-2002
          <p>Alamat Tinggal: Jln Komp Uka Rt.18/Rw.08</p>
		  
    </article>
	<h4> Kartu Mahasiswa  </h4>
	
	<footer>
		<p>Copyright erikaamp &copy;2023 </p>
	</footer>
	

</body>
<?php include 'layout/footer.php'; ?>