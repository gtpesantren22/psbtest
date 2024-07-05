<div class="card mt-3">
    <h5 class="card-header">Data Foto Santri</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <!-- <th>Alamat</th> -->
                        <th>Lembaga</th>
                        <th>Foto</th>
                        <th>Ket</th>
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
                            <!-- <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td> -->
                            <td><?= $row->lembaga; ?></td>
                            <td><?= $row->diri; ?></td>
                            <td><?= $row->ket; ?></td>
                            <td>
                                <a href="<?= base_url('berkas/detailFoto/' . $row->nis); ?>" class="btn btn-sm btn-info"><i class="fa fa-image"></i> Cek Foto</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>