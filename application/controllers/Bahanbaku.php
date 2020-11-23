<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahanbaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
	}
	public function index()
	{
		//$this->load->view('listbahanbaku');
		if($this->input->post('btnAdd')) {
			$nolist 					= $this->input->post('txtnolist');
			$productdescription 		= $this->input->post('txtproductdesc');
			$quantity 					=$this->input->post('txtquantity'); 
			echo $nolist;
			echo $productdescription;
			echo $quantity; 
		}
		else if($this->input->post('btnUpdate')){
			$nolist 					= $this->input->post('txtnolist');
			$productdescription 		= $this->input->post('txtproductdesc');
			$quantity 					=$this->input->post('txtquantity'); 
			echo $nolist;
			echo $productdescription;
			echo $quantity; 
		}
		else if($this->input->post('btnRemove')){
			$nolist 					= $this->input->post('txtnolist');
			$productdescription 		= $this->input->post('txtproductdesc');
			$quantity 					=$this->input->post('txtquantity'); 
			echo $nolist;
			echo $productdescription;
			echo $quantity; 
		}
		else {
			$this->load->view('listbahanbaku');
		}
	}
}
