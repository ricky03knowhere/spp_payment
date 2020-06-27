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
    <a class="nav-link" href="index.php">
      <i class="fa fa-fw fa-tachometer-alt text-white"></i>
      <span>Dashboard</span></a>
  </li>
<!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Data Tabel
  </div>
  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
		<a class="nav-link scroll" href="index.php?url=data_siswa/tampil.php">
	 	 <i class="fa fa-fw fa-user-graduate text-danger"></i>
		  <span>Siswa</span></a>
  </li>
  <li class="nav-item">
  		<a class="nav-link scroll" href="index.php?url=data_petugas/tampil.php">
  	 	 <i class="fa fa-fw fa-user-alt text-info"></i>
  		  <span>Petugas</span></a>
  </li>
  <li class="nav-item">
  		<a class="nav-link scroll" href="index.php?url=data_kelas/tampil.php">
  	 	 <i class="fa fa-fw fa-clipboard-list text-warning"></i>
  		  <span>Kelas</span></a>
  </li>
  <li class="nav-item">
  		<a class="nav-link scroll" href="index.php?url=data_spp/tampil.php">
  	 	 <i class="fa fa-fw fa-money-check-alt text-success"></i>
  		  <span>SPP</span></a>
  </li>
  
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2" aria-expanded="true" aria-controls="collapseUtilities2">
<i class="fa fa-fw fa-edit text-primary"></i>
<span>Entry Data</span>
  </a>
  <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities2" data-parent="#accordionSidebar">
<div class="bg-success py-2 collapse-inner rounded">
  <h6 class="collapse-header text-gray-900">Tabel</h6>
  <a class="collapse-item text-dark scroll" href="index.php?url=data_siswa/input.php"><i class="far fa-fw fa-dot-circle mr-2"></i>Siswa</a>
  <a class="collapse-item text-dark scroll" href="index.php?url=data_petugas/input.php"><i class="far fa-fw fa-dot-circle mr-2"></i>Petugas</a>
<a class="collapse-item text-dark scroll" href="index.php?url=data_kelas/input.php"><i class="far fa-fw fa-dot-circle mr-2"></i>Kelas</a>
<a class="collapse-item text-dark scroll" href="index.php?url=data_spp/input.php"><i class="far fa-fw fa-dot-circle mr-2"></i>SPP</a>
</div>
  </div>
</li>
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
Transaksi
</div>
<li class="nav-item">
		<a class="nav-link scroll" href="index.php?url=data_pembayaran/tampil.php">
	 	 <i class="fa fa-fw fa-history text-info"></i>
		  <span>History Pembayaran</span></a>
</li>
<li class="nav-item">
		<a class="nav-link scroll" href="index.php?url=data_pembayaran/input.php">
	 	 <i class="fas fa-fw fa-money-bill-wave text-success"></i>
		  <span>Entry Pembayaran</span></a>
</li>

  <hr class="sidebar-divider">
 <!-- Heading -->
  <div class="sidebar-heading">
    Out
  </div>
		<li class="nav-item">
		<a class="nav-link logout" href="../logout.php">
		<i class="fa fa-fw fa-sign-out-alt text-warning"></i>
		<span>Logout</span></a>
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
      <nav class="navbar navbar-expand navbar-light bg-success topbar mb-4 static-top shadow">
      
        <!-- Sidebar Toggle (Topbar) -->
		<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
		  <i class="fa fa-times text-dark"></i>
		</button>
      
      
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">
      
          <!-- Nav Item - Search Dropdown (Visible Only XS) -->
		<div class="d-sm-flex bg-dark pict" >	

			<h6 class="text-white d-none d-md-block mt-4 mx-4 pl-3" >Administrator</h6>


          <hr class="topbar-divider d-none d-sm-block">
      
<li class="nav-item dropdown no-arrow">
  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

    <img class="img-profile rounded-circle ml-3" src="../assets/img/<?= $img; ?>">
  </a>
  <!-- Dropdown - User Information -->
  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in bg-dark" aria-labelledby="userDropdown">

  <h6 class="collapse-header text-success ml-3 my-3 text-left"><b>Welcome <?= $name; ?></b><br><div class="d-block d-sm-none text-gray-400 pt-1">(Administrator)</div></h6>
    <a class="dropdown-item text-success" href="index.php?url=../profile.php">
      <i class="fas fa-id-card fa-sm fa-fw mr-2 text-gray-400"></i>
      Profile
    </a>

    <div class="dropdown-divider"></div>
    <a class="dropdown-item text-success logout" href="../logout.php" data-toggle="modal" data-target="#logoutModal">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
      Logout
    </a>
    
  </div>
</li>
</div>
        </ul>      
      </nav>