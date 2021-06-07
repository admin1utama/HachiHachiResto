<?php
class modLaporanBahanBaku extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectbahanbaku()
	{
		return $this->db->query("select * from bahan where jenis = 'Bahan Baku' order by namabahan ASC"); 
	}

	public function selectcabang()
	{
		return $this->db->query("select * from cabang where status = 'AKTIF' order by namacabang ASC");
	}

	/*public function selectstok($kodebahan)
	{
		//return $this->db->query("select * from stokcabang where kodebahan = $kodebahan"); 

		return $this->db->query("select stokcabang.*, bahan.namabahan, cabang.namacabang from stokcabang, bahan,cabang where stokcabang.kodebahan = $kodebahan and stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodecabang = cabang.kodecabang"); 
	}	*/

	public function selectstok($kodebahan,$kodecabangg)
	{
		if($kodebahan != "SEMUA" && $kodecabangg != "SEMUA")
		{
			return $this->db->query("select stokcabang.*, bahan.namabahan, cabang.namacabang from stokcabang, bahan,cabang where stokcabang.kodebahan = $kodebahan and stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodecabang = '$kodecabangg' and stokcabang.kodecabang = cabang.kodecabang");
		}
		else if($kodebahan != "SEMUA" && $kodecabangg == "SEMUA")
		{
			return $this->db->query("select stokcabang.*, bahan.namabahan, cabang.namacabang from stokcabang, bahan,cabang where stokcabang.kodebahan = $kodebahan and stokcabang.kodebahan = bahan.kodebahan and stokcabang.kodecabang = cabang.kodecabang and cabang.status = 'AKTIF'");
		}
		else if($kodebahan == "SEMUA" && $kodecabangg != "SEMUA")
		{
			return $this->db->query("select stokcabang.*, bahan.namabahan, cabang.namacabang from stokcabang, bahan,cabang where stokcabang.kodecabang = '$kodecabangg' and stokcabang.kodebahan = bahan.kodebahan");
		}
		else
		{
			return $this->db->query("select stokcabang.*, cabang.namacabang from stokcabang,cabang where stokcabang.kodecabang = cabang.kodecabang  and cabang.status = 'AKTIF'");
		}
	}	
	
} 