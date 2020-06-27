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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO siswa (nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES (%s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nisn'], "int"),
                       GetSQLValueString($_POST['nis'], "int"),
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['id_kelas'], "int"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['no_telp'], "text"),
                       GetSQLValueString($_POST['id_spp'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "index.php?url=data_siswa/tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='index.php?url=data_siswa/tampil.php&status=Ditambahkan'</script>";exit;
}

mysql_select_db($database_koneksi, $koneksi);
$query_kelas = "SELECT * FROM kelas";
$kelas = mysql_query($query_kelas, $koneksi) or die(mysql_error());
$row_kelas = mysql_fetch_assoc($kelas);
$totalRows_kelas = mysql_num_rows($kelas);

mysql_select_db($database_koneksi, $koneksi);
$query_spp = "SELECT * FROM spp";
$spp = mysql_query($query_spp, $koneksi) or die(mysql_error());
$row_spp = mysql_fetch_assoc($spp);
$totalRows_spp = mysql_num_rows($spp);

echo $entry_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_siswa/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-folder-plus"></i>
Entry Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fa fa-fw fa-user-graduate"></i>
Siswa</li>
</ol>
</nav>

<div class="row justify-content-center m-1">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Insert Siswa</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="number" class="form-control form-control-user" id="nis" name="nisn" placeholder="NISN" required>
          </div>
          <div class="col-sm-6">
          <input type="number" class="form-control form-control-user" id="nis" name="nis" placeholder="NIS" required>
          </div>
          </div>
          
            <div class="form-group">
           	 <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" required>
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="no" name="no_telp" placeholder="No. Telephone" required>
            </div>
            <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <label class="lbl ml-1" >ID Kelas</label>
            <select class="form-control menu" id="exampleFormControlSelect1" name="id_kelas" >
            <?php 
            do {  
            ?>
            <option value="<?php echo $row_kelas['id_kelas']?>"><?php echo $row_kelas['id_kelas']?></option>
            <?php
            } while ($row_kelas = mysql_fetch_assoc($kelas));
            ?>
            </select>
            </div>
            <div class="col-sm-6">
            <label class="lbl ml-1" >ID SPP</label>
            <select class="form-control menu" id="exampleFormControlSelect2" name="id_spp" >
            <?php 
            do {  
            ?>
            <option value="<?php echo $row_spp['id_spp']?>" <?php if (!(strcmp($row_spp['id_spp'], $row_kelas['id_kelas']))) {echo "SELECTED";} ?>><?php echo $row_spp['id_spp']?></option>
            <?php
            } while ($row_spp = mysql_fetch_assoc($spp));
            ?>
            </select>
            </div>
            </div>
			   <div class="form-group">
			   <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" required>
			   </div>
			   
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
              Insert
            </button>
            </div>
              <input type="hidden" name="MM_insert" value="form1" />
            </form>
            <div class="col-sm-6">
			   <a href="index.php?url=data_siswa/tampil.php" class="btn btn-dark btn-user text-white insert">
			   Cancel
			   </a>
			   </div>
			   </div>
        </div>

    </div>
  </div>
  </div>
  </div>

<?php
mysql_free_result($kelas);

mysql_free_result($spp);
?>