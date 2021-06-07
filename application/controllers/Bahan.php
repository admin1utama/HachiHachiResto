<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modBahan'); 
	}
	public function index()
	{
		$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
		$this->load->view('showbahan', $data);

	}
	
	public function tambahbahan() {
		if($this->input->post('btnAdd')) {
			$kodebahan  = $this->input->post('txtkodebahan'); 
			$namabahan  = $this->input->post('txtnamabahan');
			$satuan 	= $this->input->post('txtsatuanbahan'); 
			$jenis 		= $this->input->post('txtjenisbahan');
			$harga 		= $this->input->post('txthargabahan'); 
			$stok 		= $this->input->post('txtstokbahan');
			$foto 		= $this->input->post('txtfoto'); 
			$status 	= $this->input->post('txtstatusbahan');

			$this->modBahan->insert_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status);

			$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
			$this->load->view('showbahan',$data);  
		}
		else if($this->input->post('btnUpdate')){
			$kodebahan 	= $this->input->post('txtkodebahan'); 
			$namabahan 	= $this->input->post('txtnamabahan');
			$satuan 	= $this->input->post('txtsatuanbahan'); 
			$jenis 		= $this->input->post('txtjenisbahan');
			$harga 		= $this->input->post('txthargabahan'); 
			$stok 		= $this->input->post('txtstokbahan');
			$foto 		= $this->input->post('txtfoto'); 
			$status 	= $this->input->post('txtstatusbahan');

			$this->modBahan->update_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status);

			$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
			$this->load->view('showbahan',$data);  
		}
		else {
			$param['kodebahan'] 	= "";
			$param['namabahan'] 	= "";
			$param['satuan'] 		= "";
			$param['jenis'] 		= "";
			$param['harga'] 		= "";
			$param['stok'] 			= "";
			$param['foto'] 			= "";
			$param['status'] 		= "";

			$this->load->view('kategoribahan', $param);
		}		
	}

	public function editbahan()
	{
		$kodebahan	= $this->input->post('kode');
		echo $kodebahan;
		$detail 	= $this->modBahan->selectBahanByKode($kodebahan); 
		echo $detail->num_rows(); 
		foreach($detail->result() as $row) {
			$param['kodebahan'] 	= $row->kodebahan;
			$param['namabahan'] 	= $row->namabahan;
			$param['satuan'] 		= $row->satuan;
			$param['jenis'] 		= $row->jenis;
			$param['harga'] 		= $row->harga;
			$param['stok'] 			= $row->stok;
			$param['foto'] 			= $row->foto;
			$param['status'] 		= $row->status;
		}

		$this->load->view('kategoribahan', $param);
	}

	public function BOM()
	{
		//echo "haloBOM";
		if($this->input->post('btnSimpanBOM'))
		{
			$textbahanjadi 	= $this->input->post('dropBahanJadi'); 
			$textbahanbaku 	= $this->input->post('dropBahanBaku');
			$textqty 		= $this->input->post('txtQty');

			$this->modBahan->insert_bom($textbahanjadi, $textbahanbaku,$textqty);
			echo "sucess";
		}
		else
		{
			$params['databahanjadi'] = $this->modBahan->BomSelectBahanJadi();
			$params['databahanbaku'] = $this->modBahan->BomSelectBahanBaku();
			$this->load->view('masterBOM',$params);
		}
	}

	public function getDetailBOM()
	{
		$idbahanjadi 	= $this->input->post("idbahanjadi");
		$bhnbaku 		= $this->modBahan->BomSelectBahanBaku_ByBahanJadi($idbahanjadi);

		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td>".$row->qty."</td>";	
				echo "<td><button onclick=hapusbom('".$row->kodebom."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function hapusDetailBOM()
	{
		$kodebom = $this->input->post('kodebom'); 
		$this->modBahan->delete_detailBOM($kodebom);

	}

	public function insertBOM()
	{
		$textbahanjadi 	= $this->input->post('idbahanjadi'); 
		$textbahanbaku 	= $this->input->post('idbahanbaku');
		$textqty 		= $this->input->post('qty');
		//echo $textbahanjadi."-".$textbahanbaku."-".$textqty;
		$this->modBahan->insert_bom($textbahanjadi, $textbahanbaku,$textqty);
		echo "success";
	}
}
