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

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE siswa SET nis=%s, nama=%s, id_kelas=%s, alamat=%s, no_telp=%s, id_spp=%s WHERE nisn=%s",
                       GetSQLValueString($_POST['nis'], "int"),
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['id_kelas'], "int"),
                       GetSQLValueString($_POST['alamat'], "text"),
                       GetSQLValueString($_POST['no_telp'], "text"),
                       GetSQLValueString($_POST['id_spp'], "int"),
                       GetSQLValueString($_POST['nisn'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "index.php?url=data_siswa/tampil.php&status=Diedit";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  echo "<script>window.location.href ='".$updateGoTo."'</script>";exit;
}

mysql_select_db($database_koneksi, $koneksi);
$query_kelas = "SELECT * FROM kelas";
$kelas = mysql_query($query_kelas, $koneksi) or die(mysql_error());
$row_kelas = mysql_fetch_assoc($kelas);
$totalRows_kelas = mysql_num_rows($kelas);

$colname_siswa = "-1";
if (isset($_GET['nisn'])) {
  $colname_siswa = $_GET['nisn'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_siswa = sprintf("SELECT * FROM siswa WHERE nisn = %s", GetSQLValueString($colname_siswa, "int"));
$siswa = mysql_query($query_siswa, $koneksi) or die(mysql_error());
$row_siswa = mysql_fetch_assoc($siswa);
$totalRows_siswa = mysql_num_rows($siswa);

mysql_select_db($database_koneksi, $koneksi);
$query_spp = "SELECT * FROM spp";
$spp = mysql_query($query_spp, $koneksi) or die(mysql_error());
$row_spp = mysql_fetch_assoc($spp);
$totalRows_spp = mysql_num_rows($spp);

echo $edit_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_siswa/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-edit"></i>
Edit Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fa fa-fw fa-user-graduate"></i>
Siswa</li>
</ol>
</nav>

<div class="row justify-content-center mt-5">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Edit Siswa</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="number" hidden="hidden"  class="form-control form-control-user" id="nis" name="nisn" placeholder="NISN" value="<?php echo htmlentities($row_siswa['nisn'], ENT_COMPAT, 'utf-8'); ?>">
          <input type="number" disabled="disabled"  class="form-control form-control-user" id="nis" name="nisn" placeholder="NISN" value="<?php echo htmlentities($row_siswa['nisn'], ENT_COMPAT, 'utf-8'); ?>">
          </div>
          <div class="col-sm-6">
          <input type="number" class="form-control form-control-user" id="nis" name="nis" placeholder="NIS" value="<?php echo htmlentities($row_siswa['nis'], ENT_COMPAT, 'utf-8'); ?>" >
          </div>
          </div>
          
            <div class="form-group">
           	 <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama" value="<?php echo htmlentities($row_siswa['nama'], ENT_COMPAT, 'utf-8'); ?>" >
            </div>
            <div class="form-group">
              <input type="text" class="form-control form-control-user" id="no" name="no_telp" placeholder="No. Telephone" value="<?php echo htmlentities($row_siswa['no_telp'], ENT_COMPAT, 'utf-8'); ?>" >
            </div>
            <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
            <label class="lbl ml-1">ID Kelas</label>
            <select class="form-control menu" id="exampleFormControlSelect1" name="id_kelas" >
            <?php 
            do { 
            ?>
            <option value="<?php echo $row_kelas['id_kelas']?>" 
            <?php if ($row_kelas['id_kelas'] === $row_siswa['id_kelas']) 
            {
            echo "selected='selected'";} ?>>
            <?php echo $row_kelas['id_kelas']; ?></option>
            <?php
            } while ($row_kelas = mysql_fetch_assoc($kelas));
            ?>
            </select>
            </div>
            <div class="col-sm-6">
            <label class="lbl ml-1" >ID SPP</label>
            <select class="form-control menu" id="exampleFormControlSelect1" name="id_spp" >
            <?php 
            do { 
            ?>
            <option value="<?php echo $row_spp['id_spp']?>" 
            <?php if ($row_spp['id_spp'] === $row_siswa['id_spp']) 
            {echo "selected";} ?>>
            <?php echo $row_spp['id_spp']; ?></option>
            <?php
            } while ($row_spp = mysql_fetch_assoc($spp));
            ?>
            </select>
            </div>
            </div>
			   <div class="form-group">
			   <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo htmlentities($row_siswa['alamat'], ENT_COMPAT, 'utf-8'); ?>">
			   </div>
			   
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
              Edit
            </button>
            </div>
            
            <input type="hidden" name="MM_update" value="form1" />
            
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

mysql_free_result($siswa);

mysql_free_result($spp);
?>