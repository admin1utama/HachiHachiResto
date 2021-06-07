<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanSatuan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanSatuan');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanSatuan');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$satuan 	= $this->modLaporanSatuan->selectfilter($datafilter);
        //echo count($satuan->result());
		
		$nomer =1;
		foreach($satuan->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodesatuan."</td>";
                echo "<td class='tengahtulisan'>".$row->namasatuan."</td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function cetak()
	{
		if($this->input->post('btnPrint')) {

			//echo "testinggggg";
			$datafilter = $this->input->post("txtnamasatuan");
			//echo $datafilter;
			$data['cetakdata']	= $this->modLaporanSatuan->selectfilter($datafilter);

			$this->load->view('showCetakLaporanSatuan',$data);
		}
	}
}
