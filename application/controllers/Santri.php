<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Santri extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('SantriModel', 'model');
		$this->load->model('RegistModel', 'modelTgn');
		$this->load->model('Auth_model');
		$this->load->model('ProvinsiModel');
		$this->load->model('KotaModel');
		$this->load->model('KecModel');
		$this->load->model('DesaModel');
		$this->load->model('SklModel');


		$user = $this->Auth_model->current_user();
		if (!$this->Auth_model->current_user()) {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['baru'] = $this->model->baru()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('head', $data);
		$this->load->view('baru', $data);
		$this->load->view('foot');
	}

	public function lanjut()
	{
		$data['baru'] = $this->model->lama()->result();
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$this->load->view('head', $data);
		$this->load->view('lama', $data);
		$this->load->view('foot');
	}

	public function edit($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->santriNis($nis)->row();
		$data['agama'] = $this->model->agama()->result();

		$data['pend'] = $this->model->pend()->result();
		$data['pkj'] = $this->model->pkj()->result();
		$data['hasil'] = $this->model->hasil()->result();
		$data['provinsi'] = $this->ProvinsiModel->view();

		$this->load->view('head', $data);
		$this->load->view('detail', $data);
		$this->load->view('foot');
	}

	public function listKota()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_provinsi = $this->input->post('id_provinsi');

		$kota = $this->KotaModel->viewByProvinsi($id_provinsi);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kabupaten/Kota-</option>";

		foreach ($kota as $data) {
			$lists .= "<option value='" . $data->id_kab . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kota' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listKec()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kab = $this->input->post('id_kab');

		$kec = $this->KecModel->viewById($id_kab);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kecamatan-</option>";

		foreach ($kec as $data) {
			$lists .= "<option value='" . $data->id_kec . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_kec' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listDesa()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kec = $this->input->post('id_kec');

		$desa = $this->DesaModel->viewById($id_kec);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Kelurahan/Desa-</option>";

		foreach ($desa as $data) {
			$lists .= "<option value='" . $data->id_kel . "'>" . $data->nama . "</option>"; // Tambahkan tag option ke variabel $lists
		}

		$callback = array('list_desa' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function listSkl()
	{
		// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kec = $this->input->post('id_kec');

		$desa = $this->SklModel->viewById($id_kec);

		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>-Pilih Sekolah-</option>";

		// $a = "var npsn = new Array();\n;";
		// $b = "var nama = new Array();\n;";


		foreach ($desa as $data) {
			$lists .= "<option value='" . $data->npsn . "'>" . $data->npsn . " - " . $data->nama . " - " . $data->desa  . "</option>"; // Tambahkan tag option ke variabel $lists
			// $a .= "npsn['" . $data->npsn . "'] = {npsn:'" . addslashes($data->npsn) . "'};\n";
			// $b .= "nama['" . $data->npsn . "'] = {nama:'" . addslashes($data->nama) . "'};\n";
		}

		$callback = array('list_skl' => $lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
	}

	public function get_kab()
	{
		$id_provinsi = $this->input->post('id_provinsi');
		$data = $this->DaftarModel->getKab($id_provinsi);
		echo json_encode($data);
	}

	public function get_kec()
	{
		$id_kab = $this->input->post('id_kab');
		$data = $this->DaftarModel->getKec($id_kab);
		echo json_encode($data);
	}

	public function get_kel()
	{
		$id_kec = $this->input->post('id_kec');
		$data = $this->DaftarModel->getKel($id_kec);
		echo json_encode($data);
	}

	public function get_skl()
	{
		$id_kec = $this->input->post('skl');
		$data = $this->SklModel->getKel($id_kec);
		echo json_encode($data);
	}

	public function saveIdentitas()
	{

		$nis = $this->input->post('nis');

		$data = [
			'nik' => $this->input->post('nik', true),
			'no_kk' => $this->input->post('no_kk', true),
			'nisn' => $this->input->post('nisn', true),
			'nama' => $this->input->post('nama', true),
			'tempat' => $this->input->post('tempat', true),
			'tanggal' => $this->input->post('tanggal', true) . '-' . $this->input->post('bulan', true) . '-' . $this->input->post('tahun', true),
			'lembaga' => $this->input->post('lembaga', true),
			'jkl' => $this->input->post('jkl', true),
			'agama' => $this->input->post('agama', true),
			'anak_ke' => $this->input->post('anak_ke', true),
			'jml_sdr' => $this->input->post('jml_sdr', true)
		];

		$this->model->edit('tb_santri', $data, $nis);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santri/edit/' . $nis);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santri/edit/' . $nis);
		}
	}

	public function saveMahrom()
	{
		$data = [
			'a_nik' => $this->input->post('a_nik', true),
			'bapak' => strtoupper($this->input->post('bapak', true)),
			'a_tempat' => strtoupper($this->input->post('a_tempat', true)),
			'a_tanggal' => $this->input->post('tanggal', true) . '-' . $this->input->post('bulan', true) . '-' . $this->input->post('tahun', true),
			'a_pend' => $this->input->post('a_pend', true),
			'a_pkj' => $this->input->post('a_pkj', true),
			'a_hasil' => $this->input->post('a_hasil', true),
			'a_stts' => $this->input->post('a_stts', true),

			// IBU
			'i_nik' => $this->input->post('i_nik', true),
			'ibu' => strtoupper($this->input->post('ibu', true)),
			'i_tempat' => strtoupper($this->input->post('i_tempat', true)),
			'i_tanggal' => $this->input->post('tanggal_i', true) . '-' . $this->input->post('bulan_i', true) . '-' . $this->input->post('tahun_i', true),
			'i_pend' => $this->input->post('i_pend', true),
			'i_pkj' => $this->input->post('i_pkj', true),
			'i_hasil' => $this->input->post('i_hasil', true),
			'i_stts' => $this->input->post('i_stts', true)
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santri/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santri/edit/' . $where);
		}
	}

	public function saveAddres()
	{
		if ($this->input->post('kelurahan') === '') {
			$almt = explode('-', $this->input->post('alamat'));
			$provOk = $almt[3];
			$kabOk = $almt[2];
			$kecOk = $almt[1];
			$kelOk = $almt[0];
		} else {
			$provinsi = $this->input->post('provinsi', TRUE);
			$kabupaten = $this->input->post('kabupaten', TRUE);
			$kecamatan = $this->input->post('kecamatan', TRUE);
			$kelurahan = $this->input->post('kelurahan', TRUE);

			$pr = $this->db->query("SELECT nama FROM provinsi WHERE id_prov = '$provinsi' ")->row();
			$provOk = $pr->nama;
			$kb = $this->db->query("SELECT nama FROM kabupaten WHERE id_kab = '$kabupaten' ")->row();
			$kabOk = $kb->nama;
			$kc = $this->db->query("SELECT nama FROM kecamatan WHERE id_kec = '$kecamatan' ")->row();
			$kecOk = $kc->nama;
			$kl = $this->db->query("SELECT nama FROM kelurahan WHERE id_kel = '$kelurahan' ")->row();
			$kelOk = $kl->nama;
		}

		$data = [
			'jln' => $this->input->post('jln', true),
			'rt' => $this->input->post('rt', true),
			'rw' => $this->input->post('rw', true),
			'kd_pos' => $this->input->post('kd_pos', true),
			'desa' => $kelOk,
			'kec' => $kecOk,
			'kab' => $kabOk,
			'prov' => $provOk
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santri/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santri/edit/' . $where);
		}
	}

	public function saveUniv()
	{
		$npsn = $this->input->post('npsn');
		$dtSkl = $this->model->getSkl($npsn);

		$data = [
			'npsn' => $npsn,
			'asal' => $dtSkl->nama,
			'a_asal' => $dtSkl->alamat . ', Desa/Kel. ' . $dtSkl->desa
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santri/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santri/edit/' . $where);
		}
	}

	public function saveOther()
	{

		$data = [
			'hp' => $this->input->post('hp', true),
			'jenis' => $this->input->post('jenis', true),
			'tinggal' => $this->input->post('tinggal', true)
		];

		$where = $this->input->post('nis', true);

		$this->model->edit('tb_santri', $data, $where);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('santri/edit/' . $where);
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('santri/edit/' . $where);
		}
	}

	public function detail($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['santri'] = $this->model->santriNis($nis)->row();
		$data['foto'] = $this->model->getBy('foto_file', 'nis', $nis)->row();
		$data['berkas'] = $this->model->getBy('berkas_file', 'nis', $nis)->row();
		$data['kamar'] = $this->model->getBy('lemari_data', 'nis', $nis)->row();

		$data['tgn'] = $this->modelTgn->tgnNis($nis)->row();

		$data['bayarSm'] = $this->model->getBy('regist_sm', 'nis', $nis);
		$data['bayar'] = $this->model->getBy('regist', 'nis', $nis);

		$data['totalBayarSm'] = $this->model->getBySum('regist_sm', 'nis', $nis, 'nominal');
		$data['totalBayar'] = $this->model->getBySum('regist', 'nis', $nis, 'nominal');

		$data['tangg'] = $this->modelTgn->tgnNis($nis)->row();

		$data['dekos'] = $this->model->getBy('dekos', 'nis', $nis)->row();
		$data['tmpKos'] = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

		$data['daftar'] = $this->model->getBy('bp_daftar', 'nis', $nis)->row();
		$data['daftarSm'] = $this->model->getBy('bp_daftar_sm', 'nis', $nis)->row();

		$this->load->view('head', $data);
		$this->load->view('lengkap', $data);
		$this->load->view('foot');
	}

	public function kamar($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['santri'] = $this->model->santriNis($nis)->row();

		// $data['kamar'] = $this->model->getBy('lemari_data', 'nis', $nis)->row();
		$data['komplek'] = $this->model->getByGroup('lemari_data', 'jkl', $data['santri']->jkl, 'komplek')->result();

		$this->load->view('head', $data);
		$this->load->view('kamar', $data);
		$this->load->view('foot');
	}

	public function selectKamar($nis, $idl)
	{

		$data = ['nis' => $nis];
		$cek = $this->model->getBy('lemari_data', 'nis', $nis)->num_rows();
		if ($cek > 0) {
			$this->session->set_flashdata('err', 'Maaf. Santri ini sudah memilih lemari. Silahkan menghubungi operator');
			redirect('santri/detail/' . $nis);
		} else {
			$this->model->update('lemari_data', $data, 'id', $idl);
			if ($this->db->affected_rows() > 0) {
				redirect('santri/detail/' . $nis);
			} else {
				redirect('santri/detail/' . $nis);
			}
		}
	}

	public function cetakFormulir($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$data['pn'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->santriNis($nis)->row();
		$data['km'] = $this->model->getBy('lemari_data', 'nis', $nis)->row();
		$data['dekos'] = $this->model->getBy('dekos', 'nis', $nis)->row();
		$data['tmpKos'] = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

		$this->load->view('formulir2', $data);
	}
	public function cetakIkrar($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();

		$data['pn'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->santriNis($nis)->row();
		$this->load->view('ikrar', $data);
	}

	public function cetakNota($nis)
	{
		$data['judul'] = 'santri';
		$data['user'] = $this->Auth_model->current_user();
		$data['tgn'] = $this->modelTgn->tgnNis($nis)->row();

		$data['totalBayarSm'] = $this->model->getBySum('regist_sm', 'nis', $nis, 'nominal');
		$data['totalBayar'] = $this->model->getBySum('regist', 'nis', $nis, 'nominal');

		$data['bayarSm'] = $this->model->getBy('regist_sm', 'nis', $nis);
		$data['bayar'] = $this->model->getBy('regist', 'nis', $nis);

		$data['daftarSm'] = $this->model->getBy('bp_daftar_sm', 'nis', $nis)->result();
		$data['daftar'] = $this->model->getBy('bp_daftar', 'nis', $nis)->result();

		$data['dekos'] = $this->model->getBy('dekos', 'nis', $nis)->result();
		$data['tmpKos'] = array("", "Kantin", "Gus Zaini", "Ny. Farihah", "Ny. Zahro", "Ny. Sa'adah", "Ny. Mamjudah", "Ny. Naily Z.", "Ny. Lathifah");

		$data['pn'] = $this->Auth_model->current_user();
		$data['data'] = $this->model->santriNis($nis)->row();
		$data['km'] = $this->model->getBy('lemari_data', 'nis', $nis)->row();

		$this->load->view('nota', $data);
	}

	public function addKos()
	{
		$nis = $this->input->post('nis', true);
		$nominal = rmRp($this->input->post('nominal', true));
		$santri = $this->model->getBy('tb_santri', 'nis', $nis)->row();

		$cc = $this->db->query("SELECT * FROM dekos WHERE jkl = '$santri->jkl' ORDER BY id_kos DESC LIMIT 1")->row();
		$tmp = $cc ? $cc->t_kos : '';
		if ($tmp == '') {
			if ($santri->jkl == 'Laki-laki') {
				$tm = 1;
			} else {
				$tm = 4;
			}
		} elseif ($tmp == 3) {
			$tm = 1;
		} elseif ($tmp == 5) {
			$tm = 8;
		} elseif ($tmp == 6) {
			$tm = 8;
		} elseif ($tmp == 7) {
			$tm = 8;
		} elseif ($tmp == 8) {
			$tm = 4;
		}
		// elseif ($tmp == 5) {
		//     $tm = 7;
		// }
		else {
			$tm = $tmp + 1;
		}

		$data = [
			'nis' => $nis,
			'jkl' => $santri->jkl,
			'tgl' => date('Y-m-d H:i'),
			'nominal' => $nominal,
			't_kos' => $tm,
			'kasir' => $this->input->post('kasir', true)
		];

		$this->model->simpan('dekos', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Dekosan sudah diinput');
			redirect('santri/detail/' . $nis);
		} else {
			$this->session->set_flashdata('error', 'Input Error');
			redirect('santri/detail/' . $nis);
		}
	}

	function lemari()
	{
		$data['data'] = $this->model->getTempat()->result();

		$this->load->view('head', $data);
		$this->load->view('lemari', $data);
		$this->load->view('foot');
	}

	function sendData()
	{
		$data['data'] = $this->db->query("SELECT * FROM tb_santri JOIN dekos ON tb_santri.nis=dekos.nis WHERE lembaga <> '' AND lembaga != 'RA' AND lembaga != 'MI' AND NOT EXISTS (SELECT * FROM fix_data WHERE tb_santri.nis=fix_data.nis) ")->result();

		$data['dataHasil'] = $this->db->query("SELECT * FROM tb_santri JOIN fix_data ON tb_santri.nis=fix_data.nis ")->result();

		$this->load->view('head', $data);
		$this->load->view('fixData', $data);
		$this->load->view('foot');
	}

	function cekData($nis)
	{
		$data['santri'] = $this->model->getBy('tb_santri', 'nis', $nis)->row();
		$data['foto'] = $this->model->getBy('foto_file', 'nis', $nis)->row();
		$data['berkas'] = $this->model->getBy('berkas_file', 'nis', $nis)->row();
		$this->load->view('head', $data);
		$this->load->view('identitas', $data);
		$this->load->view('foot');
	}

	function kirim($nis)
	{
		$data = $this->model->getBy('fix_data', 'nis', $nis)->row();

		if ($data) {
			$this->session->set_flashdata('error', 'Data sudah kirim');
			redirect('santri/sendData');
		} else {
			$datas = ['nis' => $nis];
			$this->model->simpan('fix_data', $datas);

			if ($this->db->affected_rows() > 0) {
				$this->session->set_flashdata('ok', 'Data berhasil dikirim');
				redirect('santri/sendData');
			} else {
				$this->session->set_flashdata('error', 'Edit Error');
				redirect('santri/sendData');
			}
		}
	}

	function cekKartu($jkl)
	{
		// $data['data'] = $this->model->getBy2Ord('tb_santri', 'ket', 'baru', 'jkl', $jkl, 'nama')->result();
		$data['data'] = $this->db->query("SELECT * FROM tb_santri WHERE ket = 'baru' AND jkl = '$jkl' AND lembaga != 'MI' AND lembaga != 'RA' AND lembaga != '' ORDER BY nama ASC, lembaga ASC")->result();

		$this->load->view('cekKartu', $data);
	}
}
