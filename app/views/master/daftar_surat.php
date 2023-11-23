<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Daftar Surat</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Daftar Surat</li>
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
              <a href="buat_surat" type="button" class="btn btn-primary">Buat Surat</a>
            </div>
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table table-hover" id="daftar_surat">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>JENIS SURAT</th>
                      <th>NO SURAT</th>
                      <th>NAMA SURAT</th>
                      <th>TANGGAL</th>
                      <th>NAMA WARGA</th>
                      <th class='notexport'>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    $surat = mysqli_query($conn, "SELECT * FROM surat");
                    ?>
                    <?php foreach ($surat as $rows) : ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $rows['jenis_surat'] ?></td>
                        <td><?= $rows['no_surat'] ?></td>
                        <td><?= $rows['nama_surat'] ?></td>
                        <td><?= $rows['tanggal'] ?></td>
                        <td><?= $rows['nama_warga'] ?></td>
                        <td>
                          <div class="btn-group">
                            <a href='models/unduh_pdf.php?id_surat=<?= $rows['id_surat'] ?>' type="button" class="btn btn-outline-success btn-sm m-1">
                              Unduh
                            </a>
                            <button onclick="hapusDataSurat('models/proses_hapus.php?id_surat=<?php echo $rows['id_surat'] ?>')" type="button" class="btn btn-outline-danger btn-sm m-1">Hapus</button>
                          </div>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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
</div>
<!-- /.content-header -->