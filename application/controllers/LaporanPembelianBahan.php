<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPembelianBahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanPembelianBahan');
		$this->load->library('session'); 
	}
	public function index()
	{
		//$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
		$this->load->view('masterLaporanPembelianBahan');

    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $awal = $this->input->post("tglawal");
        $akhir = $this->input->post("tglakhir");
        //echo $awal;
		$bhnbaku 	= $this->modLaporanPembelianBahan->selecttransaksi($awal,$akhir);
        //echo count($bhnbaku->result());
		
		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<th>"; 
				echo "<a target='_blank' href='".site_url('PemesananBahan/cetaknota/'.$row->nomernota)."'><h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5></a>"; 
				echo "<h3 style='font-weight: bold;'>".$row->namasupplier."</h3>"; 
				echo "<h3 style='font-weight: bold;'>".$row->kota."</h3>"; 
				echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
				echo "</th>";
				echo "<th><h3 style='font-weight: bold;'>".$row->jumitem." items</h3><th>";
				echo "<th style='text-align: right;'><h3 style='font-weight: bold;'>Rp. ".number_format($row->subtotal).",-</h3><th>";
				echo "<th><h3 style='font-weight: bold;'>".$row->status."</h3><th>";
			echo "</tr>"; 
			// echo "<tr>";
			// 	echo "<th><b><h3 style='color:red';>Nomer Nota : ".$row->nomernota.
			// 	"</b></h3><br></th>";
			// 	echo "<th><h4 style='color:black'>Tanggal : ".$row->tanggal."</h4><br>".$row->namasupplier."<br>".$row->alamat."<br>".$row->nomertelp."</th>";
			// 	echo "<th><b><h4>".number_format($row->subtotal)."</b></h4><br><br><br><th>";
			// 	echo "<th><b><h4>".number_format($row->qty)." Item</b></h4><br><br><br><th>";
			// echo "</tr>";
			$nomer+=1;
		}
	}

	public function cetak()
	{
		if($this->input->post('btnPrint')) {

			//echo "testinggggg";
			$datafilter = $this->input->post("txtnamabahan");
			//echo $datafilter;
			$data['cetakdata']	= $this->modLaporanBahan->selectfilter($datafilter);
			//echo count($bhnbaku->result());

			$this->load->view('showCetakLaporanBahan',$data);
		}
	}

}
