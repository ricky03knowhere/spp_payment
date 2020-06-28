<?php
	mysql_select_db($database_koneksi, $koneksi);
	$query_petugas = "SELECT * FROM petugas where id_petugas = $id";
	$petugas = mysql_query($query_petugas, $koneksi) or die(mysql_error());
	$row_petugas = mysql_fetch_assoc($petugas);
?>
<div class="m-3">
<h2 class="pt-2" ><i class="fa fa-fw fa-tachometer-alt text-dark pr-2"></i>Dashboard Admin</h2>

<nav class="my-4" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<i class="fa fa-fw fa-tachometer-alt"></i>
<a href="index.php?url=home.php">Dashboard</a></li>
<li class="breadcrumb-item">
<i class="fas fa-fw fa-id-card"></i>
Profile</li>
</ol>
</nav>

      <div class="row mt-5" >
      
      <div class="col-md-4 mb-4">
      
      <div class="card profile">
      <div class="card-header"><h4 class="mt-2" >Picture</h4></div>
      <img class="card-img-top rounded-circle" src="../assets/img/<?= $row_petugas['picture']; ?>" alt="Card image cap">
      <div class="card-body">
      <p class="h3 text-center" style="text-transform: capitalize;"><?= $row_petugas['nama_petugas']; ?></p>
      </div>
      </div>
      
      </div>
      <div class="col-md-8 mb-4">
      
      <div class="card profile">
      <div class="card-header"><h4 class="mt-2" >Profile</h4></div>
      <div class="card-body">
      <ul class="list-group list-group-flush font-weight-bold mb-5">
      <li class="list-group-item">ID Petugas : <span class="text-primary" ><?= $row_petugas['id_petugas']; ?></span></li>
      <li class="list-group-item">Username : <span class="text-primary" ><?= $row_petugas['username']; ?></span></li>
      <li class="list-group-item">Password : <span class="text-primary" ><?= $row_petugas['password']; ?></span></li>
      <li class="list-group-item">Level : <span class="text-primary" ><?= $row_petugas['level']; ?></span></li>
      </ul>
      </div>
      </div>
      
      </div>
      </div>
      
<?php
mysql_free_result($petugas);
?>