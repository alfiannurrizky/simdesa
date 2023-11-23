<?php
session_start();
include_once "../../include/koneksi.php";
include_once "../../include/fungsi.php";

$status = 0;
$no_ktp = $_POST['id_warga'];
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
$j_mutasi = $_POST['jenis_mutasi'];
$tanggal = $_POST['tanggal'];
$keterangan = $_POST['keterangan'];

if($j_mutasi == 'masuk' || $j_mutasi == 'lahir') {
    $sql = "INSERT INTO warga (no_ktp, nama, agama, t_lahir, tgl_lahir, j_kel, gol_darah, w_negara, pendidikan, pekerjaan, s_nikah, status) VALUES ('$no_ktp', '$nama ', '$agama', '$t_lahir', '$tgl_lahir', '$j_kel', '$gol_darah', '$w_negara', '$pendidikan', '$pekerjaan', '$s_nikah', '1')";
    $sql_exe = mysqli_query($conn , $sql);

    if($sql_exe){
        mysqli_query($conn,"INSERT INTO mutasi_warga (id_warga,jenis_mutasi,tanggal,keterangan) values ('".$no_ktp."','".$j_mutasi."','".$tanggal."','".$keterangan."')");
        $status = 1;

        $_SESSION['status'] = 'Berhasil Membuat Mutasi Penduduk!';
        echo '<script>window.location="../daftar_mutasi"</script>';
    }
} else {
    $sql = "INSERT INTO mutasi_warga (id_warga,jenis_mutasi,tanggal,keterangan) values ('".$no_ktp."','".$j_mutasi."','".$tanggal."','".$keterangan."')";
    $sql_exe = mysqli_query($conn,$sql);
    if($sql_exe){
	mysqli_query($conn,"UPDATE warga set status='".$status."' where no_ktp='".$no_ktp."'");

    $_SESSION['status'] = 'Berhasil Membuat Mutasi Penduduk!';
    echo '<script>window.location="../daftar_mutasi"</script>';
	}
}
    