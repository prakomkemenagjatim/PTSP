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

	public function rekapsuratmasuk()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_suratmasukall';
		$data['content']=$page;
		$data['title'] = 'Data Rekap Surat Masuk';
		$data['tipe'] = 1;
		$this->load->view('index',$data);
	}
	function getSuratmasukrekap(){
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
		$wherekode = " and ifnull(layananTemplate,'') not in ('','web_konsul','web_legalisir') ";
		$wheretgl = " and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		$wheredispo = " and disposisi_ke = 1 ";
		// if ($usertype > 0){
		// 	$wheredispo = " and disposisi_ke = '$usertype' ";
		// } else {
		// 	$wheredispo = " and disposisi_dari = '$usertype' ";
		// }

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
		// echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}
	public function suratkeluar()
	{
		$data['userSess'] = userSess();
		$page = 'admin/data_suratkeluar';
		$data['content']=$page;
		$data['title'] = 'Data Surat Keluar';
		$data['tipe'] = 1;
		$this->load->view('index',$data);
	}
	function getSuratkeluar(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$tgl = isset($_POST['tgl']) ? addslashes($_POST['tgl']) : '';
		$tgl1 = isset($_POST['tgl1']) ? addslashes($_POST['tgl1']) : '';
		$tipe = isset($_POST['tipe']) ? addslashes($_POST['tipe']) : '1';
		
		$group = 1;
		$offset = ($page-1)*$rows;
		$where = '';
		$user = userSess();	
		$wheretgl = '';
		$wheretgl = " and surattipe = '$tipe' and date_format(createtgl,'%Y-%m-%d') between '".$tgl."' and  '".$tgl1."'";
		$where = " where ". $icari . " like '%$ncari%' ".$wheretgl;		
		$result = array();
		$tabel = "SELECT *,date_format(createtgl,'%Y-%m-%d %H:%i') as tgl,date_format(surattgl,'%Y-%m-%d') as tglsurat from vwsuratkeluar ";
		$query = $this->db->query($tabel.$where);
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function suratkeluarPost(){
		$userlogin = $this->session->userdata('userId');
		$noagenda=isset($_POST['idx'])?addslashes($_POST['idx']):'';
		$unitkerja=isset($_POST['iunitkerja'])?addslashes($_POST['iunitkerja']):'';
		$kodesurat=isset($_POST['ikodesurat'])?addslashes($_POST['ikodesurat']):'';
		$surattgl=isset($_POST['itglsurat'])?addslashes($_POST['itglsurat']):'';
		$suratperihal=isset($_POST['iperihalsurat'])?addslashes($_POST['iperihalsurat']):'';
		$surattujuan=isset($_POST['itujuansurat'])?addslashes($_POST['itujuansurat']):'';
		$ket=isset($_POST['iketsurat'])?addslashes($_POST['iketsurat']):'';
		$dok=isset($_POST['dok'])?addslashes($_POST['dok']):'';
		$tipe=1;
		$json=array();
		if ($unitkerja == '' || $kodesurat == '' || $surattgl == '' || $suratperihal == ''  || $surattujuan == '' || $tipe == ''){
			$ndata['error'] = 'Data tidak lengkap.';
			$ndata['success'] = '';
		} else {
			if ($_FILES['hasildok']['size'] > 0){
				$uid = uniqid();
				$this->load->library('image_lib');
				$folder = '../media/';
				$folderdok = '../media/suratkeluar/';
				$folderdok1 = 'media/suratkeluar/';
				$folder_file = $folderdok; 
				$folder_file1 = $folderdok1; 
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
				$config['max_size']    = 1024*5;
				$config['file_name']   =  $filename;
				$config['overwrite'] = TRUE; 
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				$ndata['error'] = '';
				$ndata['success'] = '';
				if ( ! $this->upload->do_upload('hasildok')){
					$ndata['error'] = $this->upload->display_errors();
					$ndata['success'] = '';
					die(json_encode($json));
				}else{
					$dataimage = $this->upload->data();
					$imagename = $dataimage['file_name'];
					$fileName = $imagename;//.$this->upload->file_ext;
					$lokfile = $folder_file.$fileName;
					$lokfile1 = $folder_file1.$fileName;						
				}
			} else {
				$lokfile1 = '';
			}
	
			if ($noagenda == ''){
				$result = $this->db->query("select `func_surat` (
														'$kodesurat',
														'', 
														'$surattgl', 
														'', 
														'$suratperihal',
														'$surattujuan',
														'$ket',
														'$tipe',
														'$lokfile1',
														'$userlogin') as noagenda");
				if ($result){
					$rowsurat = $result->row();
					$ndata['success'] = "Sukses menyimpan data";
					$ndata['noagenda']=$rowsurat->noagenda;
					loguser('Simpan surat keluar '.$suratperihal);
				} else {
					$ndata['error'] = 'Gagal menyimpan data';
					$ndata['success'] = '';
				}
			} else {
				$insfile = " `filedok` = '$lokfile1', ";
				if ($lokfile1 == ''){
					$insfile = "";
				} else {
					if (file_exists("../".$dok)){
						unlink("../".$dok);
					}
				}
				$result = $this->db->query("update tbsuratkeluar set 
				`kdsurat` = '$kodesurat',
				`surattgl` = '$surattgl',
				`suratperihal` = '$suratperihal',
				`surattujuan` = '$surattujuan',
				`ket` = '$ket',
				$insfile
				`updateuser` = '$userlogin',
				`updatetgl` = current_timestamp() where noagenda = '$noagenda' ");
				//echo $this->db->last_query();
				if ($result){
					$ndata['success'] = "Sukses menyimpan data";
					$ndata['noagenda']=$noagenda;
					loguser('Edit surat keluar '.$suratperihal);
				} else {
					$ndata['error'] = 'Gagal menyimpan data';
					$ndata['success'] = '';
				}
			}
		}
		//echo $this->db->last_query();
		die(json_encode($ndata));
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
		$iSK=isset($_POST['iSK'])?$_POST['iSK']:'';
		$iTgl=isset($_POST['iTgl'])?$_POST['iTgl']:'';
		$iStatus=isset($_POST['iStatus'])?$_POST['iStatus']:'';
		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		$json=array();
		if ($iNama == ''){
			$json['status']=2;
		} else {
			if ($idx == ''){
				$log= 'Simpan Travel '.$iNama;
				$result = $this->db->query("INSERT INTO `tbtravel` (`travelnama`, `travelalamat`,travelijin,traveltgl, `travelstatus`, `createuser`) VALUES ('$iNama', '$iAlamat','$iSK','$iTgl', $iStatus,'$userlogin')");
			} else {
				$log= 'Update Travel '.$iNama;
				$result = $this->db->query("update `tbtravel` set  `travelnama` = '$iNama',`travelalamat` = '$iAlamat',travelijin = '$iSK',traveltgl = '$iTgl',`travelstatus` = $iStatus, `updateuser` = '$userlogin',updatetgl = current_timestamp() where travelid = $idx");
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
		//aksesmenu(2);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function bimas_islam()
	{
		aksesmenu(3);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}
	
	public function pengadaan()
	{
		aksesmenu(12);
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
		$data['layananket'] = $row->layananket;
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

				//if ($usertype <= 1){
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
				//}
			}
		}		
		die(json_encode($ndata));
	}

	
	function suruqPost(){
		// error_reporting(E_ALL);
		// ini_set('display_errors',1);
		$user = userSess();	
		$usertype = $user['userType'];
		$userid = $user['userId'];
		$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$status=isset($_POST['status'])?$_POST['status']:'';
		$ket=isset($_POST['ket'])?$_POST['ket']:'';
		$dok=isset($_POST['dok'])?$_POST['dok']:'';

		$travel=isset($_POST['travel'])?addslashes($_POST['travel']):'';
		$nosk=isset($_POST['nosurat'])?addslashes($_POST['nosurat']):'';
		$tglsk=isset($_POST['tglsurat'])?addslashes($_POST['tglsurat']):'';
		$jnama=isset($_POST['jnama'])?$_POST['jnama']:'';
		$jtmplhr=isset($_POST['jtmplhr'])?$_POST['jtmplhr']:'';
		$jtgllhr=isset($_POST['jtgllhr'])?$_POST['jtgllhr']:'';
		$jalamat=isset($_POST['jalamat'])?$_POST['jalamat']:'';
		$jhp=isset($_POST['jhp'])?$_POST['jhp']:'';

		if ($noreg == ''){
			$ndata['error'] = 'Data layanan tidak ditemukan.';
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
		} else {
			$tglsk1 = implode('-',array_reverse(explode('-',$tglsk)));
			$jtgllhr1 = implode('-',array_reverse(explode('-',$jtgllhr)));

				//if ($usertype <= 1){
			
				if ($status == 5){
						$this->load->library('LibQrcode');
						$folder = '../media/';
						$folderdok = '../media/dokumen/';
						$folderdok1 = 'media/dokumen/';
						$folder_file = $folderdok.$kd.$kd1.'/'; 
						$folder_file1 = $folderdok1.$kd.$kd1.'/';
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
						$qrfile = $folder_file.$noreg.'.png';
						$kode =str_replace('dashboard/','',base_url('index.php/data/cek-rekom-umroh')).'?q='.md5($noreg.':::SENYUM');
						//$qrcode = $this->libqrcode->createQrcode($kode,$noreg.'-Kementerian Agama Kota Malang',true);
						$this->libqrcode->saveQrcode($kode,$noreg.'-Kementerian Agama Kota Malang',$folder_file.$noreg.'.png');
						$path = $folder_file1.$noreg.'.pdf';
						$result = $this->db->query("select func_uptsuruq(
							'$noreg',
							'$travel',
							'$nosk',
							'$tglsk1',
							'$jnama',
							'$jtmplhr',
							'$jtgllhr1',
							'$jalamat',
							'$jhp',
							'$path',
							'$userid',
							'$ket',
							'$status',
							'$usertype'
							) as hasil");
						if ($result){
							$ndata['success'] = 'Sukses mengupdate data.';
							$ndata['error'] = '';
							$row = $result->row();
							$nok = $row->hasil;

							$resultr = $this->db->query("select *,
							DATE_FORMAT(`jamaahlhrtgl`,'%d') as jlhrd,
							DATE_FORMAT(`jamaahlhrtgl`,'%m') as jlhrm,
							DATE_FORMAT(`jamaahlhrtgl`,'%Y') as jlhry,
							DATE_FORMAT(`tglrekom`,'%d') as jrekomd,
							DATE_FORMAT(`tglrekom`,'%m') as jrekomm,
							DATE_FORMAT(`tglrekom`,'%Y') as jrekomy,
							DATE_FORMAT(`traveltglsurat`,'%d') as jsuratd,
							DATE_FORMAT(`traveltglsurat`,'%m') as jsuratm,
							DATE_FORMAT(`traveltglsurat`,'%Y') as jsuraty,
							DATE_FORMAT(`traveltgl`,'%d') as jtgltraveld,
							DATE_FORMAT(`traveltgl`,'%m') as jtgltravelm,
							DATE_FORMAT(`traveltgl`,'%Y') as jtgltravely  from vwsuruq where noreg = '$noreg'");
							$rowr = $resultr->row();
							$jlhr = $rowr->jamaahlhrtmp.', '.$rowr->jlhrd.' '.bln_array($rowr->jlhrm).' '.$rowr->jlhry;
							$jtglrekom = 'Malang, '.$rowr->jrekomd.' '.bln_array($rowr->jrekomm).' '.$rowr->jrekomy;
							$jtglsurat = $rowr->jsuratd.' '.bln_array($rowr->jsuratm).' '.$rowr->jsuraty;
							$jtgltravel = $rowr->jtgltraveld.' '.bln_array($rowr->jtgltravelm).' '.$rowr->jtgltravely;
							$jtravelnosk = $rowr->travelijin;
							$html ='
							<!doctype html>
							<html lang="en">
							<head>
								<meta http-equiv="Content-Type" content="text/html; charset="utf-8">
								<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
								<title></title>
							</head>
							<body>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
							<tr align="center">
								<td width="20%"><img src="../assets/images/logorekom.png" height=90 width=100></td>
								<td width="80%" valign="center">
											<font size="+1" class="style1">
												<strong>
													KEMENTERIAN AGAMA REPUBLIK INDONESIA<BR>
												</strong>
											</font>
											<font size="+0" class="style1">
												<strong>
													KANTOR KEMENTERIAN AGAMA KOTA MALANG<BR>
												</strong>
											</font>
											<font size="-1" class="style1">
													Jl. Raden Panji Suroso No. 2 Kota Malang 65126<br>
													Telepon (0341) 491605; e-mail: kotamalang@kemenag.go.id<br>
													Website: https://malangkota.kemenag.go.id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;e-mail: kotamalang@kemenag.go.id<br>
											</font>
								</td>
							</table>
							<hr>
							<br>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td align="center" colspan="2">
										<font size="+3" class="style1">REKOMENDASI</font><br>
										<font size="+0" class="style1">Nomor: '.$rowr->norekom.'</font>
										<br>
										<br>
									</td>
								</tr>
							</table>
							<table width="100%" cellpadding="0" cellspacing="0" border="0">
								<tr>
								<td colspan="3"><font size="+0" class="style1">Kepala Kantor Kementerian Agama Kota Malang dengan ini menerangkan bahwa: <br>
								</td>
							</tr>
							<br>
							<tr class="style1">
								<td width="25%">Nama</td>
								<td width="2%">:</td>
								<td width="73%">'.strtoupper($rowr->jamaahnama).'</td>
							</tr>
							<tr class="style1">
								<td width="25%">Tempat, Tgl. Lahir </td>
								<td width="2%">:</td>
								<td width="73%">'.$jlhr.' </td>
							</tr>
							<tr class="style1" valign="top">
								<td width="25%">Alamat</td>
								<td width="2%">:</td>
								<td width="73%" align="left">'.$rowr->jamaahalamat.'</td>
							</tr>
							<tr class="style1">
								<td width="25%">No. Handphone </td>
								<td width="2%">:</td>
								<td width="73%">'.$rowr->jamaahhp.' </td>
							</tr>
							<tr class="style1">
								<td colspan="3"><br></td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">Adalah calon jemaah Umroh yang terdaftar pada '.$rowr->travelnama.' yang tercatat sebagai Penyelenggara Perjalanan Ibadah Umroh yang resmi pada Kementerian Agama dengan Nomor '.$jtravelnosk.' Tanggal '.$jtgltravel.'. 
								</td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">
								<br>
								Rekomendasi ini dibuat berdasarkan Surat Permohonan Rekomendasi dari '.$rowr->travelnama.' Nomor Surat '.$rowr->travelnosurat.' Tanggal '.$jtglsurat.' sebagai pertimbangan dalam pembuatan paspor untuk keperluan Ibadah Umroh yang bersangkutan. <br /></td>
							</tr>
							<tr class="style1" align="justify">
								<td colspan="3">
									<br>
									Demikian Rekomendasi ini kami buat, untuk dipergunakan sebagaimana mestinya.
									<br>
									<br>
									<br>
								</td>
							</tr>
							</table>
							<table border="0" cellspacing="0" cellpadding="0" style="width: 100%;table-layout: fixed;">
							<colgroup>
								<col  style="width: 55%;" />
								<col  style="width: 5%;" />
								<col  style="width: 40%;" />
							</colgroup>
							<tr>
								<td width="55%" rowspan="4" align="center"> 
								<img height=130 width=130 src="'.$qrfile.'" style="display:block">
								</td>
								<td width="5%">&nbsp;</td>
								<td width="40%">'.$jtglrekom.'<br><br></td>
							</tr>
							<tr>
								<td width="5%" height="10px" align="left">a.n</td>
								<td width="40%" height="10px">Kepala</td>
							</tr>
							<tr>
								<td width="5%">&nbsp;</td>
								<td width="40%">Kasi Peny. Haji dan Umroh</td>
							</tr>
							<tr>
								<td colspan="2"><img style="display:block" src="../assets/images/ttd.png" height=125 width=250>
								</td>
							</tr>
							<tr>
								<td width="55%" align="center" valign="top">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								<td width="40%">H. Amsiyono, SH, S.Ag, M.Sy </td>
							</tr>
							<tr>
								<td width="55%" align="center" valign="top">&nbsp;</td>
								<td width="5%">&nbsp;</td>
								<td width="40%">NIP. 196406041987031003 </td>
							</tr>
							</table>
							</body>
							</html>
						';
						//echo $html;
						$this->load->library('LibPdf');
						$this->libpdf->savePDF($html, $noreg, $folder_file);
						} else {
							$ndata['error'] = 'Gagal menyimpan!';
							$ndata['success'] = '';
						}
						
					
				} else {
					$result = $this->db->query("select func_uptsuruq(
						'$noreg',
						'$travel',
						'$nosk',
						'$tglsk1',
						'$jnama',
						'$jtmplhr',
						'$jtgllhr1',
						'$jalamat',
						'$jhp',
						'',
						'$userid',
						'$ket',
						'$status',
						'$usertype'
						) as hasil");
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
					$dispokode= $noreg.'_1'.'_'.$userid;
					$resultdispo = $this->db->query("insert tbdisposisi (disposisi_kode,disposisi_noreg,disposisi_dari,disposisi_ke,create_user) values ('$dispokode','$noreg',1,'$item','$userid') ");
					if ($resultdispo){
						$ndata['success'] = 'Sukses disposisi.';
						$ndata['error'] = '';
						$dtdispo = $this->db->query("select ifnull(userWA,'') as userWA from tbuser where ifnull(userWA,'') <> '' and userType = '$item' ")->result();
	
						foreach ($dtdispo as $row) {
							if ($row->userWA != ''){
								//$lembar = base_url().'dashboard/index.php/data/lembardisposisi?q='.$noreg;
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
							<img src="../assets/images/logorekom.png" height=90 width=100>
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
			$this->libpdf->createPDF($html, $judul, false);
		} else {
			die('');
		}

	}
	public function haji_umrah()
	{
		aksesmenu(7);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function pendma()
	{
		aksesmenu(4);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function pais()
	{
		aksesmenu(5);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function pd_pontren()
	{
		aksesmenu(6);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function zakat_wakaf()
	{
		aksesmenu(8);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function layanan_kristen()
	{
		aksesmenu(10);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function layanan_buddha()
	{
		aksesmenu(9);
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
		$data['layananket'] = $row->layananket;
		$this->load->view('index',$data);
	}

	public function layanan_katolik()
	{
		aksesmenu(11);
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
		$data['layananket'] = $row->layananket;
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

	function getgrafiklayanan(){
		$thn = isset($_POST['thn']) ? addslashes($_POST['thn']) :'';
		$bln = isset($_POST['bln']) ? addslashes($_POST['bln']) :'';
		$json = array();
		$total = 0;
		$whereyear = "year(createtgl) = $thn";
		$wherebln ="";
		if ($bln != ''){
			$blni = (int)$bln;
			$wherebln =" and MONTH(createtgl) = $blni";
		}
		$json['title']='GRAFIK LAYANAN';
		$json['series']=array();
		$menusql = $this->db->query("select menukode,menujudul from tbmainmenu where id NOT IN (0,11,13,14,15)  order by id asc");
		$menu = array();
		$status1 = array();
		$status2 = array();
		$status3 = array();
		$status4 = array();
		$status5 = array();
		$total = 0;
		foreach ($menusql->result() as $row){
			$menukode = $row->menukode;
			$menujudul = $row->menujudul;
			array_push($menu,$row->menujudul);
			// $jmlsql1 = $this->db->query("select count(*) as jml from tbsuratmasuk where status =  1 and menukode = $menukode and $whereyear $wherebln")->row();
			// array_push($status1,(int)$jmlsql1->jml);
			// $jmlsql2 = $this->db->query("select count(*) as jml from tbsuratmasuk where status =  2 and menukode = $menukode and $whereyear $wherebln")->row();
			// array_push($status2,(int)$jmlsql2->jml);
			// $jmlsql3 = $this->db->query("select count(*) as jml from tbsuratmasuk where status =  3 and menukode = $menukode and $whereyear $wherebln")->row();
			// array_push($status3,(int)$jmlsql3->jml);
			// $jmlsql4 = $this->db->query("select count(*) as jml from tbsuratmasuk where status =  4 and menukode = $menukode and $whereyear $wherebln")->row();
			// array_push($status4,(int)$jmlsql4->jml);
			// $jmlsql5 = $this->db->query("select count(*) as jml from tbsuratmasuk where status =  5 and menukode = $menukode and $whereyear $wherebln")->row();
			// array_push($status5,(int)$jmlsql5->jml);
			$jmlsql1 = $this->db->query("select count(*) as jml from vwpermohonan where status =  1 and (typeMenu = $menukode or menukode = $menukode) and $whereyear $wherebln")->row();
			array_push($status1,(int)$jmlsql1->jml);
			$jmlsql2 = $this->db->query("select count(*) as jml from vwpermohonan where status =  2 and (typeMenu = $menukode or menukode = $menukode) and $whereyear $wherebln")->row();
			array_push($status2,(int)$jmlsql2->jml);
			$jmlsql3 = $this->db->query("select count(*) as jml from vwpermohonan where status =  3 and (typeMenu = $menukode or menukode = $menukode) and $whereyear $wherebln")->row();
			array_push($status3,(int)$jmlsql3->jml);
			$jmlsql4 = $this->db->query("select count(*) as jml from vwpermohonan where status =  4 and (typeMenu = $menukode or menukode = $menukode) and $whereyear $wherebln")->row();
			array_push($status4,(int)$jmlsql4->jml);
			$jmlsql5 = $this->db->query("select count(*) as jml from vwpermohonan where status =  5 and (typeMenu = $menukode or menukode = $menukode) and $whereyear $wherebln")->row();
			array_push($status5,(int)$jmlsql5->jml);
			$total = $total+(int)$jmlsql1->jml+(int)$jmlsql2->jml+(int)$jmlsql3->jml+(int)$jmlsql4->jml+(int)$jmlsql5->jml;
		}
		$json['x']=$menu;


		array_push($json['series'],array("name"=>"Menunggu Persetujuan","data"=>$status1,"color"=>"#795548"));
		array_push($json['series'],array("name"=>"Diterima","data"=>$status2,"color"=>"#ff9800"));
		array_push($json['series'],array("name"=>"Masih Dalam Proses","data"=>$status3,"color"=>"#0d47a1"));
		array_push($json['series'],array("name"=>"Ditolak","data"=>$status4,"color"=>"#b71c1c"));
		array_push($json['series'],array("name"=>"Selesai","data"=>$status5,"color"=>"#1b5e20"));
		$json['totallay'] = $total;
		$jmlsk =  $this->db->query("select count(*) as jml from tbsuratkeluar where $whereyear $wherebln")->row();
		$json['totalsk'] = (int)$jmlsk->jml;
		$whereyearikm = "year(ikm_tgl) = $thn";
		$whereblnikm ="";
		if ($bln != ''){
			$blni = (int)$bln;
			$whereblnikm =" and MONTH(ikm_tgl) = $blni";
		}
		$ikm = $this->db->query("SELECT COUNT(*) AS jml,IFNULL(SUM(ikm_vt_layanan),0) AS total,IFNULL(TRUNCATE(IFNULL(SUM(ikm_vt_layanan),0)/COUNT(*),2),0) AS rata FROM tbikm  where $whereyearikm $whereblnikm")->row();
		$json['ikmrespon'] = $ikm->jml;
		$json['ikmavg'] = $ikm->rata;
		
		$sm = $this->db->query("select count(*) as jml from vwsuratmasuk where $whereyear $wherebln and ifnull(layananTemplate,'') not in ('','web_konsul','web_legalisir')");
		$rowsm = $sm->row();
		$json['totalsm'] = $rowsm->jml;

		die(json_encode($json));
	}

	function hitlay(){
		$noreg = isset($_POST['noreg']) ? addslashes($_POST['noreg']) :'';
		$dispo1 = isset($_POST['dispo1']) ? addslashes($_POST['dispo1']) :'';
		$dispo2 = isset($_POST['dispo2']) ? addslashes($_POST['dispo2']) :'';
		$kode = $noreg.'_'.$dispo1.'_'.$dispo2;
		$this->db->query("update tbdisposisi set lihat = lihat+1, lihattgl = CURRENT_TIMESTAMP() where disposisi_kode = '$kode'");
	}

	function konsulPost(){
		$user = userSess();	
		$usertype = $user['userType'];
		$userid = $user['userId'];
		$noreg=isset($_POST['noreg'])?$_POST['noreg']:'';
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$status=isset($_POST['status'])?$_POST['status']:'';
		$ket=isset($_POST['ket'])?addslashes($_POST['ket']):'';
		$dok=isset($_POST['dok'])?$_POST['dok']:'';
		if ($noreg == ''){
			$ndata['error'] = 'Data layanan tidak ditemukan.';
			$ndata['success'] = '';
		} else if ($status == ''){
			$ndata['error'] = 'Status layanan belum dipilih.';
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
		die(json_encode($ndata));
	}

	function getSuruq(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'rekomid';
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
		$tabel = "SELECT * from vwsuruq ";
		$query = $this->db->query($tabel.$where);
		//echo $this->db->last_query();
		$result["total"] = $query->num_rows();
		$rs = $tabel.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		//echo $this->db->last_query();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

	function ketlayPost(){
		$kd=isset($_POST['kd'])?$_POST['kd']:'';
		$kd1=isset($_POST['kd1'])?$_POST['kd1']:'';
		$konten=isset($_POST['konten'])?$_POST['konten']:'';
		if ($kd == '' || $kd1 == ''){
			$ndata['msg'] = 'Data layanan tidak ditemukan.';
			$ndata['status'] = '2';
		} else {
			$result = $this->db->query("update tblayanan set  layananket = '$konten' where menuKode = '$kd' and layananKode = '$kd1' ");
			
			if ($result){
				$ndata['msg'] = 'Sukses menyimpan data.';
				$ndata['status'] = '1';
			} else {
				$ndata['msg'] = 'Gagal menyimpan data';
				$ndata['status'] = '2';
			}
		}		
		die(json_encode($ndata));
	}

	function getlayjml(){
		$user = userSess();	
		$usertype = $user['userType'];
		$wheredispo = '';
		if ($usertype > 0){
			$wheredispo = " and ((STATUS = 3 and disposisi_ke = '$usertype') or (STATUS = 1 and ifnull(layananTemplate,'') in ('web_konsul','web_legalisir'))) ";
		} else {
			$wheredispo = " and STATUS = 1 and disposisi_dari = '$usertype' ";
		}
		$sql = "SELECT menuKode AS mmenu,CONCAT(menuKode,LayananKode) AS menu,(SELECT COUNT(*) FROM vwpermohonan WHERE menukode = tblayanan.`menuKode` AND layanankode = tblayanan.`layananKode` $wheredispo ) AS jml FROM tblayanan WHERE layananAktif = 1 AND layananhref IS NULL order by menuKode,LayananKode";
		$res = $this->db->query($sql);
		$row = $res->result_array();

		die(json_encode($row));
		
	}
}
