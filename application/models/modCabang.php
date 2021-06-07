<?php
class modCabang extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status) {
      $qry 	= $this->db->get('cabang'); 
      $jum 	= $qry->num_rows() + 1; 
  
          if($jum < 10) { $jum = "".$jum; }
          else if($jum < 100) { $jum = "".$jum; }
  
      $kodegenerate = "KC".$jum;

      $data = array(
            'kodecabang'      => strtoupper($kodegenerate),
            'namacabang'      => strtoupper($namacabang),
            'alamat'          => strtoupper($alamat),
            'kota'            => strtoupper($kota),
            'tanggalberdiri'  => $tanggalberdiri,
            'nomertelp'       => $nomertelp,
            'jenis'           => strtoupper($jenis),
            'status'          => strtoupper($status)
      );
      $this->db->insert('cabang', $data);

      //looping seluruh cabang
      $query = $this->db->get('bahan');			
      foreach($query->result() as $row)
      {
        $data = array(
          'kodebahan'  => $row->kodebahan,
          'kodecabang'  => strtoupper($kodegenerate),
          'stok' 	=> 0
         );
         $this->db->insert('stokcabang', $data);
      }
    }

    public function update_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status) {
      $data = array(
        'namacabang'      => strtoupper($namacabang),
        'alamat'          => strtoupper($alamat),
        'kota'            => strtoupper($kota),
        'tanggalberdiri'  => $tanggalberdiri,
        'nomertelp'       => $nomertelp,
        'jenis'           => strtoupper($jenis),
        'status'          => strtoupper($status)
      );
      $this->db->where('kodecabang', $kodecabang);
      $this->db->update('cabang', $data);
    }
    
    public function delete_cabang($kodecabang) {
        $this->db->where('kodecabang', $kodecabang);
        $this->db->delete('cabang');
    }

    public function select_all_cabang() {
      //$query = $this->db->get('cabang'); 
      //return $query;
      return $this->db->query("select * from cabang"); 
    }
  
    public function select_cabang() {
      //$query = $this->db->get('cabang'); 
      //return $query;
      return $this->db->query("select * from cabang where status = 'AKTIF'"); 
    }
    
    public function selectCabangByKode($kodecabang) {
      $query = $this->db->where('kodecabang', $kodecabang)
                ->get('cabang'); 
      return $query; 
    }

    public function nonaktif($kodecabang){
      $data = array(
        'status' => 'NONAKTIF'
      );
      $this->db->where('kodecabang', $kodecabang);
      $this->db->update('cabang', $data);
    }
    public function aktif($kodecabang){
      $data = array(
        'status' => 'AKTIF'
      );
      $this->db->where('kodecabang', $kodecabang);
      $this->db->update('cabang', $data);
    }
}