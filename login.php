<?php require_once('Connections/koneksi.php'); ?>
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['us'])) {
  $loginUsername=$_POST['us'];
  $password=$_POST['PW'];
  $MM_fldUserAuthorization = "level";
  $MM_redirectLoginSuccess = "admin/index.php";
  $MM_redirectLoginFailed = "login.php?error";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_koneksi, $koneksi);
  	
  $LoginRS__query=sprintf("SELECT id_petugas,username,nama_petugas, password, level ,picture FROM petugas WHERE username=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $koneksi) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'level');
    $picture  = mysql_result($LoginRS,0,'picture');
    $user  = mysql_result($LoginRS,0,'nama_petugas');
    $id  = mysql_result($LoginRS,0,'id_petugas');
        
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	   
    $_SESSION['login'] = true;
    $_SESSION['img'] = $picture;
    $_SESSION['user'] = $user;
    $_SESSION['id'] = $id;

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login Page</title>

<!-- Custom fonts for this template-->
<link href="assets/img/favicon.png" rel="icon" width="300px"  type="image/png">
<link href="vendor/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
<!-- Custom styles for this template-->
<link href="vendor/admin/css/sb-admin-2.min.css" rel="stylesheet">
<style type="text/css">
.alert{
	margin-top:10px;
	border-radius: 40px
}
</style>
</head>

<body class="bg-gradient-success">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0 bg-dark">
               
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h2 text-white mb-4">Login Page</h1>
                  </div>
                  <?php if(isset($_GET["error"])) {
                  echo '<div class="alert bg-danger text-white font-weight-bold btn-icon-split w-100 justify-content-center py-2 px-1">
                  <i class="fas fa-fw fa-exclamation-triangle fa-2x"></i>
                  <span class="text" >Username atau Password Salah!</span>
                  </div>';
                  }
               	 else if(isset($_GET["text"])) {
                  echo '<div class="alert bg-primary text-white font-weight-bold btn-icon-split w-100 justify-content-center py-2 px-1">
                  <i class="fas fa-fw fa-check fa-2x"></i>
                  <span class="text" >'.$_GET["text"].'</span>
                  </div>';
                  }
                  ?>
        		  <form class="user" id="form1" name="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" 
                      name="us" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" autocomplete="false" required="required" >
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" 
                      name="PW" id="exampleInputPassword" placeholder="Password" autocomplete="false" required="required" >
                    </div>
       
                    <button type="submit" name="LOGIN" id="LOGIN" href="index.php" class="btn btn-success btn-user btn-block text-dark">
                      <b>Login</b>
                    </button>

                  </form>
                  <hr class="bg-gray-500" >
                  <div class="row" >            
                  <div class="col-md-6 text-center mb-2">
                    <a class="small text-success" href="index.php#register"><i class="fa fa-user-plus fa-fw mr-1" ></i>Buat Akun Baru</a>
                  </div>
                  <div class="col-md-6 text-center">
                    <a class="small text-success" href="index.php"><i class="fa fa-home fa-fw mr-1" ></i>Halaman Utama</a>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
<script src="vendor/admin/vendor/jquery/jquery.min.js"></script>
<script src="vendor/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="vendor/admin/js/sb-admin-2.min.js"></script>

</body>

</html>