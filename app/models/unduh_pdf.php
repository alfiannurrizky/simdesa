<?php
ob_start();

require_once '../plugins/dompdf/autoload.inc.php';
include '../../img/img_base64.php';
include '../../include/config.php';
include '../../include/koneksi.php';

use Dompdf\Dompdf;

$id = $_GET['id_surat'];


$sql = "SELECT id_surat,jenis_surat,no_surat,nama_surat,DATE_FORMAT(tanggal,'%d  - %m  - %Y') as tanggal,isi_surat,tanda_tangan,id_warga,nama_warga FROM surat where id_surat='" . $id . "'";

$result = mysqli_query($conn, $sql);


if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
}

if ($row['jenis_surat'] == "SM") {
    $bag_tengah_ket = "<div><div id='ket_tengah' style=font-weight:bolder; margin-bottom: 5px;>TELAH MENINGGAL DUNIA pada :</div></div>";
} else if($row['jenis_surat'] == "SL") {
    $bag_tengah_ket = "<div id='ket_tengah' style=font-weight:bolder; margin-bottom: 5px;> Telah lahir seorang anak : <span></span></div>";
} else if($row['jenis_surat'] == "STM") {
    $bag_ket = "Adalah benar nama tersebut di atas warga Desa Ciakar Kecamatan Panongan Kabupaten Tangerang secara terang dan jelas tinggal di alamat tersebut di atas, dan yang bersangkutan saat ini tidak mempunyai usaha/pekerjaan dan termasuk golongan keluarga Ekonomi lemah/<b>TIDAK MAMPU.</b><br><br>";
}

if ($row['jenis_surat']  == "SK") {
    $ybs = "style='display:block'";
} else {
    $ybs = "style='display:none'";
}

$isi_surat = json_decode($row['isi_surat'], true);
$tanda_tangan = json_decode($row['tanda_tangan'], true);


$label_mapping = array(
    'nama'              => 'Nama Warga',
    'pw_baru'           => 'Tempat, Tanggal Lahir',
    'jk'                => 'Jenis Kelamin',
    'w_negara'          => 'Warga Negara',
    'pendidikan'        => 'Pendidikan',
    'agama'             => 'Agama',
    'pekerjaan'         => 'Pekerjaan',
    's_nikah'           => 'Status Nikah',
    'no_ktp'            => 'Nomor KTP',
    'alamat'            => 'Alamat',
    'tujuan'            => 'Tujuan',
    'u_persyaratan'     => 'Untuk Persyaratan',
    'ket'               => 'Keterangan',
    'pindah_ke'         => 'Pindah Ke',
    'tgl_pindah'        => 'Tanggal Pindah',
    'jum_pengikut'     => 'Jumlah Pengikut',
    // 'nama_pengikut '    => 'Nama Pengikut',
    // 'j_kel_pengikut'    => 'Jenis Kelamin',
    // 'umur_pengikut'     => 'Umur Pengikut',
    // 'hub_pengikut'      => 'Hubungan Pengikut',
    // 'status_pengikut'   => 'Status Pengikut',
    'n_bayi'            => 'Nama Bayi',
    'h_lahir'           => 'Hari Lahir',
    'di'                => 'Tempat Lahir',
    'j_kel'             => 'Jenis Kelamin',
    'nama_ibu'          => 'Nama Ibu',
    'nama_ayah'         => 'Nama Ayah',
);

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>    
    #surat_tampil {
        width: 100%;
        overflow: auto;
        padding: 10px;
        box-sizing: border-box;
        margin: 0 auto;
    }
    
    #kepala_surat {
        width: calc(100% - 120px);
        margin: 0 auto;
        text-align: center;
        padding: 10px;
        box-sizing: border-box;
    }
    
    #logo_surat {
        display: block;
        float: left;
        margin-right: 10px; 
    }
    
    .garis {
        border-bottom: 1px solid #000;
        width: 100%;
        margin: 0 auto;
        margin-bottom: 15px;
        clear: both;
    }
    
    #content_surat {
        width: 100%;
        position: auto;
        padding-left: 10px;
        margin: 0 auto;
        box-sizing: border-box;
    }
    
    #par_penutup,
    #par_pembuka,
    #nomer_surat {
        clear: both;
        position: relative;
        width: 100%;
        margin: 0 auto;
        margin-bottom: 15px;
        margin-top: 20px;
        padding: 10px;
        box-sizing: border-box;
    }
    
    #nomer_surat {
        text-align: center;
    }
    
    .masuk_alinea {
        margin-right: 20px;
    }
    
    .tanda_tangan {
        float: left;
        text-align: center;
        width: 50%;
    }
    
    .kosong {
        margin-bottom: 60px;
    }

    table {
        width: 100%;
        table-layout: auto
      }

    </style>
</head>
<body>
<div id="surat_tampil">
<div id="kepala_surat"><img src="'.$gambarBase64.'" width="100px" height="100px" id="logo_surat" valign="baseline"/>
<strong>PEMERINTAHAN KABUPATEN ' . strtoupper($desa['kabupaten']) . '<br/>
KECAMATAN ' . strtoupper($desa['kecamatan']) . '<br/>
DESA ' . strtoupper($desa['nama']) . '<br/></strong>
<p><b>Jl. Raya Cipari No. 41. Telp. (021)....Kode Pos 15711</b></p>

</div>
<div class="garis"></div>
<div id="nomer_surat">
<div style="text-transform:uppercase;text-decoration:underline;font-weight:bolder">' . $row['nama_surat'] . '</div>
    <div>Nomer : ' . $row['no_surat'] . '</div>
</div>
<div id="par_pembuka">
Yang bertanda tangan dibawah ini , 
Kepala Desa ' . $desa["nama"] . ', 
Kecamatan ' . $desa["kecamatan"] . ', Kabupaten ' . $desa["kabupaten"] . ' menerangkan dengan 
sebenarnya bahwa orang tersebut dibawah ini :
</div>';

$html .= '<div id="content_surat">';
$html .= '<div id="bag_atas"></div>
	    ' . $bag_tengah_ket . '
	    <div id="bag_bawah"></div>';

$panjangMaksimal = 75;

foreach ($isi_surat as $index => $val) {
    $label = isset($label_mapping[$index]) ? $label_mapping[$index] : ucfirst($index);

    if (strlen($val) > $panjangMaksimal) {
        $potongHuruf = str_split($val, $panjangMaksimal);

        $html .= "<table>
            <tr>
                <td style='width: 150px;'>" . $label . "</td>
                <td style='width: 10px;'>:</td>
                <td>" . $potongHuruf[0] . "</td>
            </tr>";

        for ($i = 1; $i < count($potongHuruf); $i++) {
            $html .= "<tr>
                <td></td>
                <td></td>
                <td>" . $potongHuruf[$i] . "</td>
            </tr>";
        }

        $html .= "</table>";
    } else {
        $html .= "<table>
            <tr>
                <td style='width: 150px;'>" . $label . "</td>
                <td style='width: 10px;'>:</td>
                <td>" . $val . "</td>
            </tr>
        </table>";
    }
}

$html .= '</div>';

$html .= '<div id="par_penutup">
<span class="masuk_alinea"></span>
'.$bag_ket.'
Demikian Surat Keterangan ini diberikan, untuk 
dapat digunakan sebagaimana mestinya.
</div>

<div class="tanda_tangan" id="ybs" ' . $ybs . '
	<div>&nbsp;</div>
	<div class="kosong">Yang Bersangkutan</div>
	<div id="nama_pemohon"></div>
</div>

<div class="tanda_tangan" style="float:right">
	<div>Ciakar, ' . date("d-m-Y") . '</div>
	<div class="kosong" id="pejabat">' . $desa['tt_kades'] . '</div>
	<div id="nama_pejabat">' . $desa["kades"] . '</span></div>
</div>
' . $mengetahui . '
</div>
</body>
</html>
';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'potrait');
$dompdf->render();
ob_end_clean();
$dompdf->stream($row['nama_surat'] . ' - ' . $row['nama_warga']);
