     <div class="row text-left">
		<div class="col">
			<br><h3 class="text-lef" style="color: #666666">DATA JEMAAH VAKSIN E-ICV</h3>
			<hr style="height: 1px; background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(102,102,102,1), rgba(0,0,0,0) )">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12" style="border-right: 1px solid #E5E5E5">
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
								<td class="center" width="200px">
									<input type="hidden" id="code">
									<span>
										<button class="btn btn-outline-secondary btn-sm btn-edit-upload" 
											data-toggle="modal" 
											data-target="#modalEditUpload" 
											data-no_dokumen="<?= htmlspecialchars($row['no_dokumen']) ?>"
											data-nama_pasien="<?= htmlspecialchars($row['nama_pasien']) ?>"
											data-no_identitas="<?= htmlspecialchars($row['no_identitas']) ?>"
											data-tgl_penerbitan="<?= htmlspecialchars($row['tgl_penerbitan']) ?>"
											style="width: 40px">
											<img src='../assets/assets-admin/img/icons/upload.png' style="width: 20px">
										</button>
									</span>
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

		<!-- Modal Edit Upload -->
		<div class="modal fade" id="modalEditUpload" tabindex="-1" role="dialog" aria-labelledby="modalEditUploadLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="modalEditUploadLabel">Edit Data Upload</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="formEditUpload" method="post" action="main_app.php?page=upload" enctype="multipart/form-data">
						<div class="modal-body">
							<input type="hidden" name="no_dokumen" id="edit_no_dokumen">
							<div class="form-group">
								<label for="edit_nama_pasien">Nama Lengkap</label>
								<input type="text" class="form-control" id="edit_nama_pasien" name="nama_pasien" readonly>
							</div>
							<div class="form-group">
								<label for="edit_no_identitas">No KTP</label>
								<input type="text" class="form-control" id="edit_no_identitas" name="no_identitas" readonly>
							</div>
							<div class="form-group">
								<label for="edit_tgl_penerbitan">Tanggal Penerbitan</label>
								<input type="text" class="form-control" id="edit_tgl_penerbitan" name="tgl_penerbitan" readonly>
							</div>
							<div class="form-group">
								<label for="up_eicv">Upload E-ICV (PDF/PNG/JPG/JPEG)</label>
								<input type="file" class="form-control-file" id="up_eicv" name="up_eicv" accept=".pdf,.png,.jpg,.jpeg">
							</div>
							<div class="form-group">
								<label for="up_form">Upload Form (PDF/PNG/JPG/JPEG)</label>
								<input type="file" class="form-control-file" id="up_form" name="up_form" accept=".pdf,.png,.jpg,.jpeg">
							</div>
							<div class="form-group">
								<label for="up_tpk">Upload TPK (PDF/PNG/JPG/JPEG)</label>
								<input type="file" class="form-control-file" id="up_tpk" name="up_tpk" accept=".pdf,.png,.jpg,.jpeg">
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Akhir Modal Edit Upload -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		<script>
		$(document).ready(function(){
			$('.btn-edit-upload').on('click', function(){
				var no_dokumen = $(this).data('no_dokumen');
				var nama_pasien = $(this).data('nama_pasien');
				var no_identitas = $(this).data('no_identitas');
				var tgl_penerbitan = $(this).data('tgl_penerbitan');
				$('#edit_no_dokumen').val(no_dokumen);
				$('#edit_nama_pasien').val(nama_pasien);
				$('#edit_no_identitas').val(no_identitas);
				$('#edit_tgl_penerbitan').val(tgl_penerbitan);
			});
		});
		</script>
	</div>