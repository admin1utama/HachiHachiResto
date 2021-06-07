<?php
class modZeroInventory extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectstokbycabang($kode)
	{
        return $this->db->query("select stokcabang.*, bahan.namabahan from stokcabang, bahan,cabang where stokcabang.kodecabang = cabang.kodecabang and stokcabang.kodecabang = '$kode' and stokcabang.kodebahan = bahan.kodebahan");  
	}
	
	public function resetzero($kodebahan,$kodecabang,$username)
	{
		$tgl = date("Y-m-d");
		$data = array(
			'tanggal'  		=> $tgl,
			'kodeoutlet'  	=> $kodecabang,
			'username' 		=> $username,
			'kodebahan' 	=> $kodebahan,
			'stokawal' 		=> 8,
			'stokakhir' 	=> 0,
			'alasan' 		=> 'Zero Inventory'
		 );
		 $this->db->insert('penyesuaianstok', $data);

		 //////////////////////////////////////////////////
		$data = array(
			'stok' => 0
		);
		$this->db->where('kodebahan', $kodebahan);
		$this->db->update('stokcabang', $data);
	}

   
}