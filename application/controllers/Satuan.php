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
		$this->load->library('form_validation');
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

			$this->form_validation->set_rules(
				'txtkodesatuan', 'Kode Satuan', 'required|max_length[5]',
                array('required'     =>'Kolom Kode Satuan Tidak Boleh Kosong',
					'max_length' 	 =>'Kode Satuan Panjang Maximal 5 digit'));
            $this->form_validation->set_rules(
				'txtnamasatuan', 'Nama Satuan', 'required|max_length[10]',
				array('required'     =>'Kolom Nama Satuan Tidak Boleh Kosong',
				'max_length' 	 =>'Nama SatuanPanjang Maximal 10 digit'));

			if($this->form_validation->run() == TRUE)
			{
				$this->modKonversi->insert_satuan($kodesatuan, $namasatuan);
				$data['datasatuan'] = $this->modKonversi->select_satuan();
				$this->load->view('showsatuan', $data);
			}
			else
			{
				$this->load->view('mastersatuan');
			}
		}
		else
		{
			$this->load->view('mastersatuan');
		}
	}

	

}
