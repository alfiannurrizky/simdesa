<?php
session_start();

include '../../../include/koneksi.php';

$id = $_GET['idmutasi'];

$query = mysqli_query($conn, "SELECT * FROM mutasi_warga WHERE id_mutasi = '$id' ");
$row = mysqli_fetch_assoc($query);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Mutasi Warga</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./home">Home</a></li>
                        <li class="breadcrumb-item active">Edit Mutasi Warga</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="models/edit_mutasi.php" method="post">
                                <div class="form-group">
                                    <label for="ktp">No KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" value="<?php echo $row["id_warga"] ?>" placeholder="No KTP" id="ktp">
                                </div>
                                <div class="form-group">
                                    <label for="jenis_mutasi">Jenis Mutasi</label>
                                    <input type="text" class="form-control" name="jenis_mutasi" value="<?php echo $row["jenis_mutasi"] ?>" placeholder="Jenis Mutasi" id="jenis_mutasi">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal">tanggal</label>
                                    <input type="text" name="tanggal" value="<?php echo $row["tanggal"] ?>" class="form-control" placeholder="Tanggal" id="tanggal">
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?php echo $row["keterangan"] ?>" class="form-control" placeholder="Keterangan" id="keterangan"> <br>
                                    <input type="hidden" name="id_mutasi" value="<?php echo $row["id_mutasi"] ?>" class="form-control" placeholder="id_mutasi"> <br>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                                <a href="./daftar_mutasi" class="btn btn-warning">Kembali</a>
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