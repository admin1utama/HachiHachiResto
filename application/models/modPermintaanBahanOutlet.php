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

    public function batal($nomernota)
    {
        $data = array(
            'status' => 'BATAL'
          );
          $this->db->where('nomernota', $nomernota);
          $this->db->update('hpermintaan', $data);
    }

    public function sukses($nomernota, $cabangpenerima, $cabangpengirim)
    {
        $data = array(
            'status' => 'SUKSES'
          );
        $this->db->where('nomernota', $nomernota);
        $this->db->update('hpermintaan', $data);

		//insert into hdistribusi 
		$qry = $this->db->query("select * from hpermintaan where nomernota = '$nomernota'");
		foreach($qry->result() as $row) {
			$kdcabang = $row->kodecabang; 
			$status = "AKTIF";

            $tahun  = date("Y"); 
            $query  = $this->db->query("select * from hdistribusi where year(tanggal) = $tahun");
            $jum    = $query->num_rows() + 1; 
    
            if($jum < 10) { $jum = "00".$jum; }
            else if($jum < 100) { $jum = "0".$jum; }
            else if($jum < 1000) { $jum = "".$jum; }
    
            $nomernota_hdistribusi = "DDIS".$tahun.$jum;
     
            $data = array(
                'nomernota'  => $nomernota_hdistribusi,
                'tanggal'  => date("Y-m-d"),
                'kodecabangasal' => strtoupper($cabangpengirim),
                'kodecabangtujuan' => strtoupper($kdcabang),
                'status'  => $status
             );
             $this->db->insert('hdistribusi', $data);
		}

        //insert into ddistribusi 
        //echo "insert into ddistribusi";
        //echo "select * from dpermintaan where nomernota = '$nomernota'";
		$qry2 = $this->db->query("select * from dpermintaan where nomernota = '$nomernota'");
		foreach($qry2->result() as $row) {
			$kdbahan = $row->kodebahan; 
			$kdsatuan = $row->kodesatuan;
            $qtypesan = $row->qtypesan;
            $nomernot = $row->nomernota;

            //echo $nomernot;
            //echo $kdbahan;
            //echo $kdsatuan;
            //echo $qtypesan;
            
            $data2 = array(
                'nomernota'  => $nomernota_hdistribusi,
                'kodebahan'  => $kdbahan,
                'kodesatuan' => $kdsatuan,
                'qtyasal'    => $qtypesan,
                'qtytujuan'    => '0'
                );
            $this->db->insert('ddistribusi', $data2);
        }

        // $qry3 = $this->db->query("select * from hpermintaan where nomernota = '$nomernota'");
        // foreach($qry3->result() as $row) {
		// 	$nonota = $row->nomernota;
        //     $kdcabang= $row->kodecabang;
        // } 
        //  //update stok cabang
        //  $this->db->set('stok','stok+'.$qtypesan, FALSE);
        //  $this->db->where('kodecabang', $kdcabang);
        //  $this->db->where('kodebahan', $kdbahan);
        //  $this->db->update('stokcabang');
    }

    public function selectdataforcart($nomernota)
    {
        return $this->db->query("select dpermintaan.*, bahan.namabahan, bahan.satuan from dpermintaan, bahan where dpermintaan.nomernota='$nomernota' and dpermintaan.kodebahan = bahan.kodebahan"); 
    }    

    public function selectjudulheader($kodenota)
    {
        return $this->db->query("select dpermintaan.*, bahan.namabahan, bahan.satuan from dpermintaan, bahan where dpermintaan.nomernota='$kodenota' and dpermintaan.kodebahan = bahan.kodebahan limit 1"); 
    }
    
    public function select_permintaan_header() 
    {
        return $this->db->query("select hpermintaan.nomernota, hpermintaan.tanggal, hpermintaan.kodecabang, hpermintaan.status, cabang.namacabang,cabang.kota, count(dpermintaan.notadetail) as jumitem from hpermintaan, dpermintaan, cabang where hpermintaan.kodecabang = cabang.kodecabang and hpermintaan.status = 'AKTIF' and hpermintaan.nomernota = dpermintaan.nomernota group by hpermintaan.nomernota, hpermintaan.tanggal, hpermintaan.kodecabang, hpermintaan.status, cabang.namacabang,cabang.kota limit 1");
    }
    
}