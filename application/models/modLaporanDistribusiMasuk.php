<?php
class modLaporanDistribusiMasuk extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selecttransaksi($awal, $akhir)
	{		
        //return $this->db->query("select * from hdistribusi where tanggal between '".$awal."' and '".$akhir."'");
        
        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangtujuan = cb2.kodecabang and tanggal between '".$awal."' and '".$akhir."' and hdistribusi.kodecabangtujuan = '".$this->session->userdata('codecabang')."'");
    }
    
    public function selectcetakdetail($kode)
    {
        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangtujuan = cb2.kodecabang and hdistribusi.nomernota = '$kode'");
    }

    public function selectdataforcart($kode)
    {
        return $this->db->query("select ddistribusi.*, bahan.namabahan from ddistribusi, bahan where ddistribusi.nomernota='$kode' and ddistribusi.kodebahan = bahan.kodebahan"); 
    }
    
}