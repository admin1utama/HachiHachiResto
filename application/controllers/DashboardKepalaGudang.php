<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardKepalaGudang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modDashKepalaGudang');
		$this->load->library('session'); 
		$this->load->library('form_validation');
	}
	public function index()
	{
        $kodecab = $this->session->userdata('codecabang');
		//echo $kodecab;
		$data['datastok'] = $this->modDashKepalaGudang->select_stok($kodecab);
		$data['datapemesananbahan'] = $this->modDashKepalaGudang->select_pemesanan();
		$this->load->view('showDashboardKepalaGudang', $data);
	}	

}
