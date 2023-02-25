<div class="card mt-3">
    <h5 class="card-header">Data Berkas Pendaftaran</h5>
    <div class="card-body">
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
                    foreach ($baru as $row) :
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