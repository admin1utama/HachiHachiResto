<?php
class modOperator extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_operator($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status) {
		$data = array(
		   'kodekaryawan' => $kodekaryawan,
           'kodecabang' => $kodecabang,
           'username'=> $username,
           'password' => $password,
           'nama'  => $nama,
		   'tanggalmulai' => $mulaikerja,
		   'noidentitas' => $nomerid,
		   'nomertelp' => $nomertelp,
		   'jabatan' => $jabatan,
		   'status' => $status
		);
		$this->db->insert('karyawan', $data);
    }

    public function update_admin($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status) {
		$data = array(
			'kodecabang' => $kodecabang,
			'username'=> $username,
			'password' => $password,
			'nama'  => $nama,
			'tanggalmulai' => $mulaikerja,
			'noidentitas' => $nomerid,
			'nomertelp' => $nomertelp,
			'jabatan' => $jabatan,
			'status' => $status
		);
		$this->db->where('kodekaryawan', $kodekaryawan);
        $this->db->update('karyawan', $data);
	}
	
	public function select_operator() {
		return $this->db->query("select * from karyawan where jabatan = 'Operator'"); 
	}

	public function select_admin() {
		return $this->db->query("select * from karyawan where jabatan = 'Admin'"); 
	}

	public function select_kepalagudang() {
		return $this->db->query("select * from karyawan where jabatan = 'Kepala Gudang'"); 
	}

	public function selectKaryawanByKode($kodekaryawan) {
		$query = $this->db->where('kodekaryawan', $kodekaryawan)
				  ->get('karyawan'); 
		return $query; 
	  }
    
}