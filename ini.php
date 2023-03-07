<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include Librari phpmaiker
include('assert/phpmailer/Exception.php');
include('assert/phpmailer/PHPMailer.php');
include('assert/phpmailer/SMTP.php');

$id = $_POST['iduser'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$stat = $_POST['status'];
$pswd = $_POST['pswd'];

$mysqli->query("INSERT INTO tbuser VALUES('$id','$nama','$email','$stat','$pswd')");

if (($mysqli)) {
  $email_pengirim = 'erikaampmei@gmail.com'; // Idikan dengan email pengirim
  $nama_pengirim = 'PT.citra'; // isikan dengan nama pengirim
  $email_penerima = $_POST['email'] // ambil email penerima dari inputan form
  $subject = 'Resgistration New User PT.citra'; // ambil subject dari inputan form
  $pesan = 'selamat akun anda berhasil di tambahkan, id user anda '.$id.' dengan passwprd and'.$pswd.'.
  silahkan mencoba login pada sistem dan segera ganti password anda. apabila terjadi kesalahan hubungi admin'; //ambil pesan

  $email = new PHPMailer;
  $mail->isSMTP();

  $mail->Host = 'smtp.gmail.com';
  $mail->Username = $email_pengirim; // Email Pengirim
  $mail->Password = 'uiphognfrsnluodn'; // isikan dengan password email pengirim
  $mail->Port = 465;
  $mail->SMTPSecure = 'ssl';
  $mail->SMTPDebug = 2; // Akrifkan Untuk melakukan dubugging


  $mail->setFrom($email_pengirim, $nama_pengirim);
  $mail->addAddress($email_penerima);
  $mail->isHTML(true); // Aktifkan Jika isi emailnya berupa html
  $mail->Subject = $subject;
  $mail->Body = $pesan;

  $send = $mail->send();

  if($send){ //jika Email Berhasil dikirim
    echo "<h1>Email berhasil dikirim</h1><br /><a href='index.php'>Kembali ke form</a>";
  }else {// jika email gagal dikirim
  echo "<h1>Email gagal dikirim</h1><br /> <a href='index.php'>kembali ke form</a>";

  }
  echo "<script>alert('Data Berhasil ditambahkan, dan email notikasi terkirim')</script>";
  echo "<script type='text/javascript'> document.location ='index.php?page=email'; </script>";
?>
