<?php
require_once("../config/config.php");
if($_POST['id']) { // Buka 1
    $idakun = $_POST['id'];
    $sql_a = "SELECT * FROM pengguna WHERE kode_peng='$idakun'";
    $rst_a    = mysqli_query($mysqli, $sql_a);
while ($row_a = mysqli_fetch_assoc($rst_a)) { // Buka 2
    $nm     = $row_a['nama_peng'];
    $pw     = $row_a['pw'];
    $lv     = $row_a['level'];
    $foto   = $row_a['foto'];
    $nip    = $row_a['nama_lengkap'];
    $al     = $row_a['alamat'];
    $no     = $row_a['hp'];
	$camat  = $row_a['id_kecamatan'];
	
	if ($camat == 'Kabupaten Tanah Laut'){
		$kel = $camat;
	}else{
		$sql_b = "SELECT kecamatan FROM kecamatan WHERE id_kecamatan ='$camat'";
		$rst_b = mysqli_query($mysqli, $sql_b);
		$row_b = mysqli_fetch_assoc($rst_b);
		$kel   = $row_b['kecamatan'];
	}
?>

<!-- Modal -->
<div class="modal-content">
    <div class="modal-header" style="padding-left: 30px">
        <h4 class="modal-title" id="myModalLabel">DETAIL AKUN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-3 text-center" style="padding-left: 20px">
                <img src="../assets/upload/<?=$foto;?>" width="200px">
            </div>
            <div class="col-sm-9" style="padding-left: 40px">
                <br>
                <table class="table table-sm table-borderless">
                     <tr>
                        <th>Nama Lengkap</th>
                        <td><b>:</b></td>
                        <td><?=$nip;?></td>
                    </tr>
                    <tr>
                        <th>Pengguna</th>
                        <td><b>:</b></td>
                        <td><?=$nm;?></td>
                    </tr>
                    <tr>
                        <th>Nomor</th>
                        <td><b>:</b></td>
                        <td><?=$no;?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                        <td><b>:</b></td>
                        <td>*******************</td>
                    </tr>
                    <tr>
                        <th>Akses</th>
                        <td><b>:</b></td>
                        <td><?=$lv;?></td>
                    </tr>
					<tr>
                        <th>Wilayah Kerja</th>
                        <td><b>:</b></td>
                        <td><?=$kel;?></td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td><b>:</b></td>
                        <td><?=$al;?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="modal-footer justify-content-center" style="background-color:  #1E90FF">
        <div class="row">
            <div class="col">
                <p style="color: white; padding-top: 15px" align="text-center">DATA AKUN BADAN PENGAWAS PEMILIHAN UMUM KAB.TANAH LAUT</p>
            </div>
        </div>
    </div>
</div>

<?php } } ?>