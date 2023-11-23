<?php
session_start();
include '../../include/koneksi.php';

if (isset($_GET['id_surat'])) {
    $delete = mysqli_query($conn, "DELETE FROM surat WHERE id_surat = '" . $_GET["id_surat"] . "' ");
    header("location:../daftar_surat ");
}


if (isset($_GET['id_keluarga'])) {
    $delete = mysqli_query($conn, "DELETE FROM keluarga WHERE id_keluarga = '" . $_GET["id_keluarga"] . "' ");
    header("location:../daftar_keluarga ");
}


if (isset($_GET['id_penduduk'])) {
    $delete = mysqli_query($conn, "DELETE FROM warga WHERE no_ktp = '" . $_GET["id_penduduk"] . "' ");
    header("location:../daftar_penduduk ");
}

if (isset($_GET['id_mutasi'])) {
    $delete = mysqli_query($conn, "DELETE FROM mutasi_warga WHERE id_mutasi = '" . $_GET["id_mutasi"] . "' ");
    header("location:../daftar_mutasi ");
}