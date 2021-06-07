<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PemesananBahan extends CI_Controller {

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
		$this->load->view('showPemesananBahan',$data);
    }
    
	public function tambahPemesanan()
    {
		$params['datasupplier']  	= $this->modSupplier->select_supplier();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();
		$data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
		
		if($this->input->post('btnSimpan')){

			$kodesupp 	= $this->input->post('txtSupplier');
			$tanggal  	= $this->input->post('txtdate');
			$pilih 		= $this->input->post('Status');
			//echo $kodesupp;
			//echo $tanggal;
			//echo $pilih;
			
			$nomernota 					= $this->modPemesananBahan->insert_hpembelian($kodesupp,$pilih,$tanggal);
			$data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
			$this->load->view('showPemesananBahan',$data);
			$this->session->unset_userdata('cart');
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

				$databahan = $this->modPemesananBahan->getDataNamaBahan($txtkodebahanbaku);
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
				$this->load->view('masterPemesanan',$params);
			}
			else
			{
				$arr [0] [0] = $txtkodebahanbaku;
				$arr [0] [1] = $txtqty;
				
				$databahan = $this->modPemesananBahan->getDataNamaBahan($txtkodebahanbaku);
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
				$this->load->view('masterPemesanan',$params);
			}
		}
		else
		{
			$this->load->view('masterPemesanan',$params); 
		}
	}
    public function getDetailSupplier()
    {
        $idsupplier = $this->input->post("idsupplier");
        $dtsupplier = $this->modPemesananBahan->selectdetailsupp($idsupplier);
        //echo $idsupplier;
		$nomer =1;
		foreach($dtsupplier->result() as $row)
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
				echo "<td>Kontak Person </td>";	
				echo "<td>".$row->contactperson."</td>";	
			echo "</tr>";
        }
	}
	
	public function getBahan()
	{
		//echo "moddd";
		$idsupplier = $this->input->post("idsupplier");
		//echo $idsupplier;
		$dtsupplier = $this->modPemesananBahan->selectnomernota($idsupplier);

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
		$bhnbaku = $this->modPemesananBahan->selectstok($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4><b>Stok : ".$row->stok."</td></h4></b>";	
			echo "</tr>";
		}
	}

}
