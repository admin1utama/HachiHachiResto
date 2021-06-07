<?php
class modDistribusiMasuk extends CI_Model {

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

    public function select_data($kode) 
    {
        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangtujuan = cb2.kodecabang and hdistribusi.kodecabangtujuan = '$kode' and hdistribusi.status = 'TERKIRIM' order by tanggal");
    }

    public function selectPenerimaanByKode($kodenota) {
		$query = $this->db->where('nomernota', $kodenota)
							->get('hdistribusi'); 
		return $query; 
    }

    public function selectdataforcart($kodenota)
    {
        return $this->db->query("select ddistribusi.*, bahan.namabahan from ddistribusi, bahan where ddistribusi.nomernota='$kodenota' and ddistribusi.kodebahan = bahan.kodebahan"); 
    }

    public function update_hdistribusi($notadiskeluar)
    {
        $data = array(
            'status'    => 'DITERIMA'
         );
         $this->db->where('nomernota',$notadiskeluar);
         $this->db->update('hdistribusi', $data);
    }

    public function update_ddistribusi($qty, $nomer, $kodebahan, $kode)
    {
        $data = array(
            'qtytujuan'    => $qty
         );
         $this->db->where('nomernota', $nomer);
         $this->db->where('kodebahan', $kodebahan);
         $this->db->update('ddistribusi', $data);
    
    
         $kdcabang  = $kode;
    
         //update stok cabang
         $this->db->set('stok','stok+'.$qty, FALSE);
         $this->db->where('kodecabang', $kdcabang);
         $this->db->where('kodebahan', $kodebahan);
         $this->db->update('stokcabang');
    
         //insert into kartu stok 
         $qry = $this->db->query("select * from kartustok where kodecabang = '$kdcabang' and kodebahan = '$kodebahan' order by kodekartustok desc limit 1");

        //  echo $qry->num_rows();
        //  echo "select * from kartustok where kodecabang = '$kdcabang' and kodebahan = '$kodebahan' order by kodekartustok desc limit 1";
         
         foreach($qry->result() as $row) {
             $stokawal = $row->stokakhir; 
             $hargaavg = $row->hargaavg; 
         }
         $stokakhir = $stokawal + $qty; 
    
         $data = array(
            'tanggal'     => date("Y-m-d"),
            'kodecabang'     => $kdcabang,
            'kodebahan'    => $kodebahan,
            'jenis'      => "DIS_MASUK",
            'noref'     => $nomer,
            'stokawal'  => $stokawal,
            'debet'     => $qty,
            'kredit'     => 0,
            'stokakhir'     => $stokakhir,
            'hargatrans'     => $hargaavg,
            'hargaavg'     => $hargaavg
        );
         $this->db->insert('kartustok', $data);
    }





    
}