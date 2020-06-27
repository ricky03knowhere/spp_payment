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
  $updateSQL = sprintf("UPDATE spp SET tahun=%s, nominal=%s, jumlah_bayar=%s WHERE id_spp=%s",                  
                       GetSQLValueString($_POST['tahun'], "int"),
                       GetSQLValueString($_POST['nominal'], "int"),
                       GetSQLValueString($_POST['jumlah_bayar'], "text"),
                       GetSQLValueString($_POST['id_spp'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "index.php?url=data_spp/tampil.php&status=Diedit";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  echo "<script>window.location.href ='".$updateGoTo."'</script>";exit;
}


$colname_spp = "-1";
if (isset($_GET['id_spp'])) {
  $colname_spp = $_GET['id_spp'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_spp = sprintf("SELECT * FROM spp WHERE id_spp = %s", GetSQLValueString($colname_spp, "int"));
$spp = mysql_query($query_spp, $koneksi) or die(mysql_error());
$row_spp = mysql_fetch_assoc($spp);
$totalRows_spp = mysql_num_rows($spp);


echo $edit_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_spp/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-edit"></i>
Edit Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-money-check-alt"></i>
SPP</li>
</ol>
</nav>

<div class="row justify-content-center mt-5">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Edit SPP</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">

<div class="form-group row">
<div class="col-sm-6 mb-3 mb-sm-0">
<input hidden="hidden"  type="id_spp" class="form-control form-control-user" id="id_spp" name="id_spp" placeholder="ID spp" value="<?php echo htmlentities($row_spp['id_spp'], ENT_COMPAT, 'utf-8'); ?>" required>
<input disabled="disabled" type="id_spp" class="form-control form-control-user" id="id_spp" name="id_spp" placeholder="ID spp" value="<?php echo htmlentities($row_spp['id_spp'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>

<div class="col-sm-6">
<input type="text" class="form-control form-control-user" id="tahun" name="tahun" placeholder="tahun" value="<?php echo htmlentities($row_spp['tahun'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-6 mb-3 mb-sm-0">
 	 <input type="text" class="form-control form-control-user" id="nominal" name="nominal" placeholder="nominal" value="<?php echo htmlentities($row_spp['nominal'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>
<div class="col-sm-6">
 	 <input type="text" class="form-control form-control-user" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar" value="<?php echo htmlentities($row_spp['jumlah_bayar'], ENT_COMPAT, 'utf-8'); ?>" required>
  </div>
  </div>

			   
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
  <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
    Edit
  </button>
  </div>
  			<input hidden="hidden"  type="id_spp" class="form-control form-control-user" id="id_spp" name="picture" value="juned.jpg">
            <input type="hidden" name="MM_update" value="form1" />
  </form>
  <div class="col-sm-6">
			   <a href="index.php?url=data_spp/tampil.php" class="btn btn-dark btn-user text-white insert">
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
mysql_free_result($spp);
?>