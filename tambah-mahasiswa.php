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

$title ='Tambah Mahasiswa';

include 'layout/header.php';

// check apakah tombol tambah ditekan 
if (isset($_POST['tambah'])) {
    if (create_mahasiswa($_POST) > 0) {
        echo "<script>
                alert('Data Mahasiswa Berhasil Ditambahkan');
                document.location.href = 'mahasiswa.php';
                </script>";
    } else {
        echo "<script>
            alert('Data Mahasiswa Gagal Ditambahkan');
            document.location.href = 'mahasiswa.php';
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
            <h1 class="m-0"><i class="fas fa-plus"></i>Tambah Mahasiswa</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="mahasiswa.php">Tambah Mahasiswa</a></li>
              <li class="breadcrumb-item active">Tambah mahasiswa</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container mt-5">
    <h1>Tambah Mahasiswa</h1>
    <hr>

    <form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="nama" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control" id="nama" name= "nama" placeholder="Nama Mahasiswa.."required>
    </div>

    <div class="row">
        <div class="mb-3" col-6">
      <label for="prodi" class="form-label">Program Studi</label>
        <select name="prodi" id="prodi" class="form-control" required>
        <option value="">-- Pilih Prodi--</option>
        <option value="Teknik Infomatika">Teknik Informatika</option>
        <option value="Teknik Mesin">Teknik Mesin</option>
        <option value="Teknik sipil">Teknik Sipil</option>
        </select>
        </div>
    </div>
        <div class="mb-3" col-6">
      <label for="jk" class="form-label">Program Studi</label>
        <select name="jk" id="jk" class="form-control" required>
        <option value="">-- Pilih Jenis Kelamin--</option>
        <option value="Laki-laki">Laki-Laki</option>
        <option value="Perempuan">Perempuan</option>
        </select>
        </div>

    <div class="mb-3">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="number" class="form-control" id="telepon" name= "telepon" placeholder="Telepon.."required>
    </div>

    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
    <textarea name="alamat" id="alamat" ></textarea>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="email" class="form-control" id="email" name= "email" placeholder="Email.."required>
    </div>

    <div class="mb-3">
      <label for="foto" class="form-label">Foto</label>
      <input type="file" class="form-control" id="foto" name="foto" placeholder="Foto.."
      onchange="previewImg()">

      <img src="" alt="" class="img-thumbnail img-preview mt-2" width="150px">
    </div>

    <button type="submit" name="tambah" class="btn btn-primary" style="float: right;"?>Tambah</button>
    </form>
</div>

<!-- preview image --> 

<script>
  function previewImg() {
    const foto = document.querySelector('#foto');
    const imgPreview = document.querySelector('.img-preview');

    const fileFoto = new FileReader();
    fileFoto.readAsDataURL(foto.files[0]);

    fileFoto.onload = function(e) {
      imgPreview.src = e.target.result;
    }
  }
</script>

<?php include 'layout/footer.php'; ?>