<?php
session_start();
include("../../../include/koneksi.php");
?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Penduduk</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./home">Home</a></li>
            <li class="breadcrumb-item active">Daftar Penduduk</li>
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
            <div class="card-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Tambah Data</button>
            </div>
            <div class="card-body">
              <div class="card-body table-responsive p-0">
                <table id="t_warga" class="table table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NO_KTP</th>
                      <th>NAMA</th>
                      <th>AGAMA</th>
                      <th>T_LAHIR</th>
                      <th>TGL_LAHIR</th>
                      <th>UMUR</th>
                      <th>J_KEL</th>
                      <th>GOL_DARAH</th>
                      <th>W_NEGARA</th>
                      <th>PENDIDIKAN</th>
                      <th>PEKERJAAN</th>
                      <th>S_NIKAH</th>
                      <th>ALAMAT</th>
                      <th class='notexport'>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $warga = mysqli_query($conn, "SELECT * FROM warga WHERE status='1'");
                    ?>
                    <?php foreach ($warga as $rows) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $rows['no_ktp'] ?></td>
                        <td><?= $rows['nama'] ?></td>
                        <td><?= $rows['agama'] ?></td>
                        <td><?= $rows['t_lahir'] ?></td>
                        <td><?= $rows['tgl_lahir'] ?></td>
                        <td><?= $rows['umur'] ?></td>
                        <td><?= $rows['j_kel'] ?></td>
                        <td><?= $rows['gol_darah'] ?></td>
                        <td><?= $rows['w_negara'] ?></td>
                        <td><?= $rows['pendidikan'] ?></td>
                        <td><?= $rows['pekerjaan'] ?></td>
                        <td><?= $rows['s_nikah'] ?></td>
                        <td><?= $rows['alamat'] ?></td>
                        <td>
                          <div class="btn-group">
                            <button type="button" class="btn btn-outline-success btn-sm m-1" data-toggle="modal" data-target="#modal-detail<?php echo $rows["no_ktp"] ?>">
                              Detail
                            </button>
                            <button type="button" class="btn btn-outline-primary btn-sm m-1" data-toggle="modal" data-target="#modal-edit<?php echo $rows["no_ktp"] ?>">
                              Edit
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-sm m-1" onclick="hapusDataPenduduk('models/proses_hapus.php?id_penduduk=<?php echo $rows['no_ktp']; ?>')">Hapus</button>
                          </div>
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-detail<?php echo $rows["no_ktp"] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3>Detail Data</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Detail Data Penduduk</h3>
                                </div>
                                <!-- form start -->
                                <form action="" method="post">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="ktp">No. KTP</label>
                                      <input type="text" class="form-control" name="no_ktp" value="<?php echo $rows["no_ktp"] ?>" placeholder="No KTP" id="ktp" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control" name="nama" value="<?php echo $rows["nama"] ?>" placeholder="Nama" id="nama" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="agama">Agama</label>
                                      <input name="gender" class="form-control" id="agama" value="<?php echo $rows['agama'] ?>" readonly></input>
                                    </div>
                                    <div class="form-group">
                                      <label for="t_lahir">Tempat Lahir</label>
                                      <input type="text" name="t_lahir" value="<?php echo $rows["t_lahir"] ?>" class="form-control" placeholder="Alamat" id="t_lahir" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="tgl_lahir">Tanggal Lahir</label>
                                      <input type="text" name="tgl_lahir" value="<?php echo $rows["tgl_lahir"] ?>" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="jk">Jenis Kelamin</label>
                                      <select name="j_kel" class="form-control" id="jk" readonly>
                                        <option value="L" <?php echo ($rows['j_kel'] == 'L') ? 'selected' : ''; ?>>L</option>
                                        <option value="P" <?php echo ($rows['j_kel'] == 'P') ? 'selected' : ''; ?>>P</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="goldar">Golongan Darah</label>
                                      <input type="text" name="gol_darah" value="<?php echo $rows["gol_darah"] ?>" class="form-control" placeholder="Golongan Darah" id="goldar" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="w_negara">Warga Negara</label>
                                      <input type="text" name="w_negara" value="<?php echo $rows["w_negara"] ?>" class="form-control" placeholder="Warga Negara" id="w_negara" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="pend">Pendidikan</label>
                                      <input type="text" name="pendidikan" value="<?php echo $rows["pendidikan"] ?>" class="form-control" placeholder="Pendidikan" id="pend" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="pekerjaan">Pekerjaan</label>
                                      <input type="text" name="pekerjaan" value="<?php echo $rows["pekerjaan"] ?>" class="form-control" placeholder="Pekerjaan" id="pekerjaan" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="s_nikah">Status Nikah</label>
                                      <input type="text" name="s_nikah" value="<?php echo $rows["s_nikah"] ?>" class="form-control" placeholder="Status Nikah" id="s_nikah" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input type="text" name="alamat" value="<?php echo $rows["alamat"] ?>" class="form-control" placeholder="Alamat" id="alamat" readonly>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>


                      <div class="modal fade" id="modal-edit<?php echo $rows["no_ktp"] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h3>Edit Data</h3>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Edit Data Penduduk</h3>
                                </div>
                                <!-- form start -->
                                <form action="models/edit_penduduk.php" method="post">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="ktp">No. KTP</label>
                                      <input type="text" class="form-control" name="no_ktp" value="<?php echo $rows["no_ktp"] ?>" placeholder="No KTP" id="ktp" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="nama">Nama</label>
                                      <input type="text" class="form-control" name="nama" value="<?php echo $rows["nama"] ?>" placeholder="Nama" id="nama">
                                    </div>
                                    <div class="form-group">
                                      <label for="agama">Agama</label>
                                      <input name="agama" class="form-control" id="agama" value="<?php echo $rows['agama'] ?>"></input>
                                    </div>
                                    <div class="form-group">
                                      <label for="t_lahir">Tempat Lahir</label>
                                      <input type="text" name="t_lahir" value="<?php echo $rows["t_lahir"] ?>" class="form-control" placeholder="Alamat" id="t_lahir">
                                    </div>
                                    <div class="form-group">
                                      <label for="tgl_lahir">Tanggal Lahir</label>
                                      <input type="text" name="tgl_lahir" value="<?php echo $rows["tgl_lahir"] ?>" class="form-control" placeholder="Tanggal Lahir" id="tgl_lahir">
                                    </div>
                                    <div class="form-group">
                                      <label for="jk">Jenis Kelamin</label>
                                      <select name="j_kel" class="form-control" id="jk">
                                        <option value="L" <?php echo ($rows['j_kel'] == 'L') ? 'selected' : ''; ?>>L</option>
                                        <option value="P" <?php echo ($rows['j_kel'] == 'P') ? 'selected' : ''; ?>>P</option>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="goldar">Golongan Darah</label>
                                      <input type="text" name="gol_darah" value="<?php echo $rows["gol_darah"] ?>" class="form-control" placeholder="Golongan Darah" id="goldar">
                                    </div>
                                    <div class="form-group">
                                      <label for="w_negara">Warga Negara</label>
                                      <input type="text" name="w_negara" value="<?php echo $rows["w_negara"] ?>" class="form-control" placeholder="Warga Negara" id="w_negara">
                                    </div>
                                    <div class="form-group">
                                      <label for="pend">Pendidikan</label>
                                      <input type="text" name="pendidikan" value="<?php echo $rows["pendidikan"] ?>" class="form-control" placeholder="Pendidikan" id="pend">
                                    </div>
                                    <div class="form-group">
                                      <label for="pekerjaan">Pekerjaan</label>
                                      <input type="text" name="pekerjaan" value="<?php echo $rows["pekerjaan"] ?>" class="form-control" placeholder="Pekerjaan" id="pekerjaan">
                                    </div>
                                    <div class="form-group">
                                      <label for="s_nikah">Status Nikah</label>
                                      <input type="text" name="s_nikah" value="<?php echo $rows["s_nikah"] ?>" class="form-control" placeholder="Status Nikah" id="s_nikah">
                                    </div>
                                    <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input type="text" name="alamat" value="<?php echo $rows["alamat"] ?>" class="form-control" placeholder="Alamat" id="alamat">
                                    </div>
                                    <div>
                                      <button type="submit" name="submit" class="btn btn-warning">
                                        Edit
                                      </button>
                                    </div>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                          <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                      </div>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Modal Tambah -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Penduduk</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Penduduk</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="models/simpan_penduduk.php" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="no_ktp">No. KTP</label>
                              <input type="text" class="form-control" placeholder="No. KTP" name="no_ktp" required>
                            </div>
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" placeholder="Nama" name="nama" required>
                            </div>
                            <div class="form-group">
                              <label for="agama">Agama</label>
                              <select name="agama" class="form-control" required>
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
                              <input type="text" class="form-control" placeholder="Tempat Lahir" name="t_lahir" required>
                            </div>
                            <div class="form-group">
                              <label for="tgl_lahir">Tanggal Lahir</label>
                              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" placeholder="Tanggal Lahir" data-target="#reservationdate" name="tgl_lahir" data-date-format="YYYY-MM-DD" required />
                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                </div>
                              </div>
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
                              <label for="gol_darah">Golongan Darah</label>
                              <select name="gol_darah" class="form-control" required>
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
                              <input type="text" class="form-control" placeholder="Pendidikan" name="pendidikan" required>
                            </div>
                            <div class="form-group">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" class="form-control" placeholder="Pekerjaan" name="pekerjaan" required>
                            </div>
                            <div class="form-group">
                              <label for="s_nikah">Status Nikah</label>
                              <select name="s_nikah" class="form-control" required>
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
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary toastrDefaultSuccess" name="submit">Submit</button>
                          </div>
                        </form>
                      </div>
                      <!-- /.card -->
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal tambah -->

            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
  </div>
</div>
<!-- /.content-header -->