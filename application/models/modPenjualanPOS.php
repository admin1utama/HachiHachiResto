<?php
class modPenjualanPOS extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selecttransaksi_bykodecabang($kodecabang, $awal, $akhir)
	{
        return $this->db->query("select hjual.*,member.namamember, member.alamatrumahmember,member.notelpmember, member.kotamember from hjual,member where hjual.kodemember = member.kodemember and kodecabang = '$kodecabang' and tanggal between '".$awal."' and '".$akhir."' order by nomernota DESC");  
	}
	
	public function selecttransaksi($awal,$akhir)
	{
        return $this->db->query("select hjual.*,member.namamember, member.alamatrumahmember,member.notelpmember, member.kotamember from hjual,member where hjual.kodemember = member.kodemember and tanggal between '".$awal."' and '".$akhir."' order by nomernota DESC");  
	}
    
}