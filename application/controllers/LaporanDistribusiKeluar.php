<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanDistribusiKeluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanDistribusiKeluar');
		$this->load->model('modCabang'); 
		$this->load->model('modBahan'); 
		$this->load->library('session'); 
	}
	public function index()
	{
		if($this->session->userdata('jabatan') == 'ADMIN') 
		{ $params['datacabang'] = $this->modCabang->select_cabang(); }
		else 
		{ 
			$kode = $this->session->userdata('codecabang');
			$params['datacabang'] = $this->modBahan->selectcabang($kode); 
		}
		$this->load->view('showLaporanDistribusiKeluar', $params);
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
		$kodecabang = $this->input->post("kodecabang"); 
        $awal = $this->input->post("tglawal");
        $akhir = $this->input->post("tglakhir");
        //echo $awal;
		$bhnbaku 	= $this->modLaporanDistribusiKeluar->selecttransaksi_bykodecabang($kodecabang, $awal,$akhir);
        //echo count($bhnbaku->result());

		
		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<input type='hidden' name='kode' id='kode' value='".$row->nomernota."'>"; 
            // echo form_input("kode",$row->nomernota);
            $kode = $this->input->post("kode");
            //echo $kode;
            $datacart 	= $this->modLaporanDistribusiKeluar->selectdataforcart($kode);
            //echo $datacart->num_rows();
            echo "<tr>"; 
            echo "<th>"; 
              echo "<h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5>"; 
              echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>";
              //echo "<h5 style='color:red; font-weight: bold;'>Item : ".$datacart->num_rows()."</h5>"; 
            echo "</th>";
            echo "<th>"; 
              echo "<h5 style='color:red; font-weight: bold;'>Cabang Asal : </h5>"; 
              echo "<h3 style='font-weight: bold;'>".$row->namacabangasal."</h3>"; 
              echo "<h3 style='font-weight: bold;'>".$row->kotaasal."</h3>"; 
            echo "</th>";
            echo "<th>"; 
              echo "<h5 style='color:red; font-weight: bold;'>Cabang Tujuan : </h5>"; 
              echo "<h3 style='font-weight: bold;'>".$row->namacabangtujuan."</h3>"; 
              echo "<h3 style='font-weight: bold;'>".$row->kotatujuan."</h3>"; 
            echo "</th>";
            echo "<td><br><br><button type='submit' class='btn btn-lg btn-danger'><i class='icon_pencil-edit_alt'></i></button></td>"; 
          echo "</tr>"; 
			$nomer+=1;
        }

	}

	public function cetakdetail()
	{
        $kode = $this->input->post("kode");
        //echo $kode;
        //$data 	= $this->modLaporanDistribusiMasuk->selectcetakdetail($kode);
        $data['data'] = $this->modLaporanDistribusiKeluar->selectcetakdetail($kode);
        //echo $data->num_rows();

        $datacart 	= $this->modLaporanDistribusiKeluar->selectdataforcart($kode);
        //echo $datacart->num_rows();
		$arr    = [];
		$jum    = 0;
		foreach($datacart->result() as $row) {
		    //$kodebahan   	= $row->kodebahan;
			$namabahan   	= $row->namabahan;
			$kodesatuan  	= $row->kodesatuan;
			$qtyasal		= $row->qtyasal;
			//$harga    		= $row->hargabeli;
			//$arr [$jum] [0] = $kodebahan;
			//$arr [$jum] [1] = $qty;
			$arr [$jum] [2] = $namabahan;
			$arr [$jum] [3] = $kodesatuan;
			$arr [$jum] [4] = $qtyasal;
			//$arr [$jum] [5] = $harga;
		 
			$jum+=1; 
			//echo "1-";
		}
		$this->session->set_userdata("cart", $arr);
		$this->load->view('showCetakDistribusiKeluar',$data);
	}

}
