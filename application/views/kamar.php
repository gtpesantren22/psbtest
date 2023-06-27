<div class="row">
    <div class="col-12">
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Detail Data Santri</h5>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <?php foreach ($komplek as $komplek) : ?>
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">Komplek <?= $komplek->komplek ?></h3>

                                            </div>
                                            <div class="card-body">
                                                <?php
                                                $bonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$komplek->komplek' GROUP BY kamar ")->result();
                                                foreach ($bonang as $dtbo) : ?>
                                                    <div class="row g-3">
                                                        <button class="btn btn-outline-primary btn-pill btn-sm">Kamar <?= $dtbo->kamar ?></button>
                                                        <?php
                                                        $kmrbonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$dtbo->komplek' AND kamar = '$dtbo->kamar' GROUP BY lemari ")->result();
                                                        foreach ($kmrbonang as $lmrbon) :
                                                        ?>
                                                            <div class="col-6">
                                                                <h4>Lemari <?= $lmrbon->lemari ?></h4>
                                                                <div class="row g-3">
                                                                    <?php
                                                                    $lokerbonang = $this->db->query("SELECT * FROM lemari_data WHERE komplek = '$dtbo->komplek' AND kamar = '$dtbo->kamar' AND lemari = '$lmrbon->lemari' ")->result();
                                                                    foreach ($lokerbonang as $loker) :
                                                                        $nis = $loker->nis == '' ? '00000' : $loker->nis;
                                                                        $ident = $this->db->query("SELECT nis,nama FROM tb_santri WHERE nis = $nis ")->row();
                                                                        $foto = $this->db->query("SELECT diri FROM foto_file WHERE nis = $nis ")->row();
                                                                        $nama = $ident ? $ident->nama : 'Pilih Loker Ini';
                                                                        $bg = $ident ? 'green' : 'red';
                                                                        $img = $foto ? $foto->diri : '';
                                                                    ?>
                                                                        <div class="col-6">
                                                                            <div class="row g-3 align-items-center">
                                                                                <a href="<?= base_url('kamar/detail/' . $loker->id) ?>" class="col-auto">
                                                                                    <span class="avatar" style="background-image: url(<?= 'https://psb.ppdwk.com/assets/berkas/' . $img ?>)">
                                                                                        <span class="badge bg-<?= $bg ?>"></span></span>
                                                                                </a>
                                                                                <div class="col text-truncate">
                                                                                    <?php if ($loker->nis <> '') { ?>
                                                                                        <span class="text-reset d-block text-truncate"><?= $nama ?></span>
                                                                                    <?php } else { ?>
                                                                                        <a onclick="return confirm('Yakin akan pilih kamar ini ?')" href="<?= base_url('santri/selectKamar/' . $santri->nis . '/' . $loker->id) ?>" class="text-reset d-block text-truncate"><?= $nama ?></a>
                                                                                    <?php } ?>
                                                                                    <div class="text-muted text-truncate mt-n1"><?= $loker->lemari . '  Loker : ' . $loker->loker ?><br>
                                                                                        Wali Asuh : <?= $loker->wali ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        <hr>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>