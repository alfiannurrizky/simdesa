<?php

session_start();
include '../../include/koneksi.php';

if (isset($_POST["submit"])) {

    $id_keluarga = mysqli_real_escape_string($conn, $_POST["id_keluarga"]);
    $kepala_keluarga = mysqli_real_escape_string($conn, $_POST["kepala_keluarga"]);
    $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
    $dusun = mysqli_real_escape_string($conn, $_POST["dusun"]);
    $rt = mysqli_real_escape_string($conn, $_POST["rt"]);
    $rw = mysqli_real_escape_string($conn, $_POST["rw"]);
    $pekerjaan = mysqli_real_escape_string($conn, $_POST["pekerjaan"]);

    $update = mysqli_query($conn, "UPDATE keluarga SET
    id_keluarga='$id_keluarga',
    kepala_keluarga='$kepala_keluarga',
    alamat='$alamat',
    dusun='$dusun',
    rt='$rt',
    rw='$rw',
    pekerjaan='$pekerjaan'
    WHERE id_keluarga='$id_keluarga'
");

    if ($update) {
        $_SESSION['status'] = 'Berhasil edit data!';
        echo '<script>window.location="../daftar_keluarga"</script>';
    } else {
        echo "gagal" . mysqli_error($conn);
    }
}
