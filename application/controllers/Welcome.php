<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		// $this->load->model('BundaModel', 'model');
		$this->load->model('Auth_model');

		// $user = $this->Auth_model->current_user();

		if (!$this->Auth_model->current_user()) {
			redirect('login/logout');
		}
	}
	
	public function index()
	{
		$data['user'] = $this->Auth_model->current_user();
		$this->load->view('head', $data);
		$this->load->view('home', $data);
		$this->load->view('foot');
	}
}
