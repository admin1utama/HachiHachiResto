<?php
class modLaporanBahanBaku extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectbahanbaku()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku' order by namabahan ASC"); 
	}

	public function selectstok($kodebahan)
	{
		//return $this->db->query("select * from stokcabang where kodebahan = $kodebahan"); 

		return $this->db->query("select stokcabang.*, bahan.namabahan, cabang.namacabang from stokcabang, bahan,cabang where stokcabang.kodebahan = $kodebahan and stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodecabang = cabang.kodecabang"); 
	}	
} 