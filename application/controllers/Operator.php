<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modOperator');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['dataoperator'] = $this->modOperator->select_operator();
		$this->load->view('showoperator', $data);
		
	}

	public function masteroperator()
	{
		if($this->input->post('btnAdd_opt')) {
            $kodekaryawan 	= $this->input->post('txtkodekaryawan');
            $kodecabang 	= $this->input->post('txtkodecabang'); 
            $username 		= $this->input->post('txtusername');
			$password 		= $this->input->post('txtpass');
			$repass 		= $this->input->post('txtrepass');
			$nama 			= $this->input->post('txtnamakaryawan');
			$mulaikerja 	= $this->input->post('txtmulaikerja');
			$nomerid 		= $this->input->post('txtnoidentitaskaryawan');
			$nomertelp 		= $this->input->post('txttelpkaryawan');
			$jabatan 		= $this->input->post('txtjabatankaryawan');
			$status 		= $this->input->post('txtstatuskaryawan');
			
			$this->form_validation->set_rules(
				'txtkodekaryawan', 'Kode Karyawan',
                'required',
                array('required'     =>'Kolom Kode Karyawan Tidak Boleh Kosong'));
            $this->form_validation->set_rules(
				'txtusername', 'Username',
                'required|min_length[6]|callback_cekusername',
				array('required'     =>'Kolom Username Tidak Boleh Kosong'));
			$this->form_validation->set_rules(
				'txtpass', 'Password',
				'required|min_length[6]|max_length[10]|alpha_numeric|callback_cekpassword',
				array('required'     =>'Kolom Password Tidak Boleh Kosong',
					'alpha_numeric'  =>'Password Harus menngandung Huruf dan Angka',
					'min_length' 	 =>'Kolom Password Panjang Minimal 6 digit',
					'max_length' 	 =>'Kolom Password Panjang Maximal 10 digit'));
			$this->form_validation->set_rules(
				'txtnamakaryawan', 'Nama Karyawan',
				'required',
				array('required'     =>'Kolom Nama Tidak Boleh Kosong'));
			$this->form_validation->set_rules(
				'txtmulaikerja', 'Tanggal Mulai Kerja',
				'required',
				array('required'     =>'Kolom Tanggal Mulai Bekerja Tidak Boleh Kosong'));
			$this->form_validation->set_rules(
				'txtnoidentitaskaryawan', 'Nomer Identitas',
				'required|numeric',
				array('required'     =>'Kolom Nomer Identitas Tidak Boleh Kosong',
						'numeric'     =>'Kolom Nomer Identitas hanya berisi angka'));
			$this->form_validation->set_rules(
				'txttelpkaryawan', 'Nomer Telepon',
				'required|numeric',
				array('required'     =>'Kolom Nomer Telepon Tidak Boleh Kosong',
						'numeric'     =>'Kolom Nomer Telepon hanya berisi angka'));
			if($this->form_validation->run() == TRUE)
			{
				$this->modOperator->insert_operator($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status);

				$data['dataoperator'] = $this->modOperator->select_operator();
				$this->load->view('showoperator',$data); 
			}
			else
			{
				$param['kodecabang']        = "";
				$param['kodekaryawan'] 		= "";
				$param['dataa'] 		    = $this->modOperator->selectnamacabang();
				$param['username'] 			= "";
				$param['password'] 			= "";
				$param['nama'] 				= "";
				$param['tanggalmulai'] 		= "";
				$param['noidentitas'] 		= "";
				$param['nomertelp'] 		= "";
				$param['jabatan'] 			= "";
				$param['status'] 			= "";
				$param['datajabatan'] 		= $this->modOperator->selectsjabatankaryawan();
	
				$this->load->view('masteroperator', $param);
			}
		}
		else if($this->input->post('btnUpdate_opt'))
		{
            $kodekaryawan 	= $this->input->post('txtkodekaryawan');
            $kodecabang 	= $this->input->post('txtkodecabang'); 
            $username 		= $this->input->post('txtusername');
            $password 		= $this->input->post('txtpass');
			$nama 			= $this->input->post('txtnamakaryawan');
			$mulaikerja 	= $this->input->post('txtmulaikerja');
			$nomerid 		= $this->input->post('txtnoidentitaskaryawan');
			$nomertelp	 	= $this->input->post('txttelpkaryawan');
			$jabatan 		= $this->input->post('txtjabatankaryawan');
			$status 		= $this->input->post('txtstatuskaryawan');
			
			$this->modOperator->update_admin($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status);

			$data['dataoperator'] = $this->modOperator->select_operator();
			$this->load->view('showoperator',$data);
		}
		else {
			//$this->load->view('masteroperator'); 
			$param['kodecabang']        = "";
			$param['kodekaryawan'] 		= "";
			$param['dataa'] 		    = $this->modOperator->selectnamacabang();
			$param['username'] 			= "";
			$param['password'] 			= "";
			$param['nama'] 				= "";
			$param['tanggalmulai'] 		= "";
			$param['noidentitas'] 		= "";
			$param['nomertelp'] 		= "";
			$param['jabatan'] 			= "";
			$param['status'] 			= "";
			$param['datajabatan'] 		= $this->modOperator->selectsjabatankaryawan();

			$this->load->view('masteroperator', $param);
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
			$param['jabatan'] 			= $row->jabatan;
			$param['status'] 			= $row->status;
		}
		$param['dataa'] 		        = $this->modOperator->selectnamacabang();
		$param['datajabatan'] 			= $this->modOperator->selectsjabatankaryawan();
		$this->load->view('masteroperator', $param);
	}

	public function cekusername($p) 
	{
		if($this->modOperator->cekusername($p) == false) 
		{
			return true; 
		}
		else 
		{
			$this->form_validation->set_message("cekusername", "Username Telah Terdaftar"); 
			return false; 
		}
	}

	public function cekpassword($p) 
	{
		if($p == $this->input->post("txtrepass")) { return true; }
		else {
			$this->form_validation->set_message("cekpassword", "Password dan Confirm Harus Sama"); 
			return false; 
		}
	}

}
