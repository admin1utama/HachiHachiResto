<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanAdmin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanAdmin');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanAdmin');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$datakaryawan 	= $this->modLaporanAdmin->selectfilter($datafilter);
        //echo count($datakaryawan->result());
		
		$nomer =1;
		foreach($datakaryawan->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodekaryawan."</td>";
                echo "<td>".$row->namacabang."</td>";
                echo "<td>".$row->nama."</td>";
                echo "<td class='tengahtulisan'>".$row->tanggalmulai."</td>";
                echo "<td class='tengahtulisan'>".$row->noidentitas."</td>";
                echo "<td class='tengahtulisan'>".$row->nomertelp."</td>";
				echo "<td class='tengahtulisan'>".$row->jabatan."</td>";
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
			$data['cetakdata']	= $this->modLaporanAdmin->selectfilter($datafilter);
			//echo count($bhnbaku->result());

			$this->load->view('showCetakLaporanAdmin',$data);
		}
	}
}
