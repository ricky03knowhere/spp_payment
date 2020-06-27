<?php 
  if (!isset($_SESSION)) {
	session_start();
	}
	
if(!isset($_SESSION['login'])){
	header('Location: ../login.php');
	exit;
}
  $name = $_SESSION['user'];
  $img = $_SESSION['img'];
  $id = $_SESSION['id'];
  
  require_once('../Connections/koneksi.php'); 
  include("../assets/templates/header.php");
  include("sidebar.php");
  include("../config.php");

if(isset( $_GET['url'])) {
  
$page = $_GET['url'];
$home = "home.php";

if(!file_exists($page) || empty($page)){
   include("home.php");
}else{ 
   include($page);
}
}else{ 
   include("home.php");
}


  include("../assets/templates/footer.php");
?>