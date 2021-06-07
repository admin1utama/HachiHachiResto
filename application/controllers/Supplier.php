<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modSupplier'); 
		$this->load->model('modBahan');
		$this->load->library('session'); 
	}
	public function index()
	{
		$data['datasupplier'] = $this->modSupplier->select_supplier();
		$this->load->view('showsupplier', $data);


	}

	public function mastersupplier() {
		if($this->input->post('btnAdd_Supplier')) {
            $kodesupplier 	= $this->input->post('txtkodesupplier');
            $namasupplier 	= $this->input->post('txtnamasupplier'); 
            $contactperson 	= $this->input->post('txtcp');
            $nomertelp 		= $this->input->post('txtnotelpsupplier');
			$alamat 		= $this->input->post('txtalamatsupplier');
			$kota 			= $this->input->post('txtkotasupplier');
			$status 		= $this->input->post('txtstatus');

			$this->modSupplier->insert_supplier($kodesupplier, $namasupplier, $contactperson, $nomertelp, $alamat, $kota, $status);

			$data['datasupplier'] = $this->modSupplier->select_supplier();
			$this->load->view('showsupplier', $data);  
		}
		else if($this->input->post('btnUpdate_Supplier')){
            $kodesupplier 	= $this->input->post('txtkodesupplier');
            $namasupplier 	= $this->input->post('txtnamasupplier'); 
            $contactperson 	= $this->input->post('txtcp');
            $nomertelp 		= $this->input->post('txtnotelpsupplier');
			$alamat 		= $this->input->post('txtalamatsupplier');
			$kota 			= $this->input->post('txtkotasupplier');
			$status 		= $this->input->post('txtstatus');

			$this->modSupplier->update_supplier($kodesupplier, $namasupplier, $contactperson, $nomertelp, $alamat, $kota, $status);

			$data['datasupplier'] = $this->modSupplier->select_supplier();
			$this->load->view('showsupplier', $data);  
        }
        else if($this->input->post('btnHapusOutlet')){
			$alamat = $this->input->post('txtalamatoutlet'); 
			$this->modSupplier->delete_outlet($alamat);
			$this->load->view('showsupplier', $data); 
		}
		else {
			//$this->load->view('mastersupplier');
			$param['kodesupplier'] 		= "";
			$param['namasupplier'] 		= "";
			$param['contactperson'] 	= "";
			$param['nomertelp'] 		= "";
			$param['alamat'] 			= "";
			$param['kota'] 				= "";
			$param['status'] 			= "";


			$this->load->view('mastersupplier', $param);
		}

		
		
	}

	public function detailsupplier()
	{
		$params['datadetail'] 		= $this->modSupplier->select_detailsupplier();
		$params['datasupplier'] 	= $this->modSupplier->select_supplier();
		$params['databahansupp'] 	= $this->modBahan->select_kategori_bahanbaku();
		if($this->input->post('btnDetailSupp')){
			$this->load->view('detailsupplier',$params); 
		}
		else{
			$this->load->view('detailsupplier',$params); 
		}
	}

	public function editsupplier()
	{
		$kodesupplier	= $this->input->post('kode');
		echo $kodesupplier;
		$detail 		= $this->modSupplier->selectSupplierByKode($kodesupplier); 
		echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$param['kodesupplier'] 		= $row->kodesupplier;
			$param['namasupplier'] 		= $row->namasupplier;
			$param['contactperson'] 	= $row->contactperson;
			$param['nomertelp'] 		= $row->nomertelp;
			$param['alamat'] 			= $row->alamat;
			$param['kota'] 				= $row->kota;
			$param['status'] 			= $row->status;
		}
		$this->load->view('mastersupplier', $param);
	}
}
