<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Detail Identitas Santri</h5>
            </div>
            <div class="card-body">
                <?php if ($this->session->flashdata('err')) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('err') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Identitas Santri</h5>
                        <div class="row">
                            <div class="col-md-7">
                                <table class="table table-sm">
                                    <tr>
                                        <td>NIK</td>
                                        <td>: <?= $santri->nik ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. KK</td>
                                        <td>: <?= $santri->no_kk ?></td>
                                    </tr>
                                    <tr>
                                        <td>NISN</td>
                                        <td>: <?= $santri->nisn ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <?= $santri->nama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tetala</td>
                                        <td>: <?= $santri->tempat . ', ' . tanggalIndo2($santri->tanggal) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td>: <?= $santri->jln . ' RT/RW ' . $santri->rt . '/' . $santri->rw . ' ' . $santri->desa . ' - ' . $santri->kec . ' - ' . $santri->kab ?></td>
                                    </tr>
                                    <tr>
                                        <td>Lemabaga</td>
                                        <td>: <?= $santri->lembaga ?></td>
                                    </tr>
                                    <tr>
                                        <td>Agama</td>
                                        <td>: <?= $santri->agama ?></td>
                                    </tr>
                                    <tr>
                                        <td>Anak ke</td>
                                        <td>: <?= $santri->anak_ke ?> dari <?= $santri->jml_sdr ?> bersaudara</td>
                                    </tr>
                                    <tr>
                                        <td>No. HP</td>
                                        <td>: <?= $santri->hp ?></td>
                                    </tr>
                                </table>
                                <button type="button" class="btn btn-warning" onclick="window.location = '<?= base_url('santri/edit/' . $santri->nis) ?>' "><i class="fa-solid fa-edit"></i> Edit Data Santri</button>
                                <button type="button" class="btn btn-success" onclick="window.location = '<?= base_url('santri/kirim/' . $santri->nis) ?>' "><i class="fa-solid fa-send"></i> Kirim Data</button>
                            </div>
                            <div class="col-md-5">
                                <table class="table table-sm">
                                    <tr>
                                        <td>NIK ayah</td>
                                        <td>: <?= $santri->a_nik ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ayah</td>
                                        <td>: <?= $santri->bapak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tetala</td>
                                        <td>: <?= $santri->a_tempat . ', ' . tanggalIndo2($santri->a_tanggal) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>: <?= $santri->a_pkj ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td>: <?= $santri->a_pend ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?= $santri->a_stts ?></td>
                                    </tr>
                                    <tr>
                                        <td>NIK Ibu</td>
                                        <td>: <?= $santri->i_nik ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>: <?= $santri->ibu ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tetala</td>
                                        <td>: <?= $santri->i_tempat . ', ' . tanggalIndo2($santri->i_tanggal) ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pekerjaan</td>
                                        <td>: <?= $santri->i_pkj ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pendidikan</td>
                                        <td>: <?= $santri->i_pend ?></td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                        <td>: <?= $santri->i_stts ?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>