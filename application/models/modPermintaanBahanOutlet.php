<?php
class modPermintaanBahanOutlet extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
    public function selectdetailcabang($idcabang)
	{
        return $this->db->query("select * from cabang where kodecabang = '$idcabang'"); 
    }
    
    public function selectnomernota($idsupplier)
    {
        return $this->db->query("select dpembelian.*, bahan.namabahan, bahan.harga, hpembelian.subtotal, supplier.kodesupplier from dpembelian, bahan, supplier, hpembelian where supplier.kodesupplier = '$idsupplier' and dpembelian.kodebahan = bahan.kodebahan"); 
    }

    public function getDataNamaBahan($txtkodebahanbaku)
    {
        $query = $this->db->where('kodebahan', $txtkodebahanbaku)
                            ->get('bahan'); 
        return $query; 
    }

    public function insert_hdistribusi($kodecabang,$tanggal)
    {
        $tahun  = date("Y"); 
        $query  = $this->db->query("select * from hpermintaan where year(tanggal) = $tahun");
        $jum    = $query->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

        $nomernota = "HDIS".$tahun.$jum;
 
        $data = array(
			'nomernota'  => $nomernota,
            'tanggal'  => $tanggal, //date("Y-m-d"),
            'kodecabang' => strtoupper($kodecabang),
            'status'  => 'AKTIF'
		 );
         $this->db->insert('hpermintaan', $data);

        //looping dari cart 
        $arr = $this->session->userdata("cart");
        $jumcart = count($arr);
         for($i = 0; $i < $jumcart; $i+=1){
            $data2 = array(
                'nomernota'  => $nomernota,
                'kodebahan'  => $arr[$i][0],
                'kodesatuan' => $arr[$i][3],
                'qtypesan'  => $arr[$i][1]
             );
             $this->db->insert('dpermintaan', $data2);
         }
         return $nomernota; 
    }

    public function selectstok_bycabang($kodecabang, $idbahan)
    {
        $query = $this->db->query("select stokcabang.*, bahan.satuan from stokcabang, bahan where stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodebahan = '$idbahan' and stokcabang.kodecabang = '$kodecabang'"); 
        return $query; 
    }

    public function selectstok($idbahan)
    {
        $query = $this->db->where('kodebahan', $idbahan)
                            ->get('bahan'); 
        return $query; 
    }

    public function insert_hpenerimaan($kodesupp,$pilih,$tanggal,$notapemesanan)// INI UNTUK PENERIMAAN BAHAN !
    {
        $tahun  = date("Y"); 
        $query  = $this->db->query("select * from hpenerimaan where year(tanggal) = $tahun");
        $jum    = $query->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

        $nomernotapenerimaan = "TR".$tahun.$jum;
 
        $data = array(
            'nomernota'             => $nomernotapenerimaan,
            'nomernotapemesanan'    => $notapemesanan,
            'tanggal'               => $tanggal, //date("Y-m-d"),
            'kodesupplier'          => strtoupper($kodesupp),
            'status'                => $pilih
		 );
         $this->db->insert('hpenerimaan', $data);

         //Update Status di HPEMBELIAN waktu selesai penerimaan bahan
         $data = array(
            'status'    => 'DITERIMA'
         );
         $this->db->where('nomernota',$notapemesanan);
         $this->db->update('hpembelian', $data);

         return $nomernotapenerimaan; 
    }

    public function insert_dpenerimaan($nomernota,$kodebahan,$kodesatuan,$qtypesan,$qty,$hargabeli)
    {
        $data = array(
            'nomernota'     => $nomernota,
            'kodebahan'     => $kodebahan,
            'kodesatuan'    => $kodesatuan,
            'qtypesan'      => $qtypesan,
            'qtyterima'     => $qty,
            'hargabeli'     => $hargabeli
		 );
         $this->db->insert('dpenerimaan', $data);
    }

    public function select_permintaan() 
    {
        return $this->db->query("select hpermintaan.nomernota, hpermintaan.tanggal, hpermintaan.kodecabang, hpermintaan.status, cabang.namacabang,cabang.kota, count(dpermintaan.notadetail) as jumitem from hpermintaan, dpermintaan, cabang where hpermintaan.kodecabang = cabang.kodecabang and hpermintaan.status = 'AKTIF' and hpermintaan.nomernota = dpermintaan.nomernota group by hpermintaan.nomernota, hpermintaan.tanggal, hpermintaan.kodecabang, hpermintaan.status, cabang.namacabang,cabang.kota");
    }




    
}