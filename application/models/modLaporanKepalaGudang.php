<?php
class modLaporanKepalaGudang extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selectfilter($datafilter)
	{
        //return $this->db->query("select * from karyawan where nama like '%".$datafilter."%'");

        return $this->db->query("select karyawan.*, cabang.namacabang from karyawan, cabang where nama like '%".$datafilter."%' and karyawan.kodecabang = cabang.kodecabang and jabatan='KEPALA GUDANG'");
	}
    
}