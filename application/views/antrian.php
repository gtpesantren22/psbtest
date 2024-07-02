<div class="row">
    <div class="col-md-5">
        <div class="card mt-3">
            <h5 class="card-header">Buat Antrian</h5>
            <div class="card-body">

                <form action="<?= base_url('antrian/tambah') ?>" method="post" class="mb-1">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="form-group mb-2">
                                <label for="nama">Pilih Santri</label>
                                <select name="santri_id" id="santri_id" class="form-select pilih2" required>
                                    <option value=""> -pilih santri- </option>
                                    <?php foreach ($santri as $s) : ?>
                                        <option value="<?= $s->id_santri ?>"><?= $s->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group mb-2">
                            </div>
                            <div class="form-group mb-2">
                                <button type="button" class="btn btn-sm btn-success" id="btnDetail"><i class="fa fa-search"></i> Cek santri</button>
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Pilih Meja</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="meja" required value="1" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Meja 1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="meja" required value="umum" id="flexRadioDefault2">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Meja umum
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-primary btn-xl"><i class="fa fa-print"></i><br>Tambahkan dan Cetak Antrian</button>
                        </div>
                    </div>
                </form>
                <hr>
                <div class="text-center">
                    <b class="text-bold fs-1"><?= $akhir->nomor ?></b><br>
                    <small>Antrian terakhir hari ini <b><?= date('d M Y') ?></b></small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card mt-3">
            <h5 class="card-header">List Antrian Meja</h5>
            <div class="card-body">
                <div class="row">

                    <div class="col-sm-4 mb-3 mb-sm-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Meja 1
                            </div>
                            <div class="card-body">
                                <h3 class="card-title" id="akhir1"></h3>
                            </div>
                            <div class="card-footer text-body-secondary">
                                proses : <b id="proses1"></b> | selesai : <b id="selesai1"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Meja 2
                            </div>
                            <div class="card-body">
                                <h3 class="card-title" id="akhir2"></h3>
                            </div>
                            <div class="card-footer text-body-secondary">
                                proses : <b id="proses2"></b> | selesai : <b id="selesai2"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Meja 3
                            </div>
                            <div class="card-body">
                                <h3 class="card-title" id="akhir3"></h3>
                            </div>
                            <div class="card-footer text-body-secondary">
                                proses : <b id="proses3"></b> | selesai : <b id="selesai3"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Meja 4
                            </div>
                            <div class="card-body">
                                <h3 class="card-title" id="akhir4"></h3>
                            </div>
                            <div class="card-footer text-body-secondary">
                                proses : <b id="proses4"></b> | selesai : <b id="selesai4"></b>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 mb-3 mb-sm-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Meja 5
                            </div>
                            <div class="card-body">
                                <h3 class="card-title" id="akhir5"></h3>
                            </div>
                            <div class="card-footer text-body-secondary">
                                proses : <b id="proses5"></b> | selesai : <b id="selesai5"></b>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mt-3">
    <h5 class="card-header">Data Antrian Hari Ini</h5>
    <div class="card-body">
        <div class="table-responsive">
            <div class="table-responsive">
                <table class="table card-table table-vcenter text-nowrap table-sm" id="example2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Antrian</th>
                            <th>Meja</th>
                            <th>Waktu</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dataDay as $row) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td>No. <?= $row->nomor; ?></td>
                                <td>Meja <?= $row->meja; ?></td>
                                <td><?= $row->jam; ?></td>
                                <td>
                                    <!-- <a href="<?= base_url('daftar/addDaftar/') . $row->id ?>" class="btn btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <circle cx="12" cy="12" r="9"></circle>
                                            <path d="M9 12l2 2l4 -4"></path>
                                        </svg> Pilih</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modalDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Antrian Hari ini</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-sm table-borderless">
                    <tr>
                        <td>Nama</td>
                        <td><strong id="hs-nama"></strong></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><strong id="hs-desa"></strong> - <strong id="hs-kec"></strong> - <strong id="hs-kab"></strong></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#btnDetail').on('click', function() {
            var id = $('#santri_id').val();
            if (id) {
                $.ajax({
                    url: '<?= base_url("antrian/detailSantri"); ?>',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#hs-nama').text(data.nama);
                        $('#hs-desa').text(data.desa);
                        $('#hs-kec').text(data.kec);
                        $('#hs-kab').text(data.kab);
                        $('#modalDetail').modal('show');
                        // alert(data)
                    }
                });
            } else {
                alert("Pilih mahasiswa terlebih dahulu.");
            }
        });

        setInterval(loadAll, 1500);
        // meja1()

        function loadAll() {
            meja1()
            meja2()
            meja3()
            meja4()
            meja5()
        }

        function meja1() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/1'); ?>',
                dataType: 'json',
                success: function(data) {
                    
                    $('#akhir1').text(data.akhir);
                    $('#proses1').text(data.proses);
                    $('#selesai1').text(data.selesai);


                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };

        function meja2() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/2'); ?>',
                dataType: 'json',
                success: function(data) {
                    
                    $('#akhir2').text(data.akhir);
                    $('#proses2').text(data.proses);
                    $('#selesai2').text(data.selesai);

                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };

        function meja3() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/3'); ?>',
                dataType: 'json',
                success: function(data) {
                    
                    $('#akhir3').text(data.akhir);
                    $('#proses3').text(data.proses);
                    $('#selesai3').text(data.selesai);

                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };

        function meja4() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/4'); ?>',
                dataType: 'json',
                success: function(data) {
                    
                    $('#akhir4').text(data.akhir);
                    $('#proses4').text(data.proses);
                    $('#selesai4').text(data.selesai);

                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };

        function meja5() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/5'); ?>',
                dataType: 'json',
                success: function(data) {
                    
                    $('#akhir5').text(data.akhir);
                    $('#proses5').text(data.proses);
                    $('#selesai5').text(data.selesai);

                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };
    });
</script>