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
		echo "testinggggg";
        $awal = $this->input->post("tglawal");
        $akhir = $this->input->post("tglakhir");
        //echo $awal;
		$bhnbaku 	= $this->modLaporanPembelianBahan->selecttransaksi($awal,$akhir);
        //echo count($bhnbaku->result());
		
		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<th><b><h3 style='color:red';>Nomer Nota : ".$row->nomernota.
				"</b></h3><br></th>";
				echo "<th><h4 style='color:black'>Tanggal : ".$row->tanggal."</h4><br>".$row->namasupplier."<br>".$row->alamat."<br>".$row->nomertelp."</th>";
				echo "<th><b><h4>".number_format($row->subtotal)."</b></h4><br><br><br><th>";
				echo "<th><b><h4>".number_format($row->qty)." Item</b></h4><br><br><br><th>";
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
