<?php
class modPenyesuaianStok extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function select_data($kode)
	{
        //return $this->db->query("select * from penyesuaianstok");  
        return $this->db->query("select penyesuaianstok.*, bahan.namabahan from penyesuaianstok, bahan where penyesuaianstok.kodeoutlet='$kode' and penyesuaianstok.kodebahan = bahan.kodebahan"); 
    }
    
    public function SelectBahanBakuOutlet($kode)
    {
        return $this->db->query("select stokcabang.*, bahan.namabahan from stokcabang, bahan where stokcabang.kodecabang='$kode' and stokcabang.kodebahan = bahan.kodebahan");
    }
    
    public function selectstok($idbahan)
    {
       /* $query = $this->db->where('kodebahan', $idbahan)
                            ->get('stokcabang'); 
        return $query; */

        return $this->db->query("select stokcabang.*, bahan.kodebahan, bahan.namabahan from stokcabang, bahan where stokcabang.kodebahan='$idbahan' and stokcabang.kodebahan = bahan.kodebahan");
    }

    public function insert_penyesuaian($kdbhn, $stokakhir, $alasan, $kodecabang,$username)
    {
		$tgl = date("Y-m-d");
		$data = array(
			'tanggal'  		=> $tgl,
			'kodeoutlet'  	=> $kodecabang,
			'username' 		=> $username,
			'kodebahan' 	=> $kdbhn,
			'stokawal' 		=> 1,
			'stokakhir' 	=> $stokakhir,
			'alasan' 		=> $alasan
		 );
         $this->db->insert('penyesuaianstok', $data);

		 //////////////////////////////////////////////////
         $data = array(
			'stok' => $stokakhir
		);
        $this->db->where('kodebahan', $kdbhn);
        $this->db->where('kodecabang', $kodecabang);
		$this->db->update('stokcabang', $data);
    }
}