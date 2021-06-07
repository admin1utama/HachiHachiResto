<?php
class modZeroInventory extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }

	public function selectstokbycabang($kode)
	{
        return $this->db->query("select stokcabang.*, bahan.namabahan, bahan.mudahbusuk from stokcabang, bahan,cabang where stokcabang.kodecabang = cabang.kodecabang and stokcabang.kodecabang = '$kode' and stokcabang.kodebahan = bahan.kodebahan order by bahan.mudahbusuk desc, bahan.namabahan");  
	}
	
	public function resetzero($kodebahan, $kodecabang, $username)
	{
		$tgl = date("Y-m-d");
		$data = array(
			'tanggal'  		=> $tgl,
			'kodeoutlet'  	=> $kodecabang,
			'username' 		=> $username,
			'kodebahan' 	=> $kodebahan,
			'stokawal' 		=> 8,
			'stokakhir' 	=> 0,
			'alasan' 		=> 'Zero Inventory'
		 );
		 $this->db->insert('penyesuaianstok', $data);
		 $insert_id = $this->db->insert_id();

		 //////////////////////////////////////////////////
		//update stok cabang
		$this->db->set('stok', 0, FALSE);
		$this->db->where('kodecabang', $kodecabang);
		$this->db->where('kodebahan', $kodebahan);
		$this->db->update('stokcabang');
   
		//insert into kartu stok 
		$qry = $this->db->query("select * from kartustok where kodecabang = '$kodecabang' and kodebahan = '$kodebahan' order by kodekartustok desc limit 1");

		// echo $qry->num_rows();
		// echo "select * from kartustok where kodecabang = '$kdcabang' and kodebahan = '$kodebahan' order by kodekartustok desc limit 1";
		
		foreach($qry->result() as $row) {
			$stokawal = $row->stokakhir; 
			$hargaavg = $row->hargaavg; 
		}
		// $stokakhir = $stokawal - $qty;
		$stokakhir = 0;  
   
		$data = array(
		   'tanggal'     => date("Y-m-d"),
		   'kodecabang'     => $kodecabang,
		   'kodebahan'    => $kodebahan,
		   'jenis'      => "ZERO_INV",
		   'noref'     => $insert_id,
		   'stokawal'  => $stokawal,
		   'debet'     => 0,
		   'kredit'     => $stokawal,
		   'stokakhir'     => $stokakhir,
		   'hargatrans'     => $hargaavg,
		   'hargaavg'     => $hargaavg
	   );
		$this->db->insert('kartustok', $data);
	}

   
}