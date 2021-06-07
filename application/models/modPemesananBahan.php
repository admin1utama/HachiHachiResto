<?php
class modPemesananBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function update_subtotal($nomernota, $subtotal) {
        $this->db->query("update hpembelian set subtotal = $subtotal where nomernota = '$nomernota'"); 
    }

    public function updating_pemesanan() 
    {
        return $this->db->query("select hpembelian.nomernota, sum(dpembelian.qty * dpembelian.hargabeli) as subtotal from hpembelian, dpembelian where hpembelian.nomernota = dpembelian.nomernota group by hpembelian.nomernota");
    }
	
    public function select_pemesanan() 
    {
        return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota, count(dpembelian.notadetail) as jumitem from hpembelian, dpembelian, supplier where hpembelian.kodesupplier = supplier.kodesupplier and hpembelian.nomernota = dpembelian.nomernota and hpembelian.status = 'AKTIF' group by hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota");
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

    public function insert_hpembelian($kodesupp, $pilih, $tanggal)
    {
        // looping dari cart untuk menghitung subtotal 
        $arr = $this->session->userdata("cart");
        $jumcart = count($arr);
        $subtotal = 0; 
        for($i = 0; $i < $jumcart; $i+=1){
            $subtotal = $subtotal + ($arr[$i][1] * $arr[$i][5]); 
        }

        $tahun  = date("Y"); 
        $query  = $this->db->query("select * from hpembelian where year(tanggal) = $tahun");
        $jum    = $query->num_rows() + 1; 

        if($jum < 10) { $jum = "00".$jum; }
        else if($jum < 100) { $jum = "0".$jum; }
        else if($jum < 1000) { $jum = "".$jum; }

        $nomernota = "PBS".$tahun.$jum;
 
        $data = array(
			'nomernota'  => $nomernota,
            'tanggal'  => $tanggal, //date("Y-m-d"),
            'kodesupplier' => strtoupper($kodesupp),
            'subtotal'  => $subtotal,
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
                'hargabeli'  => $arr[$i][5],
                'nilaikonversi'=> $arr[$i][6]
            );
            $this->db->insert('dpembelian', $data2);
        }
        
        return $nomernota; 
    }

    public function selectstok_bygudang($kodecabang, $idbahan)
    {
        $query = $this->db->query("select stokcabang.*, bahan.satuan from stokcabang, bahan where stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodebahan = '$idbahan' and kodecabang = '$kodecabang'"); 
        return $query; 
    }

    public function selectstok($idbahan)
    {
        $query = $this->db->where('kodebahan', $idbahan)
                            ->get('bahan'); 
        return $query; 
    }

    public function getNilaiKonversi($kodebahan, $cbsatuan, $satuan) {
        $query = $this->db->query("select * from konversisatuan where kodebahan = '$kodebahan' and kodesatuan1 = '$cbsatuan' and kodesatuan2 = '$satuan'");
        foreach($query->result() as $row) {
            return $row->nilaikonversi; 
        }
    }

    public function selectsatuan($idbahan)
    {
        $query = $this->db->where('kodebahan', $idbahan)
                            ->get('konversisatuan'); 
        return $query; 
    }

    public function selectPenerimaanByKode($kodenota) {
        return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.alamat, supplier.kota, count(dpembelian.notadetail) as jumitem from hpembelian, dpembelian, supplier where hpembelian.kodesupplier = supplier.kodesupplier and hpembelian.nomernota = dpembelian.nomernota and hpembelian.nomernota = '$kodenota' group by hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.alamat, supplier.kota");
    }
    
    public function selectdataforcart($kodenota)
    {
        return $this->db->query("select dpembelian.*, bahan.namabahan, bahan.satuan from dpembelian, bahan where dpembelian.nomernota='$kodenota' and dpembelian.kodebahan = bahan.kodebahan"); 
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

    public function insert_dpenerimaan($nomernota,$kodebahan,$kodesatuan,$qtypesan,$qty,$hargabeli,$kdcabang,$nilaikonversi)
    {
        //insert ke dpenerimaan
        $data = array(
            'nomernota'     => $nomernota,
            'kodebahan'     => $kodebahan,
            'kodesatuan'    => $kodesatuan,
            'qtypesan'      => $qtypesan,
            'qtyterima'     => $qty,
            'hargabeli'     => $hargabeli,
            'nilaikonversi' => $nilaikonversi
		 );
         $this->db->insert('dpenerimaan', $data);

        // dijadikan satuan terkecil
         $qty = $qty * $nilaikonversi; 

         //update stok cabang
         $this->db->set('stok','stok+'.$qty, FALSE);
         $this->db->where('kodecabang', $kdcabang);
         $this->db->where('kodebahan', $kodebahan);
         $this->db->update('stokcabang');

         /////////
         //insert into kartu stok 
         $qry = $this->db->query("select * from kartustok where kodecabang = '$kdcabang' and kodebahan = '$kodebahan' order by kodekartustok desc limit 1");
         foreach($qry->result() as $row) {
             $stokawal = $row->stokakhir; 
             $hargaavg = $row->hargaavg; 
         }
         $stokakhir= $stokawal + $qty; 
         $hargaavg = (($stokawal * $hargaavg) + ($qty * $hargabeli)) / $stokakhir; 

         $data = array(
            'tanggal'     => date("Y-m-d"),
            'kodecabang'     => 'KC1',
            'kodebahan'    => $kodebahan,
            'jenis'      => "PENERIMAAN",
            'noref'     => $nomernota,
            'stokawal'     => $stokawal,
            'debet'     => $qty,
            'kredit'     => 0,
            'stokakhir'     => $stokakhir,
            'hargatrans'     => $hargabeli,
            'hargaavg'     => $hargaavg
            );
         $this->db->insert('kartustok', $data);
    }




    
}