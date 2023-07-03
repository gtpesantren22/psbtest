<!DOCTYPE html>
<html>

<head>
    <title>Invoice Template Design</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

        :root {
            --primary: #000000;
            --secondary: #3d3d3d;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            background: var(--secondary);
            padding: 30px;
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
        }

        @media print {
            .invoice_wrapper .body .main_table .table_header {
                background-color: var(--primary);
            }
        }

        .bold {
            font-weight: 900;
        }

        .light {
            font-weight: 100;
        }

        .wrapper {
            background: var(--white);
            padding: 20px;
        }

        .invoice_wrapper {
            /* border: 1px solid var(--primary); */
            width: 700px;
            max-width: 100%;
        }

        .invoice_wrapper .header .logo_invoice_wrap,
        .invoice_wrapper .header .bill_total_wrap {
            display: flex;
            justify-content: space-between;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 30px;
            padding-right: 30px;
        }

        .invoice_wrapper .header .logo_sec {
            display: flex;
            align-items: center;
        }

        .invoice_wrapper .header .logo_sec .title_wrap {
            margin-left: 5px;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .title {
            text-transform: uppercase;
            font-size: 18px;
            color: var(--primary);
        }

        .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
            font-size: 12px;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .sub_title2 {
            font-size: 18px;
        }

        .invoice_wrapper .header .invoice_sec,
        .invoice_wrapper .header .bill_total_wrap .total_wrap {
            text-align: right;
        }

        .invoice_wrapper .header .invoice_sec .invoice {
            font-size: 20px;
            color: var(--primary);
        }

        .invoice_wrapper .header .invoice_sec .invoice_no,
        .invoice_wrapper .header .invoice_sec .date {
            display: flex;
            width: 100%;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
        .invoice_wrapper .header .invoice_sec .date span:first-child {
            width: 70px;
            text-align: left;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
        .invoice_wrapper .header .invoice_sec .date span:last-child {
            width: calc(100% - 70px);
        }

        .invoice_wrapper .header .bill_total_wrap .total_wrap .price,
        .invoice_wrapper .header .bill_total_wrap .bill_sec .name {
            color: var(--primary);
            font-size: 20px;
        }

        /* .invoice_wrapper .body .main_table .table_header {
            background: var(--primary);
        }

        .invoice_wrapper .body .main_table .table_header .row {
            color: var(--white);
            font-size: 18px;
            border-bottom: 0px;
        } */

        /* .invoice_wrapper .body .main_table .row {
            display: flex;
            border-bottom: 1px solid var(--secondary);
        }

        .invoice_wrapper .body .main_table .row .col {
            padding: 10px;
        }

        .invoice_wrapper .body .main_table .row .col_no {
            width: 5%;
        }

        .invoice_wrapper .body .main_table .row .col_des {
            width: 45%;
        } */

        /* .invoice_wrapper .body .main_table .row .col_price {
            width: 20%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_qty {
            width: 10%;
            text-align: center;
        } */

        /* .invoice_wrapper .body .main_table .row .col_total {
            width: 20%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap {
            display: flex;
            justify-content: space-between;
            padding: 5px 0 30px;
            align-items: flex-end;
        } */

        .invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec {
            padding-left: 30px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec {
            width: 30%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p {
            display: flex;
            width: 100%;
            padding-bottom: 5px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span {
            padding: 0 10px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child {
            width: 60%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child {
            width: 40%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span {
            background: var(--primary);
            padding: 10px;
            color: #fff;
        }

        .invoice_wrapper .footer {
            padding: 30px;
        }

        .invoice_wrapper .footer>p {
            color: var(--primary);
            text-decoration: underline;
            font-size: 18px;
            padding-bottom: 5px;
        }

        .invoice_wrapper .footer .terms .tc {
            font-size: 16px;
        }

        table {
            border-collapse: collapse;
            border-top: 1px solid #999;
            /* border-bottom: 1px solid #999; */
            font-family: Arial, sans-serif;
            font-size: 16px;
            width: 100%;
            caption-side: top;
            margin-top: 5px;
        }

        caption,
        table th {
            font-weight: bold;
            padding: 5px;
            /* color: #fff; */
            /* background-color: #2A72BA; */
            border-top: 1px black solid;
            border-bottom: 1px black solid;
        }

        caption,
        table td {
            padding: 3px;
            /* border-top: 1px black solid; */
            /* border-bottom: 1px black solid; */
            /* text-align: center; */
        }

        caption,
        table tfoot {
            font-weight: bold;
            padding: 5px;
            /* color: #fff; */
            /* background-color: #2A72BA; */
            border-top: 1px black solid;
            /* border-bottom: 1px black solid; */
        }

        caption {
            font-weight: bold;
            font-style: italic;
        }

        table .left {
            text-align: left;
            padding: 7px;
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    <div class="logo_sec">
                        <img src="<?= base_url('assets/img/logo1.png') ?>" height="70" alt="code logo">
                        <div class="title_wrap">
                            <p class="title bold">KWITANSI PELUNASAN PENDAFTARAN</p>
                            <p class="sub_title2">PANITIA PENERIMAAN SANTRI BARU (PSB) 2023/2024</p>
                            <p class="sub_title2">Pondok Pesantren Darul Lughah Wal Karomah</p>
                            <p class="sub_title">Jl.Mayjend Pandjaitan No. 12, Sidomukti - Kraksaan Probolinggo (67682)</p>
                        </div>
                    </div>
                    <!-- <div class="invoice_sec">
                        <p class="invoice bold">INVOICE</p>
                        <p class="invoice_no">
                            <span class="bold">Invoice</span>
                            <span>#3488</span>
                        </p>
                        <p class="date">
                            <span class="bold">Date</span>
                            <span>08/Jan/2022</span>
                        </p>
                    </div> -->
                </div>
                <hr>
                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <!-- <p>#<?= $data->nis ?></p> -->
                        <p class="bold name"><?= $data->nama ?></p>
                        <span>
                            <?= $data->desa . ' - ' . $data->kec . ' - ' . $data->kab ?><br />
                            <?= $data->lembaga . ' - GEL. ' . $data->gel ?>
                        </span>
                    </div>
                    <!-- <div class="total_wrap">
                        <p>Total Due</p>
                        <p class="bold price">USD: $1200</p>
                    </div> -->
                    <div class="invoice_sec">
                        <p class="invoice bold">#<?= $data->nis ?></p>
                        <p class="invoice_no">
                            <span class="bold">Cetak</span>
                            <span><?= date('d/M/Y') ?></span>
                        </p>
                        <p class="date">
                            <span class="bold">Jam</span>
                            <span><?= date('H:i:s') ?></span>
                        </p>
                    </div>
                </div>
            </div>
            <br>
            <div class="body">
                <h3 style="margin-left: 15px;">A. Registrasi Ulang</h3>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: left;">Jenis Item</th>
                            <th style="text-align: right;">Jumlah (Rp.)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center;">1.</td>
                            <td style="text-align: left;">Seragam Pesantren</td>
                            <td style="text-align: right;"><?= number_format($tgn->seragam_pes, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">2.</td>
                            <td style="text-align: left;">Seragam Lembaga (Khas dan Kaos Olahraga)</td>
                            <td style="text-align: right;"><?= number_format($tgn->seragam_lem, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">3.</td>
                            <td style="text-align: left;">ORSABA</td>
                            <td style="text-align: right;"><?= number_format($tgn->orsaba, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">4.</td>
                            <td style="text-align: left;">KTS, Kartu Mahrom, Kartu Kesehatan, dan Foto</td>
                            <td style="text-align: right;"><?= number_format($tgn->kartu, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">5.</td>
                            <td style="text-align: left;">Buku Pedoman Wiridan, Perizinan & Tatib</td>
                            <td style="text-align: right;"><?= number_format($tgn->buku, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">6.</td>
                            <td style="text-align: left;">Kalender Pesantren</td>
                            <td style="text-align: right;"><?= number_format($tgn->kalender, 2) ?></td>
                        </tr>
                        <tr>
                            <td style="text-align: center;">7.</td>
                            <td style="text-align: left;">Uang Gedung</td>
                            <td style="text-align: right;"><?= number_format($tgn->infaq, 2) ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td style="text-align: right;">TOTAL</td>
                            <td style="text-align: right;"> <?= number_format($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba, 2) ?> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right;">Lunas</td>
                            <td style="text-align: right;"> <?= number_format($totalBayarSm->row('nominal') + $totalBayar->row('nominal'), 2) ?> </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td style="text-align: right;">Sisa</td>
                            <td style="text-align: right;"> <?= number_format(($tgn->infaq + $tgn->buku + $tgn->kartu + $tgn->kalender + $tgn->seragam_pes + $tgn->seragam_lem + $tgn->orsaba) - ($totalBayarSm->row('nominal') + $totalBayar->row('nominal')), 2) ?> </td>
                        </tr>
                    </tfoot>
                </table>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: left;">Nominal</th>
                            <th style="text-align: left;">Tgl Bayar</th>
                            <th style="text-align: left;">Penerima</th>
                            <th style="text-align: left;">Via</th>
                            <!-- <th>Waktu Input</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bayar->result() as $row1) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= rupiah($row1->nominal); ?></td>
                                <td><?= $row1->tgl_bayar; ?></td>
                                <td><?= $row1->kasir; ?></td>
                                <td><?= $row1->via; ?></td>
                                <!-- <td><?= $row1->created; ?></td> -->
                                <td></td>
                            </tr>

                        <?php
                        endforeach;
                        foreach ($bayarSm->result() as $row) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= rupiah($row->nominal); ?></td>
                                <td><?= $row->tgl_bayar; ?></td>
                                <td><?= $row->kasir; ?></td>
                                <td><?= $row->via; ?></td>
                                <!-- <td><?= $row->created; ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br>
                <h3 style="margin-left: 15px;">B. Biaya Pendaftaran</h3>
                <table>
                    <thead>
                        <tr>
                            <th style="text-align: center;">No</th>
                            <th style="text-align: left;">Nominal</th>
                            <th style="text-align: left;">Tgl Bayar</th>
                            <th style="text-align: left;">Penerima</th>
                            <th style="text-align: left;">Via</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftar as $row) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= rupiah($row->nominal); ?></td>
                                <td><?= $row->tgl_bayar; ?></td>
                                <td><?= $row->kasir; ?></td>
                                <td><span class="badge text-bg-success"><?= $row->via; ?></span></td>
                            </tr>
                        <?php
                        endforeach;
                        foreach ($daftarSm as $row) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= rupiah($row->nominal); ?></td>
                                <td><?= $row->tgl_bayar; ?></td>
                                <td><?= $row->kasir; ?></td>
                                <td><span class="badge text-bg-success"><?= $row->via; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <br><br>

                <p style="color: red;">Potong disini</p>
                <hr style="color: red;">
                <br>
                <h3 style="margin-left: 15px;">C. Dekosan Makan</h3>
                <br><br>


                <h4>Nama : <?= $data->nama ?></h4>
                <h4>Alamat : <?= $data->desa . ' - ' . $data->kec . ' - ' . $data->kab ?></h4>
                <h4>Lembaga : <?= $data->lembaga ?></h4>
                <h4>Kamar : <?= $km->komplek . " / " . $km->kamar . " / " . $km->lemari . " / No. " . $km->loker; ?> (<?= $km->wali; ?>)</h4>
                <h4>Tmp Kos : <?php foreach ($dekos as $rw) {
                                    echo $tmpKos[$rw->t_kos];
                                } ?></h4>

                <br>
                <table>
                    <thead>
                        <th style="text-align: center;">No</th>
                        <th style="text-align: left;">Nominal</th>
                        <th style="text-align: left;">Tgl Bayar</th>
                        <th style="text-align: left;">Penerima</th>
                        <th style="text-align: left;">Tempat Kos</th>
                    </thead>

                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dekos as $row) :
                        ?>
                            <tr>
                                <td style="text-align: center;"><?= $no++; ?></td>
                                <td><?= rupiah($row->nominal); ?></td>
                                <td><?= $row->tgl; ?></td>
                                <td><?= $row->kasir; ?></td>
                                <td><?= $tmpKos[$row->t_kos] ?></td>
                            </tr>
                        <?php
                        endforeach;
                        foreach ($daftarSm as $row) :
                        ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= rupiah($row->nominal); ?></td>
                                <td><?= $row->tgl_bayar; ?></td>
                                <td><?= $row->kasir; ?></td>
                                <td><span class="badge text-bg-success"><?= $row->via; ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <br><br>
            <p style="margin-left: 30px;">Kraksaan, <?= tanggalIndo2(date('d-M-Y')) ?></p>
            <br><br>
            <div class="footer">
                <p><?= $user->nama ?></p>
                <div class="terms">
                    <p class="tc bold"><?= $user->jabatan ?></p>
                </div>
            </div>
        </div>
    </div>


</body>

<script>
    window.print();
</script>

</html>