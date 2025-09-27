
	<br>
	<div class="row text-center">
		<div class="col">
			<br><h3 class="text-left" style="color: #666">DATA KECAMATAN</h3>
			<hr style="height: 1px; background-image: linear-gradient(to right, rgba(0,0,0,0), rgba(0,0,0,0.4), rgba(0,0,0,0) )">
		</div>
	</div>
	<div class="row">
		<div class="col-sm-9" style="border-right: 1px solid #E5E5E5">
			<div class="dataTables_wrapper table-responsive-sm" style="padding-top: 10px">
				<div class="wrapper">
					<table class="table table-sm table-bordered table-hover" id="table2" style="width:100%">
						<thead class="thead-dark">
							<tr>
								<th style="text-align: center;">No.</th>
								<th style="text-align: center;">Kode Dokumen</th>
								<th style="text-align: center;">Nama Pasien</th>
                                <th style="text-align: center;">No Telepon</th>
								<th style="text-align: center;">Pilihan</th>
							</tr>
						</thead>
						<?php
							$query = mysqli_query($mysqli,"SELECT * FROM vaksinasi_pasien ORDER BY tgl_penerbitan ASC")or die(mysqli_error($mysqli));
							$n=1;
							while ($a=mysqli_fetch_array($query)) {
							$nn=$n++;
						?>
						<body>
							<tr>
								<td align="center" width="50px"><?php echo $nn ?></td>
								<td width="200px" style="text-align: center;"><?php echo $a['no_dokumen'] ?></td>
								<td><?php echo $a['nama_pasien'] ?></td>
                                <td><?php echo $a['no_tlp'] ?></td>
								<td class="center" width="150px">
									<input type="hidden" id="code">
                                    <button type="button" class="btn btn-success btn-sm ml-2" style="margin-left:10px;" data-toggle="modal" data-target="#modalWa"
                                        onclick="setPengajuanData('<?= $a['no_dokumen'] ?>', '<?= htmlspecialchars($a['nama_pasien']) ?>', '<?= htmlspecialchars($a['jenis_kelamin']) ?>', '<?= htmlspecialchars($a['no_identitas']) ?>')">
                                        <img src='../assets/assets-admin/img/icons/wa.png' style="width: 20px">
                                    </button>
									<span>
										<a href="?unit=kecamatan&action=edit&id=<?=$a['id']?>"><button class="btn btn-outline-secondary btn-sm" style="width: 40px"><img src='../assets/assets-admin/img/icons/edit.png' style="width: 20px"></button></a>
									</span>
										<a data-toggle='modal' data-target="#mod_remove_<?=$a['id']?>"><button class='btn btn-outline-secondary btn-sm' style="width: 40px"><img src='../assets/assets-admin/img/icons/delete.png'></button></a>
								</td>
							</tr>

							<div id="mod_remove_<?=$a['id']?>" class="modal fade" role="dialog">
								<div class="modal-dialog modal-lg" align="center">
									<div class="modal-content">
										<div class="modal-body">
											<strong>Yakin ingin menghapus data <?php echo $a['nama_pasien'] ?> ?&nbsp;&nbsp;</strong>
											<a href="file_hapus/hapus_kecamatan.php?id=<?=$a['id']?>" class="btn btn-outline-danger btn-sm" style="width: 60px">Ya</a>
											<button type="button" class="btn btn-outline-success btn-sm" data-dismiss="modal" style="width: 60px">Batal</button>
										</div>
									</div>
								</div>
							</div>


                            <!-- Modal Kirim WA -->
                            <div class="modal fade" id="modalWa" tabindex="-1" role="dialog" aria-labelledby="modalWaLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalWaLabel">Kirim Notifikasi Pengajuan via WhatsApp</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="formWa">
                                    <div class="form-group">
                                        <label>Nomor WhatsApp Admin (format: 08xxxxxxxxxx)</label>
                                        <input type="text" class="form-control" id="waNumber" placeholder="Masukkan nomor WhatsApp admin" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Detail Pengajuan:</label>
                                        <div class="alert alert-info">
                                        <strong>ID Pengajuan:</strong> <span id="pengajuanId"></span><br>
                                        <strong>Nama Barang:</strong> <span id="pengajuanNama"></span><br>
                                        <strong>Keterangan:</strong> <span id="pengajuanKeterangan"></span><br>
                                        <strong>Jumlah:</strong> <span id="pengajuanJumlah"></span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Kirim Pesan Verifikasi</button>
                                    </form>
                                </div>
                                </div>
                            </div>
                            </div>
                            <script>
                            var currentPengajuanData = {};
                            function setPengajuanData(id, nama, keterangan, jumlah) {
                                currentPengajuanData = {
                                    id: id,
                                    nama: nama,
                                    keterangan: keterangan,
                                    jumlah: jumlah
                                };
                                document.getElementById('pengajuanId').textContent = id;
                                document.getElementById('pengajuanNama').textContent = nama;
                                document.getElementById('pengajuanKeterangan').textContent = keterangan;
                                document.getElementById('pengajuanJumlah').textContent = jumlah;
                            }
                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('formWa').onsubmit = function(e) {
                                    e.preventDefault();
                                    var no = document.getElementById('waNumber').value.trim();
                                    if(no === '' || !/^08\d{8,13}$/.test(no)) {
                                        alert('Nomor WA harus diawali 08 dan hanya angka!');
                                        return false;
                                    }
                                    if(!currentPengajuanData.id) {
                                        alert('Data pengajuan tidak ditemukan!');
                                        return false;
                                    }
                                    var no62 = '62' + no.substring(1);
                                    var pesan = encodeURIComponent(
                                        'Halo Qhusnul Arinda Selaku Kepala Ruangan Unit IT, ada pengajuan barang baru yang memerlukan verifikasi:\n\n' +
                                        '📋 *Detail Pengajuan:*\n' +
                                        '• ID: ' + currentPengajuanData.id + '\n' +
                                        '• Nama Barang: ' + currentPengajuanData.nama + '\n' +
                                        '• Keterangan: ' + currentPengajuanData.keterangan + '\n' +
                                        '• Jumlah: ' + currentPengajuanData.jumlah + '\n\n' +
                                        'Mohon segera verifikasi pengajuan barang ini di aplikasi IT-RSPI.\n\n' +
                                        'Terima kasih.'
                                    );
                                    var url = 'https://wa.me/' + no62 + '?text=' + pesan;
                                    window.open(url, '_blank');
                                    $('#modalWa').modal('hide');
                                    document.getElementById('waNumber').value = '';
                                    return false;
                                };
                            });
                            </script>
						<?php
							}
						?>
						</body>
					</table>
				</div>
			</div>
		</div> 

		<div class="col-sm-3" style="padding-top: 10px">
			<div class="row">
				<div class="col" align="right">
					<a class="btn btn-sm btn-outline-secondary" href="?unit=kecamatan&action=input">+ Tambah</a>
					<a href="main_app.php?unit=beranda" class="btn btn-warning btn-sm">Kembali</a>
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col">
							<marquee><h5 style="color: #6c757d">Edit Data Kecamatan</h5></marquee>
							<hr>
							<!-- KAMUFLASE INPUT-->
							<h6 style="padding-top: 5px; color: #666">Kode Kecamatan</h6>
							<h6 style="padding-top: 5px; color: #F25767"></h6>
							<?php
								$idpang=$_GET['id'];
								$sql_f = "SELECT * FROM vaksinasi_pasien WHERE no_dokumen='$idpang' ";
								$rst_f = mysqli_query($mysqli, $sql_f);
								$row_f = mysqli_fetch_assoc($rst_f);

								$idkecamatan 	= $row_f['no_dokumen'];
								$kecamatan		= $row_f['nama_pasien'];
					        ?>
				
					<form method="POST" action="unit/file_simpan-edit_data/simpan_kecamatan.php?action=<?=$action;?>&idkec=<?=$idpang;?>">
						<input type="hidden" name="idkecamatan" value="<?=$kode_otomatis;?>" class="form-control" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')" style="height: 32px" readonly>
						<h6 style="padding-top: 5px; color: #666">Nama Kecamatan</h6>	
						<input type="text" name="kecamatan" value="<?=$kecamatan;?>" class="form-control" required oninvalid="this.setCustomValidity('Harus diisi')" oninput="setCustomValidity('')" style="height: 32px">
						<hr>
						<div class="row">
							<div class="col" align="right">
								<button type="submit" name="simpan" class="btn btn-outline-success btn-sm">Simpan Data</button>
							</div>
						</div>	
					</form>
				</div>
			</div>
		</div>
	</div>