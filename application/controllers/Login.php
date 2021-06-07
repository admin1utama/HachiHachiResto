<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
        $this->load->model('modLogin');
		$this->load->model('modBahan');
        $this->load->library('session');
        $this->load->library('form_validation');
	}
	public function index()
	{
        $this->session->unset_userdata('mylogin');
        $this->session->unset_userdata('jabatan');
        $this->session->unset_userdata('codecabang');

        if($this->input->post("btnLogin"))
        {
            $txtusername 	= $this->input->post("txtusername"); 
            $txtpassword 	= $this->input->post("txtpassword");
            
            $this->form_validation->set_rules(
				'txtusername', 'Username',
                'required',
                array('required'     =>'Tidak Boleh Kosong'));
            $this->form_validation->set_rules(
				'txtpassword', 'Password',
                'required',
                array('required'     =>'Password Tidak Boleh Kosong'));


            if($this->form_validation->run() == TRUE)
            {
                if($this->modLogin->ceklogin($txtusername, $txtpassword) == true)
                {
                    $this->session->set_userdata('mylogin', $txtusername);
                    if($this->modLogin->jabatanKG($txtusername) == true)
                    {
                        $this->session->set_userdata('jabatan', 'KEPALA GUDANG');
                    }
                    else if ($this->modLogin->jabatanAD($txtusername) == true)
                    {
                        $this->session->set_userdata('jabatan', 'ADMIN');
                    }
                    else if ($this->modLogin->jabatanOP($txtusername) == true)
                    {
                        $this->session->set_userdata('jabatan', 'OPERATOR');
                    }
                    else
                    {
                        $this->load->view('showLoginPage');
                        echo "Failed Login";
                    }
                    
                    //untuk ngambil kodecabang karyawan yang login
                    $code = $this->modLogin->selectKodeCab($txtusername);
                    //echo $data->num_rows();
                    foreach($code->result() as $row) {
                        $kodecab 	= $row->kodecabang;
                    }
                    $this->session->set_userdata('codecabang',$kodecab);
                    //echo $this->session->userdata('codecabang');
                    //$temp = $this->session->userdata('codecabang');
                   // echo $temp;
    
                    $data['databahan'] = $this->modBahan->select_kategori_bahanbaku();
                    $this->load->view('showbahan', $data);
                }
                else
                {
                    $this->load->view('showLoginPage');
                    echo "Failed Login";
                }
            }
            else
            {
                $this->load->view('showLoginPage');
            }
        }
        else
        {
            $this->load->view('showLoginPage');
        }
    }
    

}
