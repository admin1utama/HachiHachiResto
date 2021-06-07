<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaGudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modOperator');
	}
	public function index()
	{
		$data['dataoperator'] = $this->modOperator->select_kepalagudang();
		$this->load->view('showkepalagudang', $data);
		
	}

	public function masteroperator()
	{
		if($this->input->post('btnAdd_KG')) {
            $kodekaryawan 	= $this->input->post('txtkodekaryawan');
            $kodecabang 	= $this->input->post('txtkodecabang'); 
            $username 		= $this->input->post('txtusername');
            $password 		= $this->input->post('txtpass');
			$nama 			= $this->input->post('txtnamakaryawan');
			$mulaikerja 	= $this->input->post('txtmulaikerja');
			$nomerid 		= $this->input->post('txtnoidentitaskaryawan');
			$nomertelp 		= $this->input->post('txttelpkaryawan');
			$jabatan 		= $this->input->post('txtjabatankaryawan');
			$status 		= $this->input->post('txtstatuskaryawan');	

			$this->modOperator->insert_operator($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status);

			$data['dataoperator'] = $this->modOperator->select_kepalagudang();
			$this->load->view('showkepalagudang',$data); 
		}
		else if($this->input->post('btnUpdate_KG'))
		{
            $kodekaryawan 	= $this->input->post('txtkodekaryawan');
            $kodecabang 	= $this->input->post('txtkodecabang'); 
            $username 		= $this->input->post('txtusername');
            $password 		= $this->input->post('txtpass');
			$nama 			= $this->input->post('txtnamakaryawan');
			$mulaikerja 	= $this->input->post('txtmulaikerja');
			$nomerid 		= $this->input->post('txtnoidentitaskaryawan');
			$nomertelp 		= $this->input->post('txttelpkaryawan');
			$jabatan 		= $this->input->post('txtjabatankaryawan');
			$status 		= $this->input->post('txtstatuskaryawan');
			
			$this->modOperator->update_admin($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status);

			$data['dataoperator'] = $this->modOperator->select_kepalagudang();
			$this->load->view('showkepalagudang',$data);
		}
		else {
			//$this->load->view('masterkepalagudang'); 
			$param['kodekaryawan'] 		= "";
			$param['kodecabang'] 		= "";
			$param['username'] 			= "";
			$param['password'] 			= "";
			$param['nama'] 				= "";
			$param['tanggalmulai'] 		= "";
			$param['noidentitas'] 		= "";
			$param['nomertelp'] 		= "";
			//$param['jabatan'] 		= "";
			$param['status'] 			= "";

			$this->load->view('masterkepalagudang', $param);
		}
	}

	public function editkaryawan()
	{
		$kodekaryawan	= $this->input->post('kode');
		echo $kodekaryawan;
		$detail 	= $this->modOperator->selectKaryawanByKode($kodekaryawan); 
		echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$param['kodekaryawan'] 		= $row->kodekaryawan;
			$param['kodecabang'] 		= $row->kodecabang;
			$param['username'] 			= $row->username;
			$param['password'] 			= $row->password;
			$param['nama'] 				= $row->nama;
			$param['tanggalmulai'] 		= $row->tanggalmulai;
			$param['noidentitas'] 		= $row->noidentitas;
			$param['nomertelp'] 		= $row->nomertelp;
			//$param['jabatan'] 		= $row->jabatan;
			$param['status'] 			= $row->status;
		}

		$this->load->view('masterkepalagudang', $param);
	}

}
