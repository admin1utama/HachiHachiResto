<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPaketMenu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanPaketMenu');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanPaketMenu');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$konversi 	= $this->modLaporanPaketMenu->selectfilter($datafilter);
        //echo count($satuan->result());
		
		$nomer =1;
		foreach($konversi->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodepaket."</td>";
                echo "<td class='tengahtulisan'>".$row->namapaket."</td>";
                echo "<td class='tengahtulisan'>".$row->harga."</td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function cetak()
	{
		if($this->input->post('btnPrint')) {

			//echo "testinggggg";
			$datafilter = $this->input->post("txtnama");
			//echo $datafilter;
			$data['cetakdata']	= $this->modLaporanPaketMenu->selectfilter($datafilter);

			$this->load->view('showCetakLaporanPaketMenu',$data);
		}
	}
}
