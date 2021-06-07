<?php
class modKonversi extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
		
	public function select_satuan() {
		$query = $this->db->get('satuan'); 
		return $query; 
	}

	public function select_konversi_satuan() {
		return $this->db->query("select konversisatuan.*, bahan.namabahan from konversisatuan, bahan where bahan.jenis ='Bahan Baku'  and konversisatuan.kodebahan = bahan.kodebahan");  
	}

	public function insert_satuan($kodesatuan, $namasatuan)
	{
		$data = array(
			'kodesatuan'  => strtoupper($kodesatuan),
			'namasatuan'  => strtoupper($namasatuan)
		 );
		 $this->db->insert('satuan', $data);
	}

	public function insert_Konversi($idbahanbaku, $idtextPertama,$idtextKedua,$idtextNilaiKonversi)
	{
		$data = array(
			'kodebahan'  => $idbahanbaku,
			'kodesatuan1' => $idtextPertama,
			'kodesatuan2' => $idtextKedua,
			'nilaikonversi' => $idtextNilaiKonversi
		 );
		 $this->db->insert('konversisatuan', $data);
	}

	public function SelectBahanBaku()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku'"); 
	}

	public function KonversiSelectBahanBaku($idbahanbaku)
	{
		return $this->db->query("select konversisatuan.*, bahan.namabahan from konversisatuan, bahan where konversisatuan.kodebahan = $idbahanbaku and konversisatuan.kodebahan = bahan.kodebahan"); 
	}
	
	public function delete_detailKonversi($kodekonversi)
	{
		$this->db->where('kodekonversi', $kodekonversi);
        $this->db->delete('konversisatuan');
	}

    
}