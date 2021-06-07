<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanMember extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanMember');
		$this->load->library('session'); 
	}
	public function index()
	{
		$this->load->view('showLaporanMember');
    }
    
    public function getFilter()
	{
		//echo "testinggggg";
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$datamember 	= $this->modLaporanMember->selectfilter($datafilter);
        //echo count($datamember->result());
		
		$nomer =1;
		foreach($datamember->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodemember."</td>";
                echo "<td>".$row->namamember."</td>";
                echo "<td>".$row->emailmember."</td>";
                echo "<td class='tengahtulisan'>".$row->kotamember."</td>";
                echo "<td class='tengahtulisan'>".$row->alamatrumahmember."</td>";
                echo "<td class='tengahtulisan'>".$row->tanggallahirmember."</td>";
                echo "<td class='tengahtulisan'>".$row->notelpmember."</td>";
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
			$data['cetakdata']	= $this->modLaporanMember->selectfilter($datafilter);
			//echo count($bhnbaku->result());

			$this->load->view('showCetakLaporanMember',$data);
		}
	}
}
