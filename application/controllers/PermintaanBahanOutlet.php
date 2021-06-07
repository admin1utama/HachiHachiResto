<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PermintaanBahanOutlet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modPermintaanBahanOutlet');
        //$this->load->model('modPemesananBahan');
        $this->load->model('modCabang');
		$this->load->model('modBahan');
		$this->load->library('session');
	}
	public function index()
	{
		$this->session->unset_userdata('cart');        
        $data['datapemesananbahan'] = $this->modPermintaanBahanOutlet->select_permintaan();
		$this->load->view('showPermintaanBahanOutlet',$data);
    }
    
	public function tambahPermintaan()
    {
        $params['datacabang']  	    = $this->modCabang->select_cabang();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();
		$data['datapemesananbahan'] = $this->modPermintaanBahanOutlet->select_pemesanan();
		
		if($this->input->post('btnSimpan')){

			$kodecabang 	= $this->input->post('txtcabang');
			$tanggal  	= $this->input->post('txtdate');
			//$pilih 		= $this->input->post('Status');
			//echo $kodesupp;
			//echo $tanggal;
			//echo $pilih;
			
			$nomernota 					= $this->modPermintaanBahanOutlet->insert_hdistribusi($kodecabang,$tanggal);
            //$data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();


            $this->session->unset_userdata('cart');
            $params['datacabang']  	    = $this->modCabang->select_cabang();
            $params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();
            $data['datapemesananbahan'] = $this->modPermintaanBahanOutlet->select_pemesanan();
            
			$this->load->view('showPermintaanBahanOutlet',$data);
			
			echo "success";
		}
		else if($this->input->post ("btnTambah"))
		{
			//echo "test";
			$txtsupp    		= $this->input->post('txtSupplier') ;
			$txtkodebahanbaku  	= $this->input->post('dropBahanBaku');
			$txtqty    			= $this->input->post('txtQtyPemesanan');

			if($this->session->userdata("cart"))
			{
				$arr    		= $this->session->userdata('cart');
				$jum    		= count($arr);
				$arr[$jum][0]   = $txtkodebahanbaku;
				$arr[$jum][1]   = $txtqty;

				$databahan = $this->modPermintaanBahanOutlet->getDataNamaBahan($txtkodebahanbaku);
				foreach($databahan->result() as $row)
				{
					$nama  	= $row->namabahan;
					$satuan = $row->satuan;
					$stok  	= $row->stok;
					$harga 	= $row->harga;
					//$foto = $row->foto;
				}
				$arr [$jum] [2] = $nama;
				$arr [$jum] [3] = $satuan;
				$arr [$jum] [4] = $stok;
				$arr [$jum] [5] = $harga;
				
				$this->session->set_userdata("cart", $arr); // mengisi session cart dengan data arr
				$this->load->view('masterPermintaanBahanOutlet',$params);
			}
			else
			{
				$arr [0] [0] = $txtkodebahanbaku;
				$arr [0] [1] = $txtqty;
				
				$databahan = $this->modPermintaanBahanOutlet->getDataNamaBahan($txtkodebahanbaku);
				foreach($databahan->result() as $row)
				{
					$nama  	= $row->namabahan;
					$satuan = $row->satuan;
					$stok  	= $row->stok;
					$harga 	= $row->harga;
					echo "1-";
					//$foto = $row->foto;
				}
				$arr [0] [2] = $nama;
				$arr [0] [3] = $satuan;
				$arr [0] [4] = $stok;
				$arr [0] [5] = $harga;
				
				$this->session->set_userdata ("cart",$arr);
				$this->load->view('masterPermintaanBahanOutlet',$params);
			}
		}
		else
		{
			$this->load->view('masterPermintaanBahanOutlet',$params); 
		}
	}
    public function getDetailCabang()
    {
        $idcabang = $this->input->post("idcabang");
        $dtcabang = $this->modPermintaanBahanOutlet->selectdetailcabang($idcabang);
        //echo $idsupplier;
		$nomer =1;
		foreach($dtcabang->result() as $row)
		{
			echo "<tr>";
				echo "<td>Alamat </td>";	
				echo "<td>".$row->alamat."</td>";	
			echo "</tr>";
			echo "<tr>";
				echo "<td>Kota </td>";	
				echo "<td>".$row->kota."</td>";
			echo "</tr>";
			echo "<tr>";
				echo "<td>Nomer Telepon </td>";	
				echo "<td>".$row->nomertelp."</td>";	
			echo "</tr>";
        }
	}
	
	public function getBahan()
	{
		//echo "moddd";
		$idsupplier = $this->input->post("idsupplier");
		//echo $idsupplier;
		$dtsupplier = $this->modPermintaanBahanOutlet->selectnomernota($idsupplier);

		$nomer =1;
		foreach($dtsupplier->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td>".$row->qty."</td>";
				echo "<td>".$row->harga."</td>";
				echo "<td>".$row->subtotal."</td>";		
				//echo "<td><button onclick=hapusbom('".$row->kodebom."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			$nomer+=1;
        }
	}

	public function insertPesan()
	{
		$textbahanjadi 	= $this->input->post('idbahanjadi'); 
		$textbahanbaku 	= $this->input->post('idbahanbaku');
		$textqty 		= $this->input->post('qty');
		//echo $textbahanjadi."-".$textbahanbaku."-".$textqty;
		$this->modBahan->insert_bom($textbahanjadi, $textbahanbaku,$textqty);
		echo "success";
	}

	public function getStok()
	{
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modPermintaanBahanOutlet->selectstok($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4><b>Stok : ".$row->stok."</td></h4></b>";	
			echo "</tr>";
		}
	}

}
