<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DistribusiKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modDistribusiKeluar');
        $this->load->model('modCabang');
		$this->load->model('modBahan');
		$this->load->library('session');
	}
	public function index()
	{
        $this->session->unset_userdata('cart');
        
        $kode = $this->session->userdata('codecabang');
        //echo $kode;
        $data['datadistribusi'] = $this->modDistribusiKeluar->select_data($kode);
		$this->load->view('showDistribusiKeluar',$data);
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
			
			$nomernota = $this->modDistribusiKeluar->insert_hdistribusi($asal,$tujuan,$tanggal);

			// looping dari cart 
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				
				$kodebahan 	= $arr[$i][0];
				$kodesatuan = $arr[$i][3];
				$qtypengiriman 		= $this->input->post('txtqtyasal'.$i);
				//echo $kodebahan."-";
				//echo $qty."=";
				$this->modDistribusiKeluar->insert_ddistribusi($nomernota,$kodebahan,$kodesatuan,$qtypengiriman);
			}
			$data['datadistribusi'] = $this->modDistribusiKeluar->select_data();
			$this->load->view('showDistribusiKeluar',$data);
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

				$databahan = $this->modDistribusiKeluar->getDataNamaBahan($txtkodebahanbaku);
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
				
				$databahan = $this->modDistribusiKeluar->getDataNamaBahan($txtkodebahanbaku);
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
        $dtcabang = $this->modDistribusiKeluar->selectdetailcabang($idcabang);
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
		$dtsupplier = $this->modDistribusiKeluar->selectnomernota($idsupplier);

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
		$bhnbaku = $this->modDistribusiKeluar->selectstok($idbahan);

		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td><h4><b>Stok : ".$row->stok."</td></h4></b>";	
			echo "</tr>";
		}
	}

	public function bukadetail()
	{
		$params['datacabang']  	    = $this->modCabang->select_cabang();
		$params['databahanbaku'] 	= $this->modBahan->BomSelectBahanBaku();

		$kodenota	= $this->input->post('kode');
		$detail 	= $this->modDistribusiKeluar->selectPenerimaanByKode($kodenota);
		echo $detail->num_rows();
		foreach($detail->result() as $row) {
			$params['nomernota'] 		= $row->nomernota;
			$params['tanggal'] 			= $row->tanggal;
			$params['kodecabangasal'] 	= $row->kodecabangasal;
			$params['kodecabangtujuan'] = $row->kodecabangtujuan;
			$params['status'] 			= $row->status;
		}
		$datacart 	= $this->modDistribusiKeluar->selectdataforcart($kodenota);
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
		$this->load->view('masterPenerimaanDistribusiKeluar',$params); 
	}

	public function penerimaan()
	{
		if($this->input->post('btnSimpan')) {
			//$tanggal  		= $this->input->post('txtdate');
			//$pilih 			= $this->input->post('Status');
			$notadiskeluar 	= $this->input->post('txtNoNotaDisKeluar');
			//echo $kodesupp;
			//echo $tanggal;
			//echo $pilih;
			
			$nomernota = $this->modDistribusiKeluar->update_hdistribusi($notadiskeluar);

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
				$this->modDistribusiKeluar->update_ddistribusi($qty,$nomer,$kodebahan,$kode);
				echo "masuk";
			}

			$kode = $this->session->userdata('codecabang');
			//echo $kode;
			$data['datadistribusi'] = $this->modDistribusiKeluar->select_data($kode);
			$this->load->view('showDistribusiKeluar',$data);
			//$this->session->unset_userdata('cart');
			echo "success";
		}
	}

	public function getDetailCabAsal()
    {
        $idcabang = $this->input->post("idcabang");
        $dtcabang = $this->modDistribusiKeluar->selectdetailCabangg($idcabang);
        echo $idcabang;
		$nomer =1;
		foreach($dtcabang->result() as $row)
		{
			echo "<tr>";
			//echo "<td>Nama Supplier </td>";	
			echo "<td class='judullabel' style='font-size: 20px;'>".$row->namacabang."</td>";	
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
				echo "<td class='judullabel'>".$row->nomertelp."</td>";	
			echo "</tr>";
        }
	}

}
