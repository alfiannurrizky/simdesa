<?php
session_start();

include_once "../../include/koneksi.php";
include_once "../../include/fungsi.php";

$no_kk = $_POST['id_keluarga'];

$query = mysqli_query($conn, "SELECT * FROM keluarga where id_keluarga = '$no_kk' ");
$hasil = mysqli_num_rows($query);

if($hasil >= 1) {
	$_SESSION['status_gagal'] = 'No KK sudah terdaftar!';
	echo '<script>window.location="../daftar_keluarga"</script>';
}

$status = 0;
$data = $_REQUEST['data'];
$kepala_klg = $_REQUEST['kepala_keluarga'];
$hubungan = $_POST['hubungan'];
$nilai = array();
$nama_kolom = array();
for ($i = 0; $i < count($data); $i++) {
	$data_ar = $data[$i];
	foreach ($data_ar as $id => $nil) {
		if ($id == 'value') {
			array_push($nilai, $data_ar[$id]);
		} else 
			array_push($nama_kolom, $data_ar[$id]);
	}
}

$input_keluarga = $kolom_keluarga = array();
for ($i = 0; $i < 6; $i++) {
	array_push($input_keluarga, $nilai[$i]);
	array_push($kolom_keluarga, $nama_kolom[$i]);
}

array_push($kolom_keluarga, "kepala_keluarga");
array_push($input_keluarga, $kepala_klg);

$groupedInputs = [];
foreach ($data as $input) {
    $name = $input['name'];
    $value = $input['value'];

    if (!isset($groupedInputs[$name])) {
        $groupedInputs[$name] = [];
    }

    $groupedInputs[$name][] = $value;
}

$input_detail = "";
$kepalaKeluarga = $groupedInputs['kepala_keluarga'];
$hubunganValues = $groupedInputs['hubungan'];

$panjang_hubungan = count($hubunganValues);
$panjang_nilai = count($kepalaKeluarga);

for ($i = 0; $i < $panjang_nilai; $i++) {
    if ($i < $panjang_hubungan) {
        $input_detail .= "('" . $nilai[0] . "','" . $kepalaKeluarga[$i] . "','" . $hubunganValues[$i] . "'),";
    } else {
        echo "gagal";
        break;
    }
}

$input_detail = rtrim($input_detail, ',');

$nilai_input_keluarga = buatStringNilai($input_keluarga);
$kolomnya = buatStringKolom($kolom_keluarga);
$sql = "insert into keluarga (" . $kolomnya . ") values (" . $nilai_input_keluarga . ")";
$sql_exe = mysqli_query($conn, $sql);
if ($sql_exe) {
	$sql_det = "insert into det_keluarga (id_keluarga, no_ktp, hubungan) values " . $input_detail;
	$sql_det_exe = mysqli_query($conn, $sql_det);
	if ($sql_det_exe) {
		$status = 1;
		$_SESSION['status'] = 'Berhasil Membuat Data Keluarga!';
	}
}
