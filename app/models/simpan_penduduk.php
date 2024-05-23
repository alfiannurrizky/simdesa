<?php
session_start();
include_once "../../include/koneksi.php";
include_once "../../include/fungsi.php";

if (isset($_POST['submit'])) {
	$no_ktp = $_POST['no_ktp'];
	$nama = $_POST['nama'];
	$agama = $_POST['agama'];
	$t_lahir = $_POST['t_lahir'];
	$tgl_lahir = $_POST['tgl_lahir'];
	$j_kel = $_POST['j_kel'];
	$gol_darah = $_POST['gol_darah'];
	$w_negara = $_POST['w_negara'];
	$pendidikan = $_POST['pendidikan'];
	$pekerjaan = $_POST['pekerjaan'];
	$s_nikah = $_POST['s_nikah'];
	$alamat = $_POST['alamat'];

	$arr = substr($tgl_lahir, 0, 4);
	$convertToInteger = (int) $arr;

	$umur =  date('Y') - $convertToInteger;

	$checkUnique = mysqli_query($conn, "SELECT * FROM warga WHERE no_ktp = '$no_ktp'");
	$hasil = mysqli_num_rows($checkUnique);

	if ($hasil >= 1) {
		$_SESSION['status_gagal'] = 'No KTP sudah tersedia silahkan coba lagi!';

		echo '<script>window.location="../daftar_penduduk  "</script>';
	}

	if(is_numeric($no_ktp)) {
		$query = "INSERT INTO warga(no_ktp, nama, agama, t_lahir, tgl_lahir, j_kel, gol_darah, w_negara, pendidikan, pekerjaan, s_nikah, umur, alamat) VALUES ('$no_ktp', '$nama ', '$agama', '$t_lahir', '$tgl_lahir', '$j_kel', '$gol_darah', '$w_negara', '$pendidikan', '$pekerjaan', '$s_nikah', '$umur', '$alamat')";

		$sql = mysqli_query($conn, $query);

		if ($sql) {
			$_SESSION['status'] = 'Berhasil tambah data!';

			echo '<script>window.location="../daftar_penduduk  "</script>';
		} else {
			echo "gagal" . mysqli_error($conn);
		}
	} else {
		$_SESSION['status_gagal'] = 'Mohon input no ktp dengan angka!';
		
		echo '<script>window.location="../daftar_penduduk  "</script>';
	}

	
}
