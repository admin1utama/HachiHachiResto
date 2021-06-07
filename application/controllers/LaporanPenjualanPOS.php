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
            echo "<th><b><h3 style='color:red';>Nomer Nota : ".$row->nomernota.
            "</b></h3><br>".$row->namamember."<br>Alamat : ".$row->alamatrumahmember.", ".$row->kotamember."<br>No. Telp : ".$row->notelpmember."</th>";
           echo "<th><h4 style='color:black'>Tanggal : ".$row->tanggal."</h4><br></th>";
            echo "<th><b><h4>Rp. ".number_format($row->grandtotal)."</b></h4><br><br><br><th>";
           // echo "<th><b><h4>".number_format($row->qty)." Item</b></h4><br><br><br><th>";
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
