<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenyesuaianStok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modPenyesuaianStok');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('masterPenyesuaianStok');
	}
	
	public function getDetailStokCabang()
	{
		$kode = $this->session->userdata('codecabang');
		//echo $kode;
		$datastok = $this->modPenyesuaianStok->selectstokbycabang($kode);

		$nomer =1;
		foreach($datastok->result() as $row)
		{
			echo form_open("PenyesuaianStok/index");
			echo "<input type='hidden' name='kodecabang'>"; 
			echo "<input type='hidden' name='kodebahan'>";
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td>".$row->stok."</td>";	
				echo "<td><button onclick=hapusstok('".$row->kodebahan."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			echo form_close(); 
			$nomer+=1;
		}
	}
}
