<?php
$hostname_koneksi = "localhost";
$database_koneksi = "db_surat";
$username_koneksi = "root";
$password_koneksi = "";
$koneksi = mysql_pconnect($hostname_koneksi, $username_koneksi, $password_koneksi) or trigger_error(mysql_error(),E_USER_ERROR); 

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
$Recordset1 = "SELECT * FROM user";
$row_Recordset = mysql_query($Recordset1,$koneksi);
$row_Recordset1 = mysql_fetch_assoc($row_Recordset);

?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">USER</h1>

<div class="card shadow mb-4">
  <div class="card-body">
    <h3 class="pt-4 pb-5 text-center" >
    <i class="fas fa-user-tie pr-1"></i>
    Data Tabel Petugas</h3>
    <div class="table-responsive">
    
      <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="2">
        <thead class="bg-dark text-gray-300" >
          <tr>
                      <th>id_user</th>
                      <th>nama</th>
                      <th>username</th>
                      <th>password</th>
                      <th>level</th>
                       <th colspan="2">action</th>
                    </tr>
                    </thead>
        			<tbody>
                    <?php do { ?>
                      <tr>
                        <td><?php echo $row_Recordset1['id_user']; ?></td>
                        <td><?php echo $row_Recordset1['nama']; ?></td>
                        <td><?php echo $row_Recordset1['username']; ?></td>
                        <td><?php echo $row_Recordset1['password']; ?></td>
                        <td><?php echo $row_Recordset1['level']; ?></td>
                        <td><a class="fas fa-file-edit bg-success p-2 text-align rounded" data-toggle="tooltip" title="edit" href="userubah.php?id_user=<?php echo $row_Recordset1['id_user']; ?>">ubah</a></td>
                        <td><a class="fas fa-trash-alt bg-danger p-2 text-align rounded" data-toggle="tooltip" title="delete" href="userhapus.php?id_user=<?php echo $row_Recordset1['id_user']; ?>">hapus</a></td>
                      </tr>
                     <?php } while ($row_Recordset1 = mysql_fetch_assoc($row_Recordset)); ?>
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

<?php
mysql_freeresult($row_Recordset);
?>