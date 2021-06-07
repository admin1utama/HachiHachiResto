<?php
class modMember extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp) {
		$data = array(
		   'kodemember' => $kodemember,
           'namamember' => $namalengkap,
           'emailmember'=> $alamatemail,
           'kotamember' => $kota,
           'alamatrumahmember'  => $alamatrumah,
           'tanggallahirmember' => $tanggallahir,
		   'notelpmember'   => $notelp,
		   'status'			=> "AKTIF"
		);
		$this->db->insert('member', $data);
    }

    public function update_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp,$status) {
		$data = array(
			'namamember' => $namalengkap,
			'emailmember'=> $alamatemail,
			'kotamember' => $kota,
			'alamatrumahmember'  => $alamatrumah,
			'tanggallahirmember' => $tanggallahir,
			'notelpmember'   => $notelp,
			'status'		=> $status
		);
		$this->db->where('kodemember', $kodemember);
        $this->db->update('member', $data);
	}
	
	public function select_member() {
		$query = $this->db->get('member'); 
		return $query; 
	}

	public function selectMemberByKode($kodemember) {
		$query = $this->db->where('kodemember', $kodemember)
				  ->get('member'); 
		return $query; 
	  }
    
}