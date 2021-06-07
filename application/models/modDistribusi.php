<?php
class modDistribusi extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
    public function selectdetailcabang($idcabang)
	{
        return $this->db->query("select * from cabang where kodecabang = '$idcabang'"); 
    }

    public function getDataNamaBahan($txtkodebahanbaku)
    {
        $query = $this->db->where('kodebahan', $txtkodebahanbaku)
                            ->get('bahan'); 
        return $query; 
    }

    public function select_data() 
    {
        //return $this->db->query("select hdistribusi.*, cabang.namacabang,kota from hdistribusi, cabang where hdistribusi.kodecabangasal = cabang.kodecabang and hdistribusi.kodecabangtujuan = cabang.kodecabang and hdistribusi.status = 'AKTIF'");

        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangtujuan = cb2.kodecabang and hdistribusi.status = 'AKTIF' order by date(tanggal)");
    }

    public function insert_hdistribusi($asal,$tujuan,$tanggal)
    {
        $tahun  = date("Y"); 
        $query  = $this->db->query("select * from hdistribusi where year(tanggal) = $tahun");
        $jum    = $query->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

        $nomernota = "DDIS".$tahun.$jum;
 
        $data = array(
			'nomernota'  => $nomernota,
            'tanggal'  => $tanggal, //date("Y-m-d"),
            'kodecabangasal' => strtoupper($asal),
            'kodecabangtujuan' => strtoupper($tujuan),
            'status'  => 'TERKIRIM'
		 );
         $this->db->insert('hdistribusi', $data);
         return $nomernota; 
    }

    public function insert_ddistribusi($nomernota,$kodebahan,$kodesatuan,$qtypengiriman)
    {
        //LOOP CART SUDAH DI CONTROLLER DISTRIBUSI, JADI TINGGAL INSERT SAJAH
        $data2 = array(
            'nomernota'  => $nomernota,
            'kodebahan'  => $kodebahan,
            'kodesatuan' => $kodesatuan,
            'qtyasal'    => $qtypengiriman,
            'qtytujuan'    => '0'
            );
        $this->db->insert('ddistribusi', $data2);
    }






    
}