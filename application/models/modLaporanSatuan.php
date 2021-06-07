<?php
class modLaporanSatuan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selectfilter($datafilter)
	{
        return $this->db->query("select * from satuan where namasatuan like '%".$datafilter."%' or kodesatuan like '%".$datafilter."%'");
	}
    
}