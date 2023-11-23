<?php

error_reporting(0);
@session_start();
switch ($_GET["page"]) {

    case "home":
        include "home/dashboard.php";
        break;

    case "daftar_penduduk":
        include "master/daftar_penduduk.php";
        break;

    case "daftar_keluarga":
        include "master/daftar_keluarga.php";
        break;

    case "detail_keluarga":
        include "master/detail_keluarga.php";
        break;

    case "daftar_surat":
        include "master/daftar_surat.php";
        break;

    case "daftar_mutasi":
        include "master/daftar_mutasi.php";
        break;
    
    case "mutasi":
        include "master/mutasi.php";
        break;

    case "detail_mutasi":
        include "master/detail_mutasi.php";
        break;

    case "buat_surat":
        include "master/buat_surat.php";
        break;

    case "surat":
        include "master/surat.php";
        break;

    case "surat_lahir_mati":
        include "master/surat_lahir_mati.php";
        break;

    case "ganti_password":
        include "master/ganti_password.php";
        break;

    default :
        if(empty($_GET['page'])) {
            echo '<script>window.location="./error_page/404.php "</script>';
            break;
        } else {
            echo '<script>window.location="./error_page/404.php "</script>';
            break;
        }
}