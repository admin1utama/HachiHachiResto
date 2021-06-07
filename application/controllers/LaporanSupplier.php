<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSupplier extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanSupplier');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanSupplier');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$datakaryawan 	= $this->modLaporanSupplier->selectfilter($datafilter);
        //echo count($datakaryawan->result());
		
		$nomer =1;
		foreach($datakaryawan->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodesupplier."</td>";
                echo "<td>".$row->namasupplier."</td>";
                echo "<td>".$row->contactperson."</td>";
                echo "<td class='tengahtulisan'>".$row->nomertelp."</td>";
                echo "<td class='tengahtulisan'>".$row->alamat."</td>";
                echo "<td class='tengahtulisan'>".$row->kota."</td>";
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
			$data['cetakdata']	= $this->modLaporanSupplier->selectfilter($datafilter);
			//echo count($bhnbaku->result());

			$this->load->view('showCetakLaporanSupplier',$data);
		}
	}
}
