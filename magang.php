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
            document.location.href = 'index.php';
         </script>";
   exit;
}

$title ='magang';

include 'layout/header.php';

?>
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><i class="fas fa-list"></i>Data Magang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Magang</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

	<head>
		<title>Magang</title>
		<link href="assest/img/logo.png" rel="shortcut icon">
		<link href="assets/css/magang.css"  rel="stylesheet" type="text/css">
	</head>
	<body>
	<div class="container">
		<header>
			<div class="kiri">
				<img src="assets/img/cmnp.jpg" >
			
			<div class="kanan">
			<h2>PT. Citra Marga Nusaphala Persada Tbk.</h2>
				<p>Penyelenggara Jalan Tol Ir. Wiyoto Wiyoto,Msc</p>
			</div>
		</header>

	<article>
			<div class="kiri">
				<h1>Sekilas PT.CMNP</h1>
				<p>"PT Citra Marga Nusaphala Persada Tbk adalah sebuah perusahaan jalan tol yang berkantor pusat di Jakarta, Indonesia. Hingga tahun 2023, perusahaan ini memegang konsesi atas lima ruas jalan tol di Pulau Jawa."
				</p>
				
				<div class="kiritengah"></div>
				<div>
				<div>
						<h1>Maps</h1>
						<style>
						iframe {width:300px; height:200px;}
						</style>
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.796319995461!2d106.88096791399458!3d-6.158027862068821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f54202921447%3A0xbfcb71b76ea18fd8!2sPT.%20Citra%20Marga%20Nusaphala%20Persada%20Tbk!5e0!3m2!1sid!2sid!4v1677660846303!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
						<h1>Foto</h1>
						<img src="assets/img/tol.jpg"></img>
			</div>
			<div>
						<img src="assets/img/toll.jpg"></img>
			</div>
			</div>
			<div class="kanan">
				<div class="atas">
				<h1>Tentang Kami :</h1>
				<img src="assets/img/kantor.jpg">
					<p> "CMNP pada awal pendiriannya 13 April 1987 adalah sebuah konsorsium, terdiri dari beberapa BadanUsaha Milik Negara (BUMN) dan perusahaan swasta nasional yang bergerak di bidang infrastruktur,
						khususnya pengusahaan jalan tol dan bidang terkait lainnya. Berdirinya CMNP membuka era baru kemitraan pemerintah dan swasta dalam pengusahaan jalan tol, melalui perannya membangun jalan tol ruas Cawang –Tanjung Priok (North South Link/ NSL) sepanjang 19,03 km. Keberhasilan pelaksanaan pilot proyek tersebut,
						membuat Pemerintah memberikan kepercayaan kepada CMNP untuk membangun jalan tol ruas Tanjung Priok –Jembatan Tiga/ Pluit (Harbour Road/ HBR) sepanjang
						13,93 km.Penyelesaian ruas jalan tol NSL dan HBR sepanjang32,96 km atau yang dikenal dengan Jalan Tol Ir. WiyotoWiyono, MSc dengan masa konsesi 31 tahun 3 bulan ini,
						telah memungkinkan sistem jaringan Jalan Tol Dalam Kota Jakarta, ruas Tomang – Cawang – Tanjung Priok –Ancol Timur – Jembatan Tiga – Pluit – Grogol – Tomangdapat beroperasi secara terpadu, di bawah pengelolaan
						bersama PT Jasa Marga (Persero) Tbk dan CMNP dengan sistem bagi hasil. CMNP telah berubah statusnya menjadi perusahaan terbuka sejak 10 Januari 1995, yang sebagian besar sahamnya dimiliki oleh masyarakat"
				</p>
				
				<p>Selain investasi dalam bidang pengusahaan jalan tol Ir. Wiyoto Wiyono MSc ruas Cawang – Tanjung Priok-
					Ancol Timur - Jembatan Tiga/ Pluit, CMNP juga memiliki penyertaan investasi pada Entitas Anak Langsung, Entitas Anak Tidak Langsung dan Penyertaan Investasi Lainnya.
				</p>
	
			
				</div>
				<div class ="bawah">
					<div class="kiribawah">
						<h1>Contact Us</h1>
						<p>Phone:(021)65306930 , Email:b_humas@citra.co.id ,
                             Website : www.citramarga.com , Twitter: @officialcmnp , Twitter : @senkomcmnp</p>
					</div>
					<div class="kananbawah">
						<h1>Sosial Media<h1>
						<img src="assets/img/icon1.png">
						<img src="assets/img/icon2.png">
						<img src="assets/img/icon3.png">
						<img src="assets/img/icon4.png">
					</div>
				</div>
                <div class="kanan">
                <h1> Entity Anak Langsung :</h1>
                </div>
				<div class="kanan1">
				<h4>PT.Citra Waspphutowa</h4>
				<img src="assets/img/foto2.jfif">
				<p>Pengusahaan jalan tol dan usaha-usaha lain.</p>
			</div>
			<div class="kanan2">
				<h4> PT.Citra Marga Nusantara Propertindo </h4>
				<img src="assets/img/foto4.jpeg">
				<p>Pembangunan, perdagangan dan industri</p>
			</div>
				<div class="kanan3">
				<h4>PT.Citra Marga Lintas Jabar</h4>
				<img src="assets/img/foto5.png">
				<p>Pengusahaan jalan tol Soreang Pasir Koja Soroja.</p>
			</div>
			
			</div>
		</article> 
		<article>
			<div class="bawah1">
				<h4>PT. Citra Persada Infrastruktur</h4>
				<img src="assets/img/foto3.jfif">
				<p>Perdagangan, pembangunan, industri, jasa, pertanian dan percetakan.</p>
			</div>
			<div class="bawah2">
				<h4>PT. Citra Karya Jabar Tol</h4>
				<img src="assets/img/foto6.jpg">
				<p>Perdagangan, kontraktor, pengolahan lahan, pengadaan barang, perindustrian dan jasa lainnya.</p>
			</div>
				<div class="bawah3">
				<h4>PT.Citra Margatama Surabaya</h4>
				<img src="assets/img/foto1.jpeg">
				<p>Pengusahaan jalan tol, pengembangan wilayah, jasa dan perdagangan.</p>
			</div>
			<div class="bawah4">
				<h4>PT. Marga Sarana Jabar</h4>
				<img src="assets/img/foto7.jpg">
				<p>Pengusahaan jalan tol Bogor Ring Road</p>
			</div>
		</article>

		<footer>
			Copyright erikaamp &copy; 2023 | <target="_blank">CMNP</a>
		</footer>
		
	</div> <!--div penutup container -->
	</body>
 
				