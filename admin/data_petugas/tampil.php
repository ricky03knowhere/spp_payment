<?php
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

mysql_select_db($database_koneksi, $koneksi);
$query_tampil_petugas = "SELECT * FROM petugas";
$tampil_petugas = mysql_query($query_tampil_petugas, $koneksi) or die(mysql_error());
$row_tampil_petugas = mysql_fetch_assoc($tampil_petugas);
$totalRows_tampil_petugas = mysql_num_rows($tampil_petugas);

$notif = "";
$link = "data_petugas/tampil.php";

if(isset($_GET["status"])){
	$notif = $_GET["status"];
}

echo $data_breadcrumbs;
?>


<li class="breadcrumb-item active" aria-current="page">
<i class="fa fa-fw fa-user-tie"></i>
Petugas</li>
</ol>
</nav>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <h3 class="pt-4 pb-5 text-center" >
      <i class="fas fa-user-tie pr-1"></i>
      Data Tabel Petugas</h3>
      <div class="table-responsive">
      
        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="2">
          <thead class="bg-dark text-gray-300" >
            <tr>
              <th>No.</th>
              <th>ID Petugas</th>
              <th>Nama Petugas</th>
              <th>Username</th>
              <th>Password</th>
              <th>Level</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
		    <?php 
		    $i = 1;
			do { ?>
            <tr>
			  <td><?= $i; ?></td>            
              <td><?php echo $row_tampil_petugas['id_petugas']; ?></td>
              <td><?php echo $row_tampil_petugas['nama_petugas']; ?></td>
              <td><?php echo $row_tampil_petugas['username']; ?></td>
              <td><?php echo $row_tampil_petugas['password']; ?></td>
              <td><?php echo $row_tampil_petugas['level']; ?></td>
              <td>
              <div class="d-sm-flex justify-content-evenly align-items-center">
              <a class="btn btn-success text-dark btn-sm px-3 py-1 mr-2" href="index.php?url=data_petugas/edit.php&id_petugas=<?php echo $row_tampil_petugas['id_petugas']; ?>">
              <i class="fa fa-fw fa-edit"></i></a>
              <a class="btn btn-dark text-success btn-sm px-3 py-1 delete" href="index.php?url=data_petugas/hapus.php&id_petugas=<?php echo $row_tampil_petugas['id_petugas']; ?>">
              <i class="fa fa-fw fa-trash-alt"></i></a>
              </div>
              </td>
		 	</tr>
  		    <?php $i++; } while ($row_tampil_petugas = mysql_fetch_assoc($tampil_petugas)); ?>
		   </tbody>
                </table>     
           </div>      
   <div class="d-sm-flex justify-content-left align-items-left my-3 mx-2">
<a href="index.php?url=data_petugas/input.php" class="btn btn-primary btn-icon-split btn-sm mr-4 mt-3">
  <span class="icon text-white-50">
    <i class="fas fa-plus"></i>
  </span>
  <span class="text">Entry Data</span>
</a>
<div class="nav-item dropdown no-arrow mt-3">
  <a class="btn btn-info btn-icon-split btn-sm nav-link dropdown-toggle" href="#" id="exDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <span class="icon text-white-50">
    <i class="fas fa-share"></i>
  </span>
  <span class="text">Export Tabel</span>
</a>
<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="exDropdown">

<h6 class="collapse-header text-gray-900 ml-3 my-3 text-left">Export to</h6>
  <a class="dropdown-item text-dark" href="export/export.php?data=data_petugas/exp_petugas.php&type=print.php&name=daftar_petugas">
    <i class="fa fa-file-pdf fa-2x fa-fw mr-2 mt-2 text-danger"></i>
    Pdf / Print
  </a>
  <a class="dropdown-item text-dark" href="export/export.php?data=data_petugas/exp_petugas.php&type=doc.php&name=daftar_petugas">
    <i class="fa fa-file-word fa-2x fa-fw mr-2 mt-2 text-primary"></i>
    Document
  </a>
  <a class="dropdown-item text-dark" href="export/export.php?data=data_petugas/exp_petugas.php&type=spread.php&name=daftar_petugas">
    <i class="fas fa-file-excel fa-2x fa-fw mr-2 mt-2 text-success"></i>
    Spreadsheet
  </a>
  
</div>
</div>

</div>
             
            </div>
          </div>

</div>

<div class="notification" data-notif="<?= $notif; ?>" data-link="<?= $link; ?>">
<?php
mysql_freeresult($tampil_petugas);
?>