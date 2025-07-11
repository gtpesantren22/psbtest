<div class="card mt-3">
    <h5 class="card-header">
        Data Kirim ke D'Pontren
        <button class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih Santri</button>
        &nbsp;-&nbsp;
        <a href="cekKartu/Laki-laki" target="_blank" class="btn btn-warning btn-sm">Cek Data Putra</a>
        <a href="cekKartu/Perempuan" target="_blank" class="btn btn-warning btn-sm">Cek Data Santri Putri</a>

    </h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Bapak</th>
                        <th>Ibu</th>
                        <th>Lembaga</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dataHasil as $row) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nis; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                            <td><?= $row->bapak; ?></td>
                            <td><?= $row->ibu; ?></td>
                            <td><?= $row->lembaga; ?> <?= $row->ket == 'baru' ? "<span class='badge bg-primary'>Baru</span>" : "<span class='badge bg-danger'>Lama</span>" ?></td>
                            <td>
                                <button class="btn btn-sm btn-warning" onclick="window.location = '<?= base_url('santri/cekData/' . $row->nis) ?>' ">Cek</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php if ($this->session->flashdata('ok')) : ?>
    <div class="alert alert-success"><?= $this->session->flashdata('ok') ?></div>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <div class="alert alert-danger"><?= $this->session->flashdata('error') ?></div>
<?php endif; ?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Data Santri</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="example2" class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Lembaga</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nis; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                    <td><?= $row->lembaga; ?></td>
                                    <td><?= $row->stts == 'Terverifikasi' ? "<span class='badge bg-success'>Terverifikasi</span>" : "<span class='badge bg-danger'>Belum</span>" ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-warning" onclick="window.location = '<?= base_url('santri/cekData/' . $row->nis) ?>' ">Pilih</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>