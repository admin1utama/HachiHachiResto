<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanjadi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function index()
	{
		//$this->load->view('daftarbahanjadi');
		if($this->input->post('btnAddBahanJadi')) {
			$category 		= $this->input->post('txtemail'); 
			echo $email; 
		}
		else {
			$this->load->view('registermember');
		}
	}
}
