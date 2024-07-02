<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Detail Data Santri</h5>
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
                                        <td>Nama Bapak</td>
                                        <td>: <?= $santri->bapak ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Ibu</td>
                                        <td>: <?= $santri->ibu ?></td>
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
                                Foto Santri & Berkas Persyaratan <br>
                                <img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $foto->diri ?>" height="200">
                                <img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $berkas->kk ?>" height="200">
                                <img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $berkas->akta ?>" height="200">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <table class="table table-sm">
                                    <tr>
                                        <td>1</td>
                                        <td>Seragam Pesantren</td>
                                        <td><?= rupiah($tgn->seragam_pes) ?></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Seragam Lembaga (Khas dan Kaos Olahraga)</td>
                                        <td><?= rupiah($tgn->seragam_lem) ?></td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>ORSABA</td>
                                        <td><?= rupiah($tgn->orsaba) ?></td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>KTS, Kartu Mahrom, Kartu Kesehatan, dan Foto</td>
                                        <td><?= rupiah($tgn->kartu) ?></td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Buku Pedoman Wiridan, Perizinan & Tatib</td>
                                        <td><?= rupiah($tgn->buku) ?></td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>Kalender Pesantren</td>
                                        <td><?= rupiah($tgn->kalender) ?></td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>Uang Gedung</td>
                                        <td><?= rupiah($tgn->infaq) ?></td>
                                    </tr>
                                    <tr style="background-color: green; color: white;">
                                        <td colspan="2">TOTAL</td>
                                        <td><?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba) ?>
                                        </td>
                                    </tr>
                                </table>
                            </div> -->
                            <div class="col-md-3">
                                <h5 class="card-title">Tanggungan</h5>
                                <?php if ($tgn) { ?>
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-primary text-white avatar">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                                    <path d="M12 3v3m0 12v3" />
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Total Tanggungan
                                            </div>
                                            <div class="text-muted">
                                                <?= rupiah($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-success text-white avatar">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <circle cx="12" cy="12" r="9"></circle>
                                                    <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1">
                                                    </path>
                                                    <path d="M12 7v10"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Sudah Bayar
                                            </div>
                                            <div class="text-muted">
                                                <?= rupiah($totalBayarSm->row('nominal') + $totalBayar->row('nominal')); ?>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <span class="bg-danger text-white avatar">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-1m-2.82 1.171a2 2 0 0 0 1.82 2.829h1m2.824 2.822a2 2 0 0 1 -1.824 1.178h-2a2 2 0 0 1 -1.8 -1">
                                                    </path>
                                                    <path d="M20.042 16.045a9 9 0 0 0 -12.087 -12.087m-2.318 1.677a9 9 0 1 0 12.725 12.73">
                                                    </path>
                                                    <path d="M12 6v2m0 8v2"></path>
                                                    <path d="M3 3l18 18"></path>
                                                </svg>
                                            </span>
                                        </div>
                                        <div class="col">
                                            <div class="font-weight-medium">
                                                Kekurangan
                                            </div>
                                            <div class="text-muted">
                                                <?= rupiah(($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba) - ($totalBayarSm->row('nominal') + $totalBayar->row('nominal'))) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button onclick="window.location= '<?= base_url('regist/inDaftar/' . $santri->nis) ?>' " class="btn btn-sm btn-success">Input Pembayaran</button>
                                <?php } else { ?>
                                    <button onclick="window.location= '<?= base_url('regist/addDaftar/') . $santri->nis ?>' " class="btn btn-sm btn-warning">Input Pembayaran</button>
                                <?php } ?>
                            </div>

                            <div class="col-md-3">
                                <h5>Kamar Santri</h5>
                                <?php if ($kamar) { ?>
                                    <table>
                                        <tr>
                                            <td>Komplek</td>
                                            <td>: <?= $kamar->komplek ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kamar</td>
                                            <td>: <?= $kamar->kamar ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Lemari</td>
                                            <td>: <?= $kamar->lemari ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Loker</td>
                                            <td>: <?= $kamar->loker ?></td>
                                        </tr>
                                        <tr>
                                            <td>Wali Asuh</td>
                                            <td>: <?= $kamar->wali ?></td>
                                        </tr>
                                    </table>
                                <?php } else {
                                    echo "Belum pilih kamar";
                                } ?>
                                <br>
                                <button onclick="window.location= '<?= base_url('santri/kamar/' . $santri->nis) ?>' " class="btn btn-sm btn-success">Pilih Kamar Santri</button>
                                <hr>
                                <h5>Input nominal BP</h5>
                                <?php if ($bp) {
                                    foreach ($bp as $key) {
                                        echo rupiah($key->nominal) . ' (' . $key->ket . ')';
                                    }
                                } ?>
                                <br>
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#inputBP">Input Data</button>
                            </div>
                            <br>
                            <div class="col-md-3">
                                <h5>Pendaftaran</h5>
                                <?php if ($daftar) {
                                    echo 'Nominal : ' . rupiah($daftar->nominal);
                                } elseif ($daftarSm) {
                                    echo 'Nominal SM : ' . rupiah($daftarSm->nominal);
                                } else { ?>
                                    <button onclick="window.location='<?= base_url('daftar/addDaftar/' . $santri->nis) ?>' " class="btn btn-sm btn-success">Bayar Pendaftaran</button>
                                <?php } ?>
                                <hr>
                                <h5>Dekosan</h5>
                                <?php if ($dekos) {
                                    echo 'Tempat Kos : ' . $tmpKos[$dekos->t_kos];
                                } else { ?>
                                    <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Pilih Dekosan</button>
                                <?php } ?>
                            </div>
                            <div class="col-md-3">
                                <h5>Cetak Data</h5>
                                <a class="btn btn-primary mb-1 btn-sm" href="<?= base_url('santri/cetakFormulir/' . $santri->nis) ?>" target="_blank"><i class="fa-solid fa-print"></i> Cetak Formulir</a>
                                <a class="btn btn-warning mb-1 btn-sm" href="<?= base_url('santri/cetakIkrar/' . $santri->nis) ?>" target="_blank"><i class="fa-solid fa-print"></i> Cetak Ikrar</a>
                                <a class="btn btn-danger mb-1 btn-sm" href="<?= base_url('santri/cetakNota/' . $santri->nis) ?>" target="_blank"><i class="fa-solid fa-print"></i> Cetak Kwitansi Pembayaran</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Dekosan -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data Dekosan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('santri/addKos') ?>
            <input type="hidden" name="nis" value="<?= $santri->nis ?>">
            <input type="hidden" name="kasir" value="<?= $user->nama ?>">
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control uang" name="nominal" id="" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<!-- Add Dekosan -->
<div class="modal fade" id="inputBP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Input Data BP</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?= form_open('santri/addBP') ?>
            <input type="hidden" name="nis" value="<?= $santri->nis ?>">
            <input type="hidden" name="kasir" value="<?= $user->nama ?>">
            <div class="modal-body">
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nominal</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control uang" name="nominal" id="" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                    <div class="col-sm-10">
                        <textarea name="ket" id="" class="form-control" required></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>