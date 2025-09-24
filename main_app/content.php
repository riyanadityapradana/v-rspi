<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';
//Dashboard
if ($page == "beranda"){
  require_once("page/beranda.php");
}
if ($page == "reg_vaksin"){
  require_once("page/reg_vaksinasi/reg_vaksin.php");
}
?>