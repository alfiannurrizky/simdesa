<?php

session_start();
include '../../include/koneksi.php';

if (isset($_POST["submit"])) {

    $no_ktp = mysqli_real_escape_string($conn, $_POST["no_ktp"]);
    $nama = mysqli_real_escape_string($conn, $_POST["nama"]);
    $agama = mysqli_real_escape_string($conn, $_POST["agama"]);
    $t_lahir = mysqli_real_escape_string($conn, $_POST["t_lahir"]);
    $j_kelamin = mysqli_real_escape_string($conn, $_POST["j_kel"]);
    $goldar = mysqli_real_escape_string($conn, $_POST["gol_darah"]);
    $w_negara = mysqli_real_escape_string($conn, $_POST["w_negara"]);
    $pendidikan = mysqli_real_escape_string($conn, $_POST["pendidikan"]);
    $pekerjaan = mysqli_real_escape_string($conn, $_POST["pekerjaan"]);
    $s_nikah = mysqli_real_escape_string($conn, $_POST["s_nikah"]);
    $alamat = mysqli_real_escape_string($conn, $_POST["alamat"]);
    $id = mysqli_real_escape_string($conn, $_POST["alamat"]);


    $update = mysqli_query($conn, "UPDATE warga SET
    no_ktp='$no_ktp',
    nama='$nama',
    agama='$agama',
    t_lahir='$t_lahir',
    j_kel='$j_kelamin',
    gol_darah='$goldar',
    w_negara='$w_negara',
    pendidikan='$pendidikan',
    pekerjaan='$pekerjaan',
    s_nikah='$s_nikah',
    alamat='$alamat'
    WHERE no_ktp='$no_ktp'
");

    if ($update) {
        $_SESSION['status'] = 'Berhasil edit data!';
        echo '<script>window.location="../daftar_penduduk"</script>';
    } else {
        echo "gagal" . mysqli_error($conn);
    }
}
