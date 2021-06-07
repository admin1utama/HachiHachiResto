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
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	public function index()
	{
		//$this->session->unset_userdata('cart'); 
		$data['datamember'] = $this->modPenjualan->selectmember();
		$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();

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
				
				$this->session->set_userdata ("cart",$arr);
				$this->load->view('masterPenjualan',$data);
			}
		}
		else if($this->input->post ("btnSimpan"))
		{
			$tanggalan 	= date("Y-m-d");
			$username 	= $this->session->userdata('mylogin');
			$member	 	= $this->input->post('txtMember');

			$grandtotal = 0; 
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				
				$jumlahpermakanan 	= $this->input->post('txtJumlahItemPesan'.$i);
				$hargaperitem 		= $arr[$i][5];
				$subtotal 			= $arr[$i][5] * $jumlahpermakanan;
				$grandtotal 		= $grandtotal + $subtotal;
			}
			$nomernota = $this->modPenjualan->insert_transaksi($tanggalan, $username, $member, $grandtotal);

			// looping dari cart 
			$arr 		= $this->session->userdata("cart");
			$jumcart 	= count($arr);
			for($i = 0; $i < $jumcart; $i+=1){
				
				$kodemakanan 		= $arr[$i][0];
				$jumlahpermakanan 	= $this->input->post('txtJumlahItemPesan'.$i);
				$hargaperitem 		= $arr[$i][5];
				$subtotal 			= $arr[$i][5] * $jumlahpermakanan;
				//echo $namamakanan."-";
				//echo $jumlahpermakanan."=";
				$detailjual = $this->modPenjualan->insert_djualtransaksi($nomernota,$kodemakanan,$jumlahpermakanan,$hargaperitem,$subtotal);
			}
			$this->session->unset_userdata('cart');
			$data['datamember'] = $this->modPenjualan->selectmember();
			$data['databahanjadi'] = $this->modPenjualan->selectbahanjadi();
			$this->load->view('masterPenjualan', $data);

			echo "success";
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
