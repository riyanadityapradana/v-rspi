<?php

// Ambil id dari URL
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data_pasien = null;
if ($id) {
	$sql = "SELECT p.nm_pasien, p.tgl_lahir, p.no_ktp, r.tgl_registrasi FROM reg_periksa r JOIN pasien p ON r.no_rkm_medis = p.no_rkm_medis WHERE r.no_rawat = '{$id}' LIMIT 1";
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
	$no_barcode = $_POST['no_barcode'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$kebangsaan = $_POST['kebangsaan'];
	$no_identitas = $_POST['no_identitas'];
	$penanda_tangan = $_POST['penanda_tangan'];
	$penyakit_kondisi = $_POST['penyakit_kondisi'];
	$vaksin_dari = $_POST['vaksin_dari'];
	$created_at = date('Y-m-d H:i:s');

	$insert_sql = "INSERT INTO vaksinasi_pasien (tgl_penerbitan, no_dokumen, no_barcode, nama_pasien, tgl_lahir, jenis_kelamin, kebangsaan, no_identitas, penanda_tangan, penyakit_kondisi, vaksin_dari, created_at) VALUES ('{$tgl_penerbitan}', '{$no_dokumen}', '{$no_barcode}', '{$nm_pasien}', '{$tgl_lahir}', '{$jenis_kelamin}', '{$kebangsaan}', '{$no_identitas}', '{$penanda_tangan}', '{$penyakit_kondisi}', '{$vaksin_dari}', '{$created_at}')";
	$insert = mysqli_query($config, $insert_sql);
	if ($insert) {
		echo '<div class="alert alert-success">Data berhasil disimpan!</div>';
	} else {
		echo '<div class="alert alert-danger">Gagal menyimpan data.</div>';
	}
}

?>
<div class="container mt-4">
	<h3>Form Input Data Vaksinasi Pasien</h3>
	<form method="post">
		<div class="form-group">
			<label>Nama Pasien</label>
			<input type="text" name="nm_pasien" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['nm_pasien']) : '' ?>" required>
		</div>
		<div class="form-group">
			<label>Tanggal Lahir</label>
			<input type="date" name="tgl_lahir" class="form-control" value="<?= $data_pasien ? $data_pasien['tgl_lahir'] : '' ?>" required>
		</div>
		<div class="form-group">
			<label>No KTP</label>
			<input type="text" name="no_ktp" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['no_ktp']) : '' ?>" required>
		</div>
		<div class="form-group">
			<label>Tanggal Registrasi</label>
			<input type="date" name="tgl_registrasi" class="form-control" value="<?= $data_pasien ? $data_pasien['tgl_registrasi'] : '' ?>" required>
		</div>
		<div class="form-group">
			<label>Tanggal Penerbitan</label>
			<input type="date" name="tgl_penerbitan" class="form-control" value="<?= date('Y-m-d') ?>" required>
		</div>
		<div class="form-group">
			<label>No Dokumen</label>
			<input type="text" name="no_dokumen" class="form-control">
		</div>
		<div class="form-group">
			<label>No Barcode</label>
			<input type="text" name="no_barcode" class="form-control">
		</div>
		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jenis_kelamin" class="form-control">
				<option value="">-Pilih-</option>
				<option value="Male">Laki-laki</option>
				<option value="Female">Perempuan</option>
			</select>
		</div>
		<div class="form-group">
			<label>Kebangsaan</label>
			<input type="text" name="kebangsaan" class="form-control">
		</div>
		<div class="form-group">
			<label>No Identitas</label>
			<input type="text" name="no_identitas" class="form-control" value="<?= $data_pasien ? htmlspecialchars($data_pasien['no_ktp']) : '' ?>">
		</div>
		<div class="form-group">
			<label>Penanda Tangan</label>
			<input type="text" name="penanda_tangan" class="form-control">
		</div>
		<div class="form-group">
			<label>Penyakit/Kondisi</label>
			<input type="text" name="penyakit_kondisi" class="form-control">
		</div>
		<div class="form-group">
			<label>Vaksin Dari</label>
			<input type="text" name="vaksin_dari" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>
