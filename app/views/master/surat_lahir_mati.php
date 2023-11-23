<?php
include_once "../../../include/koneksi.php";
include_once "../../../include/config.php";
$jenis_surat = $_GET['kode_surat'];
$nama_surat = $_GET['nama'];

$sql_nomer_surat = "select count(*) from surat where jenis_surat = '" . $jenis_surat . "'";
$tmp_surat = mysqli_query($conn, $sql_nomer_surat);
$jml = mysqli_fetch_row($tmp_surat);
$nomer_terakhir = $awal_nomer_surat[$jenis_surat] + ($jml[0] + 1);
$tahun = date("Y");
$nomer_surat = $j_surat[$jenis_surat] . "/" . $nomer_terakhir . "/" . $desa["kode"] . "/" . $tahun;
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
                        <li class="breadcrumb-item"><a href="./index.php?page=home">Home</a></li>
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
                                <?php if ($jenis_surat == 'SM') {

                                ?>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" placeholder="Warga yang wafat" name="nama" id="nama">
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
                                        <label for="alamat">Alamat Rumah</label>
                                        <input type="text" class="form-control" placeholder="Alamat Rumah" name="alamat" id="alamat">
                                    </div>
                                    <div class="form-group">
                                        <label for="umur">Umur</label>
                                        <input type="text" class="form-control" placeholder="Usianya" name="umur" id="umur">
                                    </div>
                                    <div class="form-group">
                                        <label for="hari">Hari</label>
                                        <input type="text" class="form-control" placeholder="Hari ketika wafat" name="hari" id="hari">
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal Lahir" data-target="#reservationdate" name="tanggal" data-date-format="YYYY-MM-DD" />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="di">Di</label>
                                        <input type="text" class="form-control" placeholder="Kota ketika wafat" name="di" id="di">
                                    </div>
                                    <div class="form-group">
                                        <label for="sebab">Disebabkan</label>
                                        <input type="text" class="form-control" placeholder="Sebab wafat" name="sebab" id="sebab">
                                    </div>
                                <?php
                                } else {
                                ?>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" placeholder="Nama bayi yang lahir" name="nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="h_lahir">Hari</label>
                                        <input type="text" class="form-control" placeholder="Hari Ketika Lahir" name="h_lahir" id="h_lahir">
                                    </div>
                                    <div class="form-group">
                                        <label for="di">Di</label>
                                        <input type="text" class="form-control" placeholder="Tempat Lahir" name="di" id="di">
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
                                        <label for="ibu">Nama Ibu</label>
                                        <input type="text" class="form-control" placeholder="Nama Ibu" name="nama_ibu" id="ibu">
                                    </div>
                                    <div class="form-group">
                                        <label for="ayah">Nama Ayah</label>
                                        <input type="text" class="form-control" placeholder="Nama Ayah" name="nama_ayah" id="ayah">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <input type="text" class="form-control" placeholder="Alamat orang tua" name="alamat" id="alamat">
                                    </div>
                                <?php } ?>

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