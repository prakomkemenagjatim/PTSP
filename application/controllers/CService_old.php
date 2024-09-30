<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Sitecontroller'.EXT);

class CService extends Sitecontroller {

	public function __construct()
	{
       	parent::__construct();
		$this->load->helper('app_helper');
    }
	public function getData(){
		$kode = isset($_POST['akses'])?$_POST['akses']:'';
		if ($kode == 'ivpWLmp7VU6eoTP5svfs'){
			$mm = isset($_POST['mm'])?$_POST['mm']:'';
			$wheremm = 'where ifnull(disposisi,"") = "" and menukode between 1 and 10 and layananTemplate <> "web_konsul"';
			if ($mm != '0'){
				$wheremm = ' where ifnull(disposisi,"") = ""  and menukode between 1 and 10 and layananTemplate <> "web_konsul"  and menukode  = "'.$mm.'"';
			}

			
			$qry = $this->db->query("Select noreg,ifnull(suratinstansi,'') as instansi,
											ifnull(tglsurat,'') as tglsurat,
											ifnull(suratno,'') as nosurat,
											ifnull(suratperihal,'') as perihal,filedok,status from vwsuratmasuk $wheremm");
			$result = $qry->result_array();
			$arr = array();
			foreach ($result as $key => $val) {
				$href = viewdoc().base_url().$val['filedok'];
				array_push($arr,array(
					"noreg"=>$val['noreg'],
					"instansi"=>$val['instansi'],
					"tglsurat"=>$val['tglsurat'],
					"nosurat"=>$val['nosurat'],
					"perihal"=>$val['perihal'],
					"filesurat"=>$href,
					"status"=>$val['status']
				));
			}
			die(json_encode($arr));
		} else {
			die('not');
		}

	}

	public function setDispo(){
		$this->load->helper('app_helper');
		$kode = isset($_POST['akses'])?$_POST['akses']:'';
		if ($kode == 'ivpWLmp7VU6eoTP5svfs'){
			$usertype = 1;
			$userid = 'kepalakantor';
			$ndata['error'] = 'Data layanan tidak ditemukan.';
			$ndata['success'] = '';
			if ($usertype <= 1){
				$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
				$status=isset($_POST['status'])?$_POST['status']:'';
				$disposisi=isset($_POST['dispoid'])?$_POST['dispoid']:'';
				$disposisicatatan=isset($_POST['catatan'])?$_POST['catatan']:'';
				$dok=isset($_POST['dok'])?$_POST['dok']:'';
				$perihalsurat=isset($_POST['perihalsurat'])?$_POST['perihalsurat']:'-';
				if ($noreg == ''){
					$ndata['error'] = 'Data layanan tidak ditemukan.';
					$ndata['success'] = '';
				}  else if ($disposisi == ''){
					$ndata['error'] = 'Disposisi belum dipilih.';
					$ndata['success'] = '';
				} else {
					$this->db->query("delete from tbdisposisi where disposisi_noreg = '$noreg' and disposisi_dari <> 0");
					$disposisi = json_decode($disposisi,true);
					foreach($disposisi as $item){
						$resultdispo = $this->db->query("insert tbdisposisi (disposisi_noreg,disposisi_dari,disposisi_ke,create_user) values ('$noreg',1,'$item','$userid') ");
						if ($resultdispo){
							$ndata['success'] = 'Sukses disposisi.';
							$ndata['error'] = '';
							$dtdispo = $this->db->query("select ifnull(userWA,'') as userWA from tbuser where ifnull(userWA,'') <> '' and userType = '$item' ")->result();
		
							foreach ($dtdispo as $row) {
								if ($row->userWA != ''){
									$lembar = base_url().'index.php/data/lembardisposisi?q='.$noreg;
									$dok = str_replace(viewdoc(),'',$dok);
									$dok = viewdoc().$dok;
									$msg = "📨 *Disposisi Surat*
		
		
✉️ Agenda No: *$noreg*
✉️ Perihal: *$perihalsurat*
✉️ Isi Disposisi: *$disposisicatatan*
✉️ File Surat: $dok
✉️ Lembar Disposisi: $lembar
							
✉️ Disposisi dari: *Kepala Kantor*
							
Kementerian Agama Kota Malang, Hebat Bermartabat";
									sendWA($row->userWA,$msg,'Disposisi');
								}
							}
						} else {
							$ndata['error'] = 'Gagal disposisi.';
							$ndata['success'] = '';
						}
					}
					$dispoid=isset($_POST['dispoid'])?$_POST['dispoid']:'';
					$dispoid = str_replace(array("[","]"),"",$dispoid);
					$dispoid = str_replace(", ",",",$dispoid);
					$dispopilih=isset($_POST['disponm'])?$_POST['disponm']:'';
					$dispopilih = str_replace(array("[","]"),"",$dispopilih);
					$dispopilih = str_replace(", ",",",$dispopilih);
					//die($dispopilih);
					if ($disposisi != '' && $status < 3){
						$status = 3;
					}
					$result = $this->db->query("update tbsuratmasuk set status = '$status',updatedispotgl = current_timestamp(),disposisiid = '$dispoid',disposisi = '$dispopilih', disposisicatatan = '$disposisicatatan' where noreg = '$noreg' ");
						
				}
			}		
			die(json_encode($ndata));
		} else {
			die('not');
		}
	}

	function getBerkas(){
		$kode = isset($_POST['akses'])?$_POST['akses']:'';
		if ($kode == 'ivpWLmp7VU6eoTP5svfs'){
			$noreg = isset($_POST['noreg'])?$_POST['noreg']:'';
			$base = viewdoc().base_url();
			$sql = $this->db->query("select berkasket,berkasfile,concat('".$base."',berkasfile) as urlberkas from tbberkas where berkasnoreg = '$noreg' ");
			$res = $sql->result();
			die(json_encode($res));
		} else {
			die('not');
		}
	}

}
