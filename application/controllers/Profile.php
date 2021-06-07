<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modProfile');
		$this->load->library('session'); 
	}
	public function index()
	{
		if($this->input->post('btnUpdate'))
		{
            $kodekaryawan 	= $this->input->post('txtkodekaryawan');
			$username 		= $this->input->post('txtusername');
			$nama 			= $this->input->post('txtnama');
			$nomerid 		= $this->input->post('txtnoidentitas');
			$nomertelp	 	= $this->input->post('txtnotelp');
			
			$this->modProfile->update_profile($kodekaryawan, $username, $nama, $nomerid, $nomertelp);

			$datanamalogin = $this->session->userdata('mylogin');
			echo $datanamalogin."-";

			$detail 	= $this->modProfile->selectKaryawanByUsername($datanamalogin); 
			echo $detail->num_rows(); 
			foreach($detail->result() as $row) {
				$param['kodekaryawan'] 	= $row->kodekaryawan;
				$param['cabang'] 		= $row->namacabang;
				$param['username'] 		= $row->username;
				$param['txtnama'] 		= $row->nama;
				$param['noid'] 			= $row->noidentitas;
				$param['notelp'] 		= $row->nomertelp;
				$param['mulai'] 		= $row->tanggalmulai;
				$param['jabatan'] 		= $row->jabatan;
				//$param['pass'] 			= $row->password;
				$param['status'] 		= $row->status;
			}
			$this->load->view('Profile', $param);
			echo "success";
		}
		else
		{
			//$this->load->view('Profile');
			$datanamalogin = $this->session->userdata('mylogin');
			echo $datanamalogin."-";

			$detail 	= $this->modProfile->selectKaryawanByUsername($datanamalogin); 
			echo $detail->num_rows(); 
			foreach($detail->result() as $row) {
				$param['kodekaryawan'] 	= $row->kodekaryawan;
				$param['cabang'] 		= $row->namacabang;
				$param['username'] 		= $row->username;
				$param['txtnama'] 		= $row->nama;
				$param['noid'] 			= $row->noidentitas;
				$param['notelp'] 		= $row->nomertelp;
				$param['mulai'] 		= $row->tanggalmulai;
				$param['jabatan'] 		= $row->jabatan;
				//$param['pass'] 			= $row->password;
				$param['status'] 		= $row->status;
			}
			$this->load->view('Profile', $param);
		}
	}
}
