<?php
class modCabang extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status) {
      $data = array(
            'kodecabang' => $kodecabang,
            'namacabang' => $namacabang,
            'alamat' => $alamat,
            'kota'=> $kota,
            'tanggalberdiri' => $tanggalberdiri,
            'nomertelp' => $nomertelp,
            'jenis'=> $jenis,
            'status' => $status
      );
      $this->db->insert('cabang', $data);
    }

    public function update_cabang($kodecabang, $namacabang, $alamat, $kota, $tanggalberdiri, $nomertelp, $jenis, $status) {
      $data = array(
        'namacabang' => $namacabang,
        'alamat' => $alamat,
        'kota'=> $kota,
        'tanggalberdiri' => $tanggalberdiri,
        'nomertelp' => $nomertelp,
        'jenis'=> $jenis,
        'status' => $status
      );
      $this->db->where('kodecabang', $kodecabang);
      $this->db->update('cabang', $data);
    }
    
    public function delete_cabang($kodecabang) {
        $this->db->where('kodecabang', $kodecabang);
        $this->db->delete('cabang');
    }
  
    public function select_cabang() {
      $query = $this->db->get('cabang'); 
      return $query; 
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