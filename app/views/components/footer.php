<footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <strong>Copyright &copy; 2023 <a href="https://www.instagram.com/alfiannrzky_/" target="_blank">Alfian Nurrizky</a>.</strong> Universitas Pamulang
</footer>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<!-- Select2 -->
<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- dropzonejs -->
<script src="plugins/dropzone/min/dropzone.min.js"></script>
<script type="text/javascript" src="../js/awesomechart.js"></script>

<script>
    $('#t_warga').DataTable({
        "paging": true,
        "searching": true,
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Daftar Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'print',
                title: 'Daftar Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }
        ]
    })

    $('#t_keluarga').DataTable({
        "paging": true,
        "searching": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Daftar Keluarga',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'print',
                title: 'Daftar Keluarga',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }
        ]
    })

    $('#daftar_surat').DataTable({
        "paging": true,
        "searching": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Daftar Surat',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'print',
                title: 'Daftar Surat',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }
        ]
    })

    $('#t_lap_penduduk').DataTable({
        "paging": true,
        "searching": true,
        "scrollX": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Laporan Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'print',
                title: 'Laporan Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }
        ]
    })

    $('#t_mutasi').DataTable({
        "paging": true,
        "searching": true,
        dom: 'Bfrtip',
        buttons: [{
                extend: 'excelHtml5',
                title: 'Laporan Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            },
            {
                extend: 'print',
                title: 'Laporan Penduduk',
                exportOptions: {
                    columns: ':not(.notexport)'
                }
            }
        ]
    })

    $(function() {
        $('#reservationdate').datetimepicker({
            format: 'YYYY-MM-DD',

        });
        $('#reservationdatemutasi').datetimepicker({
            format: 'YYYY-MM-DD',

        });
    })


    function isi_data_html() {
        $("input[name=data_html]").val($("#div_lap").html());
    }

    function clearCanvas(id_canvas) {
        var canvas = document.getElementById(id_canvas);
        var context = canvas.getContext("2d");
        context.clearRect(0, 0, canvas.width, canvas.height);
    }

    function tampilkan_grafik(tipe_grafik) {
        clearCanvas("chart_lahir");
        clearCanvas("chart_wafat");
        clearCanvas("chart_keluar");
        clearCanvas("chart_datang");
        clearCanvas("chart_semua");
        var data_lahir_total = $("td.data_lahir").eq(0).text();
        var data_lahir = [$("td.data_lahir").eq(1).text(), $("td.data_lahir").eq(2).text()];
        var data_wafat_total = $("td.data_wafat").eq(0).text();
        var data_wafat = [$("td.data_wafat").eq(1).text(), $("td.data_wafat").eq(2).text()];
        var data_keluar_total = $("td.data_keluar").eq(0).text();
        var data_keluar = [$("td.data_keluar").eq(1).text(), $("td.data_keluar").eq(2).text()];
        var data_datang_total = $("td.data_datang").eq(0).text();
        var data_datang = [$("td.data_datang").eq(1).text(), $("td.data_datang").eq(2).text()];
        var data_semua_total = $("td.data_semua").eq(0).text();
        var data_semua = [$("td.data_semua").eq(1).text(), $("td.data_semua").eq(2).text()];
        var besar_label = 25;
        var font_data = 25;
        var chart_lahir = new AwesomeChart("chart_lahir");
        chart_lahir.title = "Jumlah Kelahiran";
        chart_lahir.chartType = tipe_grafik;
        chart_lahir.pieTotal = data_lahir_total;
        chart_lahir.explosionOffset = 6;
        chart_lahir.titleFontHeight = 25;
        chart_lahir.labelFontHeight = besar_label;
        chart_lahir.dataValueFontHeight = font_data;
        chart_lahir.data = data_lahir;
        chart_lahir.labels = ['Lk', 'Pr'];
        chart_lahir.barFillStyle = ["#1E90FF", "#297832"];
        chart_lahir.labelFillStyle = "#FFA500";
        chart_lahir.randomColors = true;
        chart_lahir.draw();
        var chart_wafat = new AwesomeChart("chart_wafat");
        chart_wafat.title = "Jumlah Kematian";
        chart_wafat.chartType = tipe_grafik;
        chart_wafat.pieTotal = data_wafat_total;
        chart_wafat.explosionOffset = 6;
        chart_wafat.titleFontHeight = 25;
        chart_wafat.labelFontHeight = besar_label;
        chart_wafat.dataValueFontHeight = font_data;
        chart_wafat.data = data_wafat;
        chart_wafat.labels = ['Lk', 'Pr'];
        chart_wafat.barFillStyle = ["#1E90FF", "#297832"];
        chart_wafat.labelFillStyle = "#FFA500";
        chart_wafat.randomColors = true;
        chart_wafat.draw();
        var chart_keluar = new AwesomeChart("chart_keluar");
        chart_keluar.title = "Jumlah Warga Keluar";
        chart_keluar.chartType = tipe_grafik;
        chart_keluar.pieTotal = data_keluar_total;
        chart_keluar.explosionOffset = 6;
        chart_keluar.titleFontHeight = 25;
        chart_keluar.labelFontHeight = besar_label;
        chart_keluar.dataValueFontHeight = font_data;
        chart_keluar.data = data_keluar;
        chart_keluar.labels = ['Lk', 'Pr'];
        chart_keluar.barFillStyle = ["#1E90FF", "#297832"];
        chart_keluar.labelFillStyle = "#FFA500";
        chart_keluar.randomColors = true;
        chart_keluar.draw();
        var chart_datang = new AwesomeChart("chart_datang");
        chart_datang.title = "Jumlah Kedatangan";
        chart_datang.chartType = tipe_grafik;
        chart_datang.pieTotal = data_datang_total;
        chart_datang.explosionOffset = 6;
        chart_datang.titleFontHeight = 25;
        chart_datang.labelFontHeight = besar_label;
        chart_datang.dataValueFontHeight = font_data;
        chart_datang.data = data_datang;
        chart_datang.labels = ['Lk', 'Pr'];
        chart_datang.barFillStyle = ["#1E90FF", "#297832"];
        chart_datang.labelFillStyle = "#FFA500";
        chart_datang.randomColors = true;
        chart_datang.draw();
        var chart_semua = new AwesomeChart("chart_semua");
        chart_semua.title = "Jumlah Semua";
        chart_semua.chartType = tipe_grafik;
        chart_semua.pieTotal = data_semua_total;
        chart_semua.explosionOffset = 6;
        chart_semua.titleFontHeight = 25;
        chart_semua.labelFontHeight = besar_label;
        chart_semua.dataValueFontHeight = font_data;
        chart_semua.data = data_semua;
        chart_semua.labels = ['Lk', 'Pr'];
        chart_semua.barFillStyle = ["#1E90FF", "#297832"];
        chart_semua.labelFillStyle = "#FFA500";
        chart_semua.randomColors = true;
        chart_semua.draw();
    }

    function rubah_grafik(nilai) {
        tampilkan_grafik(nilai);
    }
    $(function() {
        tampilkan_grafik("exploded pie");
    })
</script>

<script>
    var sekdes_nip = "<?php echo $desa['sekdes_nip'] ?>";
    var kades_nip = "<?php echo $desa['kades_nip'] ?>";
    var kades = "<?php echo $desa['kades'] ?>";
    var sekdes = "<?php echo $desa['sekdes'] ?>";
    var tt_kades = "<?php echo $desa['tt_kades'] ?>";
    var tt_sekdes = "<?php echo $desa['tt_sekdes'] ?>";
    var jenis_surat = "<?php echo $jenis_surat ?>";
    var j_mutasi = "<?php echo $j_mutasi ?>";

    function isi_tanggal(elm) {
        if ($(elm).val() == "lahir") {
            $("#tanggal").val($("#tgl_lahir").val());
            $("#ket").focus();
        }
    }

    $("#form").submit(function() {

        var nama_surat = $("#nama_surat").parent().text();
        var nomer_surat = "<?php echo $nomer_surat; ?>";
        var input = $(this).serializeArray();
        var url = $(this).attr("action");
        var t_tangan = $("#tanda_tangan").val();
        var nip = $("#nip").val();
        var nama_warga = $("#nama").val();
        var id_warga = $("#no_ktp").val();

        if (jenis_surat == "SKP") {
            var jum_kolom_pengikut = 5;
            var baris = '';
            if ($("#jum_pengikut").val() == 0) {
                baris = '<tr><td>1</td><td>Nihil</td><td>==</td><td>==</td><td>==</td><td>==</td></tr>';
            } else {
                var jum_baris_pengikut = $(".ikut").length / jum_kolom_pengikut;
                for (var i = 0; i < jum_baris_pengikut; i++) {
                    var no_pengikut = parseInt(i) + 1;
                    var index_ikut = i * jum_kolom_pengikut;
                    var batas_ikut = parseInt(index_ikut) + parseInt(jum_kolom_pengikut);
                    baris += '<tr><td>' + no_pengikut + '</td>';
                    for (var j = index_ikut; j < batas_ikut; j++) {
                        baris += '<td>' + $(".ikut").eq(j).val() + '</td>';
                    }
                    baris += '</tr>';
                }
            }
            var tabel_pengikut = '<div class="table" style="clear:both;position:relative;background:none">';
            tabel_pengikut += '<table class="data" cellpadding="0" cellspacing="0">';
            tabel_pengikut += '<tr><th>No</th><th>Nama</th><th>L/P</th><th>Umur</th><th>Hubungan</th><th>Status</th></tr>';
            tabel_pengikut += baris;
            tabel_pengikut += '</table>';
            $(tabel_pengikut).appendTo("#content_surat");
        }

        $.post(url, {
            jenis_surat: jenis_surat,
            no_surat: nomer_surat,
            nama_surat: nama_surat,
            data: input,
            ttd: t_tangan,
            nip: nip,
            id_warga: id_warga,
            nama_warga: nama_warga
        }, function(data) {
            if (data) {
                window.location.href = "daftar_surat";
            } else {
                window.location.href = "daftar_surat";
            }

        });

    })


    function lengkapi(elm) {
        $(elm).autocomplete({
            source: function(request, response) {
                $.post("data_warga.php", {
                    data: request.term
                }, function(hasil) {
                    alert(hasil);
                    response($.map(hasil, function(item) {
                        alert(item);
                        return {
                            label: item.nama,
                            value: item.nama,
                            label: item.hubungan,
                            value: item.hubungan,
                            id: item.no_ktp
                        }
                    }))
                }, "json");
            },
            minLength: 2,
            select: function(event, ui) {
                $(elm).next().val(ui.item.id);
            }
        })
    }

    var spanClicked = false;

    $('#addMemberButton').click(function() {
        spanClicked = true;
        $('#button').prop('disabled', false);
    });

    $("#form_keluarga").submit(function() {
        if (!spanClicked) {
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Harap tambahkan anggota keluarga terlebih dahulu!',
            });
            event.preventDefault();
        } else {


            var inputan = $(".isian");
            var inputs = $(this).serializeArray();
            var url = $(this).attr('action');
            var hubunganValues = [];

            $(".hub").each(function() {
                hubunganValues.push($(this).val());
            });

            if (inputs.length >= 7) {
                var kepala_klg = $(".anggota_klg:first").val();
                var no_ktp = $("#ktp").val();

                if (!/^\d+$/.test(no_ktp)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'No KTP harus berupa angka!',
                    });
                    event.preventDefault();
                    return;
                }
                $.post(url, {
                    data: inputs,
                    kepala_keluarga: kepala_klg,
                    hubungan:hubunganValues,
                }, function(data) {
                    if (data == 1) {
                        window.location.href = "daftar_keluarga";
                    } else {
                        window.location.href = "daftar_keluarga";
                    }
                })
            } else {
                $("span.input-link").click();
            }
        }
    })

    $("span.input-link").click(function() {

        var input_baru = '<div class="form-row">';

        input_baru += '<div class="form-group col-md-4">';
        input_baru += '<label for="nama" class="control-label"></label>';
        input_baru += '<input type="text" placeholder="Ketik Nama" class="form-control isian anggota_klg" autocomplete="off" onfocus="lengkapi(this)"/>';
        input_baru += '</div>';

        input_baru += '<div class="form-group col-md-4">';
        input_baru += '<label for="kepala_keluarga" class="control-label"></label>';
        input_baru += '<input type="text" name="kepala_keluarga" placeholder="No KTP" id="ktp" class="form-control isian" autocomplete="off" required />';
        input_baru += '</div>';

        input_baru += '<div class="form-group col-md-4">';
        input_baru += '<label for="hubungan" class="control-label"></label>';
        input_baru += '<input type="text" name="hubungan" placeholder="Hubungan" class="form-control isian hub" autocomplete="off" required />';
        input_baru += '</div>';

        input_baru += '</div>';

        $(input_baru).insertBefore($("#button"));
        $(".isian:last").focus();
    });

    function isi_nip(elm) {
        if ($(elm).val() == "kades") {
            $("#tanda_tangan").val(kades);
            $("#nip").val(kades_nip);
            $("#pejabat").html(tt_kades);
            $("#nama_pejabat").html("<span style='text-transform:uppercase;text-decoration:underline'>" + kades + "</span>");
        } else {
            $("#tanda_tangan").val(sekdes);
            $("#nip").val(sekdes_nip);
            $("#pejabat").html(tt_sekdes);
            $("#nama_pejabat").html("<span style='text-transform:uppercase;text-decoration:underline'>" + sekdes + "</span><br />" + sekdes_nip);
        }
    }

    function tambah_pengikut(elm) {
        var no = $("#tab_pengikut tr").length;
        var kosong = 0;

        $(".ikut").each(function() {
            if ($(this).val() == "") {
                kosong++;
            }
        })

        $("#jum_pengikut").val(no);
        if ((kosong == 0) || (no == 1)) {
            var input_baru = "<tr><td>" + no + "</td>";
            input_baru += "<td><input type='text' name='nama_pengikut' class='form-control ikut' required/></td>";
            input_baru += "<td><select name='j_kel_pengikut' class='form-control ikut' required><option value='L'>Laki - laki</option><option value='P'>Perempuan</option></select></td>";
            input_baru += "<td><input type='text' name='umur_pengikut' class='form-control ikut' required/></td>";
            input_baru += "<td><input type='text' name='hub_pengikut' class='form-control ikut' required/></td>";
            input_baru += "<td><input type='text' name='status_pengikut' class='form-control ikut' required/></td></tr>";
            $(input_baru).appendTo($("#tab_pengikut"));
        }

    }

    function hapusDataPenduduk(url) {
        Swal.fire({
            title: 'Anda Yakin Untuk Menghapus Data Ini ?',
            text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function() {
                    window.location.href = url;
                }, 1000)

                Swal.fire({
                    title: "Terhapus!",
                    text: "Data Berhasil Dihapus!",
                    icon: "success"
                });
            }
        })
    }

    function hapusDataKeluarga(url) {
        Swal.fire({
            title: 'Anda Yakin Untuk Menghapus Data Ini ?',
            text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function() {
                    window.location.href = url;
                }, 1000)

                Swal.fire({
                    title: "Terhapus!",
                    text: "Data Berhasil Dihapus!",
                    icon: "success"
                });
            }
        })
    }

    function hapusDataSurat(url) {
        Swal.fire({
            title: 'Anda Yakin Untuk Menghapus Data Ini ?',
            text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function() {
                    window.location.href = url;
                }, 1000)

                Swal.fire({
                    title: "Terhapus!",
                    text: "Data Berhasil Dihapus!",
                    icon: "success"
                });
            }
        })
    }

    function hapusDataMutasi(url) {
        Swal.fire({
            title: 'Anda Yakin Untuk Menghapus Data Ini ?',
            text: 'Anda Tidak Dapat Melihat Data Ini Lagi!!!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Hapus!',
        }).then((result) => {
            if (result.isConfirmed) {
                setTimeout(function() {
                    window.location.href = url;
                }, 1000)

                Swal.fire({
                    title: "Terhapus!",
                    text: "Data Berhasil Dihapus!",
                    icon: "success"
                });
            }
        })
    }

    function logout(url) {
        Swal.fire({
            title: 'Anda Yakin Ingin Logout?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Ya!',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        })
    }
</script>