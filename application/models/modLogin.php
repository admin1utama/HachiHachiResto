<?php
class modLogin extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectkaryawan() {
		return $this->db->get('karyawan'); 
	}
	
	public function ceklogin($txtusername, $txtpassword) {
		$this->db->where('username', $txtusername); 
		$this->db->where('password', $txtpassword); 
		$qry = $this->db->get('karyawan');
		if($qry->num_rows() == 0) { return false; } else { return true; }
    }
    
    public function jabatanKG($txtusername) {
        $this->db->where('username', $txtusername); 
		$this->db->where('jabatan','KEPALA GUDANG');
		$this->db->where('status','AKTIF'); 
		$qry = $this->db->get('karyawan');
		if($qry->num_rows() == 0) { return false; } else { return true; }
    }
    
    public function jabatanAD($txtusername) {
        $this->db->where('username', $txtusername); 
		$this->db->where('jabatan','ADMIN');
		$this->db->where('status','AKTIF');
		$qry = $this->db->get('karyawan');
		if($qry->num_rows() == 0) { return false; } else { return true; }
    }
    
    public function jabatanOP($txtusername) {
        $this->db->where('username', $txtusername); 
		$this->db->where('jabatan','OPERATOR');
		$this->db->where('status','AKTIF'); 
		$qry = $this->db->get('karyawan');
		if($qry->num_rows() == 0) { return false; } else { return true; }
	}
    
}