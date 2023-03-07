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

$title ='Tambah Akun';

include 'layout/header.php';

// tampil seluruh data
$data_akun = select("SELECT * FROM akun");

// tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

//jika tombol tambah di tekan jalankan script berikut
if(isset($_POST['tambah'])) {
    if (create_akun($_POST) > 0) {
        echo "<script>
        alert('Data Akun Berhasil Ditambahkan');
        document.location.href = 'akun.php';
        </script>";
    } else {
        echo "<script>
        alert('Data Akun Gagal Ditambahkan');
        document.location.href = 'akun.php';
        </script>";
    }
}

//jika tombol ubah di tekan jalankan script berikut
if(isset($_POST['ubah'])) {
  if (update_akun($_POST) > 0) {
      echo "<script>
      alert('Data Akun Berhasil Diubah');
      document.location.href = 'akun.php';
      </script>";
  } else {
      echo "<script>
      alert('Data Akun Gagal Diubah');
      document.location.href = 'akun.php';
      </script>";
  }
}

?>
 
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-user-plus"></i> Tambah Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Tambah Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <form action="" method="post">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="nama" name= "nama" placeholder="Nama Akun.."required>
    </div>
    <div class="mb-3">
      <label for="username" class="form-label">Username</label>
      <input type="text" class="form-control" id="username" name= "username" placeholder="Username.."required>
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">email</label>
      <input type="text" class="form-control" id="email" name= "email" placeholder="email.."required>
    </div>
    <div class="mb-3">
      <label for="level" class="form-label">level</label>
      <input type="number" class="form-control" id="level" name= "level" placeholder="level.."required>
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right;"?>Tambah</button>
    </form>
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php include 'layout/footer.php'; ?>