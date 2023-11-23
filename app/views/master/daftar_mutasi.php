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
                    <h1 class="m-0">Mutasi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./home">Home</a></li>
                        <li class="breadcrumb-item active">Mutasi</li>
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
                            <a href="./index.php?page=mutasi&j_mutasi=masuk" type="button" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                                Tambah Mutasi Masuk
                            </a>
                            <a href="./index.php?page=mutasi&j_mutasi=keluar" type="button" class="btn btn-outline-primary">
                                <i class="fas fa-plus"></i>
                                Tambah Mutasi Keluar
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover" id="t_mutasi">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>NO KTP</th>
                                            <th>JENIS MUTASI</th>
                                            <th>TANGGAL</th>
                                            <th>KETERANGAN</th>
                                            <th class='notexport'>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $mutasi = mysqli_query($conn, "SELECT * FROM mutasi_warga");
                                        ?>
                                        <?php foreach ($mutasi as $rows) : ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $rows['id_warga'] ?></td>
                                                <td><?= $rows['jenis_mutasi'] ?></td>
                                                <td><?= $rows['tanggal'] ?></td>
                                                <td><?= $rows['keterangan'] ?></td>
                                                <td>
                                                    <a href="./index.php?page=detail_mutasi&id=<?php echo $rows['id_warga'] ?>" type="button" class="btn btn-outline-success btn-sm">
                                                        Detail
                                                    </a>
                                                    <button onclick="hapusDataMutasi('models/proses_hapus.php?id_mutasi=<?php echo $rows['id_mutasi'] ?>')" type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
                                                </td>
                                            </tr>
                            </div>
                        <?php endforeach; ?>
                        </tbody>
                        </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->