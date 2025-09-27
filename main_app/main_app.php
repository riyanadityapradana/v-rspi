<?php
require_once("../config/config.php");

if (isset($_GET['page'])){ $page = $_GET['page']; }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>APLIKASI KEPEGAWAIAN DAN SISWA MAGANG</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<link rel="icon" href="../assets/assets-public/img/fotokantor/bawaslu.png">
		<!-- Bootstrap CSS -->
		<link href="../assets/assets-admin/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/assets-admin/css/dataTables.bootstrap4.min.css" rel="stylesheet">
		<link href="../assets/assets-admin/css/style.css" rel="stylesheet">
		<!-- Select2 CSS -->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
		<link href="../assets/assets-admin/css/style.css" rel="stylesheet">
		<!-- datetimepicker -->
		<link href="../assets/assets-admin/css/bootstrap-datepicker.css" rel="stylesheet">
		<link href="../assets/assets-admin/css/glyphicon.css" rel="stylesheet" type="text/css">
		<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

		<!-- Responsive Custom CSS -->
		<style type="text/css">
		body {
			margin-top: 58px;
			margin-bottom: 0;
			background: url(../assets/assets-admin/img/colores_claros.jpeg);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;
		}
		/* Responsive container for mobile/tablet/desktop */
		.container {
			max-width: 100%;
			padding-left: 10px;
			padding-right: 10px;
		}
		@media (max-width: 768px) {
			.container {
				padding-left: 2px;
				padding-right: 2px;
			}
			.main-footer marquee {
				font-size: 13px !important;
			}
			.navbar-brand img {
				height: 28px !important;
			}
		}
		@media (max-width: 480px) {
			.main-footer marquee {
				font-size: 11px !important;
			}
			.navbar-brand img {
				height: 22px !important;
			}
		}
		.dataTables_wrapper .wrapper {
			max-height: 550px; /* Atur tinggi sesuai kebutuhan */
			overflow-y: auto;
		}
		</style>
	</head>
	<body>
		<nav class="navbar navbar-expand-sm fixed-top navbar-dark" style="background-color:rgba(108,117,125,0.88)">
			<a class="navbar-brand page-scroll" href="main_app.php?unit=beranda"><img src="../assets/assets-admin/img/bawaslu.png" height="35" class="d-inline-block align-top" color="white" alt="" style="padding-top: 0">&nbsp;&nbsp;Beranda</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
				<!-- Awal Menu Admin -->
				 	<a class="nav-link" href="main_app.php?page=reg_vaksin" style="color: white">Registrasi Vaksin</a>
					<li class="nav-item active dropdown"> 
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Vaksinasi</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="main_app.php?page=kirim-data">Kirim Data</a>
							<hr style="height: 2px; background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(102,102,102,1), rgba(0,0,0,0) )">
							<a class="dropdown-item" href="main_app.php?page=e-icv">Data E-ICV</a>
							<a class="dropdown-item" href="main_app.php?page=terima&action=input">Data Buku ICV</a>
							<a class="dropdown-item" href="main_app.php?page=nilai&action=datagrid">Data Penilaian Siswa</a>
						</div>
					</li>
				</ul>
				<form class="form-inline my-2 my-lg-0">
					<a class="nav-link" href="<?=$link;?>" style="color: white"><span class="glyphicon glyphicon-user" style="color: #A60000"></span>&nbsp;&nbsp;Hai Admin</a>
					<a class="nav-link" href="logout.php" data-toggle="modal" data-target="#modallogout" style="color: yellow"><span class="glyphicon glyphicon-log-in" style="color: #A60000"></span>&nbsp;&nbsp;Logout</a>
				</form>
			</div>
		</nav>
 
		<div class="container">
			<div class="col">
				<div id="pages">
				<?php
					require_once ("content.php");
				?>
			</div>
			<br>
			<!-- Main Footer -->
			<footer class="main-footer" style="position:fixed;bottom:0;left:0;right:0;width:100vw;background:#d9dde0;color:#00070c;z-index:9999;padding:0; height:40px; display:flex; align-items:center;">
				<div style="overflow:hidden;white-space:nowrap;width:100vw;">
					<marquee behavior="scroll" direction="left" scrollamount="6" style="font-size:17px;padding:8px 0;min-width:100vw;">
						&copy; <?= date('Y') ?> IT-RSPI | Vaksinasi RSPI. Dikembangkan dengan ❤️ oleh Tim IT-RSPI. Seluruh hak cipta dilindungi undang-undang.
					</marquee>
				</div>
			</footer>  
			<!-- Akhir footer-->
		</div>
		
		<!-- Optional JavaScript -->
		<script src="../assets/assets-admin/js/jquery-3.4.1.js"></script>
		<script src="../assets/assets-admin/js/Popper.min.js"></script>
		<script src="../assets/assets-admin/js/bootstrap.min.js"></script>
		<!-- jQuery (wajib sebelum Select2) -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<!-- Select2 JS -->
		<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
		<script>
			$(document).ready(function() {
				$('.select2').select2({
					placeholder: "-Pilih-",
					allowClear: true
				});
			});
		</script>
		<!-- DataTables JS -->
		<script src="../assets/assets-admin/js/jquery.dataTables.min.js"></script>
		<script src="../assets/assets-admin/js/dataTables.bootstrap4.min.js"></script>

		<!--<script src="../assets/js/bootstrap-datepicker.min.js"></script>-->	
		<script> function goBack(){ window.history.back(); } </script>
		
		<script>
			$(document).ready(function(){setTimeout(function(){$("#info").fadeIn('slow');}, 0);});
			setTimeout(function(){$("#info").fadeOut('slow');}, 3000);
		</script>
		
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table1').DataTable({
					"paging":false,
					"ordering":true,
					"info":false,
					"language":{
						"decimal":       "",
						"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
						"sProcessing":   "Sedang memproses...",
						"sZeroRecords":  "Tidak ditemukan data yang sesuai",
						"sSearch":       "",
						"searchPlaceholder": "Cari Data..",
						"sUrl":          "",
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table2').DataTable({
					"lengthChange": false,
					"paging":true,
					"pagingType":"numbers",
					"scrollCollapse": true,
					"ordering":true,
					"info":true,
					"language":{
						"decimal":       "",
						"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
						"sProcessing":   "Sedang memproses...",
						"sLengthMenu":   "Tampilkan _MENU_ entri",
						"sZeroRecords":  "Tidak ditemukan data yang sesuai",
						"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
						"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
						"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						"sInfoPostFix":  "",
						"sSearch":       "",
						"searchPlaceholder": "Cari Data..",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext":     "Selanjutnya",
							"sLast":     "Terakhir"
						}
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table22').DataTable({
					"lengthChange": false,
					"paging":true,
					"pagingType":"numbers",
					"scrollCollapse": true,
					"ordering":true,
					"info":true,
					"language":{
						"decimal":       "",
						"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
						"sProcessing":   "Sedang memproses...",
						"sLengthMenu":   "Tampilkan _MENU_ entri",
						"sZeroRecords":  "Tidak ditemukan data yang sesuai",
						"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
						"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
						"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						"sInfoPostFix":  "",
						"sSearch":       "",
						"searchPlaceholder": "Cari Data..",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext":     "Selanjutnya",
							"sLast":     "Terakhir"
						}
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table3').DataTable({
					"searching":true,
					"filtering":false,
					"paging":true,
					"pagingType":"numbers",
					"scrollCollapse": true,
					"ordering":true,
					"info":false,
					"language":{
						"decimal":       "",
						"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
						"sProcessing":   "Sedang memproses...",
						"sLengthMenu":   "Tampilkan _MENU_ entri",
						"sZeroRecords":  "Tidak ditemukan data yang sesuai",
						"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
						"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
						"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						"sInfoPostFix":  "",
						"sSearch":       "",
						"searchPlaceholder": "Cari Data..",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext":     "Selanjutnya",
							"sLast":     "Terakhir"
						}
					}
				});
			});
		</script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('#table4').DataTable({
					"lengthChange": false,
					"paging":true,
					"pagingType":"numbers",
					"scrollCollapse": true,
					"ordering":true,
					"info":true,
					"language":{
						"decimal":       "",
						"sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
						"sProcessing":   "Sedang memproses...",
						"sLengthMenu":   "Tampilkan _MENU_ entri",
						"sZeroRecords":  "Tidak ditemukan data yang sesuai",
						"sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
						"sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
						"sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
						"sInfoPostFix":  "",
						"sSearch":       "",
						"searchPlaceholder": "Cari Sekolah..",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "Pertama",
							"sPrevious": "Sebelumnya",
							"sNext":     "Selanjutnya",
							"sLast":     "Terakhir"
						}
					}
				});
			});

		</script>
		<!-- Script Untuk Detail Pendaftaran -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'page/reg_vaksinasi/reg_vaksin_detail.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#reg_vaksin_detail').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Pegawai -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_pegawai.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_pegawai').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Cuti -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_cuti.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_cuti').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Penerimaan MAgang -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_penerimaan.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_penerimaan').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Penerimaan MAgang -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_peserta_magang.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_peserta').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Penilaian MAgang -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_penilaian_peserta.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_penilaian').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail Akun -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_akun.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_akun').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail data sk jabatan -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_sk-jabatan.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_sk_jabatan').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail data sk pangkat -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_sk-pangkat.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_sk_pangkat').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<!-- Script Untuk Detail data sk golongan -->
		<script>
			$(document).ready(function() {
				$('.view_data').click(function() {
				var id = $(this).attr("id");
					$.ajax( {
						url: 'unit/file_detail_data/detail_sk-golongan.php', 
						method: 'POST',
						data: {id:id},
						success:function(data){ 
							$('#data_sk_golongan').html(data);
							$('#mydetail').modal("show");
						}
					});
				});
			});
		</script>
		<script>
			$(document).ready(function() {
				$('#dataTables-example').DataTable({
					responsive: true
				});
				$('#dataTables-example2').DataTable({
					responsive: true
				});
			});
		</script>
		<script src="../assets/assets-admin/js/bootstrap-datepicker.js"></script>
		<script type="text/javascript">
			$(document).ready(function () {
					$('.tanggal').datepicker({
						format: "yyyy-mm-dd",
						autoclose:true
					});
			});
		</script>
		<script>
			function wajibAngka(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				if (charCode > 31 && (charCode < 48 || charCode > 57)) {
					alert("Isian Harus Berupa Angka");
					return false;
				}   
			}
		</script>
		<script src="../assets/assets-admin/js/jquery.chained.min.js"></script>
		<script>
			$("#kelurahan").chained("#kecamatan");
		</script>
	</div>
	</body>
</html>