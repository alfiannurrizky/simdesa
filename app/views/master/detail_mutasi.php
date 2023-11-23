<?php
session_start();

include '../../../include/koneksi.php';

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM v_mutasi_warga WHERE id_warga = '$id' ");
$row = mysqli_fetch_assoc($query);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Mutasi Warga</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="./home">Home</a></li>
                        <li class="breadcrumb-item active">Detail Mutasi Warga</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- /.row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="ktp">No KTP</label>
                                    <input type="text" class="form-control" name="no_ktp" value="<?php echo $row["id_warga"] ?>" placeholder="No KTP" id="ktp" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="j_kelamin">Jenis Kelamin</label>
                                    <input type="text" class="form-control" name="j_kelamin" value="<?php echo $row["j_kel"] ?>" placeholder="Jenis Kelamin" id="j_kelamin" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="jenis_mutasi">Jenis Mutasi</label>
                                    <input type="text" class="form-control" name="jenis_mutasi" value="<?php echo $row["jenis_mutasi"] ?>" placeholder="Jenis Mutasi" id="jenis_mutasi" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="periode">Periode</label>
                                    <input type="text" name="periode" value="<?php echo $row["periode"] ?>" class="form-control" placeholder="Periode" id="periode" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <input type="text" name="keterangan" value="<?php echo $row["keterangan"] ?>" class="form-control" placeholder="Keterangan" id="keterangan" readonly> <br>
                                </div>
                            </form>
                            <a href="./daftar_mutasi" class="btn btn-warning">Kembali</a>
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