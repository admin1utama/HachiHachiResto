<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konversi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('modKonversi');
		$this->load->library('session');
		$this->load->library('form_validation'); 
	}
	public function index()
	{
		$data['datakonversisatuan'] = $this->modKonversi->select_konversi_satuan();
		$this->load->view('showkonversi', $data);
	}

	public function tambahkonversi()
	{
		$params['databahanbaku'] 		= $this->modKonversi->SelectBahanBaku();
		$params['datakonversisatuan'] 	= $this->modKonversi->select_satuan();
		$this->load->view('masterKonversi', $params);
	}

	public function insertKonversi()
	{
		$idbahanbaku 			= $this->input->post('idbahanbaku'); 
		$idtextPertama 			= $this->input->post('idtxtPertama');
		$idtextKedua 			= $this->input->post('idtxtKedua');
		$idtextNilaiKonversi 	= $this->input->post('idtxtNilai');
		//echo $idbahanbaku."-".$idtextPertama."-".$idtextKedua."-".$idtextNilaiKonversi;
		
		$this->modKonversi->insert_Konversi($idbahanbaku, $idtextPertama,$idtextKedua,$idtextNilaiKonversi);
		echo "success";

	}

	public function getDetailKonversi()
	{
		$idbahanbaku 	= $this->input->post("idbahanbaku");
		$bhnbaku 		= $this->modKonversi->KonversiSelectBahanBaku($idbahanbaku);

		$nomer =1;
		foreach($bhnbaku->result() as $row)
		{
			echo "<tr>";
				echo "<td>".$nomer."</td>";
				echo "<td>".$row->namabahan."</td>";
				echo "<td>".$row->kodesatuan1."</td>";
				echo "<td>".$row->kodesatuan2."</td>";	
				echo "<td>".$row->nilaikonversi."</td>";		
				echo "<td><button onclick=hapuskonversi('".$row->kodekonversi."') type='button' class='btn btn-danger'><i class='icon_trash_alt'></i></button></td>";
			echo "</tr>";
			$nomer+=1;
		}
	}

	public function hapusDetailKonversi()
	{
		$kodekonversi = $this->input->post('kodekonversi'); 
		$this->modKonversi->delete_detailKonversi($kodekonversi);
	}

	

}
