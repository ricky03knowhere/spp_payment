<?php
require_once("Connections/koneksi.php");
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO petugas (id_petugas, username, password, nama_petugas, level ,picture) VALUES (%s, %s, %s, %s, %s,%s)",
                       GetSQLValueString($_POST['id_petugas'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['nama_petugas'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
					    GetSQLValueString($_POST['picture'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='login.php?text=Akun telah dibuat silakan login...'</script>";exit;
}
?>

<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="assets/img/favicon.png" rel="icon" width="300px"  type="image/png">
  <link href="vendor/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="vendor/admin/css/sb-admin-2.min.css" rel="stylesheet">
  <title>SPP Payment</title>
  <style type="text/css">
  	
  	.carousel {
		margin-top:-37px;
  	}
  	#sidebarToggleTop {
  		position:relative;
  		z-index:9;
  	}
  	.carousel-caption h5{
		font-size:30px;
		font-weight:900;
		margin-bottom:20px;
  	}
  	.carousel-caption p{
  		font-weight:light;
  	}
  	.carousel-item::after{
  		content: '';
  		display: block;
  		position: absolute;
  		height: 90%;
  		width: 100%;
  		bottom: 0;
  		background-image: linear-gradient(to top,rgba(0,0,0,1),rgba(0,0,0,0));
  		}
  	#collapseUtilities .collapse-inner {
  		position:relative;
  		z-index:9999;
  	}
  	.wa {
  		font-size:17px;
  		font-weight:bolder;
  	}
  	.cont {
  		line-height:35px;
  	}
  	.menu{
	  	border-radius:40px;
	  	height:50px;
	  	font-size:12px;
  	}
  	.insert {
	  	font-weight:bold;
	  	width:100%;
	  	border-radius:50px;
  	}
  	.lbl {
	  	font-size:17px;
  	}
  	@media(min-width: 600px){
  	.carousel-item .carousel-caption{
	  	transform:scale(1.5);
	  	margin-bottom:20px;
  	}
  	.carousel-item:nth-of-type(1) .carousel-caption{
	  	text-align:left !important;
	  	margin-left:50px;
  	}
  	.carousel-item:nth-of-type(3) .carousel-caption,.carousel-item:nth-of-type(5) .carousel-caption{
	  	text-align:right !important;
	  	margin-right:50px;
  	}
  	}
  </style>
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gray-900 sidebar sidebar-dark accordion" id="accordionSidebar">
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#!">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-money-check-alt text-success"></i>
        </div>
        <div class="sidebar-brand-text mx-3 text-success">SPP Payment</div>
      </a>
      <hr class="sidebar-divider">
		<div class="sidebar-heading">
		Home
		</div>

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#page-top">
          <i class="fa fa-fw fa-home text-warning"></i>
          <span>Home</span></a>
      </li>
    <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Heading -->
      <div class="sidebar-heading">
        Info
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
		<a class="nav-link scroll" href="#visi">
	 	 <i class="fas fa-fw fa-chart-bar text-primary"></i>
		  <span>Visi</span></a>
      </li>
      <li class="nav-item">
      		<a class="nav-link scroll" href="#misi">
      	 	 <i class="fas fa-fw fa-chart-line text-success"></i>
      		  <span>Misi</span></a>
      </li>
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
    <i class="fas fa-fw fa-info-circle text-white"></i>
    <span>About SMK</span>
  </a>
  <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2" data-parent="#accordionSidebar">
    <div class="bg-success py-2 collapse-inner rounded">
      <h6 class="collapse-header text-gray-900">Informasi</h6>
      <a class="collapse-item text-dark scroll" href="#about"><i class="fa fa-fw fa-university pr-3"></i>SMK Al-ghifari</a>
      <a class="collapse-item text-dark scroll" href="#lokasi"><i class="fa fa-fw fa-map-marker-alt pr-3"></i>Lokasi</a>
    </div>
  </div>
</li>

<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
    <i class="fas fa-fw fa-phone-alt text-danger"></i>
    <span>Contact</span>
  </a>
  <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
    <div class="bg-success py-2 collapse-inner rounded">
      <h6 class="collapse-header text-gray-900">Contact to</h6>
      <a class="collapse-item text-dark scroll" href="#contact"><i class="fa fa-fw fa-home pr-3"></i>Sekolah</a>
      <a class="collapse-item text-dark scroll" href="#operator"><i class="fa fa-fw fa-user pr-3"></i>Operator</a>
    </div>
  </div>
</li>
      <!-- Divider -->
      <hr class="sidebar-divider">
     <!-- Heading -->
      <div class="sidebar-heading">
        Login
      </div>
		<li class="nav-item">
		<a class="nav-link" href="login.php">
		<i class="fa fa-fw fa-key text-info"></i>
		<span>Login</span></a>
		</li>
		<li class="nav-item">
		<a class="nav-link scroll" href="#register">
		<i class="fa fa-fw fa-sign-in-alt text-success"></i>
		<span>Register</span></a>
		</li>
	      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-times text-white"></i>
          </button>

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
  <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleFade" data-slide-to="1"></li>
  <li data-target="#carouselExampleFade" data-slide-to="2"></li>
  <li data-target="#carouselExampleFade" data-slide-to="3"></li>
  <li data-target="#carouselExampleFade" data-slide-to="4"></li>
  </ol>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="assets/img/blake-wisz-Kx3o6_m1Yv8-unsplash.jpg" alt="First slide">
	  <div class="carousel-caption d-none d-md-block text-left">
		  <h5>Welocome To SPP Payment</h5>
		  <p>Bayar SPP dengan Mudah dan Praktis</p>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/sharon-mccutcheon--8a5eJ1-mmQ-unsplash.jpg" alt="Second slide">
	  <div class="carousel-caption d-none d-md-block">
	    <h5>Mudah Digunakan</h5>
	    <p>Hanya Melalui Beberapa Langkah</p>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/raul-varzar-749952-unsplash.jpg" alt="Second slide">
	      <div class="carousel-caption d-none d-md-block text-right">
	      <h5>Design Interactive</h5>
	      <p>Design GUI yang Mudah Dipahami</p>
	      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/rupixen-com-Q59HmzK38eQ-unsplash.jpg" alt="Second slide">
      <div class="carousel-caption d-none d-md-block">
      <h5>Aplikasi Ringan</h5>
      <p>Ringan digunakan dan ukuran Aplikasi Kecil</p>
      </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="assets/img/austin-distel-goFBjlQiZFU-unsplash.jpg" alt="Third slide">
      <div class="carousel-caption d-none d-md-block text-right">
      <h5>Multi Platform</h5>
      <p>Dapat diakses di berbagai Perangkat dan Gadget Anda</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



<section class="my-4 px-3 pb-5" id="visi" >      	
      	<h2 class="font-weight-light py-4" >Visi</h2>
      	
      	<div class="row">
      	
      	<!-- Earnings (Monthly) Card Example -->
      	<div class="col-md-6 mb-4">
      	<div class="card border-left-primary shadow h-100 py-2">
      	<div class="card-body">
      	<div class="row no-gutters align-items-center">
      	<div class="col mr-2">

      	<div class="h6 mb-0 justify-content-center">
	      	<span class="h3 text-primary"><b>P</b></span>restasi meningkat, lulusannya unggul, mudah diterima oleh masyarakat, 
      	memiliki etos kerja yang tinggi serta mampu berwiraswasta dan mandiri
      	</div>
      	</div>
      	<div class="col-auto my-2">
      	<i class="fa fa-user-graduate fa-3x text-gray-300"></i>
      	</div>
      	</div>
      	</div>
      	</div>
      	</div>
      	
      	<!-- Earnings (Monthly) Card Example -->
      	<div class="col-md-6 mb-4">
      	<div class="card border-left-success shadow h-100 py-2">
      	<div class="card-body">
      	<div class="row no-gutters align-items-center">
      	<div class="col mr-2">

      	<div class="h6 mb-0">
	      	<span class="h3 text-success"><b>A</b></span>
      		manah, profesional dalam melaksanakan tugas 
      		serta peduli terhadap pembaharuan dan lingkungan.
      	</div>
      	
      	</div>
      	<div class="col-auto my-2">
      	<i class="fa fa-user-tie fa-3x text-gray-300"></i>
      	</div>
      	</div>
      	</div>
      	</div>
      	</div>
      	</div>
</section>        

<section class="my-4 bg-white px-3 pb-5" id="misi" >      	
      	<h2 class="font-weight-light py-4">Misi</h2>
      	
      	<div class="row">
      
      	<div class="col-md-6 mb-4">
      		<ul class="list-group list-group shadow h-100">
      		<li class="list-group-item border-left-info">
      		Membina pencapaian akhlak dan budi pekerti luhur.</li>
      		<li class="list-group-item border-left-success">
      		Mewujudkan personal yang berkepribadian, sehat dan terampil serta beretos kerja tinggi.</li>
      		<li class="list-group-item border-left-danger">
      		Meningkatkan pelayanan kerjasama secara optimal, meningkatkan budaya tertib dan bersih.</li>
      		<li class="list-group-item border-left-warning">
      		Meningkatkan program diklat yang mengacu pada standar kompetensi dengan pendekatan Competency Base Training (CBT).</li>
			</ul>
		</div>
		
      	<div class="col-md-6 mb-4">
      		<ul class="list-group list-group shadow">
			<li class="list-group-item border-left-primary">
			Peningkatan program keahlian.</li>
			<li class="list-group-item border-left-success">
			Mengembangkan sistem pendidikan yang terintegrasi antara jalur pendidikan sekolah dan luar sekolah, berwawasan mutu dan keunggulan sesuai dengan tuntutan dan kebutuhan pasar kerja.</li>
			<li class="list-group-item border-left-info">
			Mengembangkan iklim belajar berwawasan global yang berlandaskan norma dan nilai budaya bangsa.</li>
			</ul>
		</div>
		
		</div>
</section>

<section class="my-2 px-3 pb-5" id="about" >      	
      	<h2 class="font-weight-light py-4">About SMK</h2>
      	
      	<div class="row">
      
      	<div class="col-md-6 mb-4">
      		<div class="card border-left-warning shadow h-100 py-2">
      		<div class="card-body">
      		<div class="row no-gutters align-items-center">
      		<div class="col mr-2">
      		<div class="h5 mb-0 font-weight-bold text-gray-800 pb-3">SMK Al-Ghifari Banyuresmi</div>
      		<p class="text-justify" >
      		Sekolah Menengah Kejuruan (SMK) Al-Ghifari, sekolah yang berada di Jl. Hasan Arif KM.10 Karees Kec. Banyuresmi Kabupaten Garut ini, adalah sekolah yang bernaung dibawah yayasan Al-Ghifari. 
      		Sebagai sekolah yang berdiri dengan dilandasi latar belakang rasa kepedulian dari sosok keluarga besar H. Abdurahman, Drs, M.Si dan keluarga, terhadap pendidikan masyarakat setempat terutama kalangan kurang mampu atau ekonomi lemah, 
      		sehingga didirikanlah SMK Al-Ghifari (2008) yang sebelumnya juga telah di dirikan SMP Al-Ghifari yang juga masi satu lokasi dengan SMK Al-Ghifari.
      		</p>
      		</div>
      		</div>
      		</div>
      		</div>
      	</div>
      	
      	<div class="col-md-6 mb-4">
      	<ul class="list-group shadow">
		<li class="list-group-item"><h3><i class="fa fa-fw fa-university" ></i>Profil</h3></li> 
        <li class="list-group-item"><b>NPSN :</b> 20257237</li>
      	<li class="list-group-item"><b>Akreditasi :</b> A</li>
        <li class="list-group-item"><b>Tanggal SK Pendirian :</b> 27-01-2009</li>
      	<li class="list-group-item"><b>Kepsek :</b> Hasan Taufan Rahman,M.pd</li>
      	</ul>
      	
      	<ul class="list-group shadow mt-3 h5" id="lokasi">
		<li class="list-group-item"><h3><i class="fa fa-fw fa-map-marker-alt" ></i>Lokasi</h3></li> 
        <li class="list-group-item">Jl. Hasan Arif Km. 10 Karees</li>
		<li class="list-group-item">Ds.Karyamukti, Kec.Banyuresmi</li>
      	<li class="list-group-item">Garut, Jawa Barat</li>
      	</ul>
      	
      	</div>
      	</div>
</section>

<section class="my-2 px-3 pb-5 bg-white" id="contact" >      	
      	<h2 class="font-weight-light py-4">Contact</h2>
      	
      	<div class="row">
      	
      	<div class="col-md-6 mb-4">
      		<div class="card bg-dark shadow h-100">
      		<div class="card-body">
      		<h3 class="text-white"><i class="fa fa-fw fa-university mr-1" ></i>Sekolah</h3>
   		    <hr class="sidebar-divider bg-gray-500">
      		<span class="text-gray-100 small">
			
			<div class="row" >
       		<div class="col-xs-6 cont">
      		<b><i class="fas fa-fw fa-address-card mr-1" ></i>Kode Pos &#008; &#008; </b><br>
      		<b><i class="fa fa-fw fa-envelope mr-1" ></i>Email &#008; &#008; </b><br>
        	<b><i class="fa fa-fw fa-phone-alt mr-1" ></i>Telephone &#008; &#008; </b><br>
      		<b><i class="fa fa-fw fa-globe mr-1" ></i>Website &#008; &#008; </b><br>
      		</div>
      		
       		<div class="col-xs-6 cont">
      		<b> : </b> &nbsp; 44191<br>
      		<b> : </b>&nbsp; smk.alghifari@yahoo.co.id<br>
      		<b> : </b>&nbsp;  0262448446<br>
      		<b> : </b>&nbsp;  www.smk.al-ghifaribanyuresmi.sch.id 
       		</div>
       		
       		</div>
       		
      		</span>
      		</div>
      		</div>
      	</div>
      	<div class="col-md-6 mb-4" id="operator" >
      		<div class="card bg-success shadow h-100">
      		<div class="card-body">

      		<h3 class="text-dark"><i class="fa fa-fw fa-user-alt mr-1" ></i>Operator</h3>
   		    <hr class="sidebar-divider bg-gray-700">
      		<span class="text-dark small">
      		
      		<div class="row" >
      		<div class="col-xs-6 cont">
      		<b><i class="fas fa-fw fa-user mr-1" ></i>Nama  &#008; &#008; </b><br>
      		<b><i class="fa fa-fw fa-envelope mr-1" ></i>Email  &#008; &#008; </b><br>
      	    <b><i class="fab fa-fw fa-whatsapp wa" ></i>Whatsapp &#008; &#008; </b><br>
      		<b><i class="fa fa-fw fa-map-marker-alt mr-1" ></i>Alamat &#008; &#008; </b><br>
      		</div>

      		<div class="col-xs-6 cont">
      		<b> : </b> &nbsp; Iwan Sopian,S.pd<br>
			<b> : </b> &nbsp; iwan06sopian@gmail.com<br>
			<b> : </b> &nbsp; 083667869903<br>
			<b> : </b> &nbsp; Sukawening,Garut<br>
      		</div>
      		</div>
      		
      		</span>
      		</div>
      		</div>
      	</div>
      	
      	</div>
</section>      

<section class="my-2 px-4 pb-5 justify-content-center" id="register" >      	
      	<h2 class="font-weight-light py-4">Register</h2>
      	
      	<div class="row justify-content-center">

<div class="card o-hidden border-0 shadow">
  <div class="card-body bg-dark p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-4 text-white">Buat Akun Anda!</h1>
          </div>
           <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
           
           <div class="form-group row">
           <div class="col-sm-6 mb-3 mb-sm-0">
           <input type="id_petugas" class="form-control form-control-user" id="id_petugas" name="id_petugas" placeholder="ID Petugas" required>
           </div>
           
           <div class="col-sm-6">
           <input type="text" class="form-control form-control-user" id="nama_petugas" name="nama_petugas" placeholder="Nama Petugas" required>
           </div>
           </div>
           
           <div class="form-group row">
           <div class="col-sm-6 mb-3 mb-sm-0">
           <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
           </div>
           <div class="col-sm-6">
           <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
           </div>
           </div>
           
           <div class="form-group">
           <label class="lbl ml-1 text-gray-400" >ID Level</label>
           <select class="form-control menu" id="exampleFormControlSelect1" name="level" >
           <option value="admin">Admin</option>
           <option value="petugas">Petugas</option>
           <option value="siswa">Siswa</option>
           </select>
           </div>
                   
           <input type="hidden" name="picture" value="img3.jpg" />
           <input type="hidden" name="MM_insert" value="form1" />
           
           <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
             Register account
           </button>
            <hr class="bg-gray-500" >

          </form>
  
          <div class="text-center">
            <a class="small text-success" href="login.php">Sudah mempunyai Akun? Login!</a>
          </div>
        </div>

    </div>
  </div>
  </div>
</div>
</section>

		
		
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; <a href="https://github.com/ricky03knowhere" >ricky03knowhere</a> 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/admin/vendor/jquery/jquery.min.js"></script>
  <script src="vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="vendor/admin/js/sb-admin-2.min.js"></script>
<script type="text/javascript">
$(window).on("load",() => { 
$(".scroll").on('click',function(e){
	var tujuan =$(this).attr("href");
	var eltujuan =$(tujuan);
	$("#page-top").animate({
		scrollTop: eltujuan.offset().top -50
	},1250);
	e.preventDefault;
})
	
$(window).on("resize",() => { 
	let win = $(".carousel").width()
	if(win < 466){
		$(".carousel-caption").toggleClass("d-none")
	}
})
	
$("#sidebarToggleTop").on("click",() => {
	
$("#sidebarToggleTop i").toggleClass("fa-angle-double-right")	
$("#sidebarToggleTop i").toggleClass("fa-times")	
	
	let pict = $(".carousel").width()
	if(pict > 168){
		$(".carousel-caption").toggleClass("d-none")

	}
})

})
</script>
</body>
</html>