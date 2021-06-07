<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanCabang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanCabang');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanCabang');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$datacabang 	= $this->modLaporanCabang->selectfilter($datafilter);
        //echo count($datacabang->result());
		
		$nomer =1;
		foreach($datacabang->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodecabang."</td>";
                echo "<td>".$row->namacabang."</td>";
                echo "<td>".$row->alamat."</td>";
                echo "<td class='tengahtulisan'>".$row->kota."</td>";
                echo "<td class='tengahtulisan'>".$row->tanggalberdiri."</td>";
                echo "<td class='tengahtulisan'>".$row->nomertelp."</td>";
				echo "<td class='tengahtulisan'>".$row->jenis."</td>";
				echo "<td class='tengahtulisan'>".$row->status."</td>";
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
			$data['cetakdata']	= $this->modLaporanCabang->selectfilter($datafilter);
			//echo count($bhnbaku->result());

			$this->load->view('showCetakLaporanCabang',$data);
		}
	}
}
