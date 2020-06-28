<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Web Pembayaran SPP</title>

  <!-- Custom fonts for this template-->
<link href="vendor/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="vendor/admin/css/sb-admin-2.min.css" rel="stylesheet">
  
  
  
<style type="text/css">
	
	.carousel {
		margin-right:-60px;
		margin-left:-60px;
		margin-top:-30px;
		margin-bottom:20px;
	}
	.carousel-caption h5{
		font-size:40px;
		font-weight:900;
		margin-bottom:20px;
	}
	.carousel-caption p{
		font-weight:light;
		font-size:20px;
	}
	.carousel-item:after{
		content: '';
		display: block;
		position: absolute;
		height: 90%;
		width: 100%;
		bottom: 0;
		background-image: linear-gradient(to top,rgba(0,0,0,1),rgba(0,0,0,0));
		}
		.carousel-item:nth-of-type(1) .carousel-caption{
			text-align:left !important;
			margin-left:-60px;
		}
		.carousel-item:nth-of-type(3) .carousel-caption{
			text-align:right !important;
			margin-right:-60px;
		}
	}
</style>

</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
      
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?url=beranda.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-fw fa-chart-pie"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SITUS SPP</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="#page-top">
          <i class="fas fa-fw fa-home"></i>
          <span>Beranda</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">
      
      <!-- Heading -->
      <div class="sidebar-heading">
        INFO 
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
		<a class="nav-link scroll" href="#visi"><i class="fas fa-fw fa-chart-bar"></i>
          <span>Visi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link scroll" href="#misi">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Misi</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#tentang">
          <i class="fas fa-fw fa-info-circle"></i>
          
          <span>Tentang SMK</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-phone-alt"></i>
          <span>Hubungi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">HUBUNGI:</h6>
            <a class="collapse-item" href="#sekolah">Sekolah</a>
            <a class="collapse-item" href="#operator">Operator</a>

          </div>
        </div>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        LOGIN
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link" href="login.php">
          <i class="fas fa-fw fa-sign-in-alt"></i>
          <span>Login</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

        <div class="sidebar-brand-icon">
          <i class="fas fa-user-circle fa-2x text-primary"></i>
        </div>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="login.php">
                  <i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-primary"></i>
                  Login
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">


          <!-- Page Heading -->
<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <ol class="carousel-indicators">
  <li data-target="#carouselExampleFade" data-slide-to="0" class="active"></li>
  <li data-target="#carouselExampleFade" data-slide-to="1"></li>
  <li data-target="#carouselExampleFade" data-slide-to="2"></li>
  </ol>
  
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="gambar/smk_alghifari.jpg" alt="First slide">
	  <div class="carousel-caption d-none d-md-block text-left">
		  <h5>Welocome To SPP Payment</h5>
		  <p>Bayar SPP dengan Mudah dan Praktis</p>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="gambar/gempita.jpg" alt="Second slide">
	  <div class="carousel-caption d-none d-md-block">
	    <h5>Mudah Digunakan</h5>
	    <p>Hanya Melalui Beberapa Langkah</p>
	  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="gambar/smp_alghifari.jpg" alt="Second slide">
	      <div class="carousel-caption d-none d-md-block text-right">
	      <h5>Design Interactive</h5>
	      <p>Design GUI yang Mudah Dipahami</p>
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


          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 text-gray-800">Halaman Utama</h1>
            </div>
<div class="alert alert-success" role="alert">
  Selamat Datang Dihalaman Utama klik <a href="login.php">disini</a> untuk Login
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<br>
<div class="row">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"align="center">~Situs Pembayaran SPP~</h4>
                </div>
                <div class="card-body"align="center">
                  Selamat Datang di Website Pembayaran SPP SMK Al-Ghifari Bayuresmi<br>
                  Bayar SPP lah dengan tepat karena lebih cepat lebih baik<br>
                  <strong>Good Luck!!</strong>
                </div>
              </div>
            </div>
</div>
<section class="my-4 px-3 pb-5" id="visi" >
<div class="row">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"align="center">~Visi SMK Al-Ghifari~</h4>
                </div>
                <div class="card-body">
                    
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Prestasi meningkat, lulusannya unggul, mudah diterima oleh masyarakat, memiliki etos kerja yang tinggi serta mampu berwiraswasta dan mandiri</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Amanah, profesional dalam melaksanakan tugas serta peduli terhadap pembaharuan dan lingkungan.</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>,
</div>
              </div>
            </div>
</div>
</section>

<div class="row"id="misi">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"align="center">~Misi SMK Al-Ghifari~</h4>
                </div>
                <div class="card-body">
          <div class="row">
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Membina pencapaian akhlak dan budi pekerti luhur serta Peningkatan program keahlian</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Mewujudkan personal yang berkepribadian, sehat dan terampil serta beretos kerja tinggi</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Meningkatkan pelayanan kerjasama secara optimal, meningkatkan budaya tertib dan bersih
</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Mengembangkan sistem pendidikan yang terintegrasi antara jalur pendidikan sekolah dan luar sekolah</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Meningkatkan program diklat yang mengacu pada standar kompetensi dengan pendekatan Competency Base Training (CBT)</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div>Mengembangkan iklim belajar berwawasan global yang berlandaskan norma dan nilai budaya bangsa</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            
                </div>
              </div>
            </div>
</div>

<div class="row"id="tentang">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"align="center">~Tentang SMK Al-Ghifari~</h4>
                </div>
                <div class="card-body">
                 <div class="text-center">
                     <img src="gambar/logo.jpg"width="150px">
                 </div>
<br>
<div class="row">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-body">
                 <div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sekolah Menengah Kejuruan (SMK) Al-Ghifari, sekolah yang berada di Jl. Hasan Arif KM.10 Karees Kec. Banyuresmi Kabupaten Garut ini, adalah sekolah yang bernaung dibawah yayasan Al-Ghifari. Sebagai sekolah yang berdiri dengan dilandasi latar belakang rasa kepedulian dari sosok keluarga besar H. Abdurahman, Drs, M.Si dan keluarga, terhadap pendidikan masyarakat setempat terutama kalangan kurang mampu atau ekonomi lemah, sehingga didirikanlah SMK Al-Ghifari (2008) yang sebelumnya juga telah di dirikan SMP Al-Ghifari yang juga masi satu lokasi dengan SMK Al-Ghifari.

</div>
</div>
</div>
</div>
</div>
</div>
</div>
                </div>
              </div>

<div class="row"id="hubungi">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h4 class="m-0 font-weight-bold text-primary"align="center">~Hubungi~</h4>
                </div>
                <div class="card-body">
<br>


<div class="row"id="sekolah">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-body">
                    <div>
    		<h3 class="text-dark"><i class="fa fa-fw fa-university" ></i>Sekolah</h3>
 		    <hr class="sidebar-divider bg-gray-700">
			
			<div class="row" >
     		<div class="col-xs-6 cont">
    		<b><i class="fas fa-fw fa-address-card mr-1" ></i>Kode Pos &#008; &#008; </b><br>
    		<b><i class="fa fa-fw fa-envelope mr-1" ></i>Email &#008; &#008; </b><br>
      	<b><i class="fa fa-fw fa-phone-alt mr-1" ></i>Telepon &#008; &#008; </b><br>
    		<b><i class="fa fa-fw fa-globe mr-1" ></i>Website &#008; &#008; </b><br>
    		</div>
    		
     		<div class="col-xs-6 cont">
    		<b> : </b> &nbsp; 44191<br>
    		<b> : </b>&nbsp; smk.alghifari@yahoo.co.id<br>
    		<b> : </b>&nbsp;  0262448446<br>
    		<b> : </b>&nbsp;  www.smk.al-ghifaribanyuresmi.sch.id 
     		</div>
     		</div>
     		</div>
     		</div>
     		</div>
     		</div>
     		</div>
     		
     		
<div class="row"id="operator">
            <div class="col-lg-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
    		<div class="card-body">
<div>
    		<h3 class="text-dark"><i class="fa fa-fw fa-user-alt mr-1" ></i>Operator</h3>
 		    <hr class="sidebar-divider bg-gray-700">
    		<div class="row" >
    		<div class="col-xs-6 cont">
    		<b><i class="fas fa-fw fa-user mr-1" ></i>Nama  &#008; &#008; </b><br>
    		<b><i class="fa fa-fw fa-envelope mr-1" ></i>Email  &#008; &#008; </b><br>
    	    <b><i class="fab fa-fw fa-whatsapp mr-1" ></i>Whatsapp &#008; &#008; </b><br>
    		<b><i class="fa fa-fw fa-map-marker-alt mr-1" ></i>Alamat &#008; &#008; </b><br>
    		</div>

    		<div class="col-xs-6 cont">
    		<b> : </b> &nbsp; Iwan Sopian,S.pd<br>
			<b> : </b> &nbsp; iwan06sopian@gmail.com<br>
			<b> : </b> &nbsp; 083667869903<br>
			<b> : </b> &nbsp; Sukawening,Garut<br>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>
    		</div>
    
                    </div>
                  </div>
                </div>
              </div>

        </div>
        <!-- /.container-fluid -->


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
  

<script src="vendor/admin/vendor/jquery/jquery.min.js"></script>
<script src="vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="vendor/admin/js/sb-admin-2.min.js"></script>

<script src="vendor/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="vendor/admin/js/demo/datatables-demo.js"></script>

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
})
</script>
</body>

</html>