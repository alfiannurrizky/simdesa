<?php
session_start();
include_once "../../include/koneksi.php";
include_once "../../include/fungsi.php";

if (isset($_POST['submit'])) {
    $username = $_SESSION['global']->username;
    $password_lama = md5($_POST['pw_lama']);
    $password_baru = $_POST['pw_baru'];
    $confirm_password = $_POST['pw_baru_confirm'];

    $query = "SELECT * FROM users WHERE username='$username' AND password='$password_lama'";
    $sql = mysqli_query($conn, $query);
    $hasil = mysqli_num_rows($sql);

    if (!$hasil >= 1) {
        $_SESSION['status_gagal'] = 'Password lama tidak sesuai, silangkah ulang lagi!';
        echo '<script>window.location="../ganti_password"</script>';

    } else if (empty($password_baru) || empty($confirm_password)) {
        $_SESSION['status_gagal'] = 'Ganti Password Gagal! Data Tidak Boleh Kosong.';
        echo '<script>window.location="../ganti_password"</script>';

    } else if ($password_baru != $confirm_password) {
        $_SESSION['status_gagal'] = 'Ganti Password Gagal! Password dan Konfirm Password Harus Sama.';
        echo '<script>window.location="../ganti_password"</script>';

    } else {
        $hashed_new_password = md5($password_baru);
        $query = "UPDATE users SET password='$hashed_new_password' WHERE username='$username'";
        $sql = mysqli_query($conn, $query);

        if ($sql) {
            $_SESSION['status'] = 'Ganti Password Berhasil!';
            echo '<script>window.location="../ganti_password"</script>';
        } else {
            $_SESSION['status'] = 'Ganti Password Gagal!';
            echo '<script>window.location="../ganti_password"</script>';
        }
    }
}
