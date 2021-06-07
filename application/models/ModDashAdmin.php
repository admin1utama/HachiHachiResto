<?php
class modDashAdmin extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    public function select_stok($idcabang){
        //return $this->db->query("select * from stokcabang where kodecabang ='$kodecab' and stok < 10");

		return $this->db->query("select stokcabang.*, bahan.namabahan, bahan.jenis from stokcabang, bahan where stokcabang.kodebahan=bahan.kodebahan and bahan.jenis='BAHAN BAKU' and stokcabang.kodecabang ='$idcabang' and stokcabang.stok < 10 order by stok ASC"); 
    }

	public function select_pemesanan() 
    {
        return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota, count(dpembelian.notadetail) as jumitem from hpembelian, dpembelian, supplier where hpembelian.kodesupplier = supplier.kodesupplier and hpembelian.nomernota = dpembelian.nomernota and hpembelian.status = 'AKTIF' group by hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.kota");
    }

    public function select_cabang() {
        $query = $this->db->get('cabang'); 
        return $query; 
      }



    
}