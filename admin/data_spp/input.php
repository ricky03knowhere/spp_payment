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
  $insertSQL = sprintf("INSERT INTO spp (id_spp, tahun, nominal, jumlah_bayar) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['id_spp'], "int"),
                       GetSQLValueString($_POST['tahun'], "int"),
                       GetSQLValueString($_POST['nominal'], "text"),
                       GetSQLValueString($_POST['jumlah_bayar'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "index.php?url=data_spp/tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='index.php?url=data_spp/tampil.php&status=Ditambahkan'</script>";exit;
}

echo $entry_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_spp/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-folder-plus"></i>
Entry Data</li>'
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-money-check-alt"></i>
SPP</li>
</ol>
</nav>

<div class="row justify-content-center m-1">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Insert SPP</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="number" class="form-control form-control-user" id="id_spp" name="id_spp" placeholder="ID SPP" required>
          </div>
          
          <div class="col-sm-6">
          <input type="number" class="form-control form-control-user" id="tahun" name="tahun" placeholder="Tahun" required>
          </div>
          </div>
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
           	 <input type="number" class="form-control form-control-user" id="nominal" name="nominal" placeholder="Nominal" required>
          </div>
          <div class="col-sm-6">
           	 <input type="number" class="form-control form-control-user" id="nominal" name="jumlah_bayar" placeholder="Jumlah Bayar" required>
            </div>
           </div>
           
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
              Insert
            </button>
            </div>
              <input type="hidden" name="picture" value="juned.jpg" />
              <input type="hidden" name="MM_insert" value="form1" />
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