<div class="card mt-3">
    <h5 class="card-header">Data Registrasi Ulang Pendaftaran</h5>
    <div class="card-body">
        <button class="btn btn-primary btn-sm mb-3" data-bs-toggle="modal" data-bs-target="#modal-large">
            Tambah Pembayaran Baru
        </button>
        <div class="table-responsive">
            <table id="example" class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Lembaga</th>
                        <th>Tanggungan</th>
                        <th>Lunas</th>
                        <th>Sisa</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($baru as $row) :
                        $byr = $this->db->query("SELECT SUM(nominal) AS jml FROM regist WHERE nis = $row->nis")->row();
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row->nama; ?></td>
                        <td><?= $row->lembaga; ?></td>
                        <td><?= rupiah($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba); ?>
                        </td>
                        <td><?= rupiah($byr->jml); ?></td>
                        <td><?= rupiah(($row->infaq + $row->buku + $row->kartu + $row->kalender + $row->seragam_pes + $row->seragam_lem + $row->orsaba) - $byr->jml); ?>
                        </td>
                        <td>
                            <a href="<?= base_url('regist/inDaftar/') . $row->nis ?>" class="btn btn-warning btn-sm">
                                <i class="fa-solid fa-file-pen"></i> Edit</a>
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
                                    <a href="<?= base_url('regist/addDaftar/') . $row->nis ?>"
                                        class="btn btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-circle-check" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
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