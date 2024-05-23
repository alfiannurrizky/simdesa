<?php
session_start();

$j_mutasi = $_GET['j_mutasi'];

?>

<?php
if ($j_mutasi == 'masuk') {
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mutasi Tambah</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./home">Home</a></li>
                            <li class="breadcrumb-item active">Mutasi Tambah</li>
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
                                <form action="models/simpan_mutasi.php" method="post">
                                    <div class="form-group">
                                        <label for="id_warga">No. KTP</label>
                                        <input type="text" class="form-control isian" placeholder="Masukkan no ktp anda" name="id_warga" id="id_warga" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control isian" placeholder="Masukkan nama anda" name="nama" id="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" class="form-control isian" id="agama" required>
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
                                        <label for="t_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control isian" placeholder="Masukkan tempat lahir anda" name="t_lahir" id="t_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal Lahir" data-target="#reservationdate" name="tgl_lahir" id="tgl_lahir" data-date-format="YYYY-MM-DD" required />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="j_kel">Jenis Kelamin</label>
                                        <select name="j_kel" class="form-control isian" required>
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
                                        <label for="gol_darah">Golongan Darah</label>
                                        <select name="gol_darah" class="form-control isian" required>
                                            <?php
                                            $i = 0;
                                            foreach ($gol_darah as $index) {
                                                if ($i == 0) {
                                                    $value = "";
                                                } else {
                                                    $value = $index;
                                                }
                                                echo "<option value=" . $value . ">" . $index . "</option>";
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="w_negara">Warga Negara</label>
                                        <select class="form-control" aria-label="Default select example" name="w_negara" required>
                                            <option selected>Indonesia</option>
                                            <option value="1">WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control isian" placeholder="Pendidikan anda" name="pendidikan" id="pendidikan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control isian" placeholder="Pekerjaan anda" name="pekerjaan" id="pekerjaan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_nikah">Status Nikah</label>
                                        <select name="s_nikah" class="form-control isian" required>
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
                                        <label>Jenis Mutasi</label>
                                        <select id="jenis_mutasi" class="form-control isian" name="jenis_mutasi" required>
                                            <option value="">Pilih jenis mutasi</option>
                                            <option value="lahir">Lahir</option>
                                            <option value="masuk">Pindah Masuk</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <div class="input-group date" id="reservationdatemutasi" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal lahir / pindah" data-target="#reservationdatemutasi" name="tanggal" id="tanggal" data-date-format="YYYY-MM-DD" required />
                                            <div class="input-group-append" data-target="#reservationdatemutasi" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control isian" placeholder="Sebab pindah" name="keterangan" id="keterangan" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary toastrDefaultSuccess" name="submit">Submit</button>
                                        <a href="daftar_mutasi" class="btn btn-warning">Kembali</a>
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
<?php
} else if ($j_mutasi == 'keluar') {
?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Mutasi Keluar</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./home">Home</a></li>
                            <li class="breadcrumb-item active">Mutasi Keluar</li>
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
                                <form action="models/simpan_mutasi.php" method="post">
                                    <div class="form-group">
                                        <label for="id_warga">No KTP</label>
                                        <select class="form-select form-control isian" aria-label="Default select example" name="id_warga" id="id_warga" required>
                                            <?php
                                            $ktp = mysqli_query($conn, "SELECT * FROM warga WHERE status='1'");
                                            if (mysqli_num_rows($ktp) > 0) {
                                                while ($item = mysqli_fetch_array($ktp)) {
                                            ?>

                                                    <option value="<?php echo $item['no_ktp'] ?>" <?php echo ($item['no_ktp']) ? 'selected' : ''; ?>>
                                                        <?php echo $item['no_ktp'] ?> - <?php echo $item['nama'] ?> </option>
                                                <?php }
                                            } else {
                                                ?>
                                                <option value="" selected>Data KTP Belum Tersedia</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control isian" placeholder="Masukkan nama anda" name="nama" id="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="agama">Agama</label>
                                        <select name="agama" class="form-control isian" id="agama" required>
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
                                        <label for="t_lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control isian" placeholder="Masukkan tempat lahir anda" name="t_lahir" id="t_lahir" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal Lahir" data-target="#reservationdate" name="tgl_lahir" id="tgl_lahir" data-date-format="YYYY-MM-DD" required />
                                            <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="j_kel">Jenis Kelamin</label>
                                        <select name="j_kel" class="form-control isian" required>
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
                                        <label for="gol_darah">Golongan Darah</label>
                                        <select name="gol_darah" class="form-control isian" required>
                                            <?php
                                            $i = 0;
                                            foreach ($gol_darah as $index) {
                                                if ($i == 0) {
                                                    $value = "";
                                                } else {
                                                    $value = $index;
                                                }
                                                echo "<option value=" . $value . ">" . $index . "</option>";
                                                $i++;
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="w_negara">Warga Negara</label>
                                        <select class="form-control" aria-label="Default select example" name="w_negara" required>
                                            <option selected>Indonesia</option>
                                            <option value="1">WNA</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control isian" placeholder="Pendidikan anda" name="pendidikan" id="pendidikan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="pekerjaan">Pekerjaan</label>
                                        <input type="text" class="form-control isian" placeholder="Pekerjaan anda" name="pekerjaan" id="pekerjaan" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_nikah">Status Nikah</label>
                                        <select name="s_nikah" class="form-control isian" required>
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
                                        <label>Jenis Mutasi</label>
                                        <select id="jenis_mutasi" class="form-control isian" name="jenis_mutasi" required>
                                            <option value="">Pilih jenis mutasi</option>
                                            <option value="wafat">Wafat</option>
                                            <option value="keluar">Pindah Keluar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal</label>
                                        <div class="input-group date" id="reservationdatemutasi" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal wafat / pindah" data-target="#reservationdatemutasi" name="tanggal" id="tanggal" data-date-format="YYYY-MM-DD" required />
                                            <div class="input-group-append" data-target="#reservationdatemutasi" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control isian" placeholder="Sebab kematian / pindah" name="keterangan" id="keterangan" required>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary toastrDefaultSuccess" name="submit">Submit</button>
                                        <a href="daftar_mutasi" class="btn btn-warning">Kembali</a>
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
<?php
}
?>