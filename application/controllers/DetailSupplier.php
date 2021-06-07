<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailSupplier extends CI_Controller {

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
		$params['datadetail'] 		= $this->modSupplier->select_detailsupplier();
		$params['datasupplier'] 	= $this->modSupplier->select_supplier();
		$params['databahansupp'] 	= $this->modBahan->select_kategori_bahanbaku();
		//$this->load->view('detailsupplier',$params); 

		if($this->input->post('btnTambahDetailSup'))
		{
			$textkodesupp 	= $this->input->post('txtSupplier'); 
			$textkodebahan 	= $this->input->post('txtBahan');

			$this->modSupplier->insert_detailsupplier($textkodesupp, $textkodebahan);
			$this->load->view('detailsupplier',$params); 
		}
		else {
			$this->load->view('detailsupplier',$params); 
		}
	}

	


}
