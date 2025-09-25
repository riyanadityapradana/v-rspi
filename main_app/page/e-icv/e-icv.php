     <div class="row text-left">
		<div class="col">
			<br><h3 class="text-lef" style="color: #666666">DATA JEMAAH VAKSIN E-ICV</h3>
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
					<table class="table table-sm table-bordered table-hover" id="table4" style="width:100%">
						<thead class="thead-dark">
							<tr>
								<th style="text-align: center;">No.</th>
                                        <th>Tanggal Penerbitan</th>
								<th>No Dokumen</th>
                                        <th>No KTP</th>
                                        <th>Nama Lengkap</th>
								<th>No Telepon</th>
								<th>Jenis Vaksin</th>
								<th>Vaksin Dari</th>
								<th style="text-align: center;">Pilihan</th>
							</tr>
						</thead>
						<body>
							<?php
								$query = mysqli_query($mysqli,"SELECT * FROM vaksinasi_pasien ORDER BY tgl_penerbitan ASC")or die(mysqli_error($mysqli));
								$n=1;
								while ($row=mysqli_fetch_array($query)) {
								$no_dokumen = $row['no_dokumen'];
								$nn=$n++;
							?>
							<tr>
								<td width="30px"><?php echo $nn ?></td>
                                        <td><?php echo $row['tgl_penerbitan'] ?></td>
                                        <td><?php echo $row['no_dokumen'] ?></td>
                                        <td><?php echo $row['no_identitas'] ?></td>
                                        <td><?php echo $row['nama_pasien'] ?></td>
                                        <td><?php echo $row['no_tlp'] ?></td>
                                        <td><?php echo $row['penyakit_kondisi'] ?></td>
                                        <td><?php echo $row['vaksin_dari'] ?></td>
								<td class="center" width="170px">
									<input type="hidden" id="code">
									<button class='view_data btn btn-outline-secondary btn-sm' data-toggle="modal" id="<?=$no_dokumen;?>" data-target="#mydetail" style="width: 40px"><img src='../assets/assets-admin/img/icons/preview.png' style="width: 20px"></button>
									<span>
										<a href="main_app.php?page=edit_e_icv&id=<?= urlencode($row['no_dokumen']); ?>"><button class="btn btn-outline-secondary btn-sm" style="width: 40px"><img src='../assets/assets-admin/img/icons/edit.png' style="width: 20px"></button></a>
									</span>
                                             <a data-toggle='modal' data-target="#mod_remove_<?=$row['no_dokumen']?>"><button class='btn btn-outline-secondary btn-sm' style="width: 40px"><img src='../assets/assets-admin/img/icons/hapus.png' style="width: 20px"></button></a>
								</td>
							</tr>
                                   <!-- Modal Hapus data -->
							<div id="mod_remove_<?=$a['kode_peg']?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" align="center">
									<div class="modal-content">
										<div class="modal-body">
											<strong>Yakin ingin menghapus data <?php echo $a['nama_peg'] ?> ?&nbsp;&nbsp;</strong>
											<a href="file_hapus/hapus_pegawai.php?id=<?=$a['kode_peg']?>" class="btn btn-danger btn-sm" style="width: 60px">Ya</a>
											<button type="button" class="btn btn-success btn-sm" data-dismiss="modal" style="width: 60px">Batal</button>
										</div>
									</div>
								</div>
							</div>
							<!-- End Modal Hapus Data -->
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