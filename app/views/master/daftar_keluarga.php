<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Keluarga</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./home">Home</a></li>
            <li class="breadcrumb-item active">Daftar Keluarga</li>
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
                <table id="t_keluarga" class="table table-hover">
                  <thead>
                    <tr>
                      <th>NO.</th>
                      <th>NO KK</th>
                      <th>KEPALA KELUARGA</th>
                      <th>ALAMAT</th>
                      <th>DUSUN</th>
                      <th>RT</th>
                      <th>RW</th>
                      <th>PEKERJAAN</th>
                      <th class='notexport'>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $keluarga = mysqli_query($conn, "SELECT * FROM keluarga");
                    ?>
                    <?php foreach ($keluarga as $rows) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $rows['id_keluarga'] ?></td>
                        <td><?= $rows['kepala_keluarga'] ?></td>
                        <td><?= $rows['alamat'] ?></td>
                        <td><?= $rows['dusun'] ?></td>
                        <td><?= $rows['rt'] ?></td>
                        <td><?= $rows['rw'] ?></td>
                        <td><?= $rows['pekerjaan'] ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="./detail_keluarga&id=<?php echo $rows['id_keluarga'] ?>" type="button" class="btn btn-outline-success btn-sm m-1">
                              Detail
                            </a>
                            <button type="button" class="btn btn-outline-primary btn-sm m-1" data-toggle="modal" data-target="#modal-edit<?php echo $rows["id_keluarga"] ?>">
                              Edit
                            </button>
                            <button onclick="hapusDataKeluarga('models/proses_hapus.php?id_keluarga=<?php echo $rows['id_keluarga'] ?>')" type="button" class="btn btn-outline-danger btn-sm m-1">Hapus</button>
                          </div>
                        </td>
                      </tr>

                      <div class="modal fade" id="modal-edit<?php echo $rows["id_keluarga"] ?>">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 class="modal-title">Edit Data Keluarga</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <div class="card card-primary">
                                <div class="card-header">
                                  <h3 class="card-title">Keluarga</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="models/edit_keluarga.php" method="post">
                                  <div class="card-body">
                                    <div class="form-group">
                                      <label for="no_kk">No. KK</label>
                                      <input type="text" class="form-control isian" id="id_keluarga" placeholder="No. KK" name="id_keluarga" value="<?php echo $rows["id_keluarga"] ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                      <label for="kepala_keluarga">Kepala Keluarga</label>
                                      <input type="text" class="form-control isian" id="kepala_keluarga" placeholder="Kepala Keluarga" name="kepala_keluarga" value="<?php echo $rows["kepala_keluarga"] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="alamat">Alamat</label>
                                      <input type="text" class="form-control isian" id="alamat" placeholder="Alamat" name="alamat" value="<?php echo $rows["alamat"] ?>">
                                    </div>
                                    <div class="form-group">
                                      <label for="dusun">Dusun</label>
                                      <select name="dusun" id="dusun" class="form-control isian">
                                        <?php
                                        for ($i = 0; $i < count($dusun); $i++) {
                                          $value = ($i == 0) ? "" : $dusun[$i];
                                          $selected = ($rows['dusun'] == $value) ? "selected" : "";
                                          echo "<option value='" . htmlspecialchars($value) . "' " . $selected . ">" . htmlspecialchars($dusun[$i]) . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="rt">RT</label>
                                      <select name="rt" id="rt" class="form-control isian" >
                                        <?php
                                        for ($i = 0; $i < count($rt); $i++) {
                                          $value = ($i == 0) ? "" : $rt[$i];
                                          $selected = ($rows['rt'] == $value) ? "selected" : "";
                                          echo "<option value='" . htmlspecialchars($value) . "' " . $selected . ">" . htmlspecialchars($rt[$i]) . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="rw">RW</label>
                                      <select name="rw" id="rw" class="form-control isian">
                                      <?php
                                        for ($i = 0; $i < count($rw); $i++) {
                                          $value = ($i == 0) ? "" : $rw[$i];
                                          $selected = ($rows['rw'] == $value) ? "selected" : "";
                                          echo "<option value='" . htmlspecialchars($value) . "' " . $selected . ">" . htmlspecialchars($rw[$i]) . "</option>";
                                        }
                                        ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label for="pekerjaan">Pekerjaan</label>
                                      <input type="text" class="form-control isian" placeholder="Pekerjaan" name="pekerjaan" value="<?php echo $rows["pekerjaan"] ?>" required>
                                    </div>
                                  </div>
                                  <div class="card-footer">
                                    <button type="submit" class="btn btn-primary isian" name="submit">Edit</button>
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

                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              <!-- Modal Tambah -->
              <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Keluarga</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="card card-primary">
                        <div class="card-header">
                          <h3 class="card-title">Keluarga</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="form_keluarga" name="form_keluarga" action="models/simpan_keluarga.php" method="post">
                          <div class="card-body">
                            <div class="form-group">
                              <label for="no_kk">No. KK</label>
                              <input type="text" class="form-control isian" id="id_keluarga" placeholder="No. KK" name="id_keluarga" required>
                            </div>
                            <div class="form-group">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control isian" id="alamat" placeholder="Alamat" name="alamat" required>
                            </div>
                            <div class="form-group">
                              <label for="dusun">Dusun</label>
                              <select name="dusun" id="dusun" class="form-control isian" required>
                                <?php
                                for ($i = 0; $i < count($dusun); $i++) {
                                  if ($i == 0) {
                                    $value = "";
                                  } else {
                                    $value = $dusun[$i];
                                  }
                                  echo "<option value=" . $value . ">" . $dusun[$i] . "</option>";
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="rt">RT</label>
                              <select name="rt" id="rt" class="form-control isian" required>
                                <?php
                                for ($i = 0; $i < count($rt); $i++) {
                                  if ($i == 0) {
                                    $value = "";
                                  } else {
                                    $value = $rt[$i];
                                  }
                                  echo "<option value=" . $value . ">" . $rt[$i] . "</option>";
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="rw">RW</label>
                              <select name="rw" id="rw" class="form-control isian" required>
                                <?php
                                for ($i = 0; $i < count($rw); $i++) {
                                  if ($i == 0) {
                                    $value = "";
                                  } else {
                                    $value = $rw[$i];
                                  }
                                  echo "<option value=" . $value . ">" . $rw[$i] . "</option>";
                                }
                                ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" class="form-control isian" placeholder="Pekerjaan" name="pekerjaan" required>
                            </div>
                            <div class="form-group">
                              <label class="small">Tambahkan Anggota keluarga</label> <br>
                              <span id="addMemberButton" style="cursor: pointer;" class="input-link"><img src="../img/edit_add.png" /><span style="vertical-align:middle;padding:3px;margin-left:3px;font-size:70%;font-weight:bold">( Data pertama adalah kepala keluarga )</span></span>
                            </div>
                          </div>
                          <div class="card-footer">
                            <button type="submit" class="btn btn-primary isian" id="button">Submit</button>
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