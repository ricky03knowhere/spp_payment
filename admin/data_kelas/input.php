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
  $insertSQL = sprintf("INSERT INTO kelas (id_kelas, nama_kelas, kompetensi_keahlian ) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['id_kelas'], "int"),
                       GetSQLValueString($_POST['nama_kelas'], "text"),
                       GetSQLValueString($_POST['kompetensi_keahlian'], "text"));

  mysql_select_db($database_koneksi, $koneksi);
  $Result1 = mysql_query($insertSQL, $koneksi) or die(mysql_error());

  $insertGoTo = "index.php?url=data_kelas/tampil.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
echo "<script>window.location.href ='index.php?url=data_kelas/tampil.php&status=Ditambahkan'</script>";exit;
}

echo $entry_breadcrumbs;
?>
<li class="breadcrumb-item">
<i class="fa fa-fw fa-table"></i>
<a href="index.php?url=data_kelas/tampil.php">Data Tabel</a></li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-folder-plus"></i>
Entry Data</li>
<li class="breadcrumb-item active" aria-current="page">
<i class="fas fa-fw fa-clipboard-list"></i>
Kelas</li>
</ol>
</nav>

<div class="row justify-content-center m-1">

<div class="card o-hidden border-0 shadow">
  <div class="card-body p-0">
    <!-- Nested Row within Card Body -->
    <div class="row">

        <div class="p-5">
          <div class="text-center">
            <h1 class="h3 mb-5">Insert Kelas</h1>
          </div>
          <form class="user" action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
          
          <div class="form-group row">
          <div class="col-sm-6 mb-3 mb-sm-0">
          <input type="number" class="form-control form-control-user" id="id_kelas" name="id_kelas" placeholder="ID Kelas" required>
          </div>
          
          <div class="col-sm-6">
          <input type="text" class="form-control form-control-user" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas" required>
          </div>
          </div>
          
          <div class="form-group">
           	 <input type="text" class="form-control form-control-user" id="kompetensi_keahlian" name="kompetensi_keahlian" placeholder="Kompetensi Keahlian" required>
            </div>
           
			  <div class="form-group row">
			  <div class="col-sm-6 mb-3 mb-sm-0">
            <button type="submit" class="btn btn-success btn-user text-gray-900 insert">
              Insert
            </button>
            </div>
              <input type="hidden" name="picture" value="juned.jpg" />
              <input type="hidden" name="MM_insert" value="form1" />
            </form>
            <div class="col-sm-6">
			   <a href="index.php?url=data_kelas/tampil.php" class="btn btn-dark btn-user text-white insert">
			   Cancel
			   </a>
			   </div>
			   </div>
        </div>

    </div>
  </div>
  </div>
  </div>