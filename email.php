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
if ($_SESSION["level"] != 1 and $_SESSION["level"] != 2 ) {
    echo "<script>
        alert('Perhatian anda tidak punya hak akses');
            document.location.href = 'akun.php';
         </script>";
   exit;
}
$title ='Kirim Email';

include 'layout/header.php';

use PHPMailer\PHPMailer\PHPMailer;

//Load Composer's autoloader

require 'vendor/autoload.php';
$mail = new PHPMailer(true);

 //Server settings
 $mail->SMTPDebug = 2;                                       //Enable verbose debug output
 $mail->isSMTP();                                            //Send using SMTP
 $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
 $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
 $mail->Username   = 'erikaampmei@gmail.com';                     //SMTP username
 $mail->Password   = 'uiphognfrsnluodn';                               //SMTP password
 $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
 $mail->Port       = 465;

if (isset($_POST['kirim'])) {
   //Recipients
   $mail->setFrom('erikaampmei@gmail.com', 'Tutorial Erika');
   $mail->addAddress($_POST['email_penerima']);     //penerima
   $mail->addReplyTo('erikaampmei@gmail.com', 'Tutorial Erika');

   $mail->Subject = $_POST['subject'];
   $mail->Body    = $_POST['pesan'];

   if ($mail->send()) {
        echo "<script>
                 alert('Data Barang Berhasil Dikirimkan');
                 document.location.href = 'email.php';
                 </script>";
     } else {
         echo "<script>
             alert('Data Barang Gagal Dikirimkan');
             document.location.href = 'email.php';
            </script>";
     }
    }


// check apakah tombol kirim ditekan 
    // if (create_barang($_POST) > 0) {
    //     echo "<script>
    //             alert('Data Barang Berhasil Ditambahkan');
    //             document.location.href = 'index.php';
    //             </script>";
    // } else {
    //     echo "<script>
    //         alert('Data Barang Gagal Ditambahkan');
    //         document.location.href = 'index.php';
    //         </script>";

    // }


?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"> <ia class ="fas fa-envelope"></ia>Kirim Email</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Kirim Email</li>
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
      <label for="email penerima" class="form-label">Email_Penerima</label>
      <input type="email" class="form-control" id="email penerima" name= "email_penerima" placeholder="Email penerima..."required>
    </div>
    <div class="mb-3">
      <label for="subject" class="form-label">Subject</label>
      <input type="text" class="form-control" id="subject" name= "subject" placeholder="Subject..."required>
    </div>
    <div class="mb-3">
      <label for="pesan" class="form-label">Pesan</label>
      <textarea name="pesan" class="form-control" id="pesan" cols="10" rows="10" class="form-control"></textarea>
    </div>

    <button type="submit" name="kirim" class="btn btn-primary" style="float: right;">Kirim</button>
    </form>
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php include 'layout/footer.php'; ?>