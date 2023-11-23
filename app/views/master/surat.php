<?php
session_start();
include '../../../include/config.php';
$jenis_surat = $_GET['kode_surat'];
// ambil nomer surat terakhir
$sql_nomer_surat = "select count(*) from surat where jenis_surat = '" . $jenis_surat . "'";
$tmp_surat = mysqli_query($conn, $sql_nomer_surat);
$jml = mysqli_fetch_row($tmp_surat);
$nomer_terakhir = $awal_nomer_surat[$jenis_surat] + ($jml[0] + 1);

if (isset($_GET['nama'])) {
    $nama_surat = $_GET['nama'];
} else {
    $nama_surat = "";
}

$tahun = date("Y");
$nomer_surat = $j_surat[$jenis_surat] . "/" . $nomer_terakhir . "/" . $desa["kode"] . "/" . $tahun;
// handle tanda tangan yang bersangkutan
if ($jenis_surat == "SK") {
    $ybs = "style='display:block'";
} else {
    $ybs = "style='display:none'";
}
// field tambahan untuk surat selain surat keterangan biasa
// SKA = adat istiadat, SKP = keterangan pindah, SK = keterangan
if ($jenis_surat == "SKA") {
    $field_tambahan = ' <div class="form-group">
                            <label for="tujuan">Tujuan</label>
                            <input type="text" class="form-control" placeholder="Ditujukan kepada" name="tujuan" id="tujuan" required>
                        </div>
                        <div class="form-group">
                            <label for="u_persyaratan">Untuk Persayaratan</label>
                            <input type="text" class="form-control" placeholder="Surat diperlukan untuk" name="u_persyaratan" id="u_persyaratan" required>
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <textarea class="form-control" placeholder="Keterangan Surat" name="ket" id="ket" required></textarea>
                        </div>';
    $mengetahui  = "<div style='text-align:center;clear:both'>Mengetahui</div>";
    $mengetahui .= "<div class='tanda_tangan'>";
    $mengetahui .= "<div style='text-transform:uppercase'>CAMAT " . $desa["kecamatan"] . "</div><div class='kosong'></div>";
    $mengetahui .= "<div>_______________________</div></div>";
    $mengetahui .= "<div class='tanda_tangan'>";
    $mengetahui .= "<div style='text-transform:uppercase'>DANRAMIL " . $desa["kecamatan"] . "</div><div class='kosong'></div>";
    $mengetahui .= "<div>_______________________</div></div>";
} else if ($jenis_surat == "SKP") {
    $field_tambahan = '
                        <div class="form-group">
                            <label for="pindah_ke">Pindah ke</label>
                            <input type="text" class="form-control" placeholder="Alamat yang baru" name="pindah_ke" id="pindah_ke" required>
                        </div>
                        <div class="form-group">
                            <label for="alasan">Alasan Pindah</label>
                            <input type="text" class="form-control" placeholder="Alasan kepindahan" name="alasan" id="alasan" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pindah">Tanggal Pindah</label>
                            <input type="text" class="form-control" placeholder="Tanggal mulai pindah" name="tgl_pindah" id="tgl_pindah" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_pindah">Pengikut</label>
                        </div>
                        <input type="text" name="jum_pengikut" id="jum_pengikut" class="manual tampil" value="0"/>
                        <span style="cursor: pointer"; onclick="tambah_pengikut(this)"><img src="../img/edit_add.png"/><span style="vertical-align:middle;margin-left:3px;font-size:70%;font-weight:bold">( Tambahkan pengikut )</span></span>
                        <div class="table" >
                        <table id="tab_pengikut">
                        <tr><th>No</th><th>Nama</th><th>L/P</th><th>Umur</th><th>Hubungan</th><th>Status</th></tr>
                        </table>
                        </div>
					';
    $mengetahui = "";
} else {
    $field_tambahan = '
                    <div class="form-group">
                        <label for="ket">Keterangan</label>
                        <textarea class="form-control" placeholder="Keterangan Surat" name="ket" id="ket" required></textarea>
                    </div>';
    $mengetahui = "";
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Surat Keterangan <span id="nama_surat"><?php echo $nama_surat; ?></span></h1>
                    <div class="breadcrumbs">Nomer : <?php echo $nomer_surat; ?></div>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./home">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $_GET['kode_surat'] ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="mt-3">
                        <?php
                        if (isset($_SESSION['status'])) {
                            $alertClass = 'alert-success';
                            $message = $_SESSION['status'];
                        } elseif (isset($_SESSION['status_gagal'])) {
                            $alertClass = 'alert-danger';
                            $message = $_SESSION['status_gagal'];
                        }
                        ?>

                        <?php if (isset($alertClass) && isset($message)) : ?>
                            <div class="alert <?php echo $alertClass; ?>" role="alert">
                                <?php echo $message; ?>
                            </div>
                        <?php
                            unset($_SESSION['status']);
                            unset($_SESSION['status_gagal']);
                        endif;
                        ?>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form id="form" name="form" method="post" action="models/simpan_surat.php">
                                <div class="form-group">
                                    <label for="nama">Nama Warga</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Pemohon Surat" name="nama" id="nama" required>
                                </div>
                                <div class="form-group">
                                    <label for="ttl">Tempat, Tanggal Lahir</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Tempat dan tanggal lahir" name="pw_baru" id="ttl" required>
                                </div>
                                <div class="form-group">
                                    <label for="j_kel">Jenis Kelamin</label>
                                    <select name="j_kel" class="form-control" required>
                                        <?php
                                        $i = 0;
                                        foreach ($j_kelamin as $index => $val) {
                                            if ($i == 0) {
                                                $value = "";
                                            } else {
                                                $value = $index;
                                            }
                                            echo "<option value=" . $value . ">" . $val . "</option>";
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kwg">Kewarganegaraan</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Kewarganegaraan" name="w_negara" id="kwg" required>
                                </div>
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Pendidikan Terakhir" name="pendidikan" id="pendidikan" required> 
                                </div>
                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select name="agama" id="agama" class="form-control" required>
                                        <?php
                                        for ($i = 0; $i < count($agama); $i++) {
                                            if ($i == 0) {
                                                $value = "";
                                            } else {
                                                $value = $agama[$i];
                                            }
                                            echo "<option value=" . $value . ">" . $agama[$i] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Pekerjaan yang ditekuni" name="pekerjaan" id="pekerjaan" required>
                                </div>
                                <div class="form-group">
                                    <label for="s_nikah">Status Nikah</label>
                                    <select name="s_nikah" id="s_nikah" class="form-control" required>
                                        <?php
                                        for ($i = 0; $i < count($s_pernikahan); $i++) {
                                            if ($i == 0) {
                                                $value = "";
                                            } else {
                                                $value = $s_pernikahan[$i];
                                            }
                                            echo "<option value=" . $value . ">" . $s_pernikahan[$i] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="no_ktp">Nomer KTP</label>
                                    <input type="text" class="form-control isian tampil" placeholder="No. KTP / NIK" name="no_ktp" id="no_ktp" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control isian tampil" placeholder="Alamat Rumah" name="alamat" id="alamat" required>
                                </div>
                                <div class="form-group">
                                    <?php echo $field_tambahan ?>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Yang Tanda Tangan</label>
                                    <select class="form-control" onchange="isi_nip(this)">
                                        <option value="kades">Kades</option>
                                        <option value="sekdes">Sekdes</option>
                                    </select>
                                </div>
                                <input type="hidden" id="tanda_tangan" value="<?php echo $desa['kades'] ?>" />
                                <input type="hidden" id="nip" value="" />
                                <div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="./buat_surat" class="btn btn-warning">Kembali</a>
                                </div>
                            </form>
                          
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->