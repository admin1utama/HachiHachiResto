<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanBahanBaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanBahanBaku');
		$this->load->library('session'); 
	}
	public function index()
	{
		$params['databahanbaku'] 	= $this->modLaporanBahanBaku->selectbahanbaku();
		$params['datacabang'] 		= $this->modLaporanBahanBaku->selectcabang();
        $this->load->view('showLaporanBahanBaku',$params);

        if($this->input->post('btnLihat'))
        {
            $drop  = $this->input->post('dropBahanBaku'); 
            echo $drop;
        }
	}

	public function getDetailStokBahan()
	{
		//echo "testinggggg";
		$kodebahan 	= $this->input->post("kodebahan");
		$kodecabangg = $this->input->post("kodecabang");

		$bhnbaku 	= $this->modLaporanBahanBaku->selectstok($kodebahan,$kodecabangg);
		//echo $bhnbaku;
		
		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namacabang."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td class='tengahtulisan'>".$row->stok."</td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function cetak($kodebahan, $kodecabangg)
	{
		$data['cetakdata']	= $this->modLaporanBahanBaku->selectstok($kodebahan,$kodecabangg);
		$this->load->view('showCetakLaporanBahanBaku',$data);
	}
}
