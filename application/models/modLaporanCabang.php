<?php
class modLaporanCabang extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selectfilter($datafilter)
	{
        return $this->db->query("select * from cabang where namacabang like '%".$datafilter."%'");
	}
    
}