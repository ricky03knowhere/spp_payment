<?php
$MM_authorizedUsers = "petugas";
$MM_donotCheckaccess = "false";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && false) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../siswa/index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  echo "<script>window.location.href = '".$MM_restrictGoTo."'</script>";
  exit;
}


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
$query_bulan = "select sum(jumlah_bayar) as bulan from pembayaran where bulan_dibayar = 'April' and tahun_dibayar = 2020";
$bulan = mysql_query($query_bulan, $koneksi) or die(mysql_error());
$row_bulan = mysql_fetch_assoc($bulan);


$query_tahun = "select sum(jumlah_bayar) as tahun from pembayaran where tahun_dibayar = 2020";
$tahun = mysql_query($query_tahun, $koneksi) or die(mysql_error());
$row_tahun = mysql_fetch_assoc($tahun);


$query_siswa = "select count(nisn) as siswa from pembayaran";
$siswa = mysql_query($query_siswa, $koneksi) or die(mysql_error());
$row_siswa = mysql_fetch_assoc($siswa);


$query_transaksi = "select * from pembayaran";
$transaksi = mysql_query($query_transaksi, $koneksi) or die(mysql_error());
$row_transaksi = mysql_fetch_assoc($transaksi);
$totalRows_transaksi = mysql_num_rows($transaksi);

?>
<div class="m-3">
<h2 class="pt-2" ><i class="fa fa-fw fa-tachometer-alt text-dark pr-2"></i>Dashboard Petugas</h2>

<nav class="my-4" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item active" aria-current="page">
<i class="fa fa-fw fa-tachometer-alt text-dark"></i>
Dashboard</li>
</ol>
</nav>

<div class="row mt-5" >
<div class="col-md-6 mb-4">
  <div class="card border-left-white bg-gradient-info shadow h-100 py-2" >
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h1 font-weight-light text-white mb-1">Rp <?= number_format($row_bulan['bulan'],0); ?>.-</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h4 mb-0 mr-3 font-weight-light text-gray-300">Pemasukan Bulan April</div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-chart-pie fa-4x text-gray-200"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 mb-4">
  <div class="card border-left-white bg-gradient-primary shadow h-100 py-2" >
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h1 font-weight-light text-white mb-1">Rp <?= number_format($row_tahun['tahun'],0); ?>.-</div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h4 mb-0 mr-3 font-weight-light text-gray-300">Pemasukan Tahun 2020</div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-chart-bar fa-4x text-gray-200"></i>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-6 mb-4">
  <div class="card border-left-white bg-gradient-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h1 font-weight-light text-white mb-1"><?= $row_siswa['siswa']; ?></div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h4 mb-0 mr-3 font-weight-light text-gray-100">Siswa yang Bertransaksi</div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-user-graduate fa-4x text-gray-200"></i>
        </div>
      </div>
    </div>
  </div>
</div><div class="col-md-6 mb-4">
  <div class="card border-left-white bg-dark shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="h1 font-weight-light text-white mb-1"><?= $totalRows_transaksi; ?></div>
          <div class="row no-gutters align-items-center">
            <div class="col-auto">
              <div class="h4 mb-0 mr-3 font-weight-light text-gray-300">Jumlah Transaksi</div>
            </div>
          </div>
        </div>
        <div class="col-auto">
          <i class="fas fa-hand-holding-usd fa-4x text-gray-200"></i>
        </div>
      </div>
    </div>
  </div>
</div>        
</div>        
<?php
mysql_free_result($siswa);
mysql_free_result($tahun);
mysql_free_result($bulan);
mysql_free_result($transaksi);
?>