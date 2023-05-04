<div class="card mt-3">
    <h5 class="card-header">Data Santri Lanjutan</h5>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenkel</th>
                        <th>Gel</th>
                        <th>No. HP</th>
                        <th>Lembaga Tujuan</th>
                        <th>Status</th>
                        <td>#</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($baru as $row) :
                    ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->nis; ?></td>
                            <td><?= $row->nama; ?></td>
                            <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                            <td><?= $row->jkl; ?></td>
                            <td><?= $row->gel; ?></td>
                            <td><?= $row->hp; ?></td>
                            <td><?= $row->lembaga; ?></td>
                            <td><?= $row->stts === 'Terverifikasi' ? "<span class='badge text-bg-success'>Terverifikasi</span>" : "<span class='badge text-bg-danger'>Belum Terverifikasi</span>" ?>
                            </td>
                            <td>
                                <div class="btn-group btn-sm btn-success" role="group">
                                    <label for="btn-radio-dropdown-dropdown" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-settings" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                            </path>
                                            <circle cx="12" cy="12" r="3"></circle>
                                        </svg> Settings
                                    </label>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?= base_url('santri/edit/' . $row->nis); ?>">Edit</a>
                                        <!-- <a class="dropdown-item" href="<?= base_url('santriAdm/send/' . $row->nis); ?>">Japri</a>
                                    <a class="dropdown-item" href="<?= base_url('santriAdm/sendGp/' . $row->nis); ?>">Group</a>
                                    <a class="dropdown-item" href="<?= base_url('santriAdm/sendAkun/' . $row->nis); ?>">Akun</a> -->
                                    </div>
                                </div>
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
                            foreach ($nobp as $row) :
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->nama; ?></td>
                                    <td><?= $row->desa . ' - ' . $row->kec . ' - ' . $row->kab; ?></td>
                                    <td><?= $row->lembaga; ?></td>
                                    <td>
                                        <a href="<?= base_url('daftar/addDaftar/') . $row->nis ?>" class="btn btn-success btn-sm">
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