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
		$this->session->unset_userdata('cart');
        
        $kode = $this->session->userdata('codecabang');
		//echo $kode;
		$data['datapenyesuaian'] = $this->modPenyesuaianStok->select_data($kode);
		$this->load->view('showPenyesuaianStok',$data);
	}

	public function tambahpenyesuaian()
	{
		if($this->input->post('btnSimpan')) {
			echo "test";
			$kdbhn  	= $this->input->post('dropBahanBaku'); 
			$stokakhir  = $this->input->post('txtakhir');
			$alasan 	= $this->input->post('txtAlasan');

			//$idbahan = $this->input->post("idbahan");
			//$bhnbaku = $this->modPenyesuaianStok->selectstok($idbahan);
	
			/*foreach($bhnbaku->result() as $row)
			{
				$stokawal = $row->stok;
			}

			echo $stokawal;*/

			$kodecabang = $this->session->userdata("codecabang");
			$username = $this->session->userdata('mylogin'); 

			$this->modPenyesuaianStok->insert_penyesuaian($kdbhn, $stokakhir, $alasan,$kodecabang,$username);

			$kode = $this->session->userdata('codecabang');
			$params['databahanbaku'] = $this->modPenyesuaianStok->SelectBahanBakuOutlet($kode);
			$this->load->view('masterPenyesuaianStok',$params);
		}
		else
		{
			//echo "test";
			$kode = $this->session->userdata('codecabang');
			//echo $kode;
			$params['databahanbaku'] = $this->modPenyesuaianStok->SelectBahanBakuOutlet($kode);
			$this->load->view('masterPenyesuaianStok',$params);
		}
	}

	public function getStok()
	{
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modPenyesuaianStok->selectstok($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4><b>Stok : ".$row->stok."</td></h4></b>";	
			echo "</tr>";
		}
	}
	
}
