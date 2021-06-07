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
        //echo $kode;
        $data['datadistribusi'] = $this->modDistribusiMasuk->select_data($kode);
		$this->load->view('showDistribusiMasuk',$data);
    }
    
	public function tambahdistribusi()
    {
        //echo "masuk";
        $params['datacabang']  	    = $this->modCabang->select_cabang();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();
		
		if($this->input->post('btnSimpan')){
			echo "test";

			$asal 		= $this->input->post('txtcabangasal');
			$tujuan 		= $this->input->post('txtcabangtujuan');
			$tanggal 		= $this->input->post('txtdate');
			//echo $asal;
			//echo $tujuan;
			
			$nomernota = $this->modDistribusiMasuk->insert_hdistribusi($asal,$tujuan,$tanggal);

			// looping dari cart 
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				
				$kodebahan 	= $arr[$i][0];
				$kodesatuan = $arr[$i][3];
				$qtypengiriman 		= $this->input->post('txtqtyasal'.$i);
				//echo $kodebahan."-";
				//echo $qty."=";
				$this->modDistribusiMasuk->insert_ddistribusi($nomernota,$kodebahan,$kodesatuan,$qtypengiriman);
			}
			$data['datadistribusi'] = $this->modDistribusiMasuk->select_data();
			$this->load->view('showDistribusiMasuk',$data);
			//echo "success";
		}
		else if($this->input->post ("btnTambah"))
		{
			//echo "test";
			$txtsupp    		= $this->input->post('txtSupplier') ;
			$txtkodebahanbaku  	= $this->input->post('dropBahanBaku');
			//$txtqty    			= $this->input->post('txtQtyPemesanan');

			if($this->session->userdata("cart"))
			{
				$arr    		= $this->session->userdata('cart');
				$jum    		= count($arr);
				$arr[$jum][0]   = $txtkodebahanbaku;
				//$arr[$jum][1]   = $txtqty;

				$databahan = $this->modDistribusiMasuk->getDataNamaBahan($txtkodebahanbaku);
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
				$this->load->view('masterDistribusi',$params);
			}
			else
			{
				$arr [0] [0] = $txtkodebahanbaku;
				//$arr [0] [1] = $txtqty;
				
				$databahan = $this->modDistribusiMasuk->getDataNamaBahan($txtkodebahanbaku);
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
				$this->load->view('masterDistribusi',$params);
			}
		}
		else
		{
			$this->load->view('masterDistribusi',$params); 
		}
	}
    public function getDetailCabang()
    {
        $idcabang = $this->input->post("idcabang");
        $dtcabang = $this->modDistribusiMasuk->selectdetailcabang($idcabang);
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
		$dtsupplier = $this->modDistribusiMasuk->selectnomernota($idsupplier);

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
		$bhnbaku = $this->modDistribusiMasuk->selectstok($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4><b>Stok : ".$row->stok."</td></h4></b>";	
			echo "</tr>";
		}
	}

}
