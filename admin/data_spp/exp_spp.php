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
$query_tampil_spp = "SELECT * FROM spp";
$tampil_spp = mysql_query($query_tampil_spp, $koneksi) or die(mysql_error());
$row_tampil_spp = mysql_fetch_assoc($tampil_spp);
$totalRows_tampil_spp = mysql_num_rows($tampil_spp);

?>

<div class="cop" >
<h3>SMK Al-ghifari Banyuresmi</h3>
<p>Jl. Hasan Arif Km. 10 Karees Kec.Banyuresmi Kab.Garut</p>
</div>

<h3 class="title" >DATA SPP</h3>
        <!-- Projects table -->
        <table class="table" border="1" cellpadding="18x" cellspacing="0" >
          <thead class="thead" bgcolor="<?= $color; ?>">
<tr>		<tr>
  <th>No.</th>
  <th>ID SPP</th>
  <th>Tahun</th>
  <th>Nominal</th>
  <th>Jumlah Bayar</th>
</tr>
          </thead>
          <tbody>
		    <?php 
		    $i = 1;
			do { ?>
<tr>
			  <td><?= $i; ?></td>            
  <td><?php echo $row_tampil_spp['id_spp']; ?></td>
  <td><?php echo $row_tampil_spp['tahun']; ?></td>
  <td><?php echo $row_tampil_spp['nominal']; ?></td>
  <td><?php echo $row_tampil_spp['jumlah_bayar']; ?></td>

		 	</tr>
  		    <?php $i++; } while ($row_tampil_spp = mysql_fetch_assoc($tampil_spp)); ?>
		   </tbody>
    </table>     

<span class="count" ><b>Jumlah Data : <?= $totalRows_tampil_spp; ?></b></span><br><br>

<b><?php echo date('l, d F Y'); ?></b>

</body>
</html>

<?php
mysql_freeresult($tampil_spp);
?>