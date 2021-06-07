<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modPenjualan');
		$this->load->model('modPaketMenu'); 
		$this->load->library('session');
		$this->load->library('form_validation');
	}

	public function showpenjualan()
	{
		$this->session->unset_userdata('cart'); 
        $data['datapenjualan'] = $this->modPenjualan->select_penjualan();
		$this->load->view('showpenjualan',$data);
	}

	public function cetaknota($nomernota)
	{
		$data['header']			= $this->modPenjualan->select_header_penjualan_bynomernota($nomernota);
		$data['detailpaket']	= $this->modPenjualan->select_detail_paketmenu_bynomernota($nomernota);
		$data['detail']			= $this->modPenjualan->select_detail_penjualan_bynomernota($nomernota);
		$this->load->view('notapenjualan',$data);
	}

	public function addpaketmenu($kodepaket) {
		$data['datamember'] = $this->modPenjualan->selectmember();
		$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();
		$data['datapaketmenu'] = $this->modPaketMenu->select_all(); 
		$data['datadetailpaketmenu'] = $this->modPaketMenu->select_detail_paketmenu(); 

		if($this->session->userdata("cart"))
		{
			$arr    		= $this->session->userdata('cart');
			$jum    		= count($arr);
			$arr[$jum][0]   = $kodepaket;
			$arr[$jum][1]   = 1;

			$databahan = $this->modPaketMenu->getDataPaket($kodepaket);
			foreach($databahan->result() as $row)
			{
				$nama  	= $row->namapaket;
				$harga 	= $row->harga;
			}
			$arr [$jum] [2] = $nama;
			$arr [$jum] [5] = $harga;
			$arr [$jum] [6] = $kodepaket; 
			
			$this->session->set_userdata("cart", $arr); // mengisi session cart dengan data arr
			redirect("/Penjualan/index"); 
		}
		else
		{
			$arr [0] [0] = $kodepaket;
			$arr [0] [1] = 1;
			
			$databahan = $this->modPaketMenu->getDataPaket($kodepaket);
			foreach($databahan->result() as $row)
			{
				$nama  	= $row->namapaket;
				$harga 	= $row->harga;
			}
			$arr [0] [2] = $nama;
			$arr [0] [5] = $harga;
			$arr [0] [6] = $kodepaket;
			
			$this->session->set_userdata ("cart",$arr);
			redirect("/Penjualan/index"); 
		}
	}

	public function index()
	{
		//$this->session->unset_userdata('cart'); 
		$data['datamember'] = $this->modPenjualan->selectmember();
		$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();
		$data['datapaketmenu'] = $this->modPaketMenu->select_all(); 
		$data['datadetailpaketmenu'] = $this->modPaketMenu->select_detail_paketmenu(); 

		if($this->input->post ("btnTambah"))
		{
			//echo "test";
			$txtkodebahanjadi  	= $this->input->post('dropMakanan');

			if($this->session->userdata("cart"))
			{
				$arr    		= $this->session->userdata('cart');
				$jum    		= count($arr);
				$arr[$jum][0]   = $txtkodebahanjadi;
				$arr[$jum][1]   = 1;

				$databahan = $this->modPenjualan->getDataNamaBahan($txtkodebahanjadi);
				foreach($databahan->result() as $row)
				{
					$nama  	= $row->namabahan;
					//$satuan = $row->satuan;
					//$stok  	= $row->stok;
					$harga 	= $row->harga;
					//$foto = $row->foto;
				}
				$arr [$jum] [2] = $nama;
				//$arr [$jum] [3] = $satuan;
				//$arr [$jum] [4] = $stok;
				$arr [$jum] [5] = $harga;
				$arr [$jum] [6] = "";			// kodepaket
				
				$this->session->set_userdata("cart", $arr); // mengisi session cart dengan data arr
				$this->load->view('masterPenjualan',$data);
			}
			else
			{
				$arr [0] [0] = $txtkodebahanjadi;
				$arr [0] [1] = 1;
				
				$databahan = $this->modPenjualan->getDataNamaBahan($txtkodebahanjadi);
				foreach($databahan->result() as $row)
				{
					$nama  	= $row->namabahan;
					//$satuan = $row->satuan;
				    //$stok  	= $row->stok;
					$harga 	= $row->harga;
					echo "1-";
					//$foto = $row->foto;
				}
				$arr [0] [2] = $nama;
				//$arr [0] [3] = $satuan;
				//$arr [0] [4] = $stok;
				$arr [0] [5] = $harga;
				$arr [0] [6] = "";
				
				$this->session->set_userdata ("cart",$arr);
				$this->load->view('masterPenjualan',$data);
			}
		}
		else if($this->input->post ("btnSimpan"))
		{
			if($this->session->userdata('cart')) {
				$tanggalan 	= date("Y-m-d");
				$username 	= $this->session->userdata('mylogin');
				$kodecabang = $this->session->userdata('codecabang');
				$member	 	= $this->input->post('txtMember');
				$nomermeja  = $this->input->post('txtNomerMeja'); 

				// simpan ke hjual
				$grandtotal = 0; 
				$arr 		= $this->session->userdata("cart");
				$jumcart 	= count($arr);
				for($i = 0; $i < $jumcart; $i+=1){
					
					$jumlahpermakanan 	= $this->input->post('txtJumlahItemPesan'.$i);
					$hargaperitem 		= $arr[$i][5];
					$subtotal 			= $arr[$i][5] * $jumlahpermakanan;
					$grandtotal 		= $grandtotal + $subtotal;
				}
				$nomernota = $this->modPenjualan->insert_transaksi($tanggalan, $username,$kodecabang, $member, $grandtotal, $nomermeja);

				// looping dari cart -> simpan ke djual 
				$arr 		= $this->session->userdata("cart");
				$jumcart 	= count($arr);
				for($i = 0; $i < $jumcart; $i+=1){					
					$kodemakanan 		= $arr[$i][0];
					$jumlahpermakanan 	= $this->input->post('txtJumlahItemPesan'.$i);
					$hargaperitem 		= $arr[$i][5];
					$subtotal 			= $hargaperitem * $jumlahpermakanan;
					$kodepaket 			= $arr[$i][6]; 

					if($kodepaket == "") {
						$detailjual = $this->modPenjualan->insert_djualtransaksi($nomernota, $kodemakanan, $jumlahpermakanan, $hargaperitem, $subtotal, $kodepaket);
					}
					else {
						$this->modPenjualan->insert_djualpaketmenu($nomernota, $kodepaket, $jumlahpermakanan, $hargaperitem, $subtotal);
						$dtdetail = $this->modPaketMenu->select_detail_paketmenu_bykodepaket($kodepaket); 
						foreach($dtdetail->result() as $rowdetail) {
							$detailjual = $this->modPenjualan->insert_djualtransaksi($nomernota, $rowdetail->kodebahan, $jumlahpermakanan, $hargaperitem, $subtotal, $kodepaket);
						}
					}
				}
				$this->session->unset_userdata('cart');

				$data['datamember'] = $this->modPenjualan->selectmember();
				$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();
				$this->load->view('masterPenjualan', $data);				
			}
			else {
				$data['message'] = "Belum ada Item Yang Mau Dijual"; 
				$this->load->view('masterPenjualan',$data);
			}
		}
		else
		{
			$data['datamember'] = $this->modPenjualan->selectmember();
			$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();
			$this->load->view('masterPenjualan', $data);
		}
	}

	public function getDetailMember()
    {
        $idmember = $this->input->post("idmember");
        $dtmem = $this->modPenjualan->selectdetailmember($idmember);
        //echo $idsupplier;
		$nomer =1;
		foreach($dtmem->result() as $row)
		{
			echo "<tr>";
			//echo "<td>Nama Supplier </td>";	
			echo "<td class='judullabel' style='font-size: 20px;'>".$row->namamember."</td>";	
		echo "</tr>";
			echo "<tr>";
				//echo "<td>Alamat </td>";	
				echo "<td class='judullabel'>".$row->emailmember."</td>";	
			echo "</tr>";
			echo "<tr>";
				//echo "<td>Kota </td>";	
				echo "<td class='judullabel'>".$row->alamatrumahmember."</td>";
			echo "</tr>";
			echo "<tr>";
				//echo "<td>Kontak Person </td>";	
				echo "<td class='judullabel'>".$row->kotamember."</td>";	
			echo "</tr>";
        }
	}
	
}
