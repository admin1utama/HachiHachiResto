<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registermember extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modMember');
	}
	public function index()
	{
		$data['datamember'] = $this->modMember->select_member();
		$this->load->view('showmember', $data);
	}

	public function memberpelanggan(){
		if($this->input->post('btnRegister')) {
			$kodemember 	= $this->input->post('txtkodemember'); 
			$namalengkap 	= $this->input->post('txtnamalengkap'); 
			$alamatemail 	= $this->input->post('txtemail');
			$kota 			= $this->input->post('txtkota');
			$alamatrumah 	= $this->input->post('txtalamatrumah');
			$tanggallahir 	= $this->input->post('txttgllahir');
			$notelp 		= $this->input->post('txtnotelp');

			$this->modMember->insert_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp);

			$data['datamember'] = $this->modMember->select_member();
			$this->load->view('showmember', $data); 
		}
		else if($this->input->post('btnUpdate')){
			$kodemember 	= $this->input->post('txtkodemember'); 
			$namalengkap 	= $this->input->post('txtnamalengkap'); 
			$alamatemail 	= $this->input->post('txtemail');
			$kota 			= $this->input->post('txtkota');
			$alamatrumah 	= $this->input->post('txtalamatrumah');
			$tanggallahir 	= $this->input->post('txttgllahir');
			$notelp 		= $this->input->post('txtnotelp');
			$status 		= $this->input->post('txtstatus');

			$this->modMember->update_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp,$status);

			$data['datamember'] = $this->modMember->select_member();
			$this->load->view('showmember', $data); 
		}
		else {
			//$this->load->view('registermember');
			$param['kodemember'] 		= "";
			$param['namamember'] 		= "";
			$param['emailmember'] 		= "";
			$param['kotamember'] 		= "";
			$param['alamatrumahmember'] = "";
			$param['tanggallahirmember']= "";
			$param['notelpmember'] 		= "";
			$param['status'] 			= "";


			$this->load->view('registermember', $param);  
		}
	}

	public function editmember()
	{
		$kodemember	= $this->input->post('kode');
		echo $kodemember;
		$detail 	= $this->modMember->selectMemberByKode($kodemember); 
		echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$param['kodemember'] 		= $row->kodemember;
			$param['namamember'] 		= $row->namamember;
			$param['emailmember'] 		= $row->emailmember;
			$param['kotamember'] 		= $row->kotamember;
			$param['alamatrumahmember'] = $row->alamatrumahmember;
			$param['tanggallahirmember']= $row->tanggallahirmember;
			$param['notelpmember'] 		= $row->notelpmember;
			$param['status'] 			= $row->status;

		}

		$this->load->view('registermember', $param);
	}
}
