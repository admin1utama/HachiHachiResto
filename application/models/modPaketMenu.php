<?php
class modPaketMenu extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	function blockmenu($kodepaket) {
		$this->db->query("update paketmenu set status = 'NONAKTIF' where kodepaket = '$kodepaket'"); 
	}

	function unblockmenu($kodepaket) {
		$this->db->query("update paketmenu set status = 'AKTIF' where kodepaket = '$kodepaket'"); 
	}

	public function insert_paketmenu($kodepaket, $namapaket, $hargapaket, $status) {

		$qry 	= $this->db->get('paketmenu'); 
		$jum 	= $qry->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }

        $kodegenerate = "PK".$jum;

		$data = array(
		   'kodepaket'  => strtoupper($kodegenerate),
		   'namapaket'  => strtoupper($namapaket),
		   'harga' 		=> $hargapaket,
		   'status' 	=> strtoupper($status)
		);
		$this->db->insert('paketmenu', $data);
    }

	public function getDataPaket($kodepaket) {
		return $this->db->query("select * from paketmenu where kodepaket = '$kodepaket'");  
    }
	
	public function select_all() {
		//$query = $this->db->get('paketmenu'); 
		//return $query;
		return $this->db->query("select paketmenu.kodepaket, paketmenu.namapaket, paketmenu.harga, paketmenu.status, count(detailpaketmenu.kodepaket) as jumdetail from paketmenu, detailpaketmenu where paketmenu.kodepaket = detailpaketmenu.kodepaket group by paketmenu.kodepaket, paketmenu.namapaket, paketmenu.harga, paketmenu.status  order by paketmenu.namapaket ASC");  
    }

	public function select_detail_paketmenu() {
		return $this->db->query("select detailpaketmenu.*, bahan.namabahan, bahan.foto from detailpaketmenu, bahan where detailpaketmenu.kodebahan = bahan.kodebahan");  
    }

	public function select_detail_paketmenu_bykodepaket($kodepaket) {
		return $this->db->query("select detailpaketmenu.*, bahan.namabahan, bahan.foto from detailpaketmenu, bahan where detailpaketmenu.kodebahan = bahan.kodebahan and detailpaketmenu.kodepaket = '$kodepaket'");  
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
		return $this->db->query("select * from bahan where jenis = 'Bahan Jadi' order by namabahan ASC"); 
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