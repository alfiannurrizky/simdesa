<?php

session_start();
include '../../include/koneksi.php';

if (isset($_POST["submit"])) {

    $id_mutasi = mysqli_real_escape_string($conn, $_POST["id_mutasi"]);
    $no_ktp = mysqli_real_escape_string($conn, $_POST["no_ktp"]);
    $j_mutasi = mysqli_real_escape_string($conn, $_POST["jenis_mutasi"]);
    $tanggal = mysqli_real_escape_string($conn, $_POST["tanggal"]);
    $keterangan = mysqli_real_escape_string($conn, $_POST["keterangan"]);

    $update = mysqli_query($conn, "UPDATE mutasi_warga SET
    id_warga='$no_ktp',
    jenis_mutasi='$j_mutasi',
    tanggal='$tanggal',
    keterangan='$keterangan'
    WHERE id_mutasi='$id_mutasi'
");

    if ($update) {
        $_SESSION['status'] = 'Berhasil edit data!';
        echo '<script>window.location="../daftar_mutasi"</script>';
    } else {
        echo "gagal" . mysqli_error($conn);
    }
}
