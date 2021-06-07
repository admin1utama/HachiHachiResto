<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashboardAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modDashAdmin');
		$this->load->library('session'); 
		$this->load->library('form_validation');
	}
	public function index()
	{
        $kodecab = $this->session->userdata('codecabang');
		//echo $kodecab;
		//$data['datastok'] = $this->modDashAdmin->select_stok($kodecab);
		$data['datapemesananbahan'] = $this->modDashAdmin->select_pemesanan();
		$data['datacabang']  	    = $this->modDashAdmin->select_cabang();
		$this->load->view('showDashboardAdmin', $data);
	}	

	public function getStokCabang()
	{
		$idcabang = $this->input->post("idcabang");
        $dtcabang = $this->modDashAdmin->select_stok($idcabang);
        //echo $dtcabang;
		//echo "djndjud";
		foreach($dtcabang->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$row->namabahan." ( ".$row->satuan." )</td>";
				echo "<td>".$row->stok."</td>";	
			echo "</tr>";
        }
	}

}
