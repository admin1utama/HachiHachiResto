<?php
class modBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status) {
		$data = array(
		   'kodebahan'  => strtoupper($kodebahan),
		   'namabahan'  => strtoupper($namabahan),
		   'satuan' 	=> strtoupper($satuan),
		   'jenis' 		=> strtoupper($jenis),
		   'harga' 		=> $harga,
		   'stok' 		=> $stok,
		   'foto' 		=> $foto,
		   'status'		=> strtoupper($status)
		);
		$this->db->insert('bahan', $data);
    }

    public function update_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status) {
		$data = array(
			'namabahan' => strtoupper($namabahan),
			'satuan' 	=> strtoupper($satuan),
			'jenis' 	=> strtoupper($jenis),
			'harga' 	=> $harga,
			'stok' 		=> $stok,
			'foto' 		=> $foto,
			'status'	=> strtoupper($status)
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
		//pengecekan apakah sudah terdaftar atau beLum
		$query = $this->db->where('kodebahanjadi', $textbahanjadi)
							->where('kodebahanbaku', $textbahanbaku)
							->get('bom');
		
		echo $query->num_rows();

		if($query->num_rows== 0)
		{
			$data = array(
				'kodebahanjadi'  => $textbahanjadi,
				'kodebahanbaku'  => $textbahanbaku,
				'qty' => $textqty
			 );
			 $this->db->insert('bom', $data);
		}

	}

    public function delete_detailBOM($kodebom) {
        $this->db->where('kodebom', $kodebom);
        $this->db->delete('bom');
    }
    
}