<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UbahPassword extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modUbahPassword');
		$this->load->library('session'); 
	}
	public function index()
	{
		if($this->input->post('btnGanti'))
		{
            $lama 	    = $this->input->post('txtlama');
			$baru 	    = $this->input->post('txtbaru');
            $konfirm 	= $this->input->post('txtkonfirm');
            
            $datanamalogin = $this->session->userdata('mylogin');
            if($this->modUbahPassword->ceklama($lama,$datanamalogin) == true)
            {
                if($baru == $konfirm)
                {
                    $this->modUbahPassword->gantipass($baru,$datanamalogin);
                    $this->load->view('UbahPass');
                    $datanamalogin = $this->session->userdata('mylogin');
                    echo $datanamalogin."-";
                    echo "sukses ganti password";
                }
                else
                {
                    $this->load->view('UbahPass');
                    $datanamalogin = $this->session->userdata('mylogin');
                    echo $datanamalogin."-";
                    echo "gagal ganti";
                }
            }
            else
            {
                $this->load->view('UbahPass');
                $datanamalogin = $this->session->userdata('mylogin');
                echo $datanamalogin."-";
                echo "gagal ganti";
            }
		}
		else
		{
			$this->load->view('UbahPass');
			$datanamalogin = $this->session->userdata('mylogin');
			echo $datanamalogin."-";

		}
	}
}
