<?php
// Proses upload file e-icv, form, tpk
$upload_dir = __DIR__ . '/upload/';
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

function upload_file($input_name, $upload_dir) {
    if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES[$input_name]['tmp_name'];
        $file_name = basename($_FILES[$input_name]['name']);
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed = ['pdf', 'png', 'jpg', 'jpeg'];
        if (!in_array($file_ext, $allowed)) {
            return false;
        }
        $new_name = uniqid($input_name . '_') . '.' . $file_ext;
        $target = $upload_dir . $new_name;
        if (move_uploaded_file($file_tmp, $target)) {
            return $new_name;
        }
    }
    return false;
}

$no_dokumen = isset($_POST['no_dokumen']) ? $_POST['no_dokumen'] : '';
$nama_pasien = isset($_POST['nama_pasien']) ? $_POST['nama_pasien'] : '';
$no_identitas = isset($_POST['no_identitas']) ? $_POST['no_identitas'] : '';
$tgl_penerbitan = isset($_POST['tgl_penerbitan']) ? $_POST['tgl_penerbitan'] : '';

$up_eicv = upload_file('up_eicv', $upload_dir);
$up_form = upload_file('up_form', $upload_dir);
$up_tpk = upload_file('up_tpk', $upload_dir);

// Simpan ke database jika perlu, contoh:
$mysqli->query("UPDATE vaksinasi_pasien SET up_eicv='$up_eicv', up_form='$up_form', up_tpk='$up_tpk' WHERE no_dokumen='$no_dokumen'");

if ($up_eicv || $up_form || $up_tpk) {
    header('Location: main_app.php?page=e-icv');
    exit;
} else {
    echo '<div class="alert alert-danger">Upload gagal atau tidak ada file yang diupload.</div>';
    echo '<a href="main_app.php?page=e-icv" class="btn btn-primary">Kembali ke Data E-ICV</a>';
}
