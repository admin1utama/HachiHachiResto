<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanBahanBaku extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modLaporanBahanBaku');
		$this->load->library('session'); 
	}
	public function index()
	{
        $params['databahanbaku'] 	= $this->modLaporanBahanBaku->selectbahanbaku();
        $this->load->view('showLaporanBahanBaku',$params);

        if($this->input->post('btnLihat'))
        {
            $drop  = $this->input->post('dropBahanBaku'); 
            echo $drop  ;
        }
	}

	public function getDetailStokBahan()
	{
		//echo "testinggggg";
		$kodebahan 	= $this->input->post("kodebahan");
		//echo $kodebahan."--H--";
		$bhnbaku 	= $this->modLaporanBahanBaku->selectstok($kodebahan);
		//echo $bhnbaku;
		
		//$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$row->namacabang."</td>";
				echo "<td class='tengahtulisan'>".$row->stok."</td>";
			echo "</tr>";
			//$nomer+=1;
		}
	}
}
