<?php 
$page = isset($_GET['page']) ? $_GET['page'] : '';
//Dashboard
if ($page == "beranda"){
  require_once("page/beranda.php");
}
if ($page == "reg_vaksin"){
  require_once("page/reg_vaksinasi/reg_vaksin.php");
}
if ($page == "pindah_reg_vaksin"){
  require_once("page/reg_vaksinasi/pindah_reg_vaksin.php");
}

if ($page == "e-icv"){
  require_once("page/e-icv/e-icv.php");
}
?>