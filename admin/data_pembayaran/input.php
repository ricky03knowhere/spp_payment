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
  $insertSQL = sprintf("INSERT INTO pembayaran (id_pembayaran, id_petugas, nisn, tanggal_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar) VALUES (%s, %s, %s, %s, %s, %s, %s,%s)",
                       GetSQLValueString($_POST['id_pembayaran'], "int"),
                       GetSQLValueString($_POST['id_petugas'], "int"),
                       GetSQLValueString($_POST['nisn'], "text"),
                       GetSQLValueString($_POST['tanggal_bayar'], "date"),
                       GetSQLValueString($_POST['bulan_dibayar'], "text"),
                       GetSQLValueString($_POST['tahun_dibayar'], "int"),
					   GetSQLValueString($_POST['id_spp'], "int"),
					   GetSQLValueString($_POST['jumlah_bayar'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "index.php?url=data_pembayaran/tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='index.php?url=data_pembayaran/tampil.php&status=Ditambahkan'</script>";exit;
}

mysql_select_db($database_koneksi, $koneksi);
$query_petugas = "SELECT * FROM petugas";
$petugas = mysql_query($query_petugas, $koneksi) or die(mysql_error());
$row_petugas = mysql_fetch_assoc($petugas);

$query_kelas = "SELECT * FROM kelas";
$kelas = mysql_query($query_kelas, $koneksi) or die(mysql_error());
$row_kelas = mysql_fetch_assoc($kelas);

$query_siswa = "SELECT * FROM siswa";
$siswa = mysql_query($query_siswa, $koneksi) or die(mysql_error());
$row_siswa = mysql_fetch_assoc($siswa);

$query_spp = "select id_spp from siswa GROUP BY id_spp";
$spp = mysql_query($query_spp, $koneksi) or die(mysql_error());
$row_spp = mysql_fetch_assoc($spp);

echo $transaction_breadcrumbs;
?>

<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-money-bill-wave"></i>
Entry Pembayaran</li>
</ol>
</nav>

<div class="row justify-content-center m-1">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Entry Pembayaran</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="number" class="form-control form-control-user" id="id_pembayaran" name="id_pembayaran" placeholder="ID Pembayaran" required>
          </div>
          
          <div class="col-sm-6">
          <input type="number" class="form-control form-control-user" id="jumlah_bayar" name="jumlah_bayar" placeholder="Jumlah Bayar" required>
          </div>
          </div>
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <label class="lbl ml-1" >NISN</label>
          <select class="form-control menu" id="exampleFormControlSelect1" name="nisn" >
          <?php 
          do {  
          ?>
          <option value="<?php echo $row_siswa['nisn']?>"><?php echo $row_siswa['nisn']?></option>
          <?php
          } while ($row_siswa = mysql_fetch_assoc($siswa));
          ?>
          </select>
          </div>
          <div class="col-sm-6">
		  <label class="lbl ml-1" >Tanggal Bayar</label>
           	 <input type="date" class="form-control form-control-user date-pick" id="tanggal_bayar" name="tanggal_bayar" placeholder="Tanggal Bayar" required>
            </div>
           </div>
           
        <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
       	 <input type="text" class="form-control form-control-user" id="bulan_dibayar" name="bulan_dibayar" placeholder="Bulan Dibayar" required>
        </div>
        <div class="col-sm-6">
       	 <input type="number" class="form-control form-control-user" id="tahun_dibayar" name="tahun_dibayar" placeholder="Tahun Dibayar" required>
        </div>
        </div>

		   <div class="form-group row">
		   <div class="col-sm-6 mb-3 mb-sm-0">
		   <label class="lbl ml-1" >ID SPP</label>
		   <select class="form-control menu" id="exampleFormControlSelect1" name="id_spp" >
		   <?php 
		   do {  
		   ?>
		   <option value="<?php echo $row_spp['id_spp']?>"><?php echo $row_spp['id_spp']?></option>
		   <?php
		   } while ($row_spp = mysql_fetch_assoc($spp));
		   ?>
		   </select>
		   </div>
		   <div class="col-sm-6">
			<label class="lbl ml-1" >ID Petugas</label>
			<select class="form-control menu" id="exampleFormControlSelect1" name="id_petugas" >
			<?php 
			do { 
			?>
			<option value="<?php echo $row_petugas['id_petugas']?>" 
			<?php if ($row_petugas['id_petugas'] === $id) 
			{
			echo "selected='selected'";} ?>>
			<?php echo $row_petugas['id_petugas']; ?></option>
			<?php
			} while ($row_petugas = mysql_fetch_assoc($petugas));
			?>
			</select>
		   </div>
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
			   <a href="index.php?url=data_pembayaran/tampil.php" class="btn btn-dark btn-user text-white insert">
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
  mysql_free_result($siswa);
  mysql_free_result($petugas);
  mysql_free_result($spp);
  mysql_free_result($kelas);
  ?>