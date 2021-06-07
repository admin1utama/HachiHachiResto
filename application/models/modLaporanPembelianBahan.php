<?php
class modLaporanPembelianBahan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
	
	public function selecttransaksi($awal,$akhir)
	{
        //return $this->db->query("select * from hpembelian where tanggal between '".$awal."' and '".$akhir."'");

		//return $this->db->query("select hpembelian.*, dpembelian.qty from hpembelian, dpembelian where hpembelian.nomernota = dpembelian.nomernota and tanggal between '".$awal."' and '".$akhir."'"); 
		
		return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.alamat, supplier.kota, supplier.nomertelp , sum(dpembelian.qty) as jumitem from hpembelian, dpembelian, supplier where hpembelian.nomernota = dpembelian.nomernota and hpembelian.kodesupplier = supplier.kodesupplier and tanggal between '".$awal."' and '".$akhir."' group by hpembelian.nomernota, hpembelian.tanggal, hpembelian.kodesupplier, hpembelian.subtotal, hpembelian.status, supplier.namasupplier, supplier.alamat, supplier.kota, supplier.nomertelp");  

		//return $this->db->query("select hpembelian.nomernota, hpembelian.tanggal, hpembelian.subtotal, hpembelian.status, dpembelian.qty, supplier.namasupplier, supplier.alamat, supplier.nomertelp, sum(dpembelian.qty) as totqty from hpembelian, dpembelian, supplier where hpembelian.nomernota = dpembelian.nomernota and hpembelian.kodesupplier = supplier.kodesupplier and tanggal between '".$awal."' and '".$akhir."' group by select hpembelian.nomernota, hpembelian.tanggal, hpembelian.subtotal, hpembelian.status, dpembelian.qty, supplier.namasupplier, supplier.alamat, supplier.nomertelp");  
	}
    
}