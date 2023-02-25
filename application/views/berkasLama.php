<div class="card mt-3">
    <h5 class="card-header">Data Berkas Pendaftaran - Santri Lanjutan</h5>
    <div class="card-body">
        <button class="btn btn-success btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#modal-large">
            Tambah Pembayaran Baru
        </button>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <!-- <th>Alamat</th> -->
                        <th>Tujuan</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($lama as $row) :
                        $akta = $row->akta != '' ? 14.3 : 0;
                        $kk = $row->kk != '' ? 14.3 : 0;
                        $ktp_ayah = $row->ktp_ayah != '' ? 14.3 : 0;
                        $ktp_ibu = $row->ktp_ibu != '' ? 14.3 : 0;
                        $skl = $row->skl != '' ? 14.3 : 0;
                        $ijazah = $row->ijazah != '' ? 14.3 : 0;
                        $kip = $row->kip != '' ? 14.3 : 0;
                        $ttl = round(($akta + $kk + $ktp_ayah + $ktp_ibu + $skl + $ijazah + $kip), 0);
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nis; ?></td>
                            <td><?= $row->nama; ?></td>
                            <!-- <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td> -->
                            <td><?= $row->lembaga; ?></td>
                            <td>
                                <div class="col-auto">
                                    <small><?= $ttl ?>%</small>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm">
                                        <div class="progress-bar" style="width: <?= $ttl ?>%" role="progressbar" aria-valuenow="<?= $ttl ?>" aria-valuemin="0" aria-valuemax="100" aria-label="<?= $ttl ?>% Complete">
                                            <span class="visually-hidden"><?= $ttl ?>% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="<?= base_url('berkas/detail/' . $row->nis); ?>" class="btn btn-sm btn-info"><i class="fa fa-file"></i> Cek Berkas</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-large" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pembayaran Baru</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap table-sm" id="example2">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Lembaga</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($lamaData as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                    <td><?= $row->lembaga; ?></td>
                                    <td>
                                        <a href="<?= base_url('berkas/addLamaBerkas/') . $row->nis ?>" class="btn btn-success btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="12" cy="12" r="9"></circle>
                                                <path d="M9 12l2 2l4 -4"></path>
                                            </svg> Pilih</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>