<?php
class modUbahPassword extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function ceklama($lama,$datanamalogin){
        $this->db->where('username', $datanamalogin); 
		$this->db->where('password', $lama); 
		$qry = $this->db->get('karyawan');
		if($qry->num_rows() == 0) { return false; } else { return true; }
    }

    public function gantipass($baru,$datanamalogin){
        $data = array(
			'password'	=> $baru
		);
		$this->db->where('username', $datanamalogin);
        $this->db->update('karyawan', $data);
    }
    

}