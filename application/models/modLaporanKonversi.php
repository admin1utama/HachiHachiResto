<?php
class modLaporanKonversi extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selectfilter($datafilter)
	{
        return $this->db->query("select konversisatuan.*, bahan.namabahan from konversisatuan, bahan where bahan.namabahan like '%".$datafilter."%' and konversisatuan.kodebahan = bahan.kodebahan");
	}
    
}