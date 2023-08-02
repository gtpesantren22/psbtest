<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        table {
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h2>Total : <?= $data->num_rows() ?></h2>
    <table>
        <tbody>
            <?php
            $counter = 0;
            $nmr = 1;
            foreach ($data->result() as $d) :
                $foto = $this->db->query("SELECT * FROM foto_file WHERE nis = '$d->nis' ")->row();
                $foto->diri == '' ? $ft = 'https://psbtest.ppdwk.com/assets/img/foto-kosong.jpg' :  $ft = 'https://psb.ppdwk.com/assets/berkas/' . $foto->diri;

                if ($counter % 2 === 0) {
                    // Baris baru dimulai
                    echo '<tr style="border-left: 3px solid blue; border-top: 3px solid blue; border-bottom: 3px solid blue;">';
                }
            ?>

                <td><img src="<?= $ft ?>" height="100"></td>
                <td><?= $d->nis ?><br>
                    <?= $d->nama ?><br>
                    <?= $d->lembaga ?><br>
                    <?= $d->tempat . ', ' . date('d-M-Y', strtotime($d->tanggal)) ?><br>
                    <?= $d->desa . ' - ' . $d->kec . ' - ' . $d->kab ?>
                </td>

            <?php
                if ($counter % 2 === 1) {
                    // Akhir baris
                    echo '</tr>';
                }

                $counter++;
            endforeach;

            // Menutup baris terakhir jika jumlah data ganjil
            if ($counter % 2 === 1) {
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
    <hr>
    <table>
        <thead>
            <tr>
                <td>No</td>
                <td>NIS</td>
                <td>Nama</td>
                <td>Lembaga</td>
                <td>JKL</td>
                <td>HP</td>
                <td>Alamat</td>
                <td>Tempat</td>
                <td>Tanggal</td>
                <td>Bapak</td>
                <td>Ibu</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data2->result() as $d) : ?>
                <tr>
                    <td><?= $nmr++ ?></td>
                    <td><?= $d->nis ?></td>
                    <td><?= $d->nama ?></td>
                    <td><?= $d->lembaga ?></td>
                    <td><?= $d->jkl ?></td>
                    <td><?= $d->hp ?></td>
                    <td><?= $d->desa . ' - ' . $d->kec . ' - ' . $d->kab ?></td>
                    <td><?= $d->tempat ?></td>
                    <td><?= date('Y-m-d', strtotime($d->tanggal)) ?></td>
                    <td><?= $d->bapak ?></td>
                    <td><?= $d->ibu ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</body>

</html>