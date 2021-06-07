<?php
class modBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_bahan($kodebahan, $namabahan, $satuan, $jenis, $harga, $stok, $foto, $status, $mudahbusuk) {
		$data = array(
		   'kodebahan'  => strtoupper($kodebahan),
		   'namabahan'  => strtoupper($namabahan),
		   'satuan' 	=> strtoupper($satuan),
		   'jenis' 		=> strtoupper($jenis),
		   'harga' 		=> $harga,
		   'stok' 		=> $stok,
		   'foto' 		=> $foto,
		   'status'		=> strtoupper($status), 
		   'mudahbusuk' => $mudahbusuk
		);
		$this->db->insert('bahan', $data);
		$ambilkodeterakhir = $this->db->insert_id();

		// insert otomatis ke konversi satuan 
		$this->insertkonversisatuan(strtoupper($kodebahan),strtoupper($satuan));

		//looping seluruh cabang
		$query = $this->db->get('cabang');			
		foreach($query->result() as $row)
		{
			$data = array(
				'kodebahan'  => $ambilkodeterakhir,
				'kodecabang'  => $row->kodecabang,
				'stok' 	=> 0
			 );
			 $this->db->insert('stokcabang', $data);
		}
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
		/*$query = $this->db->get('bahan'); 
		return $query;*/
		return $this->db->query("select * from bahan where status ='AKTIF' order by namabahan ASC"); 
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
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku' order by namabahan ASC"); 
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
	
	public function selectsatuan()
	{
		return $this->db->query("select * from satuan"); 
	}
	
	public function ceknamabahan($txtnamabahan) {
		$qry = $this->db->query("select * from bahan where namabahan = '$txtnamabahan'"); 
		if($qry->num_rows() == 0) { return false; } else { return true; }
	}

	public function insertkonversisatuan($kodebahan, $satuan) 
	{
		$data = array(
			'kodebahan'  => $kodebahan,
			'kodesatuan1'  => $satuan,
			'kodesatuan2'  => $satuan,
			'nilaikonversi' => 1
		 );
		 $this->db->insert('konversisatuan', $data);
	}

	public function selectallbahan()
	{
		return $this->db->query("select * from bahan"); 
	}

	public function selectbahanbaku()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku' order by namabahan ASC"); 
	}

	public function selectcabang($kode)
	{
		return $this->db->query("select * from cabang where kodecabang = '$kode' order by namacabang ASC");
	}

	public function selectkartustok($kodebahan,$kodecabangg)
	{
		return $this->db->query("select kartustok.*, bahan.namabahan, cabang.namacabang from kartustok, bahan,cabang where kartustok.kodebahan = $kodebahan and kartustok.kodebahan = bahan.kodebahan and kartustok.kodecabang = '$kodecabangg' and kartustok.kodecabang = cabang.kodecabang");

		//return $this->db->query("select kartustok.*, bahan.namabahan, cabang.namacabang from kartustok, bahan,cabang where kartustok.kodebahan = $kodebahan and stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodecabang = cabang.kodecabang");
	}

	public function selectbuatheadernamabahan($kodebahan,$kodecabangg)
	{
		return $this->db->query("select kartustok.*, bahan.namabahan, bahan.jenis, cabang.namacabang from kartustok, bahan,cabang where kartustok.kodebahan = $kodebahan and kartustok.kodebahan = bahan.kodebahan and kartustok.kodecabang = '$kodecabangg' and kartustok.kodecabang = cabang.kodecabang limit 1");
	}
}