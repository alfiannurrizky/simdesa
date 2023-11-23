<?php

session_start();
include('../include/koneksi.php');

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($username) || empty($password)) {
    $_SESSION['status'] = "Username dan password wajib diisi!";
    header("location: ../index.php");
    exit();
}

$hashed_password = md5($password);

$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$hashed_password' ";


$result = mysqli_query($conn, $sql);

if ($result->num_rows > 0) {
    $row = mysqli_fetch_object($result);
    $_SESSION['status_login'] = true;
    $_SESSION['global'] = $row;
    header("location: ../app/home");
} else {
    $_SESSION['status'] = "Username atau password anda salah!";
    echo '<script>window.location="../index.php"</script>';
}
