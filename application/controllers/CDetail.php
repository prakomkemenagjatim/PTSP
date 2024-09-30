<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Sitecontroller'.EXT);

class CDetail extends Sitecontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->load->helper('app_helper');
    }
	public function index()
	{
		$page = 'site/web_awal';
		$data['content']=$page;
		$data['title'] = 'Dita Manis - Kemenag Kota Malang';
		$this->load->view('index',$data);
	}
	
	public function ponpes()
	{
		$ns = isset($_GET['_ns'])?urldecode($_GET['_ns']):'';
		$ns = html_escape($ns);
		$page = 'site/web_detail_notfound';
		$data['title'] = 'Data Pondok Pesantren Tidak Ditemukan';
		$data['head'] = 'Pondok Pesantren Tidak Ditemukan';
		if ($ns !== ''){

			$tabel = "SELECT * from vwpp where nspp = '$ns' limit 1 ";
			$query = $this->db->query($tabel);
			if ($query){
			    $row = $query->row();
			    if (isset($row)){
			    	//$jml = $query->num_rows();
			    	//if ($jml > 0){
					    $data['row'] = $row;
					    $page = 'site/web_detail_ponpes';
					    $nama = strtoupper($row->nama);
						$data['title'] = 'Profil Pondok Pesantren '.$nama;
						$data['head'] = 'Pondok Pesantren '.$nama;						
					//}
				}
			}
		}
		$data['content']=$page;
		$this->load->view('index',$data);
	}

}
