<?php
class modSupplier extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_supplier($kodesupplier, $namasupplier, $contactperson, $nomertelp, $alamat, $kota, $status) {
      $qry 	= $this->db->get('supplier'); 
      $jum 	= $qry->num_rows() + 1; 
  
          if($jum < 10) { $jum = "00".$jum; }
          else if($jum < 100) { $jum = "0".$jum; }
  
      $kodegenerate = "SP".$jum;

		$data = array(
           'kodesupplier'   => strtoupper($kodegenerate),
           'namasupplier'   => strtoupper($namasupplier),
           'contactperson'  => strtoupper($contactperson),
           'nomertelp'      => $nomertelp,
           'alamat'         => strtoupper($alamat),
           'kota'           => strtoupper($kota),
           'status'         => strtoupper($status)
		);
		$this->db->insert('supplier', $data);
    }

    public function update_supplier($kodesupplier, $namasupplier, $contactperson, $nomertelp, $alamat, $kota, $status) {
        $data = array(
              'namasupplier'  => strtoupper($namasupplier),
              'contactperson' => strtoupper($contactperson),
              'nomertelp'     => $nomertelp,
              'alamat'        => strtoupper($alamat),
              'kota'          => strtoupper($kota),
              'status'        => strtoupper($status)
        );
        $this->db->where('kodesupplier', $kodesupplier);
        $this->db->update('supplier', $data);
    }
    
    public function delete_supplier($kodesupplier) {
        $this->db->where('kodesupplier', $kodesupplier);
        $this->db->delete('supplier');
    }
  
  public function select_supplier() {
		//$query = $this->db->get('supplier'); 
		//return $query; 
    return $this->db->query("select * from supplier order by namasupplier ASC");
  }

  public function select_detailsupplier() {
		return $this->db->query("select detailsupplier.*, supplier.namasupplier, bahan.namabahan from detailsupplier, supplier, bahan where detailsupplier.kodesupplier = supplier.kodesupplier and detailsupplier.kodebahan = bahan.kodebahan"); 
  }
  
  public function insert_detailsupplier($textkodesupp, $textkodebahan)
  {
      $data = array(
        'kodesupplier'  => $textkodesupp,
        'kodebahan'     => $textkodebahan,
        'status'        => "AKTIF"
    );
    $this->db->insert('detailsupplier', $data);
  }

  public function selectSupplierByKode($kodesupplier) {
		$query = $this->db->where('kodesupplier', $kodesupplier)
				  ->get('supplier'); 
		return $query;
	  }

    public function selecthistorybeli($kodebahan)
    {
      return $this->db->query("select supplier.namasupplier, supplier.contactperson, supplier.nomertelp, dpembelian.* from supplier, dpembelian, hpembelian where dpembelian.nomernota = hpembelian.nomernota and supplier.kodesupplier = hpembelian.kodesupplier and dpembelian.kodebahan = '$kodebahan' order by dpembelian.hargabeli");      
    }
    
}