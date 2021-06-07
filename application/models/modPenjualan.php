<?php
class modPenjualan extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
    }
    
    public function selectmember()
	{
        return $this->db->query("select * from member"); 
    }

    public function selectbahanjadi()
	{
        return $this->db->query("select * from bahan where jenis ='BAHAN JADI'"); 
    }

    public function selectdetailmember($idmember)
	{
        return $this->db->query("select * from member where kodemember = '$idmember'"); 
    }

    public function getDataNamaBahan($txtkodebahanjadi)
    {
        $query = $this->db->where('kodebahan', $txtkodebahanjadi)
                            ->get('bahan'); 
        return $query; 
    }

    public function insert_transaksi($tanggalan, $username, $member, $grandtotal)
    {
        $data = array(
            'tanggal'  => $tanggalan,
            'username'  => $username,
            'kodemember' => $member,
            'grandtotal'    => $grandtotal
            );
        $this->db->insert('hjual', $data);
        $nomernota = $this->db->insert_id();
        return $nomernota;
    }

    public function insert_djualtransaksi($nomernota,$kodemakanan,$jumlahpermakanan,$hargaperitem,$subtotal)
    {
        //LOOP CART SUDAH DI CONTROLLER PENJUALAN, JADI TINGGAL INSERT SAJA
        $data2 = array(
            'nomernota'     => $nomernota,
            'kodebahan'     => $kodemakanan,
            'qty'           => $jumlahpermakanan,
            'harga'         => $hargaperitem,
            'subtotal'      => $subtotal
            );
        $this->db->insert('djual', $data2);
    }
    
}