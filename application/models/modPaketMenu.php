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
		return $this->db->query("select detailpaketmenu.*, bahan.namabahan,harga from detailpaketmenu, bahan where detailpaketmenu.kodepaket='$idkodepaket' and detailpaketmenu.kodebahan = bahan.kodebahan"); 
	}

	public function BomSelectBahanJadi()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Jadi'"); 
	}

	public function insert_isiPaket($textbahanjadi,$textkodepaket,$textqty)
	{
		$query = $this->db->where('kodebahan',$textbahanjadi)
							->get('bahan');
		foreach($query->result() as $row)
		{
			$hrg = $row->harga;
		}
		
		//pengecekan apakah sudah terdaftar atau beLum
		$query = $this->db->where('kodepaket', $textkodepaket)
							->where('kodebahan', $textbahanjadi)
							->get('detailpaketmenu');

		echo $query->num_rows();

		if($query->num_rows== 0)
		{
			$data = array(
				'kodepaket'  => $textkodepaket,
				'kodebahan'  => $textbahanjadi,
				'hargabahan' => $hrg,
				'qty'		 => $textqty 
			 );
			 $this->db->insert('detailpaketmenu', $data);
		}
	}

	public function delete_detailpaket_isinya($kodedetailpaket) {
        $this->db->where('kodedetailpaket', $kodedetailpaket);
        $this->db->delete('detailpaketmenu');
    }

    
}