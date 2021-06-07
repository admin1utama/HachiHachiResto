<?php
class modOperator extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_operator($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status) {
		$qry 	= $this->db->get('karyawan'); 
		$jum 	= $qry->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

		$kodegenerate = "K".$jum;

		$data = array(
		   'kodekaryawan' 	=> strtoupper($kodegenerate),
           'kodecabang' 	=> strtoupper($kodecabang),
           'username'		=> $username,
           'password' 		=> $password,
           'nama'  			=> strtoupper($nama),
		   'tanggalmulai' 	=> $mulaikerja,
		   'noidentitas' 	=> $nomerid,
		   'nomertelp' 		=> $nomertelp,
		   'jabatan' 		=> strtoupper($jabatan),
		   'status' 		=> strtoupper($status)
		);
		$this->db->insert('karyawan', $data);
    }

    public function update_admin($kodekaryawan, $kodecabang, $username, $password, $nama, $mulaikerja, $nomerid, $nomertelp, $jabatan, $status) {
		$data = array(
			'kodecabang' 	=> strtoupper($kodecabang),
			'username'		=> $username,
			'password' 		=> $password,
			'nama'  		=> strtoupper($nama),
			'tanggalmulai' 	=> $mulaikerja,
			'noidentitas' 	=> $nomerid,
			'nomertelp' 	=> $nomertelp,
			'jabatan' 		=> strtoupper($jabatan),
			'status' 		=> strtoupper($status)
		);
		$this->db->where('kodekaryawan', $kodekaryawan);
        $this->db->update('karyawan', $data);
	}
	
	public function select_operator() {
		//return $this->db->query("select * from karyawan where jabatan = 'Operator'");
		return $this->db->query("select karyawan.*, cabang.namacabang from karyawan, cabang where karyawan.jabatan = 'Operator' and karyawan.kodecabang = cabang.kodecabang"); 
	}

	public function select_admin() {
		//return $this->db->query("select * from karyawan where jabatan = 'Admin'"); 
		return $this->db->query("select karyawan.*, cabang.namacabang from karyawan, cabang where karyawan.jabatan = 'Admin' and karyawan.kodecabang = cabang.kodecabang");
	}

	public function select_kepalagudang() {
		//return $this->db->query("select * from karyawan where jabatan = 'Kepala Gudang'");
		return $this->db->query("select karyawan.*, cabang.namacabang from karyawan, cabang where karyawan.jabatan = 'Kepala Gudang' and karyawan.kodecabang = cabang.kodecabang"); 
	}

	public function selectKaryawanByKode($kodekaryawan) {
		$query = $this->db->where('kodekaryawan', $kodekaryawan)
				  ->get('karyawan'); 
		return $query; 
	}

	public function selectnamacabang()
	{
		return $this->db->query("select * from cabang"); 
	}

	public function selectsjabatankaryawan()
	{
		return $this->db->query("select * from karyawan"); 
	}

	public function cekusername($textusername) {
		$qry = $this->db->query("select * from karyawan where username = '$textusername'"); 
		if($qry->num_rows() == 0) { return false; } else { return true; }
	}
    
}