<?php
class modDashOperator extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function select_stok($kodecab){
        //return $this->db->query("select * from stokcabang where kodecabang ='$kodecab' and stok < 10");

		return $this->db->query("select stokcabang.*, bahan.namabahan, bahan.jenis from stokcabang, bahan where stokcabang.kodebahan=bahan.kodebahan and bahan.jenis='BAHAN BAKU' and stokcabang.kodecabang ='$kodecab' and stokcabang.stok < 10 order by stok ASC"); 
    }

	public function select_pemesanan() 
    {
        return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota, count(dpembelian.notadetail) as jumitem from hpembelian, dpembelian, supplier where hpembelian.kodesupplier = supplier.kodesupplier and hpembelian.nomernota = dpembelian.nomernota and hpembelian.status = 'AKTIF' group by hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota");
    }

    public function select_datadismasuk($kodecab) 
    {
        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangtujuan = cb2.kodecabang and hdistribusi.kodecabangtujuan = '$kodecab' and hdistribusi.status = 'TERKIRIM' order by tanggal");
    }

    public function select_datadiskeluar($kode) 
    {
        return $this->db->query("select hdistribusi.*, cb1.namacabang as namacabangasal, cb1.kota as kotaasal, cb2.namacabang as namacabangtujuan, cb2.kota as kotatujuan from hdistribusi, cabang cb1, cabang cb2 where hdistribusi.kodecabangasal = cb1.kodecabang and hdistribusi.kodecabangasal = '$kode' and hdistribusi.kodecabangtujuan = cb2.kodecabang and hdistribusi.status = 'AKTIF' order by date(tanggal)");
    }



    
}