<?php
class modLaporanBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selectfilter($datafilter)
	{
        return $this->db->query("select * from bahan where namabahan like '%".$datafilter."%'");
	}
    
}