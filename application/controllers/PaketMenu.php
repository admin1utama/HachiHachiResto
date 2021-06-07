<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaketMenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modPaketMenu'); 
	}
	public function index()
	{        
        if($this->input->post('btnAddPaket')) {
			$kodepaket  = $this->input->post('txtkodepaket'); 
			$namapaket  = $this->input->post('txtnamapaket');
			$hargapaket 	= $this->input->post('txthargapaket'); 
			$status 		= $this->input->post('txtstatus');


			$this->modPaketMenu->insert_paketmenu($kodepaket, $namapaket, $hargapaket, $status);

			$data['datapaketmenu'] = $this->modPaketMenu->select_all();
			$this->load->view('masterPaketMenu',$data);  
        }
        else{
            $data['datapaketmenu'] = $this->modPaketMenu->select_all();
			$this->load->view('masterPaketMenu',$data);  
        }

    }
    
    function detailmenu($kodepaket)
    {
		//echo $kodepaket;
		$detail 	= $this->modPaketMenu->selectPaketMenuByKode($kodepaket); 
		echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$param['kodepaket'] 	= $row->kodepaket;
			$param['namapaket'] 	= $row->namapaket;
			$param['harga'] 		= $row->harga;
			$param['status'] 		= $row->status;
		}

		$this->load->view('masterDetailPaketMenu', $param);
	}
	
	public function getDetailPaketMenu()
	{
		$idkodepaket = $this->input->post("idkodepaket");
		echo ($idkodepaket);
		$bhnbaku = $this->modPaketMenu->PaketMenu_selectByBahanJadi($idkodepaket);

		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namapaket."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td>".$row->harga."</td>";
				echo "<td>".$row->status."</td>";	
				echo "<td><button onclick=hapusbom('".$row->kodebom."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			$nomer+=1;
		}
	}
	
}
