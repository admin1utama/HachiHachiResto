<?php
class modBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status) {
		$data = array(
		   'kodebahan'  => $kodebahan,
		   'namabahan'  => $namabahan,
		   'satuan' => $satuan,
		   'jenis' => $jenis,
		   'harga' => $harga,
		   'stok' => $stok,
		   'foto' => $foto,
		   'status'=> $status
		);
		$this->db->insert('bahan', $data);
    }

    public function update_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status) {
		$data = array(
			'namabahan'  => $namabahan,
			'satuan' => $satuan,
			'jenis' => $jenis,
			'harga' => $harga,
			'stok' => $stok,
			'foto' => $foto,
			'status'=> $status
		);
		$this->db->where('kodebahan', $kodebahan);
        $this->db->update('bahan', $data);
	}
	
	public function select_kategori_bahanbaku() {
		$query = $this->db->get('bahan'); 
		return $query; 
	}

	public function selectBahanByKode($kodebahan) {
		$query = $this->db->where('kodebahan', $kodebahan)
							->get('bahan'); 
		return $query; 
	}

	public function BomSelectBahanJadi()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Jadi'"); 
	}

	public function BomSelectBahanBaku()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku'"); 
	}

	public function BomSelectBahanBaku_ByBahanJadi($idbahanjadi)
	{
		return $this->db->query("select bom.*, bahan.namabahan from bom, bahan where bom.kodebahanjadi = $idbahanjadi and bom.kodebahanbaku = bahan.kodebahan"); 
	}	

	public function insert_bom($textbahanjadi, $textbahanbaku,$textqty)
	{
		$data = array(
			'kodebahanjadi'  => $textbahanjadi,
			'kodebahanbaku'  => $textbahanbaku,
			'qty' => $textqty
		 );
		 $this->db->insert('bom', $data);
	}

    public function delete_detailBOM($kodebom) {
        $this->db->where('kodebom', $kodebom);
        $this->db->delete('bom');
    }
    
}