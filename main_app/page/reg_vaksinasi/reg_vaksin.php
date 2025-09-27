<?php
// Query utama
$query = mysqli_query($config,"SELECT 
     p.no_rkm_medis,
	p.nm_pasien,
	p.tgl_lahir,
     p.no_ktp,
     p.no_tlp,
     r.no_rawat,
     r.tgl_registrasi,
     r.no_reg,
     r.status_bayar,
     poli.nm_poli
     FROM reg_periksa r
     JOIN pasien p ON r.no_rkm_medis = p.no_rkm_medis
     JOIN poliklinik poli ON r.kd_poli = poli.kd_poli
     WHERE r.kd_poli = 'U0053'
     AND r.status_bayar = 'Sudah Bayar'
     AND MONTH(r.tgl_registrasi) = MONTH(CURDATE())
     AND YEAR(r.tgl_registrasi) = YEAR(CURDATE())
     ORDER BY r.tgl_registrasi DESC, r.no_reg DESC;")or die(mysqli_error($config));
?>
     <div class="row text-left">
		<div class="col">
			<br><h3 class="text-lef" style="color: #666666">DATA REGISTRASI PASIEN VAKSIN</h3>
			<hr style="height: 1px; background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(102,102,102,1), rgba(0,0,0,0) )">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" >
			<div class="panel-heading">
				<!-- <a href="?unit=pegawai&action=input" class="btn btn-outline-info btn-sm"><i class="fa fa-plus"></i>+ Tambah Data</a> -->
			</div>
			<div class="dataTables_wrapper table-responsive-sm" style="padding-top: 10px">
				<div class="wrapper">
					<table class="table table-sm table-bordered table-hover" id="table2" style="width:100%">
						<thead class="thead-dark">
							<tr>
								<th style="text-align: center;">No.</th>
                                <th>Tanggal Regist</th>
								<th>No Rawat</th>
                                <th>NIK</th>
								<th>Nama Pasien</th>
								<th>No Telepon</th>
								<th>Status Bayar</th>
								<th style="text-align: center;">Pilihan</th>
							</tr>
						</thead>
						<body>
							<?php
								$n=1;
								while ($row=mysqli_fetch_array($query)) {
									$no_rawat = $row['no_rawat'];
									$nn=$n++;

									// Insert ke tabel vaksinasi_pasien
									$nm_pasien = $row['nm_pasien'];
									$tgl_lahir = isset($row['tgl_lahir']) ? $row['tgl_lahir'] : null;
									$no_ktp = $row['no_ktp'];
									$no_tlp = $row['no_tlp'];
									$tgl_registrasi = $row['tgl_registrasi'];

									// Input biasa (dummy)
									$tgl_penerbitan = date('Y-m-d');
									$no_dokumen = '';
									$no_barcode = '';
									$jenis_kelamin = '';
									$kebangsaan = '';
									$no_identitas = $no_ktp;
									$penanda_tangan = '';
									$penyakit_kondisi = '';
									$vaksin_dari = '';
									$created_at = date('Y-m-d H:i:s');

									// Query insert
									$insert_sql = "INSERT INTO vaksinasi_pasien (tgl_penerbitan, no_dokumen, no_barcode, nama_pasien, tgl_lahir, jenis_kelamin, kebangsaan, no_identitas, penanda_tangan, penyakit_kondisi, vaksin_dari, created_at) VALUES ('{$tgl_penerbitan}', '{$no_dokumen}', '{$no_barcode}', '{$nm_pasien}', '{$tgl_lahir}', '{$jenis_kelamin}', '{$kebangsaan}', '{$no_identitas}', '{$penanda_tangan}', '{$penyakit_kondisi}', '{$vaksin_dari}', '{$created_at}')";
									// Jalankan insert jika ingin otomatis, bisa diaktifkan
									// mysqli_query($config, $insert_sql);
							?>
							<tr>
								<td width="30px"><?php echo $nn ?></td>
                                        <td><?= !empty($row['tgl_registrasi']) ? date('d/m/Y', strtotime($row['tgl_registrasi'])) : '-'; ?></td>
                                        <td><?php echo $row['no_rawat'] ?></td>
								<td align="center">
									<?php 
										$nik = $row['no_ktp'];
										if (empty($nik)){
											echo " - ";
										}else {
											echo $nik;
										}
									?>
								</td>
								<td><?php echo $row['nm_pasien'] ?></td>
								<td><?php echo $row['no_tlp'] ?></td>
								<td><?php echo $row['status_bayar'] ?></td>
								<td class="center" width="130px">
									<input type="hidden" id="code">
									<button class='view_data btn btn-outline-secondary btn-sm' data-toggle="modal" id="<?=$no_rawat;?>" data-target="#mydetail" style="width: 40px"><img src='../assets/assets-admin/img/icons/preview.png' style="width: 20px"></button>
									<span>
										<a href="main_app.php?page=pindah_reg_vaksin&id=<?= urlencode($row['no_rawat']); ?>"><button class="btn btn-outline-secondary btn-sm" style="width: 40px"><img src='../assets/assets-admin/img/icons/pindah.png' style="width: 20px"></button></a>
									</span>
								</td>
							</tr>
							<?php
								}
							?>
						</body>
					</table>
				</div>
			</div>
		</div>
		<!-- modal detail -->
		<div class="modal fade" id="mydetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content" id="reg_vaksin_detail">
				</div>
			</div>
		</div>
		<!-- akhir modal --> 
	</div>