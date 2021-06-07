<?php
class modProfile extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectKaryawanByUsername($datanamalogin) {
		/*$query = $this->db->where('username', $datanamalogin)
							->get('karyawan'); 
        return $query;*/
        
        return $this->db->query("select karyawan.*, cabang.namacabang from karyawan, cabang where karyawan.username = '$datanamalogin'"); 
    }
    
    public function update_profile($kodekaryawan, $username, $nama, $nomerid, $nomertelp){
        $data = array(
			'username'		=> $username,
			'nama'  		=> strtoupper($nama),
			'noidentitas' 	=> $nomerid,
			'nomertelp' 	=> $nomertelp
		);
		$this->db->where('kodekaryawan', $kodekaryawan);
        $this->db->update('karyawan', $data);
    }
}