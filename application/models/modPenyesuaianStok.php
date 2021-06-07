<?php
class modPenyesuaianStok extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectstokbycabang($kode)
	{
        return $this->db->query("select stokcabang.*, bahan.namabahan from stokcabang, bahan,cabang where stokcabang.kodecabang = cabang.kodecabang and stokcabang.kodecabang = '$kode' and stokcabang.kodebahan = bahan.kodebahan");  
    }

   
}