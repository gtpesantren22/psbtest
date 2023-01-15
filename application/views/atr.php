<div class="card mt-3">
    <h5 class="card-header">Data Penerimaan Atribut</h5>
    <div class="card-body">
        <table id="example" class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Majmu'</th>
                    <th>Tatib</th>
                    <th>KTS</th>
                    <th>Mahrom</th>
                    <th>Kes</th>
                    <th>Kalender</th>
                    <th>Pengasuh</th>
                    <th>Sr. Pes</th>
                    <th>Sr. Lem</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($baru as $row) :
                ?>
                    <tr>
                        <?= form_open('berkas/editAtr/' . $row->nis) ?>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nis; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><input class="form-check-input" type="checkbox" name="wir" <?= $row->wir === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="tatib" <?= $row->tatib === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="kts" <?= $row->kts === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="mahrom" <?= $row->mahrom === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="kes" <?= $row->kes === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="kalender" <?= $row->kalender === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="pengasuh" <?= $row->pengasuh === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="seragam" <?= $row->seragam === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td><input class="form-check-input" type="checkbox" name="seragam_l" <?= $row->seragam_l === '1' ? "checked value='1'" : "value='0'" ?>></td>
                        <td>
                            <button class="btn btn-sm btn-info" type="submit">
                                <i class="fa fa-save"></i> Simpan Data
                            </button>
                        </td>
                        <?= form_close() ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>