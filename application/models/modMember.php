<?php
class modMember extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

    public function insert_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp) {

		$qry 	= $this->db->get('member'); 
		$jum 	= $qry->num_rows() + 1; 

        if($jum < 10) { $jum = "000".$jum; }
        else if($jum < 100) { $jum = "00".$jum; }
        else if($jum < 1000) { $jum = "0".$jum; }
		else if($jum < 10000) { $jum = "".$jum; }

        $kodemem = "M".$jum;

		$data = array(
		   'kodemember' 		=> strtoupper($kodemem),
           'namamember' 		=> strtoupper($namalengkap),
           'emailmember'		=> $alamatemail,
           'kotamember' 		=> strtoupper($kota),
           'alamatrumahmember'  => strtoupper($alamatrumah),
           'tanggallahirmember' => $tanggallahir,
		   'notelpmember'   	=> $notelp,
		   'status'				=> "AKTIF"
		);
		$this->db->insert('member', $data);
    }

    public function update_member_pelanggan($kodemember, $namalengkap, $alamatemail, $kota, $alamatrumah, $tanggallahir, $notelp,$status) {
		$data = array(
			'namamember' 		=> strtoupper($namalengkap),
			'emailmember'		=> $alamatemail,
			'kotamember' 		=> strtoupper($kota),
			'alamatrumahmember' => strtoupper($alamatrumah),
			'tanggallahirmember'=> $tanggallahir,
			'notelpmember'   	=> $notelp,
			'status'			=> strtoupper($status)
		);
		$this->db->where('kodemember', $kodemember);
        $this->db->update('member', $data);
	}
	
	public function select_member() {
		//$query = $this->db->get('member'); 
		//return $query;
		return $this->db->query("select * from member order by namamember ASC"); 
	}

	public function selectMemberByKode($kodemember) {
		$query = $this->db->where('kodemember', $kodemember)
				  ->get('member'); 
		return $query; 
	  }
    
}