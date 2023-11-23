<?php
session_start();


?>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Ganti Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="./index.php?page=home">Home</a></li>
            <li class="breadcrumb-item active">Ganti Password</li>
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
              <form action="models/simpan_ubah_pass.php" method="post">
                <div class="form-group">
                  <label for="pw_lama">Password Lama</label>
                  <input type="password" class="form-control" placeholder="Password Lama" name="pw_lama">
                </div>
                <div class="form-group">
                  <label for="pw_baru">Password Baru</label>
                  <input type="password" class="form-control" placeholder="Password Baru" name="pw_baru">
                </div>
                <div class="form-group">
                  <label for="pw_baru_confirm">Konfirmasi Password Baru</label>
                  <input type="password" class="form-control" placeholder="Konfirmasi Password Baru" name="pw_baru_confirm">
                </div>
                <div>
                  <button type="submit" class="btn btn-primary" name="submit">Ubah Password</button>
                  <a href="./home" class="btn btn-warning">Kembali</a>
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