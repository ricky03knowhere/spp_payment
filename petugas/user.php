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

?><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin 2 - Tables</title>

  <!-- Custom fonts for this template -->
<link href="../vendor/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="../vendor/admin/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     
      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-file-archive"></i>        </div>
        <div class="sidebar-brand-text mx-3">SURAT</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Halaman Utama</span></a>      </li>
      <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
    <a class="nav-link" href="disposisi.php">
          <i class="fa fa-book"></i>
          <span>Disposisi</span>      </a>      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link" href="suratmasuk.php">
          <i class="fa fa-file-alt"></i>
          <span>Surat Masuk</span>        </a>      </li>
            <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
         <a class="nav-link" href="suratkeluar.php">
          <i class="fa fa-file-csv"></i>
          <span>Surat Keluar</span>        </a>      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item active">
         <a class="nav-link" href="user.php">
          <i class="fa fa-user"></i>
          <span>user</span>        </a>      </li>
          <!-- Nav Item - Utilities Collapse Menu -->
          <li class="nav-item active">
          <a class="nav-link" href="login.php">
          <i class="fa fa-user-o"></i>
          <span>log out</span>        </a>      </li>
    
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

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
         <h1></h1>
        </nav>

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">USER</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"><a class="btn btn-primary" href="usertambah.php?id_user=<?php echo $row_Recordset1['id_user']; ?>">+Tambah</a></a></h6>
              <div class="m-0 font-weight-bold text-primary" align="right"><a class="fas fa-file-word bg-dark p-2 text-align rounded" data-toggle="tooltip" title="word" href="userword.php">WORD</a>		<a class="fas fa-file-excel bg-success p-2 text-align rounded" data-toggle="tooltip" title="Excel" href="userexcel.php">EXCEL</a>	<a class="fas fa-file-pdf bg-danger p-2 text-align rounded" data-toggle="tooltip" title="pdf" href="userpdf.php">PDF</a></div>
            </div>
            
            <!-- Page Heading -->
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" cellspacing="0">
                  <thead>
                    <tr>
                      <th>id_user</th>
                      <th>nama</th>
                      <th>username</th>
                      <th>password</th>
                      <th>level</th>
                       <th colspan="2">action</th>
                    </tr>
                    </thead>
        
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
            <span>Copyright &copy; syarif_rizki_santa</span>          </div>
        </div>
      </footer>
      <!-- End of Footer -->
</div>
    <!-- End of Content Wrapper -->
  </div>
<!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>  </a>

<!-- Bootstrap core JavaScript-->
<script src="../vendor/admin/vendor/jquery/jquery.min.js"></script>
<script src="../vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../vendor/admin/js/sb-admin-2.min.js"></script>

<script src="../vendor/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../vendor/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="../vendor/admin/js/demo/datatables-demo.js"></script>

</body>
</html>

<!-- Page level custom scripts -->

</body>
</html>
<?php
mysql_freeresult($row_Recordset);
?>