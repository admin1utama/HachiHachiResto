<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanPembelianBahan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanBahan');
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
        $datafilter = $this->input->post("datanama");
        //echo $datafilter;
		$bhnbaku 	= $this->modLaporanBahan->selectfilter($datafilter);
        //echo count($bhnbaku->result());
		
		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				//echo "<td>".$nomer."</td>";
                echo "<td class='tengahtulisan'>".$row->kodebahan."</td>";
                echo "<td>".$row->namabahan."</td>";
                echo "<td class='tengahtulisan'>".$row->satuan."</td>";
                echo "<td class='tengahtulisan'>".$row->jenis."</td>";
                echo "<td class='kanantulisan'>".$row->harga."</td>";
                echo "<td class='tengahtulisan'>".$row->stok."</td>";
				//echo "<td class='tengahtulisan'>".$row->stok."</td>";
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
