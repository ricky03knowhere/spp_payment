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
$query_tampil_petugas = "SELECT * FROM petugas";
$tampil_petugas = mysql_query($query_tampil_petugas, $koneksi) or die(mysql_error());
$row_tampil_petugas = mysql_fetch_assoc($tampil_petugas);
$totalRows_tampil_petugas = mysql_num_rows($tampil_petugas);

?>

<div class="cop" >
<h3>SMK Al-ghifari Banyuresmi</h3>
<p>Jl. Hasan Arif Km. 10 Karees Kec.Banyuresmi Kab.Garut</p>
</div>

<h3 class="title" >DATA PETUGAS</h3>
        <!-- Projects table -->
        <table class="table" border="1" cellpadding="18x" cellspacing="0" >
          <thead class="thead" bgcolor="<?= $color; ?>">
<tr>
  <th>No.</th>
  <th>ID Petugas</th>
  <th>Nama Petugas</th>
  <th>Username</th>
  <th>Password</th>
  <th>Level</th>
</tr>
          </thead>
          <tbody>
		    <?php 
		    $i = 1;
			do { ?>
<tr>
			  <td><?= $i; ?></td>            
  <td><?php echo $row_tampil_petugas['id_petugas']; ?></td>
  <td><?php echo $row_tampil_petugas['nama_petugas']; ?></td>
  <td><?php echo $row_tampil_petugas['username']; ?></td>
  <td><?php echo $row_tampil_petugas['password']; ?></td>
  <td><?php echo $row_tampil_petugas['level']; ?></td>
		 	</tr>
  		    <?php $i++; } while ($row_tampil_petugas = mysql_fetch_assoc($tampil_petugas)); ?>
		   </tbody>
    </table>     

<span class="count" ><b>Jumlah Data : <?= $totalRows_tampil_petugas; ?></b></span><br><br>

<b><?php echo date('l, d F Y'); ?></b>

</body>
</html>

<?php
mysql_freeresult($tampil_petugas);
?>