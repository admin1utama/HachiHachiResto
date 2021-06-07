<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PenerimaanBahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modPemesananBahan');
        $this->load->model('modSupplier');
		$this->load->model('modBahan');
		$this->load->library('session');
	}
	public function index()
	{        
        $data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
		$this->load->view('showPenerimaan',$data);
	}
	
	public function bukadetail()
	{
		$params['datasupplier']  = $this->modSupplier->select_supplier();
		$params['databahanbaku'] = $this->modBahan->BomSelectBahanBaku();

		$kodenota	= $this->input->post('kode');
		$detail 	= $this->modPemesananBahan->selectPenerimaanByKode($kodenota); 
		//echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$params['nomernota'] 	= $row->nomernota;
			$params['tanggal'] 		= $row->tanggal;
			$params['subtotal'] 	= $row->subtotal;
			$params['status'] 		= $row->status;
			$params['supplier'] 	= $row->kodesupplier;
		}
		$datacart 	= $this->modPemesananBahan->selectdataforcart($kodenota);
		$arr    = [];
		$jum    = 0;
		foreach($datacart->result() as $row) {
			$kodebahan   	= $row->kodebahan;
			$namabahan   	= $row->namabahan;
			$kodesatuan  	= $row->kodesatuan;
			$qty			= $row->qty;
			$harga    		= $row->hargabeli;
			$arr [$jum] [0] = $kodebahan;
			$arr [$jum] [1] = $qty;
			$arr [$jum] [2] = $namabahan;
			$arr [$jum] [3] = $kodesatuan;
			$arr [$jum] [4] = $qty;
			$arr [$jum] [5] = $harga;
		 
			$jum+=1; 
			//echo "1-";
		}
		$this->session->set_userdata("cart", $arr);
		$this->load->view('masterPenerimaan',$params);
	}

	public function penerimaan()
	{
		if($this->input->post('btnSimpan')){

			$kodesupp 		= $this->input->post('txtSupplier');
			$tanggal  		= $this->input->post('txtdate');
			$pilih 			= $this->input->post('Status');
			$notapemesanan 	= $this->input->post('txtNoNotaPesan');
			//echo $kodesupp;
			//echo $tanggal;
			//echo $pilih;
			
			$nomernota = $this->modPemesananBahan->insert_hpenerimaan($kodesupp,$pilih,$tanggal,$notapemesanan);

			// looping dari cart 
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				
				$kodebahan 	= $arr[$i][0];
				$kodesatuan = $arr[$i][3];
				$qtypesan 	= $arr[$i][4];
				$qty 		= $this->input->post('txtQtyTerima'.$i);
				$hargabeli 	= $arr[$i][5];
				//echo $kodebahan;
				$this->modPemesananBahan->insert_dpenerimaan($nomernota,$kodebahan,$kodesatuan,$qtypesan,$qty,$hargabeli);
			}
			$data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
			$this->load->view('showPenerimaan',$data);
			//$this->session->unset_userdata('cart');
			echo "success";
		}
	}
}
