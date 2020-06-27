<?php
require_once('../../Connections/koneksi.php'); 
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

?>

<div class="cop" >
<h3>SMK Al-ghifari Banyuresmi</h3>
<p>Jl. Hasan Arif Km. 10 Karees Kec.Banyuresmi Kab.Garut</p>
</div>

<h3 class="title" >History Pembayaran</h3>
        <!-- Projects table -->
        <table class="table" border="1" cellpadding="18x" cellspacing="0" >
          <thead class="thead" bgcolor="<?= $color; ?>">
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

<span class="count" ><b>Jumlah Data : <?= $totalRows_tampil_pembayaran; ?></b></span><br><br>

<b><?php echo date('l, d F Y'); ?></b>

</body>
</html>

<?php
mysql_freeresult($tampil_pembayaran);
?>