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

    public function select_penjualan() 
    {
        return $this->db->query("select hjual.nomernota, hjual.tanggal, hjual.username, hjual.kodecabang, hjual.kodemember, hjual.grandtotal, member.namamember, member.kotamember, sum(djual.qty) as jumitem from hjual, djual, member where hjual.kodemember = member.kodemember and hjual.nomernota = djual.nomernota group by hjual.nomernota, hjual.tanggal, hjual.username, hjual.kodecabang, hjual.kodemember, hjual.grandtotal, member.namamember, member.kotamember");
    }

    public function select_header_penjualan_bynomernota($nomernota) 
    {
        return $this->db->query("select hjual.nomernota, hjual.tanggal, hjual.username, hjual.kodecabang, hjual.kodemember, hjual.grandtotal, member.namamember, member.alamatrumahmember, member.kotamember, cabang.namacabang, sum(djual.qty) as jumitem from hjual, djual, member, cabang where cabang.kodecabang = hjual.kodecabang and hjual.kodemember = member.kodemember and hjual.nomernota = djual.nomernota and hjual.nomernota = '$nomernota' group by hjual.nomernota, hjual.tanggal, hjual.username, hjual.kodecabang, hjual.kodemember, hjual.grandtotal, member.namamember, member.alamatrumahmember, member.kotamember, cabang.namacabang");
    }

    public function select_detail_penjualan_bynomernota($nomernota) 
    {
        return $this->db->query("select djual.*, bahan.namabahan, bahan.satuan, bahan.jenis, bahan.stok from djual, bahan where djual.kodebahan = bahan.kodebahan and djual.nomernota = '$nomernota'");
    }

    public function select_detail_paketmenu_bynomernota($nomernota) 
    {
        return $this->db->query("select djualpaket.*, paketmenu.namapaket  from djualpaket, paketmenu where djualpaket.kodepaket = paketmenu.kodepaket and djualpaket.nomernota = '$nomernota'");
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

    public function insert_transaksi($tanggalan, $username, $kodecabang, $member, $grandtotal, $nomermeja)
    {
        $data = array(
            'tanggal'  => $tanggalan,
            'username'  => $username,
            'kodemember' => $member,
            'kodecabang' => $kodecabang,
            'grandtotal'    => $grandtotal,
            'nomermeja' => $nomermeja
        );
        $this->db->insert('hjual', $data);
        $nomernota = $this->db->insert_id();
        return $nomernota;
    }

    public function insert_djualtransaksi($nomernota,$kodemakanan,$jumlahpermakanan,$hargaperitem,$subtotal,$kodepaket)
    {
        //LOOP CART SUDAH DI CONTROLLER PENJUALAN, JADI TINGGAL INSERT SAJA
        $data2 = array(
            'nomernota'     => $nomernota,
            'kodebahan'     => $kodemakanan,
            'qty'           => $jumlahpermakanan,
            'harga'         => $hargaperitem,
            'subtotal'      => $subtotal, 
            'kodepaket'     => $kodepaket
            );
        $this->db->insert('djual', $data2);

        //cek apakah kodemakanan punya bom, kalau punya maka kurangi stok sesuai bom 
        $codecabang = $this->session->userdata("codecabang"); 
        $qry        = $this->db->query("select * from bom where kodebahanjadi = '$kodemakanan'"); 
        foreach($qry->result() as $row) {
            // kurangi dari tabel stokcabang
            $potongan = $row->qty; 
            $this->db->query("update stokcabang set stok = stok - $potongan where kodebahan = '".$row->kodebahanbaku."' and kodecabang = '$codecabang'"); 
            // jika ada yg negatif jadikan 0 
            $this->db->query("update stokcabang set stok = 0 where stok < 0"); 

            //insert into kartu stok 
            $qrykartu = $this->db->query("select * from kartustok where kodecabang = '$codecabang' and kodebahan = '".$row->kodebahanbaku."' order by kodekartustok desc limit 1");
            foreach($qrykartu->result() as $rowkartu) {
                $stokawal = $rowkartu->stokakhir; 
                $hargaavg = $rowkartu->hargaavg; 
            }
            $stokakhir = $stokawal - $potongan; 

            if($stokakhir < 0) {
                $potongan = $stokawal; 
                $stokakhir= 0; 
            }
            $data = array(
                'tanggal'     => date("Y-m-d"),
                'kodecabang'  => $codecabang,
                'kodebahan'   => $row->kodebahanbaku,
                'jenis'       => "DIJUAL",
                'noref'       => $nomernota,
                'stokawal'    => $stokawal,
                'debet'       => 0,
                'kredit'      => $potongan,
                'stokakhir'   => $stokakhir,
                'hargatrans'  => $hargaavg,
                'hargaavg'    => $hargaavg
            );
            $this->db->insert('kartustok', $data);
        }
    }
    
    public function insert_djualpaketmenu($nomernota,$kodepaket,$jumlahpermakanan,$hargaperitem,$subtotal)
    {
        $data2 = array(
            'nomernota'     => $nomernota,
            'kodepaket'     => $kodepaket,
            'qty'           => $jumlahpermakanan,
            'harga'         => $hargaperitem,
            'subtotal'      => $subtotal
            );
        $this->db->insert('djualpaket', $data2);
    }
}