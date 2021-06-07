<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Satuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modKonversi');
		$this->load->library('session'); 
	}
	public function index()
	{
		$data['datasatuan'] = $this->modKonversi->select_satuan();
		$this->load->view('showsatuan', $data);
	}

	public function tambahsatuan()
	{
		if($this->input->post('btnAddSatuan')) {
			$kodesatuan  = $this->input->post('txtkodesatuan'); 
			$namasatuan  = $this->input->post('txtnamasatuan');

			$this->modKonversi->insert_satuan($kodesatuan, $namasatuan);

			$data['datasatuan'] = $this->modKonversi->select_satuan();
			$this->load->view('showsatuan', $data);
		}
		else
		{
			$this->load->view('mastersatuan');
		}
	}

	

}
