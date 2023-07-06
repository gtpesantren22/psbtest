<div class="card mt-3">
    <h5 class="card-header">
        Data Kirim ke D'Pontren
        <button class="btn btn-primary btn-sm float-right" data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih Santri</button>
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
                            <td><?= $row->lembaga; ?></td>
                            <td>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

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