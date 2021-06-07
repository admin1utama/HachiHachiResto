<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardOperator extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modDashOperator');
		$this->load->library('session'); 
		$this->load->library('form_validation');
	}
	public function index()
	{
        $kodecab = $this->session->userdata('codecabang');
		//echo $kodecab;
		$data['datastok'] = $this->modDashOperator->select_stok($kodecab);
		$data['datadistribusimasuk'] = $this->modDashOperator->select_datadismasuk($kodecab);
        $data['datadistribusikeluar'] = $this->modDashOperator->select_datadiskeluar($kodecab);
		$this->load->view('showDashboardOperator', $data);
	}	

}
