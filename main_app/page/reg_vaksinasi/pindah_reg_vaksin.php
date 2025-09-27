<?php
// Ambil id dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data_pasien = null;
if ($id) {
	$sql = "SELECT p.nm_pasien, p.tgl_lahir, p.no_ktp, p.no_tlp, r.tgl_registrasi FROM reg_periksa r JOIN pasien p ON r.no_rkm_medis = p.no_rkm_medis WHERE r.no_rawat = '{$id}' LIMIT 1";
	$result = mysqli_query($config, $sql);
	if ($result && mysqli_num_rows($result) > 0) {
		$data_pasien = mysqli_fetch_assoc($result);
	}
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Ambil data dari form
	$nm_pasien = $_POST['nm_pasien'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$no_ktp = $_POST['no_ktp'];
	$tgl_registrasi = $_POST['tgl_registrasi'];
	$tgl_penerbitan = $_POST['tgl_penerbitan'];
	$no_dokumen = $_POST['no_dokumen'];
	$no_tlp = $_POST['no_tlp'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kebangsaan = $_POST['kebangsaan'];
	$no_identitas = $_POST['no_identitas'];
	$penanda_tangan = $_POST['penanda_tangan'];
	$penyakit_kondisi = isset($_POST['vaksin_diberikan']) ? implode(", ", $_POST['vaksin_diberikan']) : '';
	$vaksin_dari = $_POST['vaksin_dari'];
	$created_at = date('Y-m-d H:i:s');

	$insert_sql = "INSERT INTO vaksinasi_pasien (tgl_penerbitan, no_dokumen, no_tlp, nama_pasien, tgl_lahir, jenis_kelamin, kebangsaan, no_identitas, penanda_tangan, penyakit_kondisi, vaksin_dari, created_at) VALUES ('{$tgl_penerbitan}', '{$no_dokumen}', '{$no_tlp}', '{$nm_pasien}', '{$tgl_lahir}', '{$jenis_kelamin}', '{$kebangsaan}', '{$no_identitas}', '{$penanda_tangan}', '{$penyakit_kondisi}', '{$vaksin_dari}', '{$created_at}')";
	$insert = mysqli_query($mysqli, $insert_sql);
	if ($insert) {
		echo '<div class="alert alert-success">Data berhasil disimpan!</div>';
		echo '<script>window.location.href = "main_app.php?page=e-icv";</script>';
		exit;
	} else {
		echo '<div class="alert alert-danger">Gagal menyimpan data.</div>';
		echo '<script>window.location.href = "main_app.php?page=reg_periksa";</script>';
		exit;
	}
}

?>
<br>
<div class="container mt-4">
	<div class="row justify-content-center">
		<div class="col-lg-10 col-md-12">
			<div class="card shadow-sm p-4" style="background: #dbdbdb;">
				<h4 class="mb-4" style="font-weight:600;">Form Input Data Vaksinasi Pasien</h4>
				<form method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Nama Pasien</label>
								<div class="col-sm-8">
									<input type="text" name="nm_pasien" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['nm_pasien']) : '' ?>" required>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Tanggal Lahir</label>
								<div class="col-sm-8">
									<input type="date" name="tgl_lahir" class="form-control" value="<?= $data_pasien ? $data_pasien['tgl_lahir'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">No KTP</label>
								<div class="col-sm-8">
									<input type="text" name="no_ktp" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['no_ktp']) : '' ?>" required>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Tanggal Registrasi</label>
								<div class="col-sm-8">
									<input type="date" name="tgl_registrasi" class="form-control" value="<?= $data_pasien ? $data_pasien['tgl_registrasi'] : '' ?>" required>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Tanggal Penerbitan</label>
								<div class="col-sm-8">
									<input type="date" name="tgl_penerbitan" class="form-control" value="<?= date('Y-m-d') ?>" required>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">No Dokumen</label>
								<div class="col-sm-8">
									<input type="text" name="no_dokumen" class="form-control">
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">No Telepon</label>
								<div class="col-sm-8">
									<input type="text" name="no_tlp" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['no_tlp']) : '' ?>" required>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Jenis Kelamin</label>
								<div class="col-sm-8">
									<select name="jenis_kelamin" class="form-control select2" style="width: 100%;">
										<option value="">-Pilih-</option>
										<option value="Male">Laki-laki</option>
										<option value="Female">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Kebangsaan</label>
								<div class="col-sm-8">
									<input type="text" name="kebangsaan" class="form-control">
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">No Identitas</label>
								<div class="col-sm-8">
									<input type="text" name="no_identitas" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['no_ktp']) : '' ?>">
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Penanda Tangan</label>
								<div class="col-sm-8">
									<input type="text" name="penanda_tangan" class="form-control">
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Vaksin yang diberikan</label>
								<div class="col-sm-8">
									<select name="vaksin_diberikan[]" class="form-control select2" style="width: 100%;" multiple>
										<option value="MENINGITIS MENINGOCOCCUS">MENINGITIS MENINGOCOCCUS</option>
										<option value="POLIO">POLIO</option>
										<option value="INFLUENZA">INFLUENZA</option>
										<option value="MODERNA">MODERNA</option>
										<option value="TETANUS">TETANUS</option>
										<option value="PERTUSIS">PERTUSIS</option>
										<option value="COVID-19">COVID-19</option>
										<option value="DIFTERI">DIFTERI</option>
										<option value="HEPATITIS A">HEPATITIS A</option>
										<option value="HEPATITIS B">HEPATITIS B</option>
										<option value="MMR (MEASLES, MUMPS, RUBELLA)">MMR (MEASLES, MUMPS, RUBELLA)</option>
										<option value="VARISELLA (CAMPAR)">VARISELLA (CAMPAR)</option>
									</select>
									<small class="text-muted">* Bisa pilih lebih dari satu</small>
								</div>
							</div>
							<div class="form-group row mb-3">
								<label class="col-sm-4 col-form-label">Vaksin Dari</label>
								<div class="col-sm-8">
									<input type="text" name="vaksin_dari" class="form-control">
								</div>
							</div>
							<div class="form-group row mb-3">
								<div class="col-sm-12 text-right">
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
						</div>
					</div>
					</form>
				</form>
			</div>
		</div>
	</div>
</div>
