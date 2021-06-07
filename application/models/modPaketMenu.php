<?php
class modPaketMenu extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_paketmenu($kodepaket, $namapaket, $hargapaket, $status) {
		$data = array(
		   'kodepaket'  => strtoupper($kodepaket),
		   'namapaket'  => strtoupper($namapaket),
		   'harga' => $hargapaket,
		   'status' => strtoupper($status)
		);
		$this->db->insert('paketmenu', $data);
    }
	
	public function select_all() {
		$query = $this->db->get('paketmenu'); 
		return $query; 
    }
    
    public function selectPaketMenuByKode($kodepaket) {
		$query = $this->db->where('kodepaket', $kodepaket)
							->get('paketmenu'); 
		return $query; 
	}

	public function PaketMenu_selectByBahanJadi($idkodepaket)
	{
		return $this->db->query("select paketmenu.*, bahan.namabahan from paketmenu, bahan where paketmenu.kodepaket = '$idkodepaket'"); 
	}

    
}