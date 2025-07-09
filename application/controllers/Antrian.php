<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class Antrian extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		// $this->load->model('BundaModel', 'model');
		$this->load->model('Auth_model');
		$this->load->model('SantriModel', 'model');
		// $user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user()) {
			redirect('login/logout');
		}
	}

	public function index()
	{
		$data['user'] = $this->Auth_model->current_user();
		$data['santri'] = $this->db->query("SELECT id_santri, nama FROM tb_santri WHERE ket = 'baru' AND lembaga != 'MI' AND lembaga != 'RA' UNION SELECT id_santri, nama FROM tb_santri_sm WHERE ket = 'baru' AND lembaga != 'MI' AND lembaga != 'RA'")->result();

		$hariini = date('Y-m-d');
		$data['dataDay'] = $this->db->query("SELECT * FROM antrian WHERE tanggal = '$hariini' ")->result();

		$data['akhir'] = $this->db->query("SELECT MAX(nomor) as nomor FROM antrian WHERE tanggal = '$hariini'")->row();

		$this->load->view('head', $data);
		$this->load->view('antrian', $data);
		$this->load->view('foot');
	}

	public function list()
	{
		$data['user'] = $this->Auth_model->current_user();
		$hariini = date('Y-m-d');
		$userId = $data['user']->id_user;
		$data['data'] = $this->db->query("SELECT * FROM antrian WHERE tanggal = '$hariini' AND user_id = '$userId' ")->result();

		// $data['dataDay'] = $this->db->query("SELECT * FROM antrian WHERE tanggal = '$hariini' ")->result();

		$data['akhir'] = $this->db->query("SELECT nomor, status, meja, id FROM antrian WHERE tanggal = '$hariini' AND user_id = '$userId' ORDER BY nomor DESC LIMIT 1 ")->row();

		$this->load->view('head', $data);
		$this->load->view('antrianList', $data);
		$this->load->view('foot');
	}

	public function meja($no)
	{
		$hariini = date('Y-m-d');
		$data = $this->db->query("SELECT (SELECT IFNULL(MAX(nomor), 0) FROM antrian WHERE tanggal = '$hariini' AND meja = $no) AS akhir, (SELECT COUNT(*) FROM antrian WHERE tanggal = '$hariini' AND meja = $no AND status = 'selesai') AS selesai, (SELECT COUNT(*) FROM antrian WHERE tanggal = '$hariini' AND meja = $no AND status = 'proses') AS proses ")->row();

		// var_dump($data);
		echo json_encode($data);
	}

	public function detailSantri()
	{
		$id = $this->input->post('id', true);
		$data = $this->db->query("SELECT * FROM tb_santri WHERE id_santri = '$id' ")->row();
		if ($data) {
			$hasil = $data;
		} else {
			$hasil = $this->db->query("SELECT * FROM tb_santri_sm WHERE id_santri = '$id' ")->row();
		}

		echo json_encode($hasil);
	}

	public function tambah()
	{
		$hariini = date('Y-m-d');
		$id = $this->input->post('santri_id', true);
		$meja = $this->input->post('meja', true);
		$cekJumlah = $this->db->query("SELECT MAX(nomor) as nomor FROM antrian WHERE tanggal = '$hariini' ")->row();
		$cekmea = $this->db->query("SELECT id_user FROM user WHERE meja = 1 ")->row();
		$nomor = $cekJumlah->nomor + 1;
		if ($meja === 'umum') {
			$meja = 0;
			$status = 'belum';
			$userid = '';
		} else {
			$meja = 1;
			$status = 'proses';
			$userid = $cekmea->id_user;
		}

		$data = [
			'nomor' => $nomor,
			'meja' => $meja,
			'jam' => date('H:i'),
			'tanggal' => $hariini,
			'status' => $status,
			'user_id' => $userid,
			'santri_id' => $id,
		];

		$this->model->simpan('antrian', $data);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			$this->cetak($cekJumlah->nomor + 1);
			// echo json_encode(['success' => 'Data successfully saved.', 'nomor' => $nomor]);
			redirect('antrian');
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			// echo json_encode(['error' => 'Failed to save data.']);
			redirect('antrian');
		}
	}

	// public function print_page($nomor)
	// {
	// 	$data['nomor'] = $nomor;
	// 	$this->load->view('cetakAntrian', $data);
	// }

	public function ambil()
	{
		$user = $this->Auth_model->current_user();
		$hariini = date('Y-m-d');
		$cek = $this->db->query("SELECT id FROM antrian WHERE user_id = '' AND tanggal = '$hariini' ORDER BY nomor ASC LIMIT 1 ")->row();
		$data = [
			'user_id' => $user->id_user,
			'status' => 'proses',
			'meja' => $user->meja,
		];

		$this->model->update('antrian', $data, 'id', $cek->id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('antrian/list');
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('antrian/list');
		}
	}

	public function selesai($id)
	{
		$data = [
			'status' => 'selesai',
		];
		$this->model->update('antrian', $data, 'id', $id);
		if ($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('ok', 'Data sudah diperbarui');
			redirect('antrian/list');
		} else {
			$this->session->set_flashdata('error', 'Edit Error');
			redirect('antrian/list');
		}
	}

	public function cetak($no)
	{
		try {
			$nomor_antrian = $no;
			// Nama printer seperti yang terlihat di Windows
			$connector = new NetworkPrintConnector("192.168.0.100", 9100);

			$printer = new Printer($connector);

			// Mendapatkan tanggal dan waktu saat ini
			$tanggal = date('d M Y');
			$waktu = date('H:i');

			// Menyiapkan teks yang akan dicetak
			$printer->setJustification(Printer::JUSTIFY_CENTER);
			$printer->setFont(Printer::FONT_B);
			$printer->setTextSize(2, 2);
			$printer->text("PSB PPDWK 2024/2025\n");
			$printer->setTextSize(1, 1);
			$printer->text("Panitia Penerimaan Santri Baru\n");
			$printer->text("Ponpes Darul Lughah Wal Karomah\n");
			$printer->feed();
			$printer->setTextSize(2, 2);
			$printer->text("No. Antrian\n");
			$printer->feed();
			$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH | Printer::MODE_DOUBLE_HEIGHT);
			$printer->setTextSize(4, 4);
			$printer->text("$nomor_antrian\n");
			$printer->feed();
			$printer->setTextSize(1, 1);
			$printer->text("$tanggal $waktu\n");
			$printer->feed();
			$printer->text("Harap menunggu panggilan\n");
			$printer->text("TERIMAKASIH\n");

			// Memotong kertas
			$printer->cut();

			// Menutup koneksi printer
			$printer->close();
		} catch (Exception $e) {
			echo "Tidak dapat mencetak ke printer: " . $e->getMessage() . "\n";
		}
	}

	// public function cetak($no)
	// {
	// 	$data['no'] = $no;
	// 	$this->load->view('cetakAntrian', $data);
	// }
}
