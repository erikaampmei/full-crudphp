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

$title ='Ubah Akun';

include 'layout/header.php';

// tampil seluruh data
$data_akun = select("SELECT * FROM akun");

// tampil data berdasarkan user login
$id_akun = $_SESSION['id_akun'];
$data_bylogin = select("SELECT * FROM akun WHERE id_akun = $id_akun");

//jika tombol ubah di tekan jalankan script berikut
if(isset($_POST['ubah'])) {
    if (create_akun($_POST) > 0) {
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
            <h1 class="m-0"><i class="fas fa-user-cog"></i>Ubah Akun</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Data Akun</a></li>
              <li class="breadcrumb-item active">Ubah Akun</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

   <!-- Main content -->
   <?php foreach ($data_akun as $akun) : ?>
    <section class="content">
    
   <div class="modal-body">
        <form action="" method="post">
          <input type="hidden" name="id_akun" value="<?= $akun['id_akun']; ?>">

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Akun</label>
                <input type="text" name="nama" id="nama" class="form-control" 
                value="<?= $akun['nama']; ?>" required>
            </div>


            <div class="mb-3">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" 
                value="<?= $akun['username']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" 
                value="<?= $akun['email']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="password">Password <small>(Masukkan password baru/lama)</small></label>
                <input type="password" name="password" id="password" class="form-control" 
                required minlength="6">
            </div>

            <?php if ($_SESSION['level'] == 1) : ?>
              <div class="mb-3">
                <label for="level">Level</label>
                <select name="level" id="level" class="form-control" required>
                    <?php $level = $akun['level']; ?>
                    <option value="1"<?= $level == '1' ? 'selected' : null ?>>Admin</option>
                    <option value="2"<?= $level == '2' ? 'selected' : null ?>>Operator Barang</option>
                    <option value="3"<?= $level == '3' ? 'selected' : null ?>>Operator Mahasiswa</option>
                </select>
            </div>
            <?php else : ?>
              <input type="hidden" name="level" value="<?= $akun['level']; ?>">
              <?php endif; ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">kembali</button>
        <button type="submit" name="ubah" class="btn btn-success">Ubah</button>
      </div>
      </form> 
    </div>

  <?php endforeach; ?>
 
  
<?php include 'layout/footer.php'; ?>
