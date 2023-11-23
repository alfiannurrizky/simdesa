<?php
include_once "../../../include/koneksi.php";
include_once "../../../include/config.php";
$tgl_sekarang = date("d-m-Y");
$bulan = array("01" => "Januari", "02" => "Pebruari", "03" => "Maret", "04" => "April", "05" => "Mei", "06" => "Juni", "07" => "Juli", "08" => "Agustus", "09" => "September", "10" => "Oktober", "11" => "Nopember", "12" => "Desember");
$tgl_arr = explode("-", $tgl_sekarang);
$periode = $tgl_arr['1'] . "-" . $tgl_arr['2'];
// jumlah penduduk
$tmp_lk = mysqli_query($conn, "select count(*) from warga where status = '1' and j_kel='L'");
$tmp_pr = mysqli_query($conn, "select count(*) from warga where status = '1' and j_kel='P'");
$jumlah_lk = mysqli_fetch_row($tmp_lk);
$jumlah_pr = mysqli_fetch_row($tmp_pr);
$jumlah_semua = $jumlah_lk[0] + $jumlah_pr[0];
// jumlah mutasi penduduk ( lahir, mati, keluar ,masuk) untuk bulan ini
$jml_datang_lk = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='L' and jenis_mutasi='masuk'");
$jml_datang_pr = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='P' and jenis_mutasi='masuk'");
$jumlah_datang_lk = mysqli_fetch_row($jml_datang_lk);
$jumlah_datang_pr = mysqli_fetch_row($jml_datang_pr);
$jumlah_semua_datang = $jumlah_datang_lk[0] + $jumlah_datang_pr[0];
$jml_keluar_lk = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='L' and jenis_mutasi='keluar'");
$jml_keluar_pr = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='P' and jenis_mutasi='keluar'");
$jumlah_keluar_lk = mysqli_fetch_row($jml_keluar_pr);
$jumlah_keluar_pr = mysqli_fetch_row($jml_keluar_lk);
$jumlah_semua_keluar = $jumlah_keluar_lk[0] + $jumlah_keluar_pr[0];
$jml_lahir_lk = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='L' and jenis_mutasi='lahir'");
$jml_lahir_pr = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='P' and jenis_mutasi='lahir'");
$jumlah_lahir_lk = mysqli_fetch_row($jml_lahir_lk);
$jumlah_lahir_pr = mysqli_fetch_row($jml_lahir_pr);
$jumlah_semua_lahir = $jumlah_lahir_lk[0] + $jumlah_lahir_pr[0];
$jml_wafat_lk = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='L' and jenis_mutasi='wafat'");
$jml_wafat_pr = mysqli_query($conn, "select count(*) from v_mutasi_warga where periode = '" . $periode . "' and j_kel='P' and jenis_mutasi='wafat'");
$jumlah_wafat_lk = mysqli_fetch_row($jml_wafat_lk);
$jumlah_wafat_pr = mysqli_fetch_row($jml_wafat_pr);
$jumlah_semua_wafat = $jumlah_wafat_lk[0] + $jumlah_wafat_pr[0];
// jumlah bulan lalu
$jumlah_bulan_lalu_pr = $jumlah_pr[0] + $jumlah_keluar_pr[0] + $jumlah_wafat_pr[0] - $jumlah_datang_pr[0] - $jumlah_lahir_pr[0];
$jumlah_bulan_lalu_lk = $jumlah_lk[0] + $jumlah_keluar_lk[0] + $jumlah_wafat_lk[0] - $jumlah_datang_lk[0] - $jumlah_lahir_lk[0];
$jumlah_bulan_lalu = $jumlah_bulan_lalu_lk + $jumlah_bulan_lalu_pr;
?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Laporan Penduduk</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Lap Penduduk</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="table-responsive p-0">
                <table class="table table-bordered" id="t_lap_penduduk">
                  <thead>
                    <tr>
                      <th rowspan="3" class="align-middle text-center">No</th>
                      <th rowspan="2" colspan="3" class="align-middle text-center">Penduduk Bulan Lalu</th>
                      <th colspan="12" class="align-middle text-center">Keadaan Bulan Ini</th>
                      <th colspan="3" rowspan="2" class="align-middle text-center">Jumlah s/d Bulan ini</th>
                    </tr>
                    <tr>
                      <th colspan="3" class="align-middle text-center">Lahir</th>
                      <th colspan="3" class="align-middle text-center">Mati</th>
                      <th colspan="3" class="align-middle text-center">Pindah</th>
                      <th colspan="3" class="align-middle text-center">Datang</th>
                    </tr>
                    <tr>
                      <th class="align-middle text-center">Jumlah</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                      <th class="align-middle text-center">Jumlah lahir</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                      <th class="align-middle text-center">Jumlah Mati</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                      <th class="align-middle text-center">Jumlah pindah</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                      <th class="align-middle text-center">Jumlah datang</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                      <th class="align-middle text-center">Jumlah</th>
                      <th class="align-middle text-center">Lk</th>
                      <th class="align-middle text-center">Pr</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><?php echo $jumlah_bulan_lalu ?></td>
                      <td><?php echo $jumlah_bulan_lalu_lk ?></td>
                      <td><?php echo $jumlah_bulan_lalu_pr ?></td>
                      <td class="data_lahir"><?php echo $jumlah_semua_lahir ?></td>
                      <td class="data_lahir"><?php echo $jumlah_lahir_lk[0] ?></td>
                      <td class="data_lahir"><?php echo $jumlah_lahir_pr[0] ?></td>
                      <td class="data_wafat"><?php echo $jumlah_semua_wafat ?></td>
                      <td class="data_wafat"><?php echo $jumlah_wafat_lk[0] ?></td>
                      <td class="data_wafat"><?php echo $jumlah_wafat_pr[0] ?></td>
                      <td class="data_keluar"><?php echo $jumlah_semua_keluar ?></td>
                      <td class="data_keluar"><?php echo $jumlah_keluar_lk[0] ?></td>
                      <td class="data_keluar"><?php echo $jumlah_keluar_pr[0] ?></td>
                      <td class="data_datang"><?php echo $jumlah_semua_datang ?></td>
                      <td class="data_datang"><?php echo $jumlah_datang_lk[0] ?></td>
                      <td class="data_datang"><?php echo $jumlah_datang_pr[0] ?></td>
                      <td class="data_semua"><?php echo $jumlah_semua ?></td>
                      <td class="data_semua"><?php echo $jumlah_lk[0] ?></td>
                      <td class="data_semua"><?php echo $jumlah_pr[0] ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div id="slide_show" class="mt-5">
                <div class="form-group">
                  <label for="jenisGrafik">Pilih jenis grafik</label>
                  <select onchange="rubah_grafik(this.value)" class="form-control" id="jenisGrafik">
                    <option value="horizontalBars">Horizontal Bar</option>
                    <option value="explodedPie" selected>Exploded Pie</option>
                  </select>
                </div>

                <div class="chart_container active">
                  <canvas id="chart_lahir" width="150" height="150">
                    Your web-browser does not support the HTML 5 canvas element.
                  </canvas>
                </div>
                <div class="chart_container active">
                  <canvas id="chart_wafat" width="150" height="150">
                    Your web-browser does not support the HTML 5 canvas element.
                  </canvas>
                </div>
                <div class="chart_container active">
                  <canvas id="chart_keluar" width="150" height="150">
                    Your web-browser does not support the HTML 5 canvas element.
                  </canvas>
                </div>
                <div class="chart_container">
                  <canvas id="chart_datang" width="150" height="150">
                    Your web-browser does not support the HTML 5 canvas element.
                  </canvas>
                </div>
                <div class="chart_container">
                  <canvas id="chart_semua" width="150" height="150">
                    Your web-browser does not support the HTML 5 canvas element.
                  </canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>