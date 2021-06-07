<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modBahan');
		$this->load->model('modCabang');
		$this->load->library('session');
		$this->load->library('form_validation');
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
			$status 	= $this->input->post('txtstatusbahan');
			$mudahbusuk = 0; 
			if($this->input->post('chkMudahBusuk')) { $mudahbusuk = 1; }

			$config['upload_path']   = './asset/bahan';      
			$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
			$this->load->library('upload', $config);
		 
			$foto = "default.jpg";    
			if($this->upload->do_upload("txtfoto"))  
			{
			 //echo "masukkk";
			 $foto   = $this->upload->data()['file_name'];
			}
			//echo $foto;

			$this->form_validation->set_rules(
				'txtnamabahan', 'Nama Bahan', 'required|callback_ceknamabahan',
                array('required'     =>'Kolom Nama Bahan Tidak Boleh Kosong'));
            $this->form_validation->set_rules(
				'txtstokbahan', 'Stok', 'required|numeric',
				array('required'     =>'Kolom Stok Tidak Boleh Kosong',
			          'numeric'      =>'Stok Harus Angka'));
			$this->form_validation->set_rules(
					'txthargabahan', 'Harga Bahan', 'required|numeric',
					array('required'     =>'Kolom Harga Bahan Tidak Boleh Kosong',
					      'numeric'      =>'Harga Bahan Harus Angka'));
				
			if($this->form_validation->run() == TRUE)
			{
				$this->modBahan->insert_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status, $mudahbusuk);
				$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
				$this->load->view('showbahan',$data);  
			}
			else
			{
				$param['kodebahan'] 	= "";
				$param['namabahan'] 	= "";
				$param['satuan'] 		= "";
				$param['jenis'] 		= "";
				$param['harga'] 		= "";
				$param['stok'] 			= "";
				$param['foto'] 			= "";
				$param['status'] 		= "";
				$param['datasatuan'] 	= $this->modBahan->selectsatuan();
				$PARAM['databahan'] 	= $this->modBahan->select_kategori_bahanbaku();
	
				$this->load->view('kategoribahan', $param);
			}

		}
		else if($this->input->post('btnUpdate')){
			$kodebahan 	= $this->input->post('txtkodebahan'); 
			$namabahan 	= $this->input->post('txtnamabahan');
			$satuan 	= $this->input->post('txtsatuanbahan'); 
			$jenis 		= $this->input->post('txtjenisbahan');
			$harga 		= $this->input->post('txthargabahan'); 
			$stok 		= $this->input->post('txtstokbahan');
			$status 	= $this->input->post('txtstatusbahan');
			$mudahbusuk = 0; 
			if($this->input->post('chkMudahBusuk')) { $mudahbusuk = 1; }

			$config['upload_path']   = './asset/bahan';      
			$config['allowed_types'] = 'jpg|png|jpeg|gif'; 
			$this->load->library('upload', $config);
		 
			$foto = "default.jpg";    
			if($this->upload->do_upload("txtfoto"))  
			{
			 //echo "masukkk";
			 $foto   = $this->upload->data()['file_name'];
			}
			//echo $foto;
			$this->form_validation->set_rules(
				'txtnamabahan', 'Nama Bahan',
                'required',
                array('required'     =>'Kolom Nama Bahan Tidak Boleh Kosong'));
            $this->form_validation->set_rules(
				'txtstokbahan', 'Stok',
                'required',
				array('required'     =>'Kolom Stok Tidak Boleh Kosong'));
			if($this->form_validation->run() == TRUE)
			{
				$this->modBahan->update_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status,$mudahbusuk);

				$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
				$this->load->view('showbahan',$data); 
			}
			else
			{
				$param['kodebahan'] 	= "";
				$param['namabahan'] 	= "";
				$param['satuan'] 		= "";
				$param['jenis'] 		= "";
				$param['harga'] 		= "";
				$param['stok'] 			= "";
				$param['foto'] 			= "";
				$param['status'] 		= "";
				$param['datasatuan'] 	= $this->modBahan->selectsatuan();
				$PARAM['databahan'] 	= $this->modBahan->select_kategori_bahanbaku();
	
				$this->load->view('kategoribahan', $param);
			}
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
			$param['datasatuan'] 	= $this->modBahan->selectsatuan();
			$PARAM['databahan'] 	= $this->modBahan->select_kategori_bahanbaku();

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
			$param['mudahbusuk']    = $row->mudahbusuk;
		}
		$param['datasatuan'] 	= $this->modBahan->selectsatuan();
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
			//echo "sucess";
		}
		else
		{
			$params['databahanjadi'] = $this->modBahan->BomSelectBahanJadi();
			$params['databahanbaku'] = $this->modBahan->BomSelectBahanBaku();
			$this->load->view('masterBOM',$params);
		}
	}

	public function kartustok()
	{
		$kode = $this->session->userdata('codecabang');
		$params['databahanbaku'] 	= $this->modBahan->selectbahanbaku();
		if($this->session->userdata('jabatan') == 'ADMIN') 
		{ $params['datacabang'] = $this->modCabang->select_cabang(); }
		else 
		{ $params['datacabang'] = $this->modBahan->selectcabang($kode); }
        $this->load->view('showKartuStok',$params);
	}

	public function getDetailDataKartu()
	{
		//echo "testinggggg";
		$kodebahan 	= $this->input->post("kodebahan");
		$kodecabangg = $this->input->post("kodecabang");

		$krt 	= $this->modBahan->selectkartustok($kodebahan,$kodecabangg);
		//echo $krt;
		
		$nomer =1;
		foreach($krt->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
				echo "<td>".$row->tanggal."</td>";
				echo "<td>".$row->jenis."</td>";
				echo "<td>".$row->noref."</td>";
				echo "<td class='tengahtulisan'>".$row->stokawal."</td>";
				echo "<td>".$row->debet."</td>";
				echo "<td>".$row->kredit."</td>";
				echo "<td class='tengahtulisan'>".$row->stokakhir."</td>";
				echo "<td>".$row->hargatrans."</td>";
				echo "<td>".$row->hargaavg."</td>";
			echo "</tr>";
			//$nomer+=1;
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
				echo "<td>".$row->satuan."</td>";
				echo "<td>".$row->qty."</td>";	
				echo "<td><button onclick=hapusbom('".$row->kodebom."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function cetak($kodebahan, $kodecabangg)
	{
		$data['cetakdata']	= $this->modBahan->selectkartustok($kodebahan,$kodecabangg);
		$data['header']	= $this->modBahan->selectbuatheadernamabahan($kodebahan,$kodecabangg);
		$this->load->view('showCetakKartuStok',$data);
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

	public function ceknamabahan($p) {
		if($this->modBahan->ceknamabahan($p) == false) {
			return true; 
		}
		else {
			$this->form_validation->set_message("ceknamabahan", "Nama Bahan Tidak boleh kembar"); 
			return false; 
		}
	}

	public function getStok()
	{
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modBahan->selectsatuanBOM($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4 style='font-weight: bold;'>Satuan : </h4></td><td><h4 style='font-weight: bold;'>".$row->satuan."</h4></td>";	
			echo "</tr>"; 
		}
	}

	public function StokOpname() 
	{
		$params['kodecabang'] = 'KC1'; 
		$params['datastok']   = $this->modBahan->compare_stok_gudang_dan_kartustok('KC1'); 
		$params['datacabang'] = $this->modCabang->select_cabang(); 
		$this->load->view('stokopname', $params); 
	}

	public function poststokopname()
	{
		if($this->input->post("btnShow")) {
			$params['datastok']   = $this->modBahan->compare_stok_gudang_dan_kartustok($this->input->post('txtkodecabang')); 
			$params['datacabang'] = $this->modCabang->select_cabang(); 
			$params['kodecabang'] = $this->input->post('txtkodecabang'); 
			$this->load->view('stokopname', $params); 
		}
	}

	public function revisiDataKartuStok() 
	{
		$kodecabang 	= $this->input->post('kodecabang'); 
		$kodebahan	 	= $this->input->post('kodebahan'); 
		$stokcabang  	= $this->input->post('stokcabang'); 
		$stokkartu		= $this->input->post('stokkartu'); 

		$this->modBahan->revisidata($kodecabang, $kodebahan, $stokcabang, $stokkartu); 
	}
}
