<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Sitecontroller'.EXT);

class CData extends Sitecontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->load->helper('app_helper');
    }
	public function index()
	{
	}

	public function getLayanan()
	{
		$menu = isset($_POST['val'])?$_POST['val']:'';
		$main = isset($_POST['main'])?$_POST['main']:'';
		$this->db->where("menuKode",$main);
		$this->db->where("layananMenu",$menu);
		$this->db->where("layananAktif",1);
		$get = $this->db->get("tblayanan");
		$option="";
		foreach ($get->result() as $row) {
			$option .= "<option value='".$row->layananKode."' data-main='$main' data-menu='$menu' data-link='".$row->layananHref."'>".$row->layananJenis."</option>";
		}
		die($option);
	}

	public function getForm()
	{
		$val = isset($_POST['val'])?$_POST['val']:'';
		$main = isset($_POST['main'])?$_POST['main']:'';
		$menu = isset($_POST['menu'])?$_POST['menu']:'';
		$this->db->where("layananKode",$val);
		$this->db->where("menuKode",$main);
		$this->db->where("layananMenu",$menu);
		$this->db->where("layananAktif",1);
		$get = $this->db->get("tblayanan");
		$row = $get->row();
		if ($row->LayananHref == '' || $row->LayananHref == null){
			if ($this->load->view('site/web_'.$row->layananView,'',true) !== ''){
				$this->load->view('site/web_'.$row->layananView);
			} else {
				die("");	
			}
		} else {
			die("");
		}
		
		//die($html);
	}


	function simpanrating(){
		$rate = isset($_POST['rate'])?$_POST['rate']:'';
		$ikm_saran = isset($_POST['ikm_saran'])?$_POST['ikm_saran']:'';

		$json=array();
		if ($rate == '' ){
			$json['status']=2;
		} else {
			$result = $this->db->query("INSERT INTO `tbikm` (
										`ikm_vt_layanan`,
										`ikm_saran`
									)
									VALUES
										(
										'$rate',
										'$ikm_saran'
										);
									
									");
			if ($result){
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

	function grafikikm(){
		$ikm = array('','Sangat Tidak Puas','Tidak Puas','Cukup Puas','Puas','Sangat Puas');
		$ikmcolor = array('','#c62828','#ff9030','#ffa000','#9e9d24','#2e7d32');
		$dasar = isset($_POST['sdasar'])?$_POST['sdasar']:'';

		if ($dasar == 'bulan'){
			$judul = 'Indeks Kepuasan Masyarakat Bulan Ini';
			$tabel = "SELECT ikm_vt_layanan as vt, count(*) as jml from tbikm where date_format(ikm_tgl,'%Y-%m') = date_format(curdate(),'%Y-%m') group by ikm_vt_layanan ";
		} else if ($dasar == 'tahun'){
			$judul = 'Indeks Kepuasan Masyarakat Tahun Ini';
			$tabel = "SELECT ikm_vt_layanan as vt, count(*) as jml from tbikm where date_format(ikm_tgl,'%Y') = date_format(curdate(),'%Y') group by ikm_vt_layanan ";
		} else {
			$judul = 'Indeks Kepuasan Masyarakat Hari Ini';
			$tabel = "SELECT ikm_vt_layanan as vt, count(*) as jml from tbikm where date_format(ikm_tgl,'%Y-%m-%d') = date_format(curdate(),'%Y-%m-%d') group by ikm_vt_layanan ";
		} 
		$rs = $this->db->query($tabel);
		$items = $rs->result_array();
		$data = array();
			foreach ($items as $row)    {
				array_push($data,array(
					'y'=>(int)$row['jml'],
					'name'=>$ikm[(int) $row['vt']],
					'color'=>$ikmcolor[(int) $row['vt']]
					)
				);
			}
		$datax['data'] = $data;
		$datax['judul'] = $judul;	
		$json = json_encode($datax);	
		die($json);
	}
	
	function simpanbukutamu(){
		$bt_nama = isset($_POST['bt_nama'])?$_POST['bt_nama']:'';
		$bt_alamat = isset($_POST['bt_alamat'])?$_POST['bt_alamat']:'';
		$bt_hp = isset($_POST['bt_hp'])?$_POST['bt_hp']:'';
		$bt_email = isset($_POST['bt_email'])?$_POST['bt_email']:'';
		$bt_pesan = isset($_POST['bt_pesan'])?$_POST['bt_pesan']:'';
		$bt_layanan = isset($_POST['bt_layanan'])?$_POST['bt_layanan']:'';
		$bt_layananlain = isset($_POST['bt_layananlain'])?$_POST['bt_layananlain']:'';
		$json=array();
		if ($bt_nama == '' || $bt_alamat == '' || $bt_hp == '' || $bt_layanan == '' || $bt_layanan == '0' || ($bt_layanan == '5' && $bt_layananlain == '')){
			$json['status']=2;
		} else {
			$result = $this->db->query("INSERT INTO `tbbukutamu` (
										`bt_nama`,
										`bt_alamat`,
										`bt_hp`,
										`bt_email`,
										`bt_pesan`,
										`bt_layanan`,
										`bt_layananlain`
									)
									VALUES
										(
										'$bt_nama',
										'$bt_alamat',
										'$bt_hp',
										'$bt_email',
										'$bt_pesan',
										'$bt_layanan',
										'$bt_layananlain'
										);
									
									");
			if ($result){
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

	function suratmasukPost(){
		$nama=isset($_POST['nama'])?addslashes($_POST['nama']):'';
		$nowa=isset($_POST['nowa'])?addslashes($_POST['nowa']):'';
		$nowa = trim($nowa);
		$nomorsurat=isset($_POST['nomorsurat'])?addslashes($_POST['nomorsurat']):'';
		$instansisurat=isset($_POST['instansisurat'])?addslashes($_POST['instansisurat']):'';
		$tujuansurat=isset($_POST['tujuansurat'])?$_POST['tujuansurat']:'';
		$perihalsurat=isset($_POST['perihalsurat'])?addslashes($_POST['perihalsurat']):'';
		$tglsurat=isset($_POST['tglsurat'])?$_POST['tglsurat']:'';
		if ($tglsurat == '' || $tglsurat == '-' || strlen($tglsurat) != 10){
			$surattgl = 'CURDATE()';
		} else {
			$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
			$surattgl = "'$surattgl'";
		}
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal Surat harus diisi.';
			$ndata['success'] = '';
		} else if ($nomorsurat == ''){
			$ndata['error'] = 'Nomor Surat harus diisi.';
			$ndata['success'] = '';
		} else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/Lembaga Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($tujuansurat == ''){
			$ndata['error'] = 'Tujuan Surat harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal Surat harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$fd = './media/';
			$berkasfd = './media/dokfile/';
			$berkasfd1 = 'media/dokfile/';
			$berkasfdfile = $berkasfd.$kd.$kd1.'/'; 
			$berkasfdfile1 = $berkasfd1.$kd.$kd1.'/'; 
			
			$listberkasnm = isset($_POST["berkasnm"])?$_POST["berkasnm"]:array();
			$listberkasket = isset($_POST["berkasket"])?$_POST["berkasket"]:array();
			$listberkasreq = isset($_POST["berkasreq"])?$_POST["berkasreq"]:array();
			$numberkasnm = count($listberkasnm);

			if (!is_dir($fd))mkdir($fd, 0777, TRUE);
			if (!is_dir($berkasfdfile))mkdir($berkasfdfile, 0777, TRUE);
			
			if (!file_exists($fd.'index.php')){
				$fo = fopen($fd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfd.'index.php')){
				$fo = fopen($berkasfd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfdfile.'index.php')){
				$fo = fopen($berkasfdfile.'index.php','w');
				fclose($fo);
			}

			$listfile = array();
			$listfilex = array();
			$inputberkas = 'berkas';
			foreach($listberkasnm as $key => $value) {
				$berkasnm = $value;
				$filesize = $_FILES[$inputberkas]['size'][$key];
				if($filesize > 0) {
					$berkasfilenm = $uid.'_'.$berkasnm;
					$ndata['error'] = '';
					$ndata['success'] = '';
					$_FILES['file']['name']      = $_FILES[$inputberkas]['name'][$key]; 
					$_FILES['file']['type']      = $_FILES[$inputberkas]['type'][$key]; 
					$_FILES['file']['tmp_name']  = $_FILES[$inputberkas]['tmp_name'][$key]; 
					$_FILES['file']['error']     = $_FILES[$inputberkas]['error'][$key]; 
					$_FILES['file']['size']      = $_FILES[$inputberkas]['size'][$key]; 

					$uploadberkas = uploadfile($berkasfdfile,$berkasfilenm,"file");
					if ($uploadberkas['error'] != ''){
						hapusfilearr($listfile);
						$ndata['error'] = 'File Surat : <br/>'.$uploadberkas['error'];
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else {
						$uploaddata = $uploadberkas['data'];
						$uploadfilenm = $uploaddata['file_name'];
						$pathfile = $berkasfdfile.$uploadfilenm;
						$pathfilex = $berkasfdfile1.$uploadfilenm;
						array_push($listfile,$pathfile);
						array_push($listfilex,$pathfilex);
					}
				} else {
					if ($listberkasreq[$key] == '1'){
						hapusfilearr($listfile);
						$ndata['error'] = 'File Surat : <br/>belum dipilih.';
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else if ($listberkasreq[$key] == '0'){
						array_push($listfile,"");
						array_push($listfilex,"");
					} 
				}
			}

			if (count($listfile) == count($listberkasnm)){
				$dokx = isset($listfilex[0])?$listfilex[0]:'';
				$result = $this->db->query("select func_suratmasuk (
						'$kd',
						'$kd1',
						'$nama',
						'$nowa',
						'$nomorsurat',
						 $surattgl,
						'$instansisurat',
						'$tujuansurat',
						'$perihalsurat',
						'$dokx',
						'1',
						'') as noreg");
				//echo  $this->db->last_query();
				if ($result){
					$row = $result->row();
					$noreg = $row->noreg;
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->db->query("delete from tbberkas where berkasnoreg = '$noreg'");
					foreach($listberkasnm as $key => $value) {
						$berkasnm = addslashes($value);
						$berkasfile = $listfilex[$key];
						$berkasket = addslashes($listberkasket[$key]);
						$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','$berkasnm','$berkasfile','$berkasket') ");
					}
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfilearr($listfile);
				}	
			} else {
				$ndata['error'] = 'Gagal mengirim data..';
				$ndata['success'] = '';
			}
		}
		die(json_encode($ndata));
	}
	
	function tenagaagamaasingPost(){
		$nama=isset($_POST['nama'])?addslashes($_POST['nama']):'';
		$nowa=isset($_POST['nowa'])?addslashes($_POST['nowa']):'';
		$nowa = trim($nowa);
		$nomorsurat=isset($_POST['nomorsurat'])?addslashes($_POST['nomorsurat']):'';
		$instansisurat=isset($_POST['instansisurat'])?addslashes($_POST['instansisurat']):'';
		$tujuansurat=isset($_POST['tujuansurat'])?$_POST['tujuansurat']:'';
		$perihalsurat=isset($_POST['perihalsurat'])?addslashes($_POST['perihalsurat']):'';
		$tglsurat=isset($_POST['tglsurat'])?$_POST['tglsurat']:'';
		if ($tglsurat == '' || $tglsurat == '-' || strlen($tglsurat) != 10){
			$surattgl = 'CURDATE()';
		} else {
			$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
			$surattgl = "'$surattgl'";
		}
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($nomorsurat == ''){
			$ndata['error'] = 'Nomor Passport dan Visa harus diisi.';
			$ndata['success'] = '';
		} else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/Lembaga Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($tujuansurat == ''){
			$ndata['error'] = 'Alamat selama di indonesia harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$fd = './media/';
			$berkasfd = './media/dokfile/';
			$berkasfd1 = 'media/dokfile/';
			$berkasfdfile = $berkasfd.$kd.$kd1.'/'; 
			$berkasfdfile1 = $berkasfd1.$kd.$kd1.'/'; 
			
			$listberkasnm = isset($_POST["berkasnm"])?$_POST["berkasnm"]:array();
			$listberkasket = isset($_POST["berkasket"])?$_POST["berkasket"]:array();
			$listberkasreq = isset($_POST["berkasreq"])?$_POST["berkasreq"]:array();
			$numberkasnm = count($listberkasnm);

			if (!is_dir($fd))mkdir($fd, 0777, TRUE);
			if (!is_dir($berkasfdfile))mkdir($berkasfdfile, 0777, TRUE);
			
			if (!file_exists($fd.'index.php')){
				$fo = fopen($fd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfd.'index.php')){
				$fo = fopen($berkasfd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfdfile.'index.php')){
				$fo = fopen($berkasfdfile.'index.php','w');
				fclose($fo);
			}

			$listfile = array();
			$listfilex = array();
			$inputberkas = 'berkas';
			foreach($listberkasnm as $key => $value) {
				$berkasnm = $value;
				$filesize = $_FILES[$inputberkas]['size'][$key];
				if($filesize > 0) {
					$berkasfilenm = $uid.'_'.$berkasnm;
					$ndata['error'] = '';
					$ndata['success'] = '';
					$_FILES['file']['name']      = $_FILES[$inputberkas]['name'][$key]; 
					$_FILES['file']['type']      = $_FILES[$inputberkas]['type'][$key]; 
					$_FILES['file']['tmp_name']  = $_FILES[$inputberkas]['tmp_name'][$key]; 
					$_FILES['file']['error']     = $_FILES[$inputberkas]['error'][$key]; 
					$_FILES['file']['size']      = $_FILES[$inputberkas]['size'][$key]; 

					$uploadberkas = uploadfile($berkasfdfile,$berkasfilenm,"file");
					if ($uploadberkas['error'] != ''){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>'.$uploadberkas['error'];
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else {
						$uploaddata = $uploadberkas['data'];
						$uploadfilenm = $uploaddata['file_name'];
						$pathfile = $berkasfdfile.$uploadfilenm;
						$pathfilex = $berkasfdfile1.$uploadfilenm;
						array_push($listfile,$pathfile);
						array_push($listfilex,$pathfilex);
					}
				} else {
					if ($listberkasreq[$key] == '1'){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>belum dipilih.';
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else if ($listberkasreq[$key] == '0'){
						array_push($listfile,"");
						array_push($listfilex,"");
					} 
				}
			}

			if (count($listfile) == count($listberkasnm)){
				$dokx = isset($listfilex[0])?$listfilex[0]:'';
				$result = $this->db->query("select func_suratmasuk (
						'$kd',
						'$kd1',
						'$nama',
						'$nowa',
						'$nomorsurat',
						 $surattgl,
						'$instansisurat',
						'$tujuansurat',
						'$perihalsurat',
						'$dokx',
						'1',
						'') as noreg");
				//echo  $this->db->last_query();
				if ($result){
					$row = $result->row();
					$noreg = $row->noreg;
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>';
					$ndata['error'] = '';
					$this->db->query("delete from tbberkas where berkasnoreg = '$noreg'");
					foreach($listberkasnm as $key => $value) {
						$berkasnm = addslashes($value);
						$berkasfile = $listfilex[$key];
						$berkasket = addslashes($listberkasket[$key]);
						$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','$berkasnm','$berkasfile','$berkasket') ");
					}
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfilearr($listfile);
				}	
			} else {
				$ndata['error'] = 'Gagal mengirim data..';
				$ndata['success'] = '';
			}
		}
		die(json_encode($ndata));
	}

	function permohonanPost(){
		$nama=isset($_POST['nama'])?addslashes($_POST['nama']):'';
		$nowa=isset($_POST['nowa'])?addslashes($_POST['nowa']):'';
		$nowa = trim($nowa);
		$nomorsurat=isset($_POST['nomorsurat'])?addslashes($_POST['nomorsurat']):'';
		$instansisurat=isset($_POST['instansisurat'])?addslashes($_POST['instansisurat']):'';
		$perihalsurat=isset($_POST['perihalsurat'])?addslashes($_POST['perihalsurat']):'';
		$tglsurat=isset($_POST['tglsurat'])?$_POST['tglsurat']:'';
		if ($tglsurat == '' || $tglsurat == '-' || strlen($tglsurat) != 10){
			$surattgl = 'CURDATE()';
		} else {
			$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
			$surattgl = "'$surattgl'";
		}
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/Lembaga Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$fd = './media/';
			$berkasfd = './media/dokfile/';
			$berkasfd1 = 'media/dokfile/';
			$berkasfdfile = $berkasfd.$kd.$kd1.'/'; 
			$berkasfdfile1 = $berkasfd1.$kd.$kd1.'/'; 
			
			$listberkasnm = isset($_POST["berkasnm"])?$_POST["berkasnm"]:array();
			$listberkasket = isset($_POST["berkasket"])?$_POST["berkasket"]:array();
			$listberkasreq = isset($_POST["berkasreq"])?$_POST["berkasreq"]:array();
			$numberkasnm = count($listberkasnm);

			if (!is_dir($fd))mkdir($fd, 0777, TRUE);
			if (!is_dir($berkasfdfile))mkdir($berkasfdfile, 0777, TRUE);
			
			if (!file_exists($fd.'index.php')){
				$fo = fopen($fd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfd.'index.php')){
				$fo = fopen($berkasfd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfdfile.'index.php')){
				$fo = fopen($berkasfdfile.'index.php','w');
				fclose($fo);
			}

			$listfile = array();
			$listfilex = array();
			$inputberkas = 'berkas';
			foreach($listberkasnm as $key => $value) {
				$berkasnm = $value;
				$filesize = $_FILES[$inputberkas]['size'][$key];
				if($filesize > 0) {
					$berkasfilenm = $uid.'_'.$berkasnm;
					$ndata['error'] = '';
					$ndata['success'] = '';
					$_FILES['file']['name']      = $_FILES[$inputberkas]['name'][$key]; 
					$_FILES['file']['type']      = $_FILES[$inputberkas]['type'][$key]; 
					$_FILES['file']['tmp_name']  = $_FILES[$inputberkas]['tmp_name'][$key]; 
					$_FILES['file']['error']     = $_FILES[$inputberkas]['error'][$key]; 
					$_FILES['file']['size']      = $_FILES[$inputberkas]['size'][$key]; 

					$uploadberkas = uploadfile($berkasfdfile,$berkasfilenm,"file");
					if ($uploadberkas['error'] != ''){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>'.$uploadberkas['error'];
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else {
						$uploaddata = $uploadberkas['data'];
						$uploadfilenm = $uploaddata['file_name'];
						$pathfile = $berkasfdfile.$uploadfilenm;
						$pathfilex = $berkasfdfile1.$uploadfilenm;
						array_push($listfile,$pathfile);
						array_push($listfilex,$pathfilex);
					}
				} else {
					if ($listberkasreq[$key] == '1'){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>belum dipilih.';
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else if ($listberkasreq[$key] == '0'){
						array_push($listfile,"");
						array_push($listfilex,"");
					} 
				}
			}

			if (count($listfile) == count($listberkasnm)){
				$dokx = isset($listfilex[0])?$listfilex[0]:'';
				$result = $this->db->query("select func_suratmasuk (
						'$kd',
						'$kd1',
						'$nama',
						'$nowa',
						'$nomorsurat',
						 $surattgl,
						'$instansisurat',
						'',
						'$perihalsurat',
						'$dokx',
						'1',
						'') as noreg");
				//echo  $this->db->last_query();
				if ($result){
					$row = $result->row();
					$noreg = $row->noreg;
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->db->query("delete from tbberkas where berkasnoreg = '$noreg'");
					foreach($listberkasnm as $key => $value) {
						$berkasnm = addslashes($value);
						$berkasfile = $listfilex[$key];
						$berkasket = addslashes($listberkasket[$key]);
						$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','$berkasnm','$berkasfile','$berkasket') ");
					}
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfilearr($listfile);
				}	
			} else {
				$ndata['error'] = 'Gagal mengirim data..';
				$ndata['success'] = '';
			}
		}
		die(json_encode($ndata));
	}

function pengajuanPost(){
		$nama=isset($_POST['nama'])?addslashes($_POST['nama']):'';
		$nowa=isset($_POST['nowa'])?addslashes($_POST['nowa']):'';
		$nowa = trim($nowa);
		$nomorsurat=isset($_POST['nomorsurat'])?addslashes($_POST['nomorsurat']):'';
		$instansisurat=isset($_POST['instansisurat'])?addslashes($_POST['instansisurat']):'';
		$perihalsurat=isset($_POST['perihalsurat'])?addslashes($_POST['perihalsurat']):'';
		$tglsurat=isset($_POST['tglsurat'])?$_POST['tglsurat']:'';
		if ($tglsurat == '' || $tglsurat == '-' || strlen($tglsurat) != 10){
			$surattgl = 'CURDATE()';
		} else {
			$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
			$surattgl = "'$surattgl'";
		}
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/Lembaga Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal Surat/Permohonan harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$fd = './media/';
			$berkasfd = './media/dokfile/';
			$berkasfd1 = 'media/dokfile/';
			$berkasfdfile = $berkasfd.$kd.$kd1.'/'; 
			$berkasfdfile1 = $berkasfd1.$kd.$kd1.'/'; 
			
			$listberkasnm = isset($_POST["berkasnm"])?$_POST["berkasnm"]:array();
			$listberkasket = isset($_POST["berkasket"])?$_POST["berkasket"]:array();
			$listberkasreq = isset($_POST["berkasreq"])?$_POST["berkasreq"]:array();
			$numberkasnm = count($listberkasnm);

			if (!is_dir($fd))mkdir($fd, 0777, TRUE);
			if (!is_dir($berkasfdfile))mkdir($berkasfdfile, 0777, TRUE);
			
			if (!file_exists($fd.'index.php')){
				$fo = fopen($fd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfd.'index.php')){
				$fo = fopen($berkasfd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfdfile.'index.php')){
				$fo = fopen($berkasfdfile.'index.php','w');
				fclose($fo);
			}

			$listfile = array();
			$listfilex = array();
			$inputberkas = 'berkas';
			foreach($listberkasnm as $key => $value) {
				$berkasnm = $value;
				$filesize = $_FILES[$inputberkas]['size'][$key];
				if($filesize > 0) {
					$berkasfilenm = $uid.'_'.$berkasnm;
					$ndata['error'] = '';
					$ndata['success'] = '';
					$_FILES['file']['name']      = $_FILES[$inputberkas]['name'][$key]; 
					$_FILES['file']['type']      = $_FILES[$inputberkas]['type'][$key]; 
					$_FILES['file']['tmp_name']  = $_FILES[$inputberkas]['tmp_name'][$key]; 
					$_FILES['file']['error']     = $_FILES[$inputberkas]['error'][$key]; 
					$_FILES['file']['size']      = $_FILES[$inputberkas]['size'][$key]; 

					$uploadberkas = uploadfile($berkasfdfile,$berkasfilenm,"file");
					if ($uploadberkas['error'] != ''){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>'.$uploadberkas['error'];
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else {
						$uploaddata = $uploadberkas['data'];
						$uploadfilenm = $uploaddata['file_name'];
						$pathfile = $berkasfdfile.$uploadfilenm;
						$pathfilex = $berkasfdfile1.$uploadfilenm;
						array_push($listfile,$pathfile);
						array_push($listfilex,$pathfilex);
					}
				} else {
					if ($listberkasreq[$key] == '1'){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>belum dipilih.';
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else if ($listberkasreq[$key] == '0'){
						array_push($listfile,"");
						array_push($listfilex,"");
					} 
				}
			}

			if (count($listfile) == count($listberkasnm)){
				$dokx = isset($listfilex[0])?$listfilex[0]:'';
				$result = $this->db->query("select func_pengajuan (
						'$kd',
						'$kd1',
						'$nama',
						'$nowa',
						'$nomorsurat',
						 $surattgl,
						'$instansisurat',
						'',
						'$perihalsurat',
						'$dokx',
						'1',
						'') as noreg");
				//echo  $this->db->last_query();
				if ($result){
					$row = $result->row();
					$noreg = $row->noreg;
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->db->query("delete from tbberkas where berkasnoreg = '$noreg'");
					foreach($listberkasnm as $key => $value) {
						$berkasnm = addslashes($value);
						$berkasfile = $listfilex[$key];
						$berkasket = addslashes($listberkasket[$key]);
						$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','$berkasnm','$berkasfile','$berkasket') ");
					}
					$hasilnoreg = $row->noreg;
					$this->sendwa($nowa,$hasilnoreg,$perihalsurat);
					$dtdispo = $this->db->query("select ifnull(userWA,'') as userWA from tbuser where ifnull(userWA,'') <> '' and userType = '$kd' ")->result();
	
						foreach ($dtdispo as $row) {
							if ($row->userWA != ''){
								$this->sendwapengajuan($nowa,$hasilnoreg,$perihalsurat);
							}
						}
					
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfilearr($listfile);
				}	
			} else {
				$ndata['error'] = 'Gagal mengirim data..';
				$ndata['success'] = '';
			}
		}
		die(json_encode($ndata));
	}
	
	private function sendfire ($noreg){
		sendfirebase('sandsdispo','Disposisi Online','Permohonan masuk dengan nomor layanan: '.$noreg,$noreg,'');
	}

    private function sendwapengajuan($nowa,$nolayanan,$perihalsurat){
		if ($perihalsurat != ''){
			$halsurat = '✉️ Perihal Surat: *'.$perihalsurat.'*';
		} else {
			$halsurat='';
		}
		$msg = "✅ *Permohonan Masuk Layanan SANTUN KEMENAG Kabupaten Ngawi*
(Sistem Anjungan Mandiri Terintegrasi)	

✉️ No.Layanan: *$nolayanan*
$halsurat

_Untuk memproses layanan silakan kunjungi tautan dibawah ini:_
".base_url()."dashboard
								
Simpan nomor ini jika link tidak bisa di klik";
		sendWA($nowa,$msg,'Dispo Layanan');
	}
	
	private function sendwa($nowa,$nolayanan,$perihalsurat){
		if ($perihalsurat != ''){
			$halsurat = '✉️ Perihal Surat: *'.$perihalsurat.'*';
		} else {
			$halsurat='';
		}
		$msg = "📢 *Layanan SANTUN KEMENAG Kabupaten Ngawi*
(Sistem Anjungan Mandiri Terintegrasi)	
		
✉️ No.Layanan: *$nolayanan*
✉️ No.WA/HP: *$nowa*
$halsurat

_Untuk memantau progress layanan, bisa mengunjungi tautan dibawah ini:_
".base_url()."index.php/page/lacak-layanan
								
Simpan nomor ini jika link tidak bisa di klik";
		sendWA($nowa,$msg,'Layanan');
	}
	private function sendwakonsul($nowa,$nolayanan,$perihalsurat){
		if ($perihalsurat != ''){
			$halsurat = '✉️ Catatan Konsultasi: *'.$perihalsurat.'*';
		} else {
			$halsurat='';
		}
		$msg = "📢 *Layanan SANTUN KEMENAG Kabupaten Ngawi*
(Sistem Anjungan Mandiri Terintegrasi)	
		
✉️ No.Layanan: *$nolayanan*
✉️ No.WA/HP: *$nowa*
$halsurat

_Untuk memantau progress layanan, bisa mengunjungi tautan dibawah ini:_
".base_url()."index.php/page/lacak-layanan
								
Simpan nomor ini jika link tidak bisa di klik";
		sendWA($nowa,$msg,'Konsultasi');
	}
	function rekompengajianPost(){
		die($this->rekom2dok($_POST,$_FILES));
	}
	function bantuanalquranPost(){
		die($this->rekom2dok($_POST,$_FILES));
	}
	function permohonanpenceramahPost(){
		die($this->rekom2dok($_POST,$_FILES));
	}
	function pendiriantempatibadahPost(){
		die($this->rekom2dok($_POST,$_FILES));
	}
	private function rekom2dok($POST,$FILES){
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$nomorsurat=isset($POST['nomorsurat'])?addslashes($POST['nomorsurat']):'';
		$instansisurat=isset($POST['instansisurat'])?addslashes($POST['instansisurat']):'';
		$perihalsurat=isset($POST['perihalsurat'])?addslashes($POST['perihalsurat']):'';
		$tglsurat=isset($POST['tglsurat'])?$POST['tglsurat']:'';
		$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
		$ambildok=isset($POST['ambildok'])?$POST['ambildok']:'';
		$alamatpengirim=isset($POST['alamatpengirim'])?addslashes($POST['alamatpengirim']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($nomorsurat == ''){
			$ndata['error'] = 'Nomor surat harus diisi.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal surat harus diisi.';
			$ndata['success'] = '';
		}  else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/lembaga pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal surat harus diisi.';
			$ndata['success'] = '';
		} else if ($ambildok == ''){
			$ndata['error'] = 'Pengambilan dokumen harus diisi.';
			$ndata['success'] = '';
		}  else if ($ambildok == '2' && $alamatpengirim == '' ){
			$ndata['error'] = 'Alamat pengiriman harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$folder = './media/';
			$folderdok = './media/dokfile/';
			$folderdok1 = 'media/dokfile/';
			$folder_file = $folderdok.$kd.$kd1.'/'; 
			$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
			$file1 = 'file1';
			$file2 = 'file2';
			$filename1=$uid.'_'.'file1_'.pathinfo($FILES[$file1]['name'], PATHINFO_FILENAME);
			$filename2=$uid.'_'.'file2_'.pathinfo($FILES[$file2]['name'], PATHINFO_FILENAME);

			if (!is_dir($folder))mkdir($folder, 0777, TRUE);
			if (!is_dir($folder_file))mkdir($folder_file, 0777, TRUE);
			
			if (!file_exists($folder.'index.php')){
				$fo = fopen($folder.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folderdok.'index.php')){
				$fo = fopen($folderdok.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folder_file.'index.php')){
				$fo = fopen($folder_file.'index.php','w');
				fclose($fo);
			}

			$ndata['error'] = '';
			$ndata['success'] = '';
			$upload1 = uploadfile($folder_file,$filename1,$file1);
			if ( $upload1['error'] != '' ){
				$ndata['error'] = $upload1['error'];
			}else{
				$datafile1 = $upload1['data'];
				$file1name = $datafile1['file_name'];//.$this->upload->file_ext;
				$lokfile1 = $folder_file.$file1name;
				$lokfile1x = $folder_file1.$file1name;
				$upload2 = uploadfile($folder_file,$filename2,$file2);
				if ( $upload2['error'] != '' ){
					$ndata['error'] = $upload2['error'];
					hapusfile($lokfile1);
				}else{
					$datafile2 = $upload2['data'];
					$file2name = $datafile2['file_name'];//.$this->upload->file_ext;
					$lokfile2 = $folder_file.$file2name;
					$lokfile2x = $folder_file1.$file2name;
					$result = $this->db->query("select func_rekompengajian (
																	'$kd',
																	'$kd1',
																	'$nama',
																	'$nowa',
																	'$nomorsurat',
																	'$surattgl',
																	'$instansisurat',
																	'$perihalsurat',
																	'$lokfile1x',
																	'$lokfile2x',
																	'$ambildok',
																	'$alamatpengirim') as noreg");

					if ($result){
						$row = $result->row();
						$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
						$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
						$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
						$ndata['error'] = '';
						$this->sendfire($row->noreg);
						$this->sendwa($nowa,$row->noreg,$perihalsurat);
					} else {
						$ndata['error'] = 'Gagal mengirim data.';
						$ndata['success'] = '';
						hapusfile($lokfile1);
						hapusfile($lokfile2);
					}	
				}
			}
		}
		
		return json_encode($ndata);
	}

	function permintaanidmasjidmushollaPost(){
		die($this->rekom1dok($_POST,$_FILES));
	}
	function pengukuranarahkiblatPost(){
		die($this->rekom1dok($_POST,$_FILES));
	}
	function permohonanrohaniawanPost(){
		die($this->rekom1dok($_POST,$_FILES));
	}
	private function rekom1dok($POST,$FILES){
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$nomorsurat=isset($POST['nomorsurat'])?addslashes($POST['nomorsurat']):'';
		$instansisurat=isset($POST['instansisurat'])?addslashes($POST['instansisurat']):'';
		$perihalsurat=isset($POST['perihalsurat'])?addslashes($POST['perihalsurat']):'';
		$tglsurat=isset($POST['tglsurat'])?$POST['tglsurat']:'';
		$surattgl = implode('-',array_reverse(explode('-',$tglsurat)));
		$ambildok=isset($POST['ambildok'])?$POST['ambildok']:'';
		$alamatpengirim=isset($POST['alamatpengirim'])?addslashes($POST['alamatpengirim']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($nomorsurat == ''){
			$ndata['error'] = 'Nomor surat harus diisi.';
			$ndata['success'] = '';
		} else if ($tglsurat == ''){
			$ndata['error'] = 'Tanggal surat harus diisi.';
			$ndata['success'] = '';
		}  else if ($instansisurat == ''){
			$ndata['error'] = 'Instansi/lembaga pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal surat harus diisi.';
			$ndata['success'] = '';
		} else if ($ambildok == ''){
			$ndata['error'] = 'Pengambilan dokumen harus diisi.';
			$ndata['success'] = '';
		}  else if ($ambildok == '2' && $alamatpengirim == '' ){
			$ndata['error'] = 'Alamat pengiriman harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$uid = uniqid();
			$folder = './media/';
			$folderdok = './media/dokfile/';
			$folderdok1 = 'media/dokfile/';
			$folder_file = $folderdok.$kd.$kd1.'/'; 
			$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
			$file1 = 'file1';
			$filename1=$uid.'_'.'file1_'.pathinfo($FILES[$file1]['name'], PATHINFO_FILENAME);

			if (!is_dir($folder))mkdir($folder, 0777, TRUE);
			if (!is_dir($folder_file))mkdir($folder_file, 0777, TRUE);
			
			if (!file_exists($folder.'index.php')){
				$fo = fopen($folder.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folderdok.'index.php')){
				$fo = fopen($folderdok.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folder_file.'index.php')){
				$fo = fopen($folder_file.'index.php','w');
				fclose($fo);
			}

			$ndata['error'] = '';
			$ndata['success'] = '';
			$upload1 = uploadfile($folder_file,$filename1,$file1);
			if ( $upload1['error'] != '' ){
				$ndata['error'] = $upload1['error'];
			}else{
				$datafile1 = $upload1['data'];
				$file1name = $datafile1['file_name'];//.$this->upload->file_ext;
				$lokfile1 = $folder_file.$file1name;
				$lokfile1x = $folder_file1.$file1name;
				$result = $this->db->query("select func_rekompengajian (
																'$kd',
																'$kd1',
																'$nama',
																'$nowa',
																'$nomorsurat',
																'$surattgl',
																'$instansisurat',
																'$perihalsurat',
																'$lokfile1x',
																null,
																'$ambildok',
																'$alamatpengirim') as noreg");

				if ($result){
					$row = $result->row();
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfile($lokfile1);
				}
			}
		}
		
		return json_encode($ndata);
	}

	function pengadaanPost(){
		$POST = $_POST;
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$nomorpt=isset($POST['nomorpt'])?addslashes($POST['nomorpt']):'';
		$nomorspk=isset($POST['nomorspk'])?addslashes($POST['nomorspk']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($nomorpt == ''){
			$ndata['error'] = 'Nomor PT/CV harus diisi.';
			$ndata['success'] = '';
		} else if ($nomorspk == ''){
			$ndata['error'] = 'Nomor SPK harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$result = $this->db->query("select func_rekompengajian (
				'$kd',
				'$kd1',
				'$nama',
				'$nowa',
				'$nomorpt',
				curdate(),
				'$nomorspk',
				null,
				null,
				null,
				1,
				null) as noreg");
				if ($result){
					$row = $result->row();
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->sendwa($nowa,$row->noreg,'');
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
				}
		}
		
		die(json_encode($ndata));
	}

	function lacakLayanan(){
		$noreg=isset($_POST['nolayanan'])?$_POST['nolayanan']:'';
		$nowa=isset($_POST['nowa'])?$_POST['nowa']:'';
		$ndata['error'] = 'Data tidak ditemukan!';
		$ndata['success'] = '';
		$result = $this->db->query("Select * from vwprogresslayanan where noreg = '$noreg' order by createtgl desc limit 1");
		if ($result){
			$row = $result->row();
			if (count((array)$row) > 0){
				if (trim($row->pemohonnowa) == trim($nowa)){
					if ($row->filedok == '' || $row->filedok == null ){
						$filedok = '';
					} else {
						if (substr($row->filedok,0,4) == 'http'){
							$href = $row->filedok;
						} else {
							$href = base_url().$row->filedok;
						}
						
						$filedok = '<strong>Silakan beri penilaian layanan kami dan download dokumen dengan cara klik tombol download dibawah ini.</strong>
						<div class="containerrating mt-3">
						    <div class="text-white">Tingkat Kepuasan Layanan</div>
							<div class="star-widget">
								<input type="radio" name="drate" id="drate-5" value="5">
								<label for="drate-5" class="fa fa-star"></label>
								<input type="radio" name="drate" id="drate-4" value="4">
								<label for="drate-4" class="fa fa-star"></label>
								<input type="radio" name="drate" id="drate-3" value="3">
								<label for="drate-3" class="fa fa-star"></label>
								<input type="radio" name="drate" id="drate-2" value="2">
								<label for="drate-2" class="fa fa-star"></label>
								<input type="radio" name="drate" id="drate-1" value="1">
								<label for="drate-1" class="fa fa-star"></label>
								<form action="#">
								<header></header>
								
								</form>
							</div>
							<div class="textarea textarearating">
									<textarea id="dikm_saran" class="form-control" cols="50" placeholder="Sampaikan apresiasi, saran, atau kritik yang membangun.."></textarea>
							</div>
							
							</div>
						<div onclick="downrate(\''.$href.'\')" class="btn btn-info" style="border-radius: 50px;padding: 5px 20px;margin: 5px;" ><span class="fa fa-link fa-fw"></span>Download</div>';
					}

					$ndata['data'] = array(
										"noreg"=>$row->noreg,
										"nama"=>$row->pemohonnama,
										"layanan"=>$row->layananJenis,
										"status"=>$row->status,
										"status1"=>$row->ket,
										"status2"=>$filedok,
										"tgl"=>$row->tgl,
									);
					$ndata['success'] = 'sukses';
					$ndata['error'] = '';
				} else {
					$ndata['error'] = 'Nomor Layanan dan Nomor WA/HP tidak sesuai!';
					$ndata['success'] = '';
				}
			} 

		}
		die(json_encode($ndata));
	}

	function grafiklayanan(){
		$thn = isset($_POST['thn']) ? addslashes($_POST['thn']) :'';
		$bln = isset($_POST['bln']) ? addslashes($_POST['bln']) :'';
		$json = array();
		$whereyear = "year(createtgl) = $thn";
		$wherebln ="";
		if ($bln != ''){
			$blni = (int)$bln;
			$wherebln =" and MONTH(createtgl) = $blni";
		}
		$json['x']=array();
		$json['y']=array();
		$json['title']='GRAFIK LAYANAN SENYUM';
		$loketsql = $this->db->query("select menukode,menujudul from tbmainmenu where id NOT IN (0,11,13,14,15)  order by id asc");
		$total = 0;
		foreach ($loketsql->result() as $rowmenu){
			$menukode = $rowmenu->menukode;
			$menujudul = $rowmenu->menujudul;
			$jmlsql = $this->db->query("select count(*) as jml from tbsuratmasuk where  menukode = $menukode and $whereyear $wherebln");
			$rowjml = $jmlsql->row();
			array_push($json['x'],$menujudul);
			array_push($json['y'],(int)$rowjml->jml);
			$total = $total+(int)$rowjml->jml;
		}
		$json['total'] =  number_format($total,0,",",".");
		die(json_encode($json));
	}


	function paisPost(){

		$POST = $_POST;
		$FILES = $_FILES;
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$perihalsurat=isset($POST['perihalsurat'])?addslashes($POST['perihalsurat']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal surat harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			$ndata['error'] = 'Data tidak lengkap.';
			$ndata['success'] = '';
		} else {
			$uid = uniqid();
			$folder = './media/';
			$folderdok = './media/dokfile/';
			$folderdok1 = 'media/dokfile/';
			$folder_file = $folderdok.$kd.$kd1.'/'; 
			$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
			$file1 = 'file1';
			$filename1=$uid.'_'.'file1_'.pathinfo($FILES[$file1]['name'], PATHINFO_FILENAME);
			if (!is_dir($folder))mkdir($folder, 0777, TRUE);
			if (!is_dir($folder_file))mkdir($folder_file, 0777, TRUE);
			
			if (!file_exists($folder.'index.php')){
				$fo = fopen($folder.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folderdok.'index.php')){
				$fo = fopen($folderdok.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folder_file.'index.php')){
				$fo = fopen($folder_file.'index.php','w');
				fclose($fo);
			}
			
			$ndata['error'] = '';
			$ndata['success'] = '';
			$upload1 = uploadfilelampiran($folder_file,$filename1,$file1,30);
			
			if ( $upload1['error'] != '' ){
				$ndata['error'] = $upload1['error'];
			}else{
				
				$datafile1 = $upload1['data'];
				$file1name = $datafile1['file_name'];//.$this->upload->file_ext;
				$lokfile1 = $folder_file.$file1name;
				$lokfile1x = $folder_file1.$file1name;
				$result = $this->db->query("select func_rekompengajian (
																'$kd',
																'$kd1',
																'$nama',
																'$nowa',
																null,
																curdate(),
																null,
																'$perihalsurat',
																'$lokfile1x',
																null,
																null,
																null) as noreg");
				if ($result){
					$row = $result->row();
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfile($lokfile1);
				}
			}
		}
		die(json_encode($ndata));
	}

	function legalisirPost(){

		$POST = $_POST;
		$FILES = $_FILES;
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$perihalsurat=isset($POST['perihalsurat'])?addslashes($POST['perihalsurat']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp pemohon/pengirim harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($perihalsurat == ''){
			$ndata['error'] = 'Perihal surat harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			$ndata['error'] = 'Data tidak lengkap.';
			$ndata['success'] = '';
		} else {
			$uid = uniqid();
			$folder = './media/';
			$folderdok = './media/dokfile/';
			$folderdok1 = 'media/dokfile/';
			$folder_file = $folderdok.$kd.$kd1.'/'; 
			$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
			$file1 = 'file1';
			$filename1=$uid.'_'.'file1_'.pathinfo($FILES[$file1]['name'], PATHINFO_FILENAME);
			if (!is_dir($folder))mkdir($folder, 0777, TRUE);
			if (!is_dir($folder_file))mkdir($folder_file, 0777, TRUE);
			
			if (!file_exists($folder.'index.php')){
				$fo = fopen($folder.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folderdok.'index.php')){
				$fo = fopen($folderdok.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($folder_file.'index.php')){
				$fo = fopen($folder_file.'index.php','w');
				fclose($fo);
			}
			
			$ndata['error'] = '';
			$ndata['success'] = '';
			$upload1 = uploadfile($folder_file,$filename1,$file1,30);
			
			if ( $upload1['error'] != '' ){
				$ndata['error'] = $upload1['error'];
			}else{
				
				$datafile1 = $upload1['data'];
				$file1name = $datafile1['file_name'];//.$this->upload->file_ext;
				$lokfile1 = $folder_file.$file1name;
				$lokfile1x = $folder_file1.$file1name;
				$result = $this->db->query("select func_rekompengajian (
																'$kd',
																'$kd1',
																'$nama',
																'$nowa',
																null,
																curdate(),
																null,
																'$perihalsurat',
																'$lokfile1x',
																null,
																null,
																null) as noreg");
				if ($result){
					$row = $result->row();
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$noreg = $row->noreg;
					$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','File Legalisir','$lokfile1x','File Legalisir <sup class='text-danger'>*</sup>') ");
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfile($lokfile1);
				}
			}
		}
		die(json_encode($ndata));
	}

	function konsulPost(){

		$POST = $_POST;
		$FILES = $_FILES;
		$nama=isset($POST['nama'])?addslashes($POST['nama']):'';
		$nowa=isset($POST['nowa'])?addslashes($POST['nowa']):'';
		$tanya=isset($POST['tanya'])?addslashes($POST['tanya']):'';
		$kd=isset($POST['kd'])?$POST['kd']:'';
		$kd1=isset($POST['kd1'])?$POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		$uid = uniqid();
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($tanya == ''){
			$ndata['error'] = 'Catatan konsultasi harus diisi.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			$ndata['error'] = 'Data tidak lengkap.';
			$ndata['success'] = '';
		} else {
			$file1 = 'file1';
			//die('ssss'.json_encode($FILES));
			if ($FILES[$file1]['size'] != 0 && $FILES[$file1]['error'] == 0)
			{
				
				$folder = './media/';
				$folderdok = './media/dokfile/';
				$folderdok1 = 'media/dokfile/';
				$folder_file = $folderdok.$kd.$kd1.'/'; 
				$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
				
				$filename1=$uid.'_'.'file1_'.pathinfo($FILES[$file1]['name'], PATHINFO_FILENAME);
				if (!is_dir($folder))mkdir($folder, 0777, TRUE);
				if (!is_dir($folder_file))mkdir($folder_file, 0777, TRUE);
				
				if (!file_exists($folder.'index.php')){
					$fo = fopen($folder.'index.php','w');
					fclose($fo);
				}
				if (!file_exists($folderdok.'index.php')){
					$fo = fopen($folderdok.'index.php','w');
					fclose($fo);
				}
				if (!file_exists($folder_file.'index.php')){
					$fo = fopen($folder_file.'index.php','w');
					fclose($fo);
				}
				
				$ndata['error'] = '';
				$ndata['success'] = '';
				$upload1 = uploadfileimg($folder_file,$filename1,$file1,5);
				$nofile = 0;
			} else {
				$upload1['error'] = '';
				$nofile = 1;
			}
			if ( $upload1['error'] != '' ){
				$ndata['error'] = $upload1['error'];
			}else{
				if ($nofile == 0){
					$datafile1 = $upload1['data'];
					$file1name = $datafile1['file_name'];//.$this->upload->file_ext;
					$lokfile1 = $folder_file.$file1name;
					$lokfile1x = $folder_file1.$file1name;
				} else {
					$lokfile1x = '';
				}
				$result = $this->db->query("select func_konsul(
																'$kd',
																'$kd1',
																'$nama',
																'$nowa',
																'$tanya',
																'$lokfile1x',
																null) as noreg");
				if ($result){
					$row = $result->row();
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$row->noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$row->noreg','$uid','File Konsultasi','$lokfile1x','File Konsultasi <sup class='text-danger'>*</sup>') ");
					$this->sendwakonsul($nowa,$row->noreg,$tanya);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfile($lokfile1);
				}
			}
		}
		die(json_encode($ndata));
	}


	function getjadwalsholat(){
		$thn = isset($_POST['thn']) ? addslashes($_POST['thn']) :'';
		$bln = isset($_POST['bln']) ? addslashes($_POST['bln']) :'';
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://bimasislam.kemenag.go.id/apiv1/getShalatJadwal' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, "param_prov=c74d97b01eae257e44aa9d5bade97baf&param_kabko=06138bc5af6023646ede0e1f7c1eac75&param_thn=".$thn."&param_bln=".$bln."&param_token=af7c667b9819378c0bddb3baede9525b" );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
	}

	function getjadwalimsak(){
		$thn = isset($_POST['thn']) ? addslashes($_POST['thn']) :'';
		$ch = curl_init();
		curl_setopt( $ch,CURLOPT_URL, 'https://bimasislam.kemenag.go.id/apiv1/getImsakJadwal' );
		curl_setopt( $ch,CURLOPT_POST, true );
		curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
		curl_setopt( $ch,CURLOPT_POSTFIELDS, "param_prov=c74d97b01eae257e44aa9d5bade97baf&param_kabko=06138bc5af6023646ede0e1f7c1eac75&param_thn=".$thn."&param_token=af7c667b9819378c0bddb3baede9525b" );
		$result = curl_exec($ch );
		echo $result;
		curl_close( $ch );
	}


	function suruqPost(){
		$nama=isset($_POST['nama'])?addslashes($_POST['nama']):'';
		$nowa=isset($_POST['nowa'])?addslashes($_POST['nowa']):'';
		$nowa = trim($nowa);
		$travel=isset($_POST['travel'])?addslashes($_POST['travel']):'';
		$nosk=isset($_POST['nosurat'])?addslashes($_POST['nosurat']):'';
		$tglsk=isset($_POST['tglsurat'])?addslashes($_POST['tglsurat']):'';
		$jnama=isset($_POST['jnama'])?$_POST['jnama']:'';
		$jtmplhr=isset($_POST['jtmplhr'])?$_POST['jtmplhr']:'';
		$jtgllhr=isset($_POST['jtgllhr'])?$_POST['jtgllhr']:'';
		$jalamat=isset($_POST['jalamat'])?$_POST['jalamat']:'';
		$jhp=isset($_POST['jhp'])?$_POST['jhp']:'';
		$surattgl = 'CURDATE()';
		$perihalsurat = 'Permohonan surat rekomendasi umroh';
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$ndata = array();
		$ndata['error'] = 'Data tidak lengkap.';
		$ndata['success'] = '';
		if ($nama == '' || strlen($nama) < 3){
			$ndata['error'] = 'Nama Lengkap Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if ($nowa == ''){
			$ndata['error'] = 'Nomor WA/Hp Pemohon harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($nowa) < 9){
			$ndata['error'] = 'Format Nomor WA/Hp tidak sesuai.';
			$ndata['success'] = '';
		} else if ($travel == ''){
			$ndata['error'] = 'Travel harus dipilih.';
			$ndata['success'] = '';
		} else if ($nosk == ''){
			$ndata['error'] = 'No.SK Travel harus diisi.';
			$ndata['success'] = '';
		} else if ($tglsk == ''){
			$ndata['error'] = 'Tanggal SK harus diisi.';
			$ndata['success'] = '';
		} else if ($jnama == ''){
			$ndata['error'] = 'Nama jamaah harus diisi.';
			$ndata['success'] = '';
		} else if ($jtmplhr == ''){
			$ndata['error'] = 'Tempat lahir jamaah harus diisi.';
			$ndata['success'] = '';
		} else if ($jtgllhr == ''){
			$ndata['error'] = 'Tanggal lahir jamaah harus diisi.';
			$ndata['success'] = '';
		} else if ($jalamat == ''){
			$ndata['error'] = 'Alamat jamaah harus diisi.';
			$ndata['success'] = '';
		} else if ($jhp == ''){
			$ndata['error'] = 'Nomor HP jamaah harus diisi.';
			$ndata['success'] = '';
		} else if (strlen($jhp) < 9){
			$ndata['error'] = 'Format nomor HP jamaah tidak sesuai.';
			$ndata['success'] = '';
		} else if ($kd == '' || $kd1 == '' ){
			//
		} else {
			$tglsk1 = implode('-',array_reverse(explode('-',$tglsk)));
			$jtgllhr1 = implode('-',array_reverse(explode('-',$jtgllhr)));
			$uid = uniqid();
			$fd = './media/';
			$berkasfd = './media/dokfile/';
			$berkasfd1 = 'media/dokfile/';
			$berkasfdfile = $berkasfd.$kd.$kd1.'/'; 
			$berkasfdfile1 = $berkasfd1.$kd.$kd1.'/'; 
			
			$listberkasnm = isset($_POST["berkasnm"])?$_POST["berkasnm"]:array();
			$listberkasket = isset($_POST["berkasket"])?$_POST["berkasket"]:array();
			$listberkasreq = isset($_POST["berkasreq"])?$_POST["berkasreq"]:array();
			$numberkasnm = count($listberkasnm);

			if (!is_dir($fd))mkdir($fd, 0777, TRUE);
			if (!is_dir($berkasfdfile))mkdir($berkasfdfile, 0777, TRUE);
			
			if (!file_exists($fd.'index.php')){
				$fo = fopen($fd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfd.'index.php')){
				$fo = fopen($berkasfd.'index.php','w');
				fclose($fo);
			}
			if (!file_exists($berkasfdfile.'index.php')){
				$fo = fopen($berkasfdfile.'index.php','w');
				fclose($fo);
			}

			$listfile = array();
			$listfilex = array();
			$inputberkas = 'berkas';
			foreach($listberkasnm as $key => $value) {
				$berkasnm = $value;
				$filesize = $_FILES[$inputberkas]['size'][$key];
				if($filesize > 0) {
					$berkasfilenm = $uid.'_'.$berkasnm;
					$ndata['error'] = '';
					$ndata['success'] = '';
					$_FILES['file']['name']      = $_FILES[$inputberkas]['name'][$key]; 
					$_FILES['file']['type']      = $_FILES[$inputberkas]['type'][$key]; 
					$_FILES['file']['tmp_name']  = $_FILES[$inputberkas]['tmp_name'][$key]; 
					$_FILES['file']['error']     = $_FILES[$inputberkas]['error'][$key]; 
					$_FILES['file']['size']      = $_FILES[$inputberkas]['size'][$key]; 

					$uploadberkas = uploadfile($berkasfdfile,$berkasfilenm,"file");
					if ($uploadberkas['error'] != ''){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>'.$uploadberkas['error'];
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else {
						$uploaddata = $uploadberkas['data'];
						$uploadfilenm = $uploaddata['file_name'];
						$pathfile = $berkasfdfile.$uploadfilenm;
						$pathfilex = $berkasfdfile1.$uploadfilenm;
						array_push($listfile,$pathfile);
						array_push($listfilex,$pathfilex);
					}
				} else {
					if ($listberkasreq[$key] == '1'){
						hapusfilearr($listfile);
						$ndata['error'] = 'Dokumen Permohonan <br/>('.$berkasnm.') : <br/>belum dipilih.';
						$ndata['success'] = '';
						die(json_encode($ndata));
					} else if ($listberkasreq[$key] == '0'){
						array_push($listfile,"");
						array_push($listfilex,"");
					} 
				}
			}

			if (count($listfile) == count($listberkasnm)){
				$dokx = isset($listfilex[0])?$listfilex[0]:'';
				$result = $this->db->query("select func_suruq (
						'$kd',
						'$kd1',
						'$nama',
						'$nowa',
						'$perihalsurat',
						'$travel',
						'$nosk',
						'$tglsk1',
						'$jnama',
						'$jtmplhr',
						'$jtgllhr1',
						'$jalamat',
						'$jhp',
						'$dokx') as noreg");
				//echo  $this->db->last_query();
				if ($result){
					$row = $result->row();
					$noreg = $row->noreg;
					$ahref= '<a href="'.base_url('index.php/page/lacak-layanan').'" target="_blank"> <i>disini</i> </a>';
					$tombolikm = '<p>Silakan berikan penilaian layanan kami dengan cara klik tombol <button class="btn btn-success bg-secondary" style="left: unset;" data-target="#mdrating" data-toggle="modal" data-backdrop="static" data-keyboard="false" type="button"><i class="fa fa-star fa-fw text-warning" aria-hidden="true"></i> Beri Rating!! <i class="fa fa-thumbs-up fa-fw" aria-hidden="true"></i></button>';
					$ndata['success'] = 'Nomor Layanan Anda: <p><strong><span class="h2 mt-2 red-text">'.$noreg.'</span></strong></p>Nomor WA/HP: <p><strong><span class="h5 mt-2 red-text">'.$nowa.'</span></strong></p><p><strong><sup>Silakan catat nomor layanan untuk lacak layanan '.$ahref.'.</sup></strong>'.$tombolikm;
					$ndata['error'] = '';
					$this->db->query("delete from tbberkas where berkasnoreg = '$noreg'");
					foreach($listberkasnm as $key => $value) {
						$berkasnm = addslashes($value);
						$berkasfile = $listfilex[$key];
						$berkasket = addslashes($listberkasket[$key]);
						$this->db->query("insert into tbberkas (berkasnoreg,berkaskd,berkasnama,berkasfile,berkasket) 
										   value ('$noreg','$uid','$berkasnm','$berkasfile','$berkasket') ");
					}
					$this->sendfire($row->noreg);
					$this->sendwa($nowa,$row->noreg,$perihalsurat);
				} else {
					$ndata['error'] = 'Gagal mengirim data.';
					$ndata['success'] = '';
					hapusfilearr($listfile);
				}	
			} else {
				$ndata['error'] = 'Gagal mengirim data..';
				$ndata['success'] = '';
			}
		}
		die(json_encode($ndata));
	}
}
