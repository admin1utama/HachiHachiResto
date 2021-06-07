<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modCabang'); 
	}
	public function index()
	{
		$data['datacabang'] = $this->modCabang->select_cabang();
		$this->load->view('showcabang', $data);
	}

	public function mastercabang() {
		
		if($this->input->post('btnAdd_Cabang')) {
            $kodecabang 	= $this->input->post('txtkodecabang');
            $namacabang 	= $this->input->post('txtnamacabang'); 
            $alamat 		= $this->input->post('txtalamatcabang');
            $kota 			= $this->input->post('txtkotacabang');
			$tanggalberdiri = $this->input->post('txttglberdiri');
			$nomertelp 		= $this->input->post('txtnotelpcabang');
			$jenis 			= $this->input->post('txtjenis');
			$status 		= $this->input->post('txtstatus');

			$this->modCabang->insert_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status);

			$data['datacabang'] = $this->modCabang->select_cabang();
			$this->load->view('showcabang', $data);  
		}
		else if($this->input->post('btnUpdate_Cabang')){
            $kodecabang 	= $this->input->post('txtkodecabang');
            $namacabang 	= $this->input->post('txtnamacabang'); 
            $alamat 		= $this->input->post('txtalamatcabang');
            $kota 			= $this->input->post('txtkotacabang');
			$tanggalberdiri = $this->input->post('txttglberdiri');
			$nomertelp 		= $this->input->post('txtnotelpcabang');
			$jenis 			= $this->input->post('txtjenis');
			$status 		= $this->input->post('txtstatus');

			$this->modCabang->update_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status);

			$data['datacabang'] = $this->modCabang->select_cabang();
			$this->load->view('showcabang', $data);  
        }
        else if($this->input->post('btnRemove_Cabang')){
			$kodecabang = $this->input->post('txtkodecabang'); 

			$this->modCabang->delete_cabang($kodecabang);

			$data['datacabang'] = $this->modCabang->select_cabang();
			$this->load->view('showcabang', $data); 
		}
		else {
			//$this->load->view('mastercabang');
			$param['kodecabang'] 		= "";
			$param['namacabang'] 		= "";
			$param['alamat'] 			= "";
			$param['kota'] 				= "";
			$param['tanggalberdiri'] 	= "";
			$param['nomertelp'] 		= "";
			$param['jenis'] 			= "";
			$param['status'] 			= "";

			$this->load->view('mastercabang', $param);
		}	
	}

	public function editcabang()
	{
		if($this->input->post('btnedit')){
			$kodecabang	= $this->input->post('kode');
			echo $kodecabang;
			$detail 	= $this->modCabang->selectCabangByKode($kodecabang); 
			echo $detail->num_rows(); 
			foreach($detail->result() as $row) {
				$param['kodecabang'] 		= $row->kodecabang;
				$param['namacabang'] 		= $row->namacabang;
				$param['alamat'] 			= $row->alamat;
				$param['kota'] 				= $row->kota;
				$param['tanggalberdiri'] 	= $row->tanggalberdiri;
				$param['nomertelp'] 		= $row->nomertelp;
				$param['jenis'] 			= $row->jenis;
				$param['status'] 			= $row->status;
			}
			$this->load->view('mastercabang', $param);
		}
		else if($this->input->post('btnnonaktif')){
			$kodecabang	= $this->input->post('kode');
			$this->modCabang->nonaktif($kodecabang);
			$this->index();
		}
		else if($this->input->post('btnaktif')){
			$kodecabang	= $this->input->post('kode');
			$this->modCabang->aktif($kodecabang);
			$this->index();
		}

	}
}
