<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPenjualanPOS extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modPenjualanPOS');
		$this->load->library('session'); 
	}
	public function index()
	{
		//$data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
		$this->load->view('masterLaporanPenjualanPOS');

    }
    public function getFilter()
	{
		//echo "testinggggg";
        $awal = $this->input->post("tglawal");
        $akhir = $this->input->post("tglakhir");
        //echo $awal;
		$penjualan 	= $this->modPenjualanPOS->selecttransaksi($awal,$akhir);
        //echo count($penjualan->result());
		
		$nomer =1;
		foreach($penjualan->result() as $row)
		{
			echo "<tr>";
				echo "<th>"; 
				echo "<a target='_blank' href='".site_url('Penjualan/cetaknota/'.$row->nomernota)."'><h5 style='color:red; font-weight: bold;'>Nota : ".$row->nomernota."</h5></a>"; 
				echo "<h3 style='font-weight: bold;'>".$row->namamember."</h3>"; 
				echo "<h3 style='font-weight: bold;'>".$row->kotamember."</h3>"; 
				echo "<h5 style='color:red; font-weight: bold;'>".date("d F Y", strtotime($row->tanggal))."</h5>"; 
				echo "</th>";
				echo "<th><h3 style='font-weight: bold;'>".$row->jumitem." items</h3><th>";
				echo "<th><h3 style='font-weight: bold;'>Rp. ".number_format($row->grandtotal).",-</h3><th>";
				echo "<th><a target='_blank' href='".site_url('Penjualan/cetaknota/'.$row->nomernota)."'> 
				<input type='button' value='print' onclick=''></a><th>";
				//echo "<th><h3 style='font-weight: bold;'>".$row->status."</h3><th>";
			echo "</tr>"; 
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
