<?php
session_start();

include '../../../include/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM keluarga WHERE id_keluarga = '$id' ");
$row = mysqli_fetch_assoc($query);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./home">Home</a></li>
                        <li class="breadcrumb-item active">Detail Keluarga</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Card Detail Warga -->
                            <div class="card mt-3">
                                <div class="card-body" id="detailCard">
                                    <h1 class="card-title">Detail Keluarga <?= $row['kepala_keluarga']; ?></h1> <br>
                                    <hr>
                                    <dl class="row">
                                        <dt class="col-sm-3">No KK</dt>
                                        <dd class="col-sm-9"><?= $row['id_keluarga'] ?></dd>

                                        <dt class="col-sm-3">Kepala Keluarga</dt>
                                        <dd class="col-sm-9"><?= $row['kepala_keluarga'] ?></dd>

                                        <dt class="col-sm-3">Alamat</dt>
                                        <dd class="col-sm-9"><?= $row['alamat'] ?></dd>

                                        <dt class="col-sm-3">Pekerjaan</dt>
                                        <dd class="col-sm-9"><?= $row['pekerjaan'] ?></dd>
                                    </dl>
                                    <hr>
                                    <label for="">Anggota Keluarga</label>
                                    <div class="table-responsive p-0">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>No KTP</th>
                                                    <th>Nama</th>
                                                    <th>Agama</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Status Nikah</th>
                                                    <th>Hubungan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                $det_keluarga = mysqli_query($conn, "SELECT no_ktp,nama,agama,t_lahir,tgl_lahir,j_kel,s_nikah, hubungan FROM v_detail_warga WHERE id_keluarga='$id' ");
                                                ?>
                                                <?php foreach ($det_keluarga as $row) : ?>
                                                    <tr>
                                                        <td><?= $no++ ?></td>
                                                        <td><?= $row['no_ktp'] ?></td>
                                                        <td><?= $row['nama'] ?></td>
                                                        <td><?= $row['agama'] ?></td>
                                                        <td><?= $row['t_lahir'] ?></td>
                                                        <td><?= $row['tgl_lahir'] ?></td>
                                                        <td><?= $row['j_kel'] ?></td>
                                                        <td><?= $row['s_nikah'] ?></td>
                                                        <td><?= $row['hubungan'] ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <a href="./daftar_keluarga" class="btn btn-warning">Kembali</a>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    <!-- /.row -->
</div><!-- /.container-fluid -->
<!-- /.content-header -->