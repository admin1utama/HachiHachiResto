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

	public function cetaknota($nomernota)
	{
		echo $nomernota; 
		$data['header']	= $this->modPemesananBahan->selectPenerimaanByKode($nomernota);
		$data['detail']	= $this->modPemesananBahan->selectdataforcart($nomernota);
		$this->load->view('notapemesanan',$data);
	}

	public function index()
	{   
		// temporary utk membenahi subtotal pembelian
		// $dt = $this->modPemesananBahan->updating_pemesanan(); 
		// foreach($dt->result() as $row) {
		// 	$this->modPemesananBahan->update_subtotal($row->nomernota, $row->subtotal); 
		// }

		$this->session->unset_userdata('cart'); 
        $data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
		$this->load->view('showPemesananBahan',$data);
	}
	public function removeFromCart()
	{
		$no 	= $this->input->post('no'); 		
		$arr 	= $this->session->userdata("cart");
		array_splice($arr, $no, 1); 
		$this->session->set_userdata("cart", $arr); 
	}
	public function tambahPemesanan()
    {
		$params['datasupplier']  	= $this->modSupplier->select_supplier();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();
		$data['datapemesananbahan'] = $this->modPemesananBahan->select_pemesanan();
		
		if($this->input->post('btnSimpan')){
			if($this->session->userdata('cart')) {
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
			}
			else {
				$params['message'] = "Belum ada Bahan Baku Yang Dibeli"; 
				$this->load->view('masterPemesanan',$params);
			}
			//echo "success";
		}
		else if($this->input->post ("btnTambah"))
		{
			//echo "test";
			$txtsupp    		= $this->input->post('txtSupplier') ;
			$txtkodebahanbaku  	= $this->input->post('dropBahanBaku');
			$txtqty    			= $this->input->post('txtQtyPemesanan');
			$cbsatuan   		= $this->input->post('cbsatuan'); 

			if($this->session->userdata("cart"))
			{
				$arr    		= $this->session->userdata('cart');
				$jum    		= count($arr);

				$valid = 1; 
				for($i = 0; $i < $jum; $i++) {
					if($arr[$i][0] == $txtkodebahanbaku)
					{ $valid = 0; }
				}

				if($valid == 1) {
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

					// get nilai konversi 
					$nilaikonversi = $this->modPemesananBahan->getNilaiKonversi($txtkodebahanbaku, $cbsatuan, $satuan); 
					
					$arr [$jum] [2] = $nama;
					// $arr [$jum] [3] = $satuan;
					$arr [$jum] [3] = $cbsatuan;
					$arr [$jum] [4] = $stok;
					$arr [$jum] [5] = $harga;
					$arr [$jum] [6] = $nilaikonversi;
					
					$this->session->set_userdata("cart", $arr); // mengisi session cart dengan data arr	
				}

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
				// get nilai konversi 
				$nilaikonversi = $this->modPemesananBahan->getNilaiKonversi($txtkodebahanbaku, $cbsatuan, $satuan); 

				$arr [0] [2] = $nama;
				$arr [0] [3] = $satuan;
				$arr [0] [4] = $stok;
				$arr [0] [5] = $harga;
				$arr [0] [6] = $nilaikonversi;
				
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
			//echo "<td>Nama Supplier </td>";	
			echo "<td class='judullabel' style='font-size: 20px;'>".$row->namasupplier."</td>";	
		echo "</tr>";
			echo "<tr>";
				//echo "<td>Alamat </td>";	
				echo "<td class='judullabel'>".$row->alamat."</td>";	
			echo "</tr>";
			echo "<tr>";
				//echo "<td>Kota </td>";	
				echo "<td class='judullabel'>".$row->kota."</td>";
			echo "</tr>";
			echo "<tr>";
				//echo "<td>Kontak Person </td>";	
				echo "<td class='judullabel'>".$row->contactperson."</td>";	
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
				echo "<td>".number_format($row->subtotal)."</td>";		
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

	public function getStok_bycabang()
	{
		$kodecabang = $this->input->post('kodecabang'); 
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modPemesananBahan->selectstok_bygudang($kodecabang, $idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4 style='font-weight: bold;'>Stok : </h4></td><td><h4 style='font-weight: bold;'>".$row->stok."</h4></td>";	
			echo "</tr>"; 
			echo "<tr>"; 
				echo "<td><h4 style='font-weight: bold;'>Satuan : </h4></td><td><h4 style='font-weight: bold;'>".$row->satuan."</h4></td>";	
			echo "</tr>";
		}
	}


	public function getStok()
	{
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modPemesananBahan->selectstok_bygudang('KC1', $idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4 style='font-weight: bold;'>Stok : </h4></td><td><h4 style='font-weight: bold;'>".$row->stok."</h4></td>";	
			echo "</tr>"; 
			echo "<tr>"; 
				echo "<td><h4 style='font-weight: bold;'>Satuan : </h4></td><td><h4 style='font-weight: bold;'>".$row->satuan."</h4></td>";	
			echo "</tr>";
		}
	}

	public function getSatuan()
	{
		$idbahan = $this->input->post("idbahan");
		$bhnbaku = $this->modPemesananBahan->selectsatuan($idbahan);
		foreach($bhnbaku->result() as $row)
		{
			echo "<option value='".$row->kodesatuan1."'>".$row->kodesatuan1."</option>"; 
		}
	}
}
