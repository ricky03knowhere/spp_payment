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
  $updateSQL = sprintf("UPDATE petugas SET username=%s, password=%s, nama_petugas=%s, level=%s, picture =%s WHERE id_petugas=%s",                  
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['nama_petugas'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
                       GetSQLValueString($_POST['picture'], "text"),
                       GetSQLValueString($_POST['id_petugas'], "int"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($updateSQL, $koneksi) or die(mysql_error());

  $updateGoTo = "index.php?url=data_petugas/tampil.php&status=Diedit";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
  }
  echo "<script>window.location.href ='".$updateGoTo."'</script>";exit;
}


$colname_petugas = "-1";
if (isset($_GET['id_petugas'])) {
  $colname_petugas = $_GET['id_petugas'];
}
mysql_select_db($database_koneksi, $koneksi);
$query_petugas = sprintf("SELECT * FROM petugas WHERE id_petugas = %s", GetSQLValueString($colname_petugas, "int"));
$petugas = mysql_query($query_petugas, $koneksi) or die(mysql_error());
$row_petugas = mysql_fetch_assoc($petugas);
$totalRows_petugas = mysql_num_rows($petugas);


echo $edit_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_petugas/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-edit"></i>
Edit Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-user-tie"></i>
Petugas</li>
</ol>
</nav>

<div class="row justify-content-center mt-5">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Edit Petugas</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">

<div class="form-group row">
<div class="col-sm-6">
<input hidden="hidden"  type="id_petugas" class="form-control form-control-user" id="id_petugas" name="id_petugas" placeholder="ID Petugas" value="<?php echo htmlentities($row_petugas['id_petugas'], ENT_COMPAT, 'utf-8'); ?>" required>
<input disabled="disabled" type="id_petugas" class="form-control form-control-user" id="id_petugas" name="id_petugas" placeholder="ID Petugas" value="<?php echo htmlentities($row_petugas['id_petugas'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>

<div class="col-sm-6">
<input type="text" class="form-control form-control-user" id="nama_petugas" name="nama_petugas" placeholder="Nama Petugas" value="<?php echo htmlentities($row_petugas['nama_petugas'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>
</div>

<div class="form-group row">
<div class="col-sm-6">
<input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" value="<?php echo htmlentities($row_petugas['username'], ENT_COMPAT, 'utf-8'); ?>" required>
</div>
<div class="col-sm-6">
 	 <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password" value="<?php echo htmlentities($row_petugas['password'], ENT_COMPAT, 'utf-8'); ?>" required>
  </div>
  </div>
  
  <div class="form-group">
  <label class="lbl ml-1" >ID Level</label>
  <select class="form-control menu" id="exampleFormControlSelect1" name="level" >
  <option value="admin" 
  <?php 
  if ("admin" == $row_petugas['level']) 
  {
  echo "selected='selected'";
  } ?>>
  Admin</option>
  <option value="petugas"
  <?php 
  if ("petugas" == $row_petugas['level']) 
  {
  echo "selected='selected'";
  } ?>>
  Petugas</option>
  <option value="siswa"
  <?php 
  if ("siswa" == $row_petugas['level']) 
  {
  echo "selected='selected'";
  } ?>>
  Siswa</option>
  </select>
  </div>

			   
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
  <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
    Edit
  </button>
  </div>
  			<input hidden="hidden"  type="id_petugas" class="form-control form-control-user" id="id_petugas" name="picture" 
  			value="<?php 
  			if ("admin" == $row_petugas['level']){
  				echo "img1.jpg";
  			}else if("petugas" == $row_petugas['level']){
  				echo "img2.jpg";
  			}else if("siswa" == $row_petugas['level']){
  				echo "img3.jpg";
  			}
  			?>">
            <input type="hidden" name="MM_update" value="form1" />
  </form>
  <div class="col-sm-6">
			   <a href="index.php?url=data_petugas/tampil.php" class="btn btn-dark btn-user text-white insert">
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
mysql_free_result($petugas);
?>