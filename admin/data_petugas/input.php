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
  $insertSQL = sprintf("INSERT INTO petugas (id_petugas, username, password, nama_petugas, level ,picture) VALUES (%s, %s, %s, %s, %s,%s)",
                       GetSQLValueString($_POST['id_petugas'], "int"),
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['password'], "text"),
                       GetSQLValueString($_POST['nama_petugas'], "text"),
                       GetSQLValueString($_POST['level'], "text"),
					    GetSQLValueString($_POST['picture'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "index.php?url=data_petugas/tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='index.php?url=data_petugas/tampil.php&status=Ditambahkan'</script>";exit;
}

echo $entry_breadcrumbs;
?>

<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_petugas/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-folder-plus"></i>
Entry Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-user-tie"></i>
Petugas</li>
</ol>
</nav>

<div class="row justify-content-center m-1">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Insert Petugas</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="id_petugas" class="form-control form-control-user" id="id_petugas" name="id_petugas" placeholder="ID Petugas" required>
          </div>
          
          <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" id="nama_petugas" name="nama_petugas" placeholder="Nama Petugas" required>
          </div>
          </div>
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username" required>
          </div>
          <div class="col-sm-6">
           	 <input type="text" class="form-control form-control-user" id="password" name="password" placeholder="Password" required>
            </div>
           </div>
           
            <div class="form-group">
            <label class="lbl ml-1" >ID Level</label>
            <select class="form-control menu" id="exampleFormControlSelect1" name="level" >
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
            <option value="siswa">Siswa</option>
            </select>
            </div>

			   
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
              Insert
            </button>
            </div>
              <input type="hidden" name="picture" value="img.jpg" />
              <input type="hidden" name="MM_insert" value="form1" />
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