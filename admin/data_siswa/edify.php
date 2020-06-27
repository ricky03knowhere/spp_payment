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
GetSQLValueString($_POST['no_telp'], "int"),
GetSQLValueString($_POST['id_spp'], "int"),
GetSQLValueString($_POST['nisn'], "int"));

mysql_select_db($database_koneksi, $koneksi);
$Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

$updateGoTo = "tampil.php";
if (isset($_SERVER['QUERY_STRING'])) {
$updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
$updateGoTo .= $_SERVER['QUERY_STRING'];
}
header(sprintf("Location: %s", $updateGoTo));
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
<table align="center">
<tr valign="baseline">
<td nowrap="nowrap" align="right">Nisn:</td>
<td><?php echo $row_siswa['nisn']; ?></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Nis:</td>
<td><input type="text" name="nis" value="<?php echo htmlentities($row_siswa['nis'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Nama:</td>
<td><input type="text" name="nama" value="<?php echo htmlentities($row_siswa['nama'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Id_kelas:</td>
<td><select name="id_kelas">
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
</td>
</tr>
<tr> </tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Alamat:</td>
<td><input type="text" name="alamat" value="<?php echo htmlentities($row_siswa['alamat'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">No_telp:</td>
<td><input type="text" name="no_telp" value="<?php echo htmlentities($row_siswa['no_telp'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
</tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right">Id_spp:</td>
<td><select name="id_spp">
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
</td>
</tr>
<tr> </tr>
<tr valign="baseline">
<td nowrap="nowrap" align="right"> </td>
<td><input type="submit" value="Update record" /></td>
</tr>
</table>
<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="nisn" value="<?php echo $row_siswa['nisn']; ?>" />
</form>
<p> </p>
</body>
</html>
<?php
mysql_free_result($kelas);

mysql_free_result($siswa);

mysql_free_result($spp);
?>