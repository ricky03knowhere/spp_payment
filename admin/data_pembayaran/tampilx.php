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
$query_tampil_pembayaran = "SELECT * FROM pembayaran";
$tampil_pembayaran = mysql_query($query_tampil_pembayaran, $koneksi) or die(mysql_error());
$row_tampil_pembayaran = mysql_fetch_assoc($tampil_pembayaran);
$totalRows_tampil_pembayaran = mysql_num_rows($tampil_pembayaran);

$notif = "";
$link = "../admin/data_pembayaran/tampilx.php";

if(isset($_GET["status"])){
	$notif = $_GET["status"];
}

echo $transaction_breadcrumbs;
?>

<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-history"></i>
History Pembayaran</li>
</ol>
</nav>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
    	<h3 class="pt-4 pb-5 text-center" >
    	<i class="fas fa-history pr-1"></i>
    	History Pembayaran</h3>
      <div class="table-responsive">      

        <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="2">
          <thead class="bg-dark text-gray-300" >
            <tr>
              <th>No.</th>
              <th>ID Pembayaran</th>
              <th>ID Petugas</th>
              <th>NISN</th>
              <th>Tanggal</th>
              <th>Bulan</th>
              <th>Tahun</th>
              <th>ID SPP</th>
              <th>Jumlah Bayar</th>
            </tr>
          </thead>
          <tbody>
		    <?php 
		    $i = 1;
			do { ?>
            <tr>
			  <td><?= $i; ?></td>            
              <td><?php echo $row_tampil_pembayaran['id_pembayaran']; ?></td>			  
              <td><?php echo $row_tampil_pembayaran['id_petugas']; ?></td>
              <td><?php echo $row_tampil_pembayaran['nisn']; ?></td>
              <td><?php echo $row_tampil_pembayaran['tanggal_bayar']; ?></td>
              <td><?php echo $row_tampil_pembayaran['bulan_dibayar']; ?></td>
              <td><?php echo $row_tampil_pembayaran['tahun_dibayar']; ?></td>
              <td><?php echo $row_tampil_pembayaran['id_spp']; ?></td>
              <td><?php echo $row_tampil_pembayaran['jumlah_bayar']; ?></td>
		 	</tr>
  		    <?php $i++; } while ($row_tampil_pembayaran = mysql_fetch_assoc($tampil_pembayaran)); ?>
		   </tbody>
                </table>     
           </div>      

             
            </div>
          </div>

</div>

<div class="notification" data-notif="<?= $notif; ?>" data-link="<?= $link; ?>">
<?php
mysql_freeresult($tampil_pembayaran);
?>