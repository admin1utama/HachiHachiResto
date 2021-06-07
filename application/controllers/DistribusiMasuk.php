<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiMasuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modDistribusiMasuk');
        $this->load->model('modCabang');
		$this->load->model('modBahan');
		$this->load->library('session');
	}
	public function index()
	{
        $this->session->unset_userdata('cart');
        $kode = $this->session->userdata('codecabang');
        $data['datadistribusi'] = $this->modDistribusiMasuk->select_data($kode);
		$this->load->view('showDistribusiMasuk',$data);
    }
    
	public function bukadetail()
	{
		$params['datacabang']  	    = $this->modCabang->select_cabang();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();

		$kodenota	= $this->input->post('kode');
		$detail 	= $this->modDistribusiMasuk->selectPenerimaanByKode($kodenota);
		echo $detail->num_rows();
		foreach($detail->result() as $row) {
			$params['nomernota'] 		= $row->nomernota;
			$params['tanggal'] 			= $row->tanggal;
			$params['kodecabangasal'] 	= $row->kodecabangasal;
			$params['kodecabangtujuan'] = $row->kodecabangtujuan;
			$params['status'] 			= $row->status;
		}
		$datacart 	= $this->modDistribusiMasuk->selectdataforcart($kodenota);
		$arr    = [];
		$jum    = 0;
		foreach($datacart->result() as $row) {
			$kodebahan   	= $row->kodebahan;
			$namabahan   	= $row->namabahan;
			$kodesatuan  	= $row->kodesatuan;
			$qtyasal		= $row->qtyasal;
			$qtytujuan    		= $row->qtytujuan;
			$arr [$jum] [0] = $kodebahan;
			//$arr [$jum] [1] = $qty;
			$arr [$jum] [2] = $namabahan;
			$arr [$jum] [3] = $kodesatuan;
			$arr [$jum] [4] = $qtyasal;
			$arr [$jum] [5] = $qtytujuan;
		 
			$jum+=1; 
			//echo "1-";
		}
		$this->session->set_userdata("cart", $arr);
		$this->load->view('masterPenerimaanDistribusiMasuk',$params); 
	}

	public function penerimaan()
	{
		if($this->input->post('btnSimpan')){
			//$tanggal  		= $this->input->post('txtdate');
			//$pilih 			= $this->input->post('Status');
			$notadiskeluar 	= $this->input->post('txtNoNotaDisKeluar');
			//echo $kodesupp;
			//echo $tanggal;
			//echo $pilih;
			
			$nomernota = $this->modDistribusiMasuk->update_hdistribusi($notadiskeluar);

			// looping dari cart
			$nomer 		= $this->input->post('txtNoNotaDisKeluar');
			$kode 		= $this->session->userdata('codecabang');
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				$kodebahan 	= $arr[$i][0];
				//echo $kodebahan;
				$qty 		= $this->input->post('txtQtyKirim'.$i);
				//echo $qty;
				$this->modDistribusiMasuk->update_ddistribusi($qty,$nomer,$kodebahan,$kode);
				echo "masuk";
			}

			$kode = $this->session->userdata('codecabang');
			//echo $kode;
			$data['datadistribusi'] = $this->modDistribusiMasuk->select_data($kode);
			$this->load->view('showDistribusiKeluar',$data);
			//$this->session->unset_userdata('cart');
			echo "success";
		}
	}

}
