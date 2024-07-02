<div class="row">
    <div class="col-md-5">
        <div class="card mt-3 text-center">
            <h5 class="card-header">Ambil Antrian</h5>
            <div class="card-body">
                <small style="font-weight: 700; font-size: 100px"><?= $akhir ? $akhir->nomor : 0 ?></small><br>
                <?php if ($akhir && $akhir->status === 'proses') { ?>
                    <input type="hidden" id="text" value="<?= 'nomor antrian, ' . $akhir->nomor . ', silahkan menuju meja ' . $akhir->meja ?>">
                    <button id="playButton" onclick="speak()" class="btn btn-primary"><i class="fa fa-bullhorn"></i> Panggil</button> |
                    <a href="<?= base_url('antrian/selesai/' . $akhir->id) ?>" onclick="return confirm('Yakin akan menyelesaikan ?')" class="btn btn-primary"><i class="fa fa-check"></i> Selesai</a>

                    <audio id="audio-before" src="<?= base_url('assets/audio/bell-in.mp3') ?>" preload="auto"></audio>
                    <audio id="audio-after" src="<?= base_url('assets/audio/bell-out.mp3') ?>" preload="auto"></audio>
                <?php } else { ?>
                    <a href="<?= base_url('antrian/ambil') ?>" onclick="return confirm('Yakin akan mengambil antrian ?')" class="btn btn-success"><i class="fa fa-arrow-circle-down"></i> Ambil Antrian Berikutnya</a>
                <?php } ?>

            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card mt-3">
            <h5 class="card-header">List Antrian Meja Saya</h5>
            <div class="card-body">
                <table id="example" class="table table-bordered table-striped table-hover table-sm">
                    <thead>
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Antrian</th>
                            <th>Waktu</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $row) : ?>
                            <tr>
                                <td>No. <?= $row->nomor ?></td>
                                <td><?= $row->jam ?></td>
                                <td><?= $row->status ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
    $(document).ready(function() {
        $('#btnDetail').on('click', function() {
            var id = $('#santri_id').val();
            if (id) {
                $.ajax({
                    url: '<?= base_url("antrian/detailSantri"); ?>',
                    method: 'POST',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        $('#hs-nama').text(data.nama);
                        $('#hs-desa').text(data.desa);
                        $('#hs-kec').text(data.kec);
                        $('#hs-kab').text(data.kab);
                        $('#modalDetail').modal('show');
                        // alert(data)
                    }
                });
            } else {
                alert("Pilih mahasiswa terlebih dahulu.");
            }
        });

        // setInterval(loadAll, 1500);

        function loadAll() {
            meja1()
        }

        function meja1() {
            $.ajax({
                type: 'GET',
                url: '<?= base_url('antrian/meja/1'); ?>',
                dataType: 'json',
                success: function(data) {

                    $('#akhir1').text(data.akhir);
                    $('#proses1').text(data.proses);
                    $('#selesai1').text(data.selesai);


                },
                error: function(xhr, status, error) {
                    alert('Gagal memuat data awal: ' + error);
                }
            })
        };

    });

    function speak() {
        // Ambil teks dari textarea
        let text = document.getElementById('text').value;

        let audioBefore = document.getElementById('audio-before');
        let audioAfter = document.getElementById('audio-after');
        let playButton = document.getElementById('playButton');

        // Cek apakah browser mendukung Web Speech API
        if ('speechSynthesis' in window) {
            let speech = new SpeechSynthesisUtterance(text);

            // Mengatur properti tambahan (opsional)
            speech.lang = 'id-ID'; // Atur bahasa
            speech.pitch = 1; // Nada suara
            speech.rate = 0.85; // Kecepatan bicara
            speech.volume = 1; // Volume

            let voices = window.speechSynthesis.getVoices();
            let femaleVoice = voices.find(voice => voice.lang === 'id-ID' && voice.name.includes('female'));
            if (femaleVoice) {
                speech.voice = femaleVoice;
            }

            playButton.disabled = true;

            // Menjalankan teks ke suara setelah audio sebelum selesai
            audioBefore.onended = function() {
                window.speechSynthesis.speak(speech);
            };

            // Menjalankan audio sesudah setelah teks selesai dibacakan
            speech.onend = function() {
                audioAfter.play();
            };

            // Mengaktifkan tombol play setelah audio sesudah selesai
            audioAfter.onended = function() {
                playButton.disabled = false;
            };

            // Memulai audio sebelum
            audioBefore.play();
        } else {
            alert("Browser Anda tidak mendukung Text-to-Speech.");
        }
    }
</script>