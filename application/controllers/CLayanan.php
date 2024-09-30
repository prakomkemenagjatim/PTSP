<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Sitecontroller'.EXT);

class CLayanan extends Sitecontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->load->helper('app_helper');
		$this->load->helper('url_helper');
    }

	public function sekjen(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		if (count((array)$row) == 0){
			redirect('page/sekjen', 'refresh');
		}
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/sekjen');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['img'] = $row->layananimg;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

    public function privacy(){
        	$this->load->view('privacy',$data);
    }
    public function app(){
        	$this->load->view('app',$data);
    }

	public function bimas_islam(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		if (count((array)$row) == 0){
			redirect('page/bimas-islam', 'refresh');
		}
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/bimas-islam');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function haji_umrah(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		if (count((array)$row) == 0){
			redirect('page/haji-umrah', 'refresh');
		}
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/haji-umrah');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$data['ketpermohonan'] = $row->ketpermohonan;
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function penyelenggara_zakat_wakaf(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		if (count((array)$row) == 0){
			redirect('page/penyelenggara-zakat-wakaf', 'refresh');
		}
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/penyelenggara-zakat-wakaf');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$data['ketpermohonan'] = $row->ketpermohonan;
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	// public function sekjen(){
	// 	$page = 'site/web_suratmasuk';
	// 	$slug = $this->uri->segment(3);
	// 	$slug = $slug == ''?'xxxxx':$slug;
	// 	$this->db->where("layananView",$slug);
	// 	$row = $this->db->get("vwlayanan")->row();
	// 	$jenis = $row->layananJenis;
	// 	$judul = $row->menuJudul;
	// 	$subjudul = $row->menuSubjudul;
	// 	$data['content']=$page;
	// 	$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
	// 	$data['head'] = $jenis;
	// 	$data['subhead'] = $judul;
	// 	$data['kd'] = $row->menuKode;
	// 	$data['kd1'] = $row->layananKode;
	// 	if ($data['kd'] == ''){redirect(base_url(''));}
	// 	$this->load->view('index',$data);
	// }

	// public function bimas_islam(){
	// 	$slug = $this->uri->segment(3);
	// 	$slug = $slug == ''?'xxxxx':$slug;
	// 	$page = 'site/web_'.str_replace("-","",$slug);
	// 	$this->db->where("layananView",$slug);
	// 	$row = $this->db->get("vwlayanan")->row();
	// 	$jenis = $row->layananJenis;
	// 	$judul = $row->menuJudul;
	// 	$subjudul = $row->menuSubjudul;
	// 	$template = $row->layananTemplate;
	// 	if ($template == ''){
	// 		redirect('page/bimas-islam', 'refresh');
	// 	}
	// 	$data['content']='site/'.$template;
	// 	$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
	// 	$data['head'] = $jenis;
	// 	$data['subhead'] = $judul;
	// 	$data['kd'] = $row->menuKode;
	// 	$data['kd1'] = $row->layananKode;
	// 	if ($data['kd'] == ''){redirect(base_url(''));}
	// 	$this->load->view('index',$data);
	// }

	public function pendma(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$page = 'site/web_permohonan';
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/bimas-islam');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function pais(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$page = 'site/web_pais';
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/pais');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function pd_pontren(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/pd-pontren');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function layanan_kristen(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'08');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/layanan-kristen');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function layanan_buddha(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'09');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/layanan-buddha');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function layanan_katolik(){
		$slug = $this->uri->segment(3);
		$slug = $slug == ''?'xxxxx':$slug;
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'10');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = $row->layananTemplate;
		cekviewsite($template,'page/layanan-katolik');
		$data['content']='site/'.$template;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		
		$data['ketlampiran'] = $row->ketlampiran;
		$data['layananket'] = $row->layananket;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$this->load->view('index',$data);
	}

	public function pengadaan(){
		$slug = $this->uri->segment(2);
		$slug = $slug == ''?'xxxxx':$slug;
		$page = 'site/web_'.str_replace("-","",$slug);
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$data['content']=$page;
		$data['title'] = $jenis.' ('.$judul.') | KEMENTERIAN AGAMA NGAWI';
		$data['head'] = $jenis;
		$data['subhead'] = $judul;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($data['kd'] == ''){redirect(base_url(''));}
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}
}
