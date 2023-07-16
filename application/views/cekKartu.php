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
    <table>
        <tbody>
            <?php
            $counter = 0;
            foreach ($data as $d) :
                $foto = $this->db->query("SELECT * FROM foto_file WHERE nis = '$d->nis' ")->row();

                if ($counter % 2 === 0) {
                    // Baris baru dimulai
                    echo '<tr style="border-left: 3px solid blue; border-top: 3px solid blue; border-bottom: 3px solid blue;">';
                }
            ?>

                <td><img src="<?= 'https://psb.ppdwk.com/assets/berkas/' . $foto->diri ?>" height="100"></td>
                <td><?= $d->nis ?><br>
                    <?= $d->nama ?><br>
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

</body>

</html>