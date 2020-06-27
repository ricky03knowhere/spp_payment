<script>
window.print();
</script>
<?php require_once('../../Connections/koneksi.php'); ?>
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
$query_Recordset1 = "SELECT * FROM siswa";
$Recordset1 = mysql_query($query_Recordset1, $koneksi) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>daftar siswa</title>
</head>

<body>
<p>DATA SISWA</p>
<table border="1">
  <tr>
    <td>nisn</td>
    <td>nis</td>
    <td>nama</td>
    <td>id_kelas</td>
    <td>alamat</td>
    <td>no_telp</td>
    <td>id_spp</td>
  </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['nisn']; ?></td>
      <td><?php echo $row_Recordset1['nis']; ?></td>
      <td><?php echo $row_Recordset1['nama']; ?></td>
      <td><?php echo $row_Recordset1['id_kelas']; ?></td>
      <td><?php echo $row_Recordset1['alamat']; ?></td>
      <td><?php echo $row_Recordset1['no_telp']; ?></td>
      <td><?php echo $row_Recordset1['id_spp']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;</p>
<p>&nbsp;<?php echo $totalRows_Recordset1 ?></p>
<p>Thursday, February 13, 2020  12:13</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>