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
        return $this->db->query("select stokcabang.*, bahan.namabahan from stokcabang, bahan where stokcabang.kodecabang='$kode' and stokcabang.kodebahan = bahan.kodebahan order by namabahan ASC");
    }

    public function selectstok($idbahan)
    {
       /* $query = $this->db->where('kodebahan', $idbahan)
                            ->get('stokcabang'); 
        return $query; */

        return $this->db->query("select stokcabang.*, bahan.kodebahan, bahan.namabahan from stokcabang, bahan where stokcabang.kodebahan='$idbahan' and stokcabang.kodebahan = bahan.kodebahan");
    }

    public function selectstokcabang($idbahan, $kodecabang)
    {
        return $this->db->query("select stokcabang.*, bahan.kodebahan, bahan.namabahan, bahan.satuan from stokcabang, bahan where stokcabang.kodebahan='$idbahan' and stokcabang.kodecabang = '$kodecabang' and stokcabang.kodebahan = bahan.kodebahan");
    }

    public function insert_penyesuaian($kdbhn, $stokakhir, $alasan, $kodecabang,$username)
    {
        $query = $this->db->query("select * from stokcabang where kodecabang = '$kodecabang' and kodebahan = '$kdbhn'"); 
        foreach($query->result() as $row) {
            $stokawal = $row->stok; 
        }

		$tgl = date("Y-m-d");
		$data = array(
			'tanggal'  		=> $tgl,
			'kodeoutlet'  	=> $kodecabang,
			'username' 		=> $username,
			'kodebahan' 	=> $kdbhn,
			'stokawal' 		=> $stokawal,
			'stokakhir' 	=> $stokakhir,
			'alasan' 		=> $alasan
		 );
         $this->db->insert('penyesuaianstok', $data);
         $insert_id = $this->db->insert_id();

		 //////////////////////////////////////////////////
         $data = array(
			'stok' => $stokakhir
		);
        $this->db->where('kodebahan', $kdbhn);
        $this->db->where('kodecabang', $kodecabang);
		$this->db->update('stokcabang', $data);

        if($stokawal > $stokakhir) {    // stok berkurang / hilang
            $selisih = $stokawal - $stokakhir; 

            //insert into kartu stok 
            $qry = $this->db->query("select * from kartustok where kodecabang = '$kodecabang' and kodebahan = '$kdbhn' order by kodekartustok desc limit 1");
            foreach($qry->result() as $row) {
                $stokawal = $row->stokakhir; 
                $hargaavg = $row->hargaavg; 
            }
            $stokakhir= $stokawal - $selisih; 

            $data = array(
            'tanggal'     => date("Y-m-d"),
            'kodecabang'     => $kodecabang,
            'kodebahan'    => $kdbhn,
            'jenis'      => "PENYESUAIAN",
            'noref'     => $insert_id,
            'stokawal'     => $stokawal,
            'debet'     => 0,
            'kredit'     => $selisih,
            'stokakhir'     => $stokakhir,
            'hargatrans'     => $hargaavg,
            'hargaavg'     => $hargaavg
            );
            $this->db->insert('kartustok', $data);
        }
        else if($stokawal < $stokakhir) {
            $selisih = $stokakhir - $stokawal; 

            //insert into kartu stok 
            $qry = $this->db->query("select * from kartustok where kodecabang = '$kodecabang' and kodebahan = '$kdbhn' order by kodekartustok desc limit 1");
            foreach($qry->result() as $row) {
                $stokawal = $row->stokakhir; 
                $hargaavg = $row->hargaavg; 
            }
            $stokakhir= $stokawal + $selisih; 

            $data = array(
            'tanggal'     => date("Y-m-d"),
            'kodecabang'     => $kodecabang,
            'kodebahan'    => $kdbhn,
            'jenis'      => "PENYESUAIAN",
            'noref'     => $insert_id,
            'stokawal'     => $stokawal,
            'debet'     => $selisih,
            'kredit'     => 0,
            'stokakhir'     => $stokakhir,
            'hargatrans'     => $hargaavg,
            'hargaavg'     => $hargaavg
            );
            $this->db->insert('kartustok', $data);
        }
    }
}