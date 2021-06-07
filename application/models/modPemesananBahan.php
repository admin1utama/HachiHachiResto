<?php
class modPemesananBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
    public function select_pemesanan() 
    {
        return $this->db->query("select hpembelian.*, supplier.namasupplier,kota from hpembelian, supplier where hpembelian.kodesupplier = supplier.kodesupplier and hpembelian.status = 'AKTIF'");
    }
    
    public function selectdetailsupp($idsupplier)
	{
        return $this->db->query("select * from supplier where kodesupplier = '$idsupplier'"); 
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

    public function insert_hpembelian($kodesupp,$pilih,$tanggal)
    {
        $tahun  = date("Y"); 
        $query  = $this->db->query("select * from hpembelian where year(tanggal) = $tahun");
        $jum    = $query->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

        $nomernota = "JLY".$tahun.$jum;
 
        $data = array(
			'nomernota'  => $nomernota,
            'tanggal'  => $tanggal, //date("Y-m-d"),
            'kodesupplier' => strtoupper($kodesupp),
            'subtotal'  => '0',
            'status'  => $pilih
		 );
         $this->db->insert('hpembelian', $data);

        // looping dari cart 
        $arr = $this->session->userdata("cart");
        $jumcart = count($arr);
        for($i = 0; $i < $jumcart; $i+=1){
        $data2 = array(
            'nomernota'  => $nomernota,
            'kodebahan'  => $arr[$i][0],
            'kodesatuan' => $arr[$i][3],
            'qty'        => $arr[$i][1],
            'hargabeli'  => $arr[$i][5]
            );
            $this->db->insert('dpembelian', $data2);
        }
         return $nomernota; 
    }

    public function selectstok($idbahan)
    {
        $query = $this->db->where('kodebahan', $idbahan)
                            ->get('bahan'); 
        return $query; 
    }

    public function selectPenerimaanByKode($kodenota) {
		$query = $this->db->where('nomernota', $kodenota)
							->get('hpembelian'); 
		return $query; 
    }
    
    public function selectdataforcart($kodenota)
    {
        return $this->db->query("select dpembelian.*, bahan.namabahan from dpembelian, bahan where dpembelian.nomernota='$kodenota' and dpembelian.kodebahan = bahan.kodebahan"); 
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




    
}