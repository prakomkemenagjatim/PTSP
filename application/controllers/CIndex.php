<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Sitecontroller'.EXT);

class CIndex extends Sitecontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->load->helper('app_helper');
		$this->load->helper('url_helper');
    }
    private function isMobileOrTablet() {
        return preg_match('/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i', $_SERVER['HTTP_USER_AGENT']);
    }
    
    public function link($item){
        $this->load->view('link/'.$item);
    }
	public function index()
	{
// 		$page = 'site/web_awalv3';
// 		$data['content']=$page;
// 		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
// 		$this->db->where("menuAktif","1");
// 		$data['qry'] = $this->db->get("tbmainmenu")->result();
// 		$this->db->where("slideAktif","1");
// 		$data['qryslide'] = $this->db->get("tbslide")->result();
// 		$this->db->where("layananAktif","1");
// 		$this->db->order_by('menuKode asc, layananKode ASC');
// 		$data['layanan'] = $this->db->get("vwlayanan")->result();
		
// 		if ($this->isMobileOrTablet()) {
//             // Redirect to mobile/tablet URL
//             $this->load->view('site/app',$data);
//         } else {
//             // Redirect to desktop URL
//             $this->load->view('index',$data);
//         }
        	$page = 'ld/home';
		$data['content']=$page;
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$this->db->where("menuAktif","1");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->db->where("layananAktif","1");
		$this->db->order_by('menuKode asc, layananKode ASC');
		$data['layanan'] = $this->db->get("vwlayanan")->result();
		
		if ($this->isMobileOrTablet()) {
            // Redirect to mobile/tablet URL
            $this->load->view('site/app',$data);
        } else {
            // Redirect to desktop URL
            $this->load->view('ld/index',$data);
        }

	}
	public function home()
	{
		$page = 'ld/home';
		$data['content']=$page;
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$this->db->where("menuAktif","1");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->db->where("layananAktif","1");
		$this->db->order_by('menuKode asc, layananKode ASC');
		$data['layanan'] = $this->db->get("vwlayanan")->result();
		
		if ($this->isMobileOrTablet()) {
            // Redirect to mobile/tablet URL
            $this->load->view('site/app',$data);
        } else {
            // Redirect to desktop URL
            $this->load->view('ld/index',$data);
        }
	}

	public function kua()
	{
		$page = 'kua/home';
		$data['content']=$page;
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$this->db->where("menuAktif","1");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->db->where("layananAktif", "1");
		$this->db->where("menuKode", "17");
		$this->db->order_by('menuKode ASC, layananKode ASC');
		$data['layanan'] = $this->db->get("vwlayanan")->result();

		$data['kua'] = $this->db->get("kua")->result();
		$data['layanankua'] = $this->db->get("layanankua")->result();
		if ($this->isMobileOrTablet()) {
            // Redirect to mobile/tablet URL

            $this->load->view('kua/index',$data);

            // $this->load->view('site/app',$data);

        } else {
            // Redirect to desktop URL
            $this->load->view('kua/index',$data);
        }
	}
	public function app()
	{
		$page = 'site/app';
		$data['content']=$page;
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$this->db->where("menuAktif","1");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->db->where("layananAktif","1");
		$this->db->order_by('menuKode asc, layananKode ASC');
		$data['layanan'] = $this->db->get("vwlayanan")->result();
		$db2 = $this->load->database('web', TRUE);
        $data['berita'] = $db2->query("SELECT * FROM artikel ORDER BY artikel_id DESC LIMIT 5");
		$this->load->view('site/app',$data);
	}
	
	public function getberita()
    {
        // Load the 'web' database configuration
        $db2 = $this->load->database('web', TRUE);
        
        // Query to select the latest data from the 'artikel' table
        $query = $db2->query("SELECT artikel.*, foto_artikel.* 
                          FROM artikel 
                          LEFT JOIN foto_artikel ON artikel.artikel_id = foto_artikel.id_artikel
                          ORDER BY artikel.artikel_id DESC LIMIT 1");
        
        // Check if the query was successful and data was retrieved
        if ($query) {
            // Fetch the row data
            $row = $query->row_array();
            
            // Encode the row data as JSON
            $json_data = json_encode($row);
             var_dump($json_data);
            // Return the JSON data
            return $json_data;
        } else {
            // Return an empty JSON object if no data found
            return json_encode((object)[]);
        }
    }

	
	public function privacy(){
	    $page = 'site/privacy';
		$data['content']=$page;
		$data['title'] = 'Privacy Police';
		$data['head'] = 'Privacy Police';
		$this->load->view('privacy',$data);
	}
	
	public function v2()
	{
		$page = 'site/web_awalv2';
		$data['content']=$page;
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$this->db->where("menuAktif","1");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->load->view('index',$data);
	}
	public function page($slug='')
	{
		$page = 'site/web_layananv3';
		$data['content']=$page;
		
		$this->db->where("menuSlug",$slug);
		$row = $this->db->get("tbmainmenu")->row();
		$data['row'] = $row;
		if (count((array)$row) == 0){
			redirect(base_url(), 'refresh');
		}
		
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$data['head'] = $row->menuJudul;
		$data['subhead'] = $row->menuSubjudul;
		$data['kode'] = $row->menuKode;
		if ($slug == 'lacak-layanan'){
			$data['content']='site/web_lacak_layanan';
		} else {
			$this->db->where("layananAktif","1");
			$this->db->where("menuKode",$row->menuKode);
			$data['qrylayanan'] = $this->db->get("vwlayanan")->result();
		}
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->load->view('index',$data);
	}
	
	public function halaman($slug='')
	{
		$page = 'ld/halaman';
		$data['content']=$page;
		
		$this->db->where("menuSlug",$slug);
		$row = $this->db->get("tbmainmenu")->row();
		$data['row'] = $row;
		if (count((array)$row) == 0){
			redirect(base_url(), 'refresh');
		}
		
		$data['title'] = 'SANTUN KEMENAG KAB NGAWI';
		$data['head'] = $row->menuJudul;
		$data['subhead'] = $row->menuSubjudul;
		$data['kode'] = $row->menuKode;
		if ($slug == 'lacak-layanan'){
			$data['content']='ld/web_lacak_layanan';
		} else {
			$this->db->where("layananAktif","1");
			$this->db->where("menuKode",$row->menuKode);
			$data['qrylayanan'] = $this->db->get("vwlayanan")->result();
		}
		$this->db->where("slideAktif","1");
		$data['qryslide'] = $this->db->get("tbslide")->result();
		$this->load->view('ld/index',$data);
	}

	public function grafikikm(){
		$page = 'ld/forms/web_grafikikm';
		$data['content']=$page;
		$data['title'] = 'GRAFIK IKM - SANTUN KEMENAG KAB NGAWI';
		$data['head'] = 'GRAFIK INDEKS KEPUASAN MASYARAKAT';
		$this->load->view('ld/index',$data);
	}


	public function faq(){
		$page = 'site/web_faq';
		$data['content']=$page;
		$this->db->where("menuAktif","1");
		$this->db->where("id between 1 and 10");
		$data['qry'] = $this->db->get("tbmainmenu")->result();
		$data['title'] = 'FAQ - SENYUM';
		$data['head'] = 'FAQ - SENYUM';
		$this->load->view('index',$data);
	}

	public function suruq(){
		$page = 'site/web_suruq';
		$data['content']=$page;
		$data['title'] = 'SURAT REKOMENDASI HAJI & UMRAH (SURUQ)';
		$data['head'] = 'SURAT REKOMENDASI HAJI & UMRAH (SURUQ)';
		$this->load->view('index',$data);
	}

	public function kembang_zio(){
		$page = 'site/web_kembangzio';
		$data['content']=$page;
		$data['title'] = 'KEMBANG ZIO - SANTUN KEMENAG KAB NGAWI';
		$data['head'] = 'Kembang ZIO';
		$data['subhead'] = 'Kementerian Agama Kota Malang';
		$data['subhead1'] = 'Kantin Edukasi Pembangunan Zona Integritas Online';
		$data['qry'] = $this->db->get("tbkembangzio")->result();
		$data['visit'] = $this->getvisitor();
		$this->load->view('index',$data);
	}

	private function getvisitor(){
		//session_start();
		$counter_name = "./vcounter.txt";
		if (!file_exists($counter_name)) {
		$f = fopen($counter_name, "w");
		fwrite($f,"1");
		fclose($f);
		}

		$f = fopen($counter_name,"r");
		$counterVal = fread($f, filesize($counter_name));
		fclose($f);

		if(!isset($_SESSION['hasVisited'])){
			$this->session->set_userdata('hasVisited', 'ok');
			$counterVal++;
			$f = fopen($counter_name, "w");
			fwrite($f, $counterVal);
			fclose($f);
		}

		return $counterVal;
	}

	public function viewdoc(){
		$file = isset($_GET['file'])?$_GET['file']:'';
		//die('ss'.strpos($file,'.pdf'));
		if (strpos($file,'.pdf') > 0 ){
			$file = str_replace(".pdf","",$file);
			$page = 'site/web_viewpdf';
			$data['content']=$page;
			$this->load->view($page);
		} else {
			redirect($file, 'refresh');
		}
	}


	// public function dok(){
	// 	$file = "\media\dokfile\0601\60bec5798cc6e_Akte_Notaris_Yayasan.pdf";
	// 	header('Content-Description: Dokumen SIOP');
	// 	header('Content-Type: 	application/pdf');
	//    header('Content-Disposition: inline; filename="xxxxx"');
	//    header('Content-Transfer-Encoding: binary');
	//    header('Content-Length: ' . filesize($file));
	//    header('Accept-Ranges: bytes');
	//    @readfile($file);
	//    exit;
	// }

	public function lembardisposisi(){
		$urlawal = $this->getcurrenturl();
		$urlre = str_replace(base_url(),base_url()."dashboard/",$urlawal);
		//redirect(base_url('index.php')."/data/viewdoc?file=".$urlre);
		redirect($urlre);
	}
	private function getcurrenturl(){
		$currentURL = current_url();
		$params = $_SERVER['QUERY_STRING'];
		$fullURL = $currentURL . '?' . $params;
		return $fullURL;
	}


	public function cek_rekom_umroh(){
		$q = isset($_GET['q'])?$_GET['q']:redirect(base_url(), 'refresh');
		$resultr = $this->db->query("select *,
		DATE_FORMAT(`jamaahlhrtgl`,'%d') as jlhrd,
		DATE_FORMAT(`jamaahlhrtgl`,'%m') as jlhrm,
		DATE_FORMAT(`jamaahlhrtgl`,'%Y') as jlhry,
		DATE_FORMAT(`tglrekom`,'%d') as jrekomd,
		DATE_FORMAT(`tglrekom`,'%m') as jrekomm,
		DATE_FORMAT(`tglrekom`,'%Y') as jrekomy,
		DATE_FORMAT(`traveltglsurat`,'%d') as jsuratd,
		DATE_FORMAT(`traveltglsurat`,'%m') as jsuratm,
		DATE_FORMAT(`traveltglsurat`,'%Y') as jsuraty  from vwsuruq where ids = '$q'");
		$rowr = $resultr->row();
		if (count((array)$rowr) == 0){
			$data['subhead1'] = 'Data tidak ditemukan';
		} else {
			$data['subhead1'] = 'Detail Rekomendasi Umroh';
			$data['norekom'] =$rowr->norekom;
			$data['nama'] = $rowr->jamaahnama;
			$data['alamat'] = $rowr->jamaahalamat;
			$data['hp'] = $rowr->jamaahhp;
			$data['travel'] = $rowr->travelnama;
			$data['lahir'] = $rowr->jamaahlhrtmp.', '.$rowr->jlhrd.' '.bln_array($rowr->jlhrm).' '.$rowr->jlhry;
			$data['tglrekom'] = $rowr->jrekomd.' '.bln_array($rowr->jrekomm).' '.$rowr->jrekomy;
		}

		$page = 'site/web_ceksuruq';
		$data['content']=$page;
		$data['title'] = 'VERIFIKASI REKOMENDASI UMROH - SANTUN KEMENAG KAB NGAWI';
		$data['head'] = 'Verifikasi Rekomendasi Umroh';
		$data['subhead'] = 'Kementerian Agama Kabupaten Ngawi';

		$this->load->view('index',$data);
	}


}
