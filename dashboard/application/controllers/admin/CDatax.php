<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class CData extends Admincontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->isLogin();
        $this->load->helper('app_helper');
    }

	public function index()
	{
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}

	public function bukutamu()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_bukutamu';
		$data['content']=$page;
		$data['title'] = 'Data Buku Tamu';
		//echo sendWA('083867021011','Test kirim...');
		$this->load->view('index',$data);
	}
	
	function getBukutamu(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'bt_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(bt_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(bt_tgl,'%Y-%m-%d %H:%i') as tgl from vwbukutamu ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function excelbukutamu(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'bt_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(bt_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(bt_tgl,'%Y-%m-%d %H:%i') as tgl from vwbukutamu ";
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$data = $rs->result_array();
		$i = 1;
		ini_set('precision', '15');
		$datatbl = "";
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td class="text">'.$i.'</td>
							<td class="text">'.$dataRow['tgl'].'</td>
							<td class="text">'.$dataRow['bt_nama'].'</td>
							<td class="text">'.$dataRow['bt_alamat'].'</td>
							<td class="text">'.$dataRow['bt_hp'].'</td>
							<td class="text">'.$dataRow['bt_email'].'</td>
							<td class="text">'.$dataRow['namalayanan'].'</td>
							<td class="text">'.$dataRow['bt_layananlain'].'</td>
							<td class="text">'.$dataRow['bt_pesan'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
					<tr>
						<th>NO</th>
						<th>TANGGAL</th>
						<th>NAMA LENGKAP</th>
						<th>ALAMAT LENGKAP</th>
						<th>NO.HP/WA</th>
						<th>EMAIL</th>
						<th>LAYANAN</th>
						<th>LAYANAN LAINNYA</th>
						<th>PESAN</th>
					</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}
	public function ikm()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_ikm';
		$data['content']=$page;
		$data['title'] = 'Data Indeks Kepuasan Masyarakat';
		$this->load->view('index',$data);
	}

	function getIKM(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'ikm_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(ikm_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(ikm_tgl,'%Y-%m-%d %H:%i') as tgl from tbikm ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function excelikm(){
		set_time_limit(300);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		if ($sort == 'tgl'){
			$sort = 'ikm_tgl';
		}
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and date_format(ikm_tgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(ikm_tgl,'%Y-%m-%d %H:%i') as tgl from tbikm ";
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$data = $rs->result_array();
		$i = 1;
		ini_set('precision', '15');
		$datatbl = "";
		$vtstr = array('','Sangat Tidak Puas','Tidak Puas','Cukup Puas', 'Puas', 'Sangat Puas');
		foreach($data as $r => $dataRow) {
			$datatbl .= '<tr>
							<td class="text">'.$i.'</td>
							<td class="text">'.$dataRow['tgl'].'</td>
							<td class="text">'.$dataRow['ikm_vt_layanan'].'</td>
							<td class="text">'.$vtstr[$dataRow['ikm_vt_layanan']].'</td>
							<td class="text">'.$dataRow['ikm_saran'].'</td>
						</tr>
						';
			$i++;
		}
		$html = '<html>
		<style>
			.num {
			  mso-number-format:General;
			}
			.text{
			  mso-number-format:"\@";/*force text*/
			}
		</style>
			<body>
				<table>
					<tr>
						<th>NO</th>
						<th>TANGGAL VOTE</th>
						<th>NILAI</th>
						<th>VOTE</th>
						<th>SARAN</th>
					</tr>'.$datatbl.'
				</table>
			</body>
		</html>';
		die($html);
	}

	public function travel()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_travel';
		$data['content']=$page;
		$data['title'] = 'Master Data Travel';
		$this->load->view('index',$data);
	}

	function getTravel(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'travelid';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$where = " where ". $icari . " like '%$ncari%' ";		
		$result = array();
		$tabel = "SELECT * from tbtravel ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function postTravel(){
		$userlogin = $this->session->userdata('userId');
		$iNama=isset($_POST['iNama'])?$_POST['iNama']:'';
		$iAlamat=isset($_POST['iAlamat'])?$_POST['iAlamat']:'';
		$iStatus=isset($_POST['iStatus'])?$_POST['iStatus']:'';
		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		$json=array();
		if ($iNama == ''){
			$json['status']=2;
		} else {
			if ($idx == ''){
				$log= 'Simpan Travel '.$iNama;
				$result = $this->db->query("INSERT INTO `tbtravel` (`travelnama`, `travelalamat`, `travelstatus`, `createuser`) VALUES ('$iNama', '$iAlamat', $iStatus,'$userlogin')");
			} else {
				$log= 'Update Travel '.$iNama;
				$result = $this->db->query("update `tbtravel` set  `travelstatus` = $iStatus, `updateuser` = '$userlogin',updatetgl = current_timestamp() where travelid = $idx");
			}
			if ($result){
				loguser($log);
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

	public function kembangzio()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_kembangzio';
		$data['content']=$page;
		$data['title'] = 'Data Kembang ZIO';
		$this->load->view('index',$data);
	}

	function getKembangzio(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'asc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$where = " where ". $icari . " like '%$ncari%' ";		
		$result = array();
		$tabel = "SELECT * from tbkembangzio ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function postKembangzio(){
		$userlogin = $this->session->userdata('userId');
		$iKategori=isset($_POST['iKategori'])?$_POST['iKategori']:'';
		$iLink=isset($_POST['iLink'])?$_POST['iLink']:'';
		$iKet=isset($_POST['iKet'])?$_POST['iKet']:'';
		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		$json=array();
		if ($iKategori == ''){
			$json['status']=2;
		} else {
			if ($idx == ''){
				$log= 'Simpan Kembang ZIO '.$iKategori;
				$result = $this->db->query("INSERT INTO `tbkembangzio` (`kategori`, `linkdownload`, `ket`, `createuser`) VALUES ('$iKategori', '$iLink', '$iKet','$userlogin')");
			} else {
				$log= 'Update Kembang ZIO '.$iKategori;
				$result = $this->db->query("update `tbkembangzio` set `kategori` = '$iKategori', `linkdownload` = '$iLink',`ket` = '$iKet', `updateuser` = '$userlogin',updatetgl = current_timestamp() where id = $idx");
			}
			if ($result){
				loguser($log);
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

	function delKembangzio(){

		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		loguser('Hapus Kembang ZIO '.$idx);
		$json=array();
		if ($idx == ''){
			$json['status']=2;
		} else {
			$result = $this->db->query("delete from tbkembangzio where id = '$idx'");
			if ($result){
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

	public function suratmasuk()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'01');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$this->load->view('index',$data);
	}

	public function bimas_islam()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'02');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$this->load->view('index',$data);
	}
	
	public function pengadaan()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(2);
		$this->db->where("layananView",$slug);
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$page = 'admin/data_pengadaan';
		$data['content']=$page;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		$this->load->view('index',$data);
	}

	function getPengadaan(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and (disposisi_ke < 3 or disposisi_ke = 12) ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}

		$where = " where ". $icari . " like '%$ncari%' ".$wheredispo.$wherekode.$wheretgl.$wherestatus;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}
	function getSuratmasuk(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$ambildok = isset($_POST['ambildok']) ? addslashes($_POST['ambildok']) : '';
		$dispo = isset($_POST['dispo']) ? addslashes($_POST['dispo']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and disposisi_ke = '$usertype' ";
		} else {
			$wheredispo = " and disposisi_dari = '$usertype' ";
		}

		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}
		$whereambildok = '';
		if ($ambildok != ''){
			$whereambildok = " and ambildok = '$ambildok'";
		}
		$wheresdispo = '';
		if ($dispo != ''){
			if ($dispo == '0'){ 
				$wheresdispo = " and ifnull(disposisi,'') = ''";
			} else if ($dispo == '1'){ 
				$wheresdispo = " and ifnull(disposisi,'') <> ''";
			}
		}
		$where = " where ". $icari . " like '%$ncari%' ".$wheresdispo.$wheredispo.$wherekode.$wheretgl.$wherestatus.$whereambildok;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function smPost(){
		$user = userSess();	
		$usertype = $user['userType'];
		$userid = $user['userId'];
		$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$status=isset($_POST['status'])?$_POST['status']:'';
		$ket=isset($_POST['ket'])?$_POST['ket']:'';
		$dok=isset($_POST['dok'])?$_POST['dok']:'';
		$hasildok=isset($_POST['hasildok'])?$_POST['hasildok']:'';
		if ($noreg == ''){
			$ndata['error'] = 'Data layanan tidak ditemukan.';
			$ndata['success'] = '';
		} else {
			if ($status == 4){
				$stsdok = ' ,hasildok = ""';
			} else {
				$stsdok = " ,hasildok = '$hasildok' ";
			}
			if ($dok == $hasildok){
				$tgldok = ' ';
			} else {
				$tgldok = ' ,updatedoktgl = current_timestamp() ';
			}
			$result = $this->db->query("update tbsuratmasuk set  updateuser = '$userid',updatetgl = current_timestamp(),ket = '$ket',status = '$status' $tgldok  $stsdok where noreg = '$noreg' ");
			
			if ($result){
				$ndata['success'] = 'Sukses menguplod file dokumen.';
				$ndata['error'] = '';
			} else {
				$ndata['error'] = 'Upload file Gagal';
				$ndata['success'] = '';
			}
		}		
		die(json_encode($ndata));
	}

	function suratmasukPost(){
		$user = userSess();	
		$usertype = $user['userType'];
		$userid = $user['userId'];
		$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$status=isset($_POST['status'])?$_POST['status']:'';
		$ket=isset($_POST['ket'])?$_POST['ket']:'';
		$dok=isset($_POST['dok'])?$_POST['dok']:'';
		if ($noreg == ''){
			$ndata['error'] = 'Data layanan tidak ditemukan.';
			$ndata['success'] = '';
		} else {
			if ($_FILES['hasildok']['size'] > 0){
				$uid = uniqid();
				$this->load->library('image_lib');
				$folder = '../media/';
				$folderdok = '../media/dokumen/';
				$folderdok1 = 'media/dokumen/';
				$folder_file = $folderdok.$kd.$kd1.'/'; 
				$folder_file1 = $folderdok1.$kd.$kd1.'/'; 
				$filename = pathinfo($_FILES['hasildok']['name'], PATHINFO_FILENAME).'_'.$uid;
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
				$config['upload_path'] = $folder_file; 
				$config['allowed_types'] = 'pdf';
				$config['max_size']    = 1024*2;
				$config['file_name']   =  $filename;
				$config['overwrite'] = TRUE; 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$ndata['error'] = '';
				$ndata['success'] = '';
				if ( ! $this->upload->do_upload('hasildok')){
					$ndata['error'] = $this->upload->display_errors();
				}else{
					$dataimage = $this->upload->data();
					$imagename = $dataimage['file_name'];
					$fileName = $imagename;//.$this->upload->file_ext;
					$lokfile = $folder_file.$fileName;
					$lokfile1 = $folder_file1.$fileName;
					if ($usertype <= 1){
						$result = $this->db->query("update tbsuratmasuk set updateuser = '$userid',updatetgl = current_timestamp(),ket = '$ket',status = '$status',hasildok = '$lokfile1' where noreg = '$noreg' ");
					} else {
						$result = $this->db->query("update tbsuratmasuk set  updateuser = '$userid',updatetgl = current_timestamp(),ket = '$ket',status = '$status',updatedoktgl = current_timestamp(),hasildok = '$lokfile1' where noreg = '$noreg' ");
					}
					
					if ($result){
						$ndata['success'] = 'Sukses menguplod file dokumen.';
						$ndata['error'] = '';
					} else {
						$ndata['error'] = 'Upload file Gagal';
						$ndata['success'] = '';
						unlink($lokfile);
					}	
	
				}
			} else {
				if ($usertype <= 1){
					$stsdok = '';
					if ($status == 4){
						$stsdok = ' ,hasildok = ""';
					}
					$result = $this->db->query("update tbsuratmasuk set ket = '$ket',status = '$status' $stsdok where noreg = '$noreg' ");
					if ($result){
						if ($status == 4){
							if (file_exists("../".$dok)){
								unlink("../".$dok);
							}
						}
						$ndata['success'] = 'Sukses mengupdate data.';
						$ndata['error'] = '';
					} else {
						$ndata['error'] = 'Gagal menyimpan!';
						$ndata['success'] = '';
					}
				} 
			}
		}		
		die(json_encode($ndata));
	}

	function dispoPost(){
		$user = userSess();	
		$usertype = $user['userType'];
		$userid = $user['userId'];
		$ndata['error'] = 'Data layanan tidak ditemukan.';
		$ndata['success'] = '';
		if ($usertype <= 1){
			$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
			$status=isset($_POST['status'])?$_POST['status']:'';
			$disposisi=isset($_POST['disposisi'])?$_POST['disposisi']:'';
			$disposisicatatan=isset($_POST['disposisicatatan'])?$_POST['disposisicatatan']:'';
			$dok=isset($_POST['dok'])?$_POST['dok']:'';
			$perihalsurat=isset($_POST['perihalsurat'])?$_POST['perihalsurat']:'';
			if ($noreg == ''){
				$ndata['error'] = 'Data layanan tidak ditemukan.';
				$ndata['success'] = '';
			}  else if ($disposisi == ''){
				$ndata['error'] = 'Disposisi belum dipilih.';
				$ndata['success'] = '';
			} else if ($disposisicatatan == ''){
				$ndata['error'] = 'Catatan disposisi harus diisi.';
				$ndata['success'] = '';
			} else {
				$this->db->query("delete from tbdisposisi where disposisi_noreg = '$noreg' and disposisi_dari <> 0");
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
				$dispopilih=isset($_POST['dispopilih'])?$_POST['dispopilih']:'';
				//die($dispopilih);
				if ($disposisi != '' && $status < 3){
					$status = 3;
				}
				$result = $this->db->query("update tbsuratmasuk set status = '$status',updatedispotgl = current_timestamp(),disposisiid = '$dispoid',disposisi = '$dispopilih', disposisicatatan = '$disposisicatatan' where noreg = '$noreg' ");
					
			}
		}		
		die(json_encode($ndata));
	}

	function lembardisposisi(){
		$noper = isset($_GET['q'])?$_GET['q']:'';
		$qry = $this->db->query('select *, date_format(`createtgl`,"%d-%m-%Y") AS `tglterima`,DATE_FORMAT(`updatedispotgl`,"%d-%m-%Y") AS `tgldispo` from vwsuratmasuk where noreg = "'.$noper.'"');
		$row = $qry->row();
		if (count($row) > 0){
			
			$noreg = $row->noreg;
			$suratno = $row->suratno;
			$suratinstansi = $row->suratinstansi;
			$suratperihal = $row->suratperihal;
			$tglsurat = $row->tglsurat;
			$disposisi = $row->disposisi;
			$disposisiid = $row->disposisiid;
			$user = userSess();	
			$usertype = $user['userType'];
			$inarraydispo = in_array($usertype, explode(',',$disposisiid));
			if ($usertype > 1 && $inarraydispo == false ){
				die('');
			}
			//$disposisinm = str_replace('UNIT','KASI',$row->disposisinm);
			$disposisinm = '';
			if ($disposisi != null){
				foreach (explode(',',$disposisi) as $key => $value) {
					$disposisinm .= '<input type="checkbox" checked>  '.$value.' <br>';
				}
			}
			$tglterima = $row->tglterima;
			$tgldispo = $row->tgldispo;
			$disposisicatatan = $row->disposisicatatan;
			$judul = 'LEMBAR DISPOSISI '.$noreg.'-'.$suratperihal;
			$html ='
			<!doctype html>
			<html lang="en">
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
				<title>'.$judul.'</title>
				<style>
				table {
					border-collapse: collapse;
					table-layout:fixed;
					width:100%; 
				}
				table td{
					vertical-align: top;
					text-align:left;
				}
				table td.txt{
					vertical-align: top;
					padding:5px;
					padding-top:0px;
				}
				.txcenter{
					text-align:center;
				}
				input[type=checkbox]:before { font-family: DejaVu Sans; }
				input[type=checkbox] { display: inline; }

				</style>
			</head>
			
			<body>
			<div class="container">
				<table class="table table-bordered" style="border-spacing: 1px;border: 1px #a2a0a0 solid;">
					<tr>
								<th width="20%"></th>
								<th width="2%"></th>
								<th width="78%"></th>
					</tr>
					<tr align="center">
						<td class="txcenter" rowspan="3" style="width:20%;vertical-align: middle;" >
							<img src="'.logokemenag().'" height=90 width=100>
						</td>
						<td class="txcenter" colspan="2">
							<h3 style="margin:0;margin-top: 10px;padding:0">
								<strong>
								KEMENTERIAN AGAMA REPUBLIK INDONESIA<BR>
								</strong>
							</h3>
						</td>
					</tr>
					<tr align="center">
						<td class="txcenter" colspan="2">
							<h4 style="margin:0;padding:0">
								<strong>
								KANTOR KEMENTERIAN AGAMA KOTA MALANG<BR>
								</strong>
							</h4>
						</td>
					</tr>
					<tr align="center">
						<td class="txcenter" colspan="2">
							<h5 style="margin:0;margin-top:-5px;margin-bottom: 10px;padding:0">
								Jl. Raden Panji Suroso No. 2 Kota Malang 65126<br>
								Telepon (0341) 491605; e-mail: kotamalang@kemenag.go.id<br>
								Website: https://malangkota.kemenag.go.id<br>
							</h5>
						</td>
					</tr>
					<tr align="center">
						<td class="txcenter" colspan="3">
						<hr style="border: 0; border-top: 3px double #8c8c8c;">
						<h4><strong>LEMBAR DISPOSISI</strong></h4>
						</td>
					</tr>
			
				<tr>
							<td class="txt" style="padding-left:10px">Nomor Surat </td>
							<td>:</td>
							<td >'.$suratno.'</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px">Tgl. Surat</td>
							<td>:</td>
							<td>'.$tglsurat.'</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px">Lampiran</td>
							<td>:</td>
							<td>1 (satu) Bendel</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px">Tgl. Diterima</td>
							<td>:</td>
							<td>'.$tglterima.'</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px">Agenda</td>
							<td>:</td>
							<td>'.$noreg.'</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px">Dari</td>
							<td>:</td>
							<td>'.$suratinstansi.'</td>
				</tr>
				<tr>
							<td class="txt" style="padding-left:10px;padding-bottom:30px">Hal</td>
							<td>:</td>
							<td>'.$suratperihal.'</td>
				</tr>
			
				<tr>
							<td colspan="3" style="border-top: 1px #a2a0a0 solid;padding-bottom: 40px; padding-top: 10px; padding-left: 40px;"> <u><i>Untuk :</i></u> <br><br>
							'.$disposisinm.'
							</td>
				</tr>
				<tr>
							<td colspan="3" style="border-top: 1px #a2a0a0 solid;padding-bottom: 40px; padding-top: 10px; padding-left: 40px;"><font size="+1">
							<u><i>Isi Disposisi: </i></u><br><br><strong> '.$disposisicatatan.'</strong></font>
							</td>
							
				</tr>
				<tr>
							<td colspan="3" style="border-top: 1px #a2a0a0 solid;padding-bottom: 40px; padding-top: 10px; padding-left: 40px;"> <br>
								Dari: K E P A L A<br>Tgl. Disposisi: <i>'.$tgldispo.'</i>			   
							</td>
				</tr>
				</table>
			</div>
			</body>
			</html>
			';
			//echo $html;
			$this->load->library('LibPdf');
		// $html = $this->load->view('GeneratePdfView', [], true);
			$this->libpdf->createPDF($html, $judul, true);
		} else {
			die('');
		}

	}

	public function haji_umrah()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'03');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function pendma()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'04');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function pais()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'05');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function pd_pontren()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'06');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function zakat_wakaf()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'07');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function layanan_kristen()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'08');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function layanan_buddha()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'09');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	public function layanan_katolik()
	{
		$data['userSess'] = userSess();
		$slug = $this->uri->segment(3);
		$this->db->where("layananView",$slug);
		$this->db->where("menuKode",'10');
		$row = $this->db->get("vwlayanan")->row();
		$jenis = $row->layananJenis;
		$judul = $row->menuJudul;
		$subjudul = $row->menuSubjudul;
		$template = str_replace('web_','data_',$row->layananTemplate);
		if ($template == ''){
			redirect('', 'refresh');
		}
		$data['content']='admin/'.$template;
		$data['title'] = $jenis;
		$data['caption'] = $jenis;
		$data['kd'] = $row->menuKode;
		$data['kd1'] = $row->layananKode;
		if ($row->ketpermohonan == ''){
			$data['ketpermohonan'] = 'surat permohonan';
		} else {
			$data['ketpermohonan'] = $row->ketpermohonan;
		}
		$data['ketlampiran'] = $row->ketlampiran;
		$this->load->view('index',$data);
	}

	function getKonsul(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$kd = isset($_POST['kd']) ? addslashes($_POST['kd']) : '';
		$kd1 = isset($_POST['kd1']) ? addslashes($_POST['kd1']) : '';
		$status = isset($_POST['status']) ? addslashes($_POST['status']) : '';
		$wherekode = " and menukode = '".$kd."' and  layanankode = '".$kd1."'";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		$wherestatus = '';
		if ($status != ''){
			$wherestatus = " and status = '$status'";
		}

		$where = " where ". $icari . " like '%$ncari%' ".$wheredispo.$wherekode.$wheretgl.$wherestatus;		
		$result = array();
		$tabel = "SELECT * from vwpermohonan ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function getBerkas(){
		$noreg = isset($_POST['noreg'])?$_POST['noreg']:'';
		$sql = $this->db->query("select berkasket,berkasfile from tbberkas where berkasnoreg = '$noreg' ");
		$res = $sql->result();
		die(json_encode($res));
	}
}
