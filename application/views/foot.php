    </div>
    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="<?= base_url('assets/fontawesome/js/all.min.js') ?>"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src=" https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src=" https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="<?= base_url('assets/dist/jquery.mask.min.js') ?>"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $('#example2').DataTable();

            $('.uang').mask('000.000.000.000', {
                reverse: true
            });

            $('.datepicker').datepicker();
        });
    </script>

    <script>
        $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)
            // Kita sembunyikan dulu untuk loadingnya
            $("#loading").hide();

            $("#provinsi").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kota").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listKota"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_provinsi: $("#provinsi").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#kota").html(response.list_kota).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });
            });

            $("#kota").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kec").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listKec"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kab: $("#kota").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#kec").html(response.list_kec).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });
            });

            $("#kec").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kel").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listDesa"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kec: $("#kec").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#kel").html(response.list_desa).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });
            });

            $("#kec2").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#skl").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listSkl"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kec: $("#kec2").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#skl").html(response.list_skl).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });

            });

            $("#provinsi2").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kota2").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listKota"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_provinsi: $("#provinsi2").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#kota2").html(response.list_kota).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });
            });

            $("#kota2").change(function() { // Ketika user mengganti atau memilih data provinsi
                $("#kec2").hide(); // Sembunyikan dulu combobox kota nya
                $("#loading").show(); // Tampilkan loadingnya

                $.ajax({
                    type: "POST", // Method pengiriman data bisa dengan GET atau POST
                    url: "<?php echo base_url("santri/listKec"); ?>", // Isi dengan url/path file php yang dituju
                    data: {
                        id_kab: $("#kota2").val()
                    }, // data yang akan dikirim ke file yang dituju
                    dataType: "json",
                    beforeSend: function(e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function(response) { // Ketika proses pengiriman berhasil
                        $("#loading").hide(); // Sembunyikan loadingnya

                        // set isi dari combobox kota
                        // lalu munculkan kembali combobox kotanya
                        $("#kec2").html(response.list_kec).show();
                    },
                    error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                        alert(xhr.status + "\n" + xhr.responseText + "\n" +
                            thrownError); // Munculkan alert error
                    }
                });
            });
        });
    </script>

    </html>