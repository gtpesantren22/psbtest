<div class="card mt-3">
    <h5 class="card-header">Data Penempatan Lemari</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Komplek</th>
                        <th>Kamar</th>
                        <th>Lemari</th>
                        <th>Loker</th>
                        <th>Nama</th>
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
                            <td><?= $row->komplek; ?></td>
                            <td><?= $row->kamar; ?></td>
                            <td><?= $row->lemari ?></td>
                            <td>No. <?= $row->loker; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>