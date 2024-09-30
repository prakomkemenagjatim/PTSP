<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class CUser extends Admincontroller {

	public function __construct()
	{
       	parent::__construct();
        $this->isLogin();
        $this->load->helper('app_helper');
		
    }
	public function index()
	{
		$page = 'admin/data_administrator';
		$data['content']=$page;
		$data['title'] = 'Administrator';
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}
	
	public function administrator()
	{
		aksesmenu(0);
		$page = 'admin/data_administrator';
		$data['content']=$page;
		$data['title'] = 'Administrator';
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}
	function getUseradmin(){
		aksesmenu(0);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'createTgl';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'user_id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		$where = " where ". $icari . " like '%$ncari%' "; 
		$result = array();
		$sql = "select * from vwuser ";
		$query = $this->db->query($sql.$where);
		$result["total"] = $query->num_rows();
		$rs = $sql.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}
	public function postUseradmin() {
		aksesmenu(0);
		$userlogin = $this->session->userdata('userId');
		
		$iId = $this->input->post('iId', TRUE);
		$iNama = $this->input->post('iNama', TRUE);
		$iNip = $this->input->post('iNip', TRUE);
		$iPass = $this->input->post('iPass', TRUE);
		$iStatus = $this->input->post('iStatus', TRUE);
		$iType = $this->input->post('iType', TRUE);
		$iWA = $this->input->post('iWA', TRUE);
		$iTingkat = $this->input->post('iTingkat', TRUE);
		$iProv = $this->input->post('iProv', TRUE);
		$iKabko = $this->input->post('iKabko', TRUE);
		$iKua = $this->input->post('iKua', TRUE);
		
		$json = array();
		
		// Validate required fields
		if (empty($iId) || empty($iNama)) {
			$json['status'] = 2;
			die(json_encode($json));
		}
		
			// Hash the password using MD5
		$iPass = md5($iPass . sufixpass());

		
		// Prepare data for insertion
		$data = array(
			'userId' => $iId,
			'userNama' => $iNama,
			'userNip' => $iNip,
			'userPassword' => $iPass,
			'userAktif' => $iStatus,
			'createUser' => $userlogin,
			'userType' => $iType,
			'userWA' => $iWA,
			'userTingkat' => $iTingkat,
			'userProv' => $iProv,
			'userKabko' => $iKabko,
			'userKua' => $iKua
		);
		
		// Insert the data
		$this->db->insert('tbuser', $data);
		
		if ($this->db->affected_rows() > 0) {
			$json['status'] = 1;
		} else {
			$json['status'] = 3;
		}
		
		die(json_encode($json));
	}
	
	
	public function editUseradmin() {
		aksesmenu(0);
		$userlogin = $this->session->userdata('userId');
		
		$iId = $this->input->post('iId', TRUE);
		$iNama = $this->input->post('iNama', TRUE);
		$iNip = $this->input->post('iNip', TRUE);
		$iPass = $this->input->post('iPass', TRUE);
		$iStatus = $this->input->post('iStatus', TRUE);
		$iType = $this->input->post('iType', TRUE);
		$iWA = $this->input->post('iWA', TRUE);
		$iTingkat = $this->input->post('iTingkat', TRUE);
		$iProv = $this->input->post('iProv', TRUE);
		$iKabko = $this->input->post('iKabko', TRUE);
		$iKua = $this->input->post('iKua', TRUE);
		$idx = $this->input->post('idx', TRUE);
		
		$json = array();
		
		// Validate required fields
		if (empty($iId) || empty($iNama) || empty($idx)) {
			$json['status'] = 2;
			die(json_encode($json));
		}
		
		// Prepare data for update
		$data = array(
			'userNama' => $iNama,
			'userNip' => $iNip,
			'updateTgl' => date('Y-m-d H:i:s'),
			'updateUser' => $userlogin,
			'userAktif' => $iStatus,
			'userType' => $iType,
			'userWA' => $iWA,
			'userTingkat' => $iTingkat,
			'userProv' => $iProv,
			'userKabko' => $iKabko,
			'userKua' => $iKua
		);
		
		// Hash the password if it's provided
		if (!empty($iPass)) {
			$data['userPassword'] = password_hash($iPass . sufixpass(), PASSWORD_BCRYPT);
		}
		
		// Update the data
		$this->db->where('userId', $idx);
		$this->db->update('tbuser', $data);
		
		if ($this->db->affected_rows() > 0) {
			$json['status'] = 1;
		} else {
			$json['status'] = 3;
		}
		
		die(json_encode($json));
	}
	
	
	function delUseradmin(){
		aksesmenu(0);
		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		loguser('Hapus User '.$idx);
		$json=array();
		if ($idx == ''){
			$json['status']=2;
		} else {
			$result = $this->db->query("delete from tbuser where userId = '$idx'");
			if ($result){
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}
	function resetUseradmin(){
		aksesmenu(0);
		$idx=isset($_POST['idx'])?$_POST['idx']:'';
		loguser('Reset Password '.$idx);
		$json=array();
		if ($idx == ''){
			$json['status']=2;
		} else {
			$pass1 = rand(0,9);
			$pass2 = rand(0,9);
			$pass3 = rand(0,9);
			$pass4 = rand(0,9);
			$pass5 = rand(0,9);
			$pass6 = rand(0,9);
			$passu = $pass1.$pass2.$pass3.$pass4.$pass5.$pass6;
			$pass = md5($passu.sufixpass());
			$result = $this->db->query("update tbuser set userPassword = '$pass' where userId = '$idx'");
			if ($result){
				$json['status']=1;
				$json['pass']=$passu;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}
	

	public function log()
	{
		$page = 'admin/data_loguser';
		$data['content']=$page;
		$data['title'] = 'User Log';
		$this->load->view('site_index',$data);
	}
	
	function getuserlog(){
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'id';
		$order = isset($_POST['order']) ? strval($_POST['order']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'id';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$ntgl1 = isset($_POST['ntgl1']) ? addslashes($_POST['ntgl1']) : '';
		$ntgl2 = isset($_POST['ntgl2']) ? addslashes($_POST['ntgl2']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		if ($ncari == ''){
			$where = " where ". $icari . " like '%$ncari%' "; 
		} else {
			$where = " where 1 = 1 "; 
		}
		
		$result = array();
		$tgl = '';
		if ($ntgl1 == '' || $ntgl2 == ''){
			$tgl = " and tgl between '$ntgl1' and '$ntgl2'";
		}
		$query = $this->db->query("select * from __loguser ".$where.$tgl);
		$result["total"] = $query->num_rows();
		$rs = "select * from __loguser ".$where.$tgl;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
		$items = $rs->result_array();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}
	
	public function profil()
	{
		loguser('profil');
		$userSess = userSess();
		$page = 'admin/data_gantipass';
		$data['content'] = $page;
		$data['title'] = 'Profile User';
		
		// Fetch data from tbuser
		$userId = $userSess['userId']; // Assuming this is the user ID used to fetch data
		$this->db->where('userId', $userId); // Adjust based on how you fetch data
		$query = $this->db->get('tbuser');
		$tbuserData = $query->row_array();

		// Pass tbuser data to view
		$data['tbuserData'] = $tbuserData;
		$data['userSess'] = $userSess;

		$this->load->view('index', $data);
	}

	
	
	function gantipasspost(){
		$userSess = userSess();
		$user_name = $userSess['userId'];
		$user_type = $userSess['userType'];
		$passlama=isset($_POST['passlama'])?$_POST['passlama']:'';
		$passbaru=isset($_POST['passbaru'])?$_POST['passbaru']:'';
		$passbaruu=isset($_POST['passbaruu'])?$_POST['passbaruu']:'';
		$user_name = $userSess['userId'];
		$pass = md5($passbaru.sufixpass());
		$passlama = md5($passlama.sufixpass());
		if ($passlama != '' && $passbaruu != '' && $passbaru != ''){
			if ($passbaru  == $passbaruu){
						$qry = $this->db->query("select userPassword from tbuser where userId = '$user_name'");

				
				$row = $qry->row_array();
				if ($passlama != $row['userPassword']){
					$json['title']="ERROR !!";
					$json['text']="Password Lama Tidak Sesuai";
					$json['type']="error";
				} else {
						$result = $this->db->query("update tbuser set userPassword = '$pass' where userId = '$user_name'");

					if ($result){
						$json['title']="SUKSES !!";
						$json['text']="Password Berhasil Disimpan";
						$json['type']="success";
					} else {
						$json['title']="ERROR !!";
						$json['text']="Password Gagal Disimpan";
						$json['type']="error";
					}					
				}
			
			} else {
				$json['title']="ERROR !!";
				$json['text']="Password Lama dan Ulangi Password Lama Tidak Sama";
				$json['type']="error";
			}
		} else {
			$json['title']="ERROR !!";
			$json['text']="Password Tidak Boleh Kosong";
			$json['type']="error";
		}
		die(json_encode($json));
	}
	
	function gantinamapost(){
		$userSess = userSess();
		$nama=isset($_POST['nama'])?$_POST['nama']:'';
		$user_name = $userSess['userId'];
		if ($nama != ''){
			$result = $this->db->query("update tbuser set userNama = '$nama',updateUser = '$user_name',updateTgl =current_timestamp() where userId = '$user_name'");
			if ($result){
				$json['title']="SUKSES !!";
				$json['text']="Profil User Berhasil Disimpan, Silakan Login Ulang!!";
				$json['type']="success";
			} else {
				$json['title']="ERROR !!";
				$json['text']="Profil User Gagal Disimpan";
				$json['type']="error";
			}					
		} else {
			$json['title']="ERROR !!";
			$json['text']="Nama User Tidak Boleh Kosong";
			$json['type']="error";
		}
		die(json_encode($json));
	}
	
	function gantiphoto(){
		$userSess = userSess();
		$this->load->library('image_lib');
		$file = isset($_FILES)?$_FILES:''; 
		$user_name = $userSess['userId'];
		$user_type = $userSess['userType'];
		$folder = './media/';
        $folder_user = $folder.'user/';
        $folder_user_foto = $folder_user.'photo/'; 
        
        if (!is_dir($folder))mkdir($folder, 0777, TRUE);
        if (!is_dir($folder_user))mkdir($folder_user, 0777, TRUE);
        if (!is_dir($folder_user_foto))mkdir($folder_user_foto, 0777, TRUE);
        
	 	if (!file_exists($folder.'index.php')){
 		    $fo = fopen($folder.'index.php','w');
 		    fclose($fo);
		}
	 	if (!file_exists($folder_user.'index.php')){
 		    $fo = fopen($folder_user.'index.php','w');
 		    fclose($fo);
		}
	 	if (!file_exists($folder_user_foto.'index.php')){
 		    $fo = fopen($folder_user_foto.'index.php','w');
 		    fclose($fo);
		}
		$config['upload_path'] = $folder_user_foto; 
	    $config['allowed_types'] = 'gif|jpg|png|jpeg';
	    $config['max_size']    = '1024';
	    $config['file_name']   = md5($user_name.'3wak4fmu');
		$config['overwrite'] = TRUE; 
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$json = array();
		$json['error'] = '';
		$json['success'] = '';
		if ( ! $this->upload->do_upload('upload_photo')){
			$ndata['error'] = 'Upload Photo Gagal';//$this->upload->display_errors();
		}else{
			$dataimage = $this->upload->data();
			$imagename = $dataimage['file_name'];
			$fileNameResize = $config['upload_path'].$config['file_name'].$this->upload->file_ext;
			$img = getimagesize($fileNameResize);
			$realWidth	= $img[0];
			$realHeight = $img[1];
			$folder_user_profil = $folder_user_foto.'profil/'; 
			if (!is_dir($folder_user_profil))mkdir($folder_user_profil, 0777, TRUE);
			if (!file_exists($folder_user_profil.'index.php')){
	 		    $fo = fopen($folder_user_profil.'index.php','w');
	 		    fclose($fo);
			}
			$resize = array(
				"width"			=> 200,
				"height"		=> 200,
				"quality"		=> '100%',
				"source_image"	=> $fileNameResize,
				"new_image"		=> $folder_user_profil.$config['file_name'].$this->upload->file_ext
			);
			
			$oriW = $resize['width'];
			$oriH = $resize['height'];
			$x = $resize['width']/$realWidth;
			$y = $resize['height']/$realHeight;
			if($x < $y) {
				$resize['width'] = round($realWidth*($resize['height']/$realHeight));
			} else {
				$resize['height'] = round($realHeight*($resize['width']/$realWidth));
			}     
		
			$this->image_lib->initialize($resize); 
			if(!$this->image_lib->resize()){
				$ndata['error'] = 'Resize Photo Gagal';
				$ndata['success'] = '';
				$this->image_lib->clear();
			} else {
				$this->image_lib->clear();		
				
				$config = null;
				$config['image_library'] = 'GD2';
				$im = getimagesize($resize['new_image']);
				$toCropLeft = ($im[0] - ($oriW *1))/2;
				$toCropTop = ($im[1] - ($oriH*1))/2;
				
				$config['source_image'] = $resize['new_image'];
				$config['width'] = $oriW;
				$config['height'] = $oriH;
				$config['x_axis'] = $toCropLeft;
				$config['y_axis'] = $toCropTop;
				$config['maintain_ratio'] = false;
				
				$this->image_lib->initialize($config);
				 
				if(!$this->image_lib->crop()){
					$ndata['error'] = 'Crop Photo Gagal';
					$ndata['success'] = '';
					$this->image_lib->clear();
				} else {
					$this->image_lib->clear();
					$result = $this->db->query("update tbuser set userPhoto = '$imagename' where userId = '$user_name'");
		        	if ($result){
						$ndata['success'] = 'Upload Photo Sukses, Silakan Login Ulang!!';
						$ndata['error'] = '';
					} else {
						$ndata['error'] = 'Upload Photo Gagal';
						$ndata['success'] = '';
					}	
				}				
			}

		}
		
		die(json_encode($ndata));
	}

	public function loginapi() {
        // URL endpoint untuk login
        $login_url = 'https://api.kemenag.go.id/v1/auth/login';

        // Data yang dibutuhkan untuk login (ganti dengan email dan password yang sesuai)
        $login_data = array(
            'email' => 'adminsimpegjatim@kemenag.go.id',
            'password' => '@1sampaiENAM*'
        );

          // Inisialisasi cURL
		  $curl = curl_init();

		  // Setel opsi cURL
		  curl_setopt_array($curl, array(
			  CURLOPT_URL => $login_url,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => '',
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 0,
			  CURLOPT_FOLLOWLOCATION => true,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => 'POST',
			  CURLOPT_POSTFIELDS => http_build_query($login_data),
			  CURLOPT_HTTPHEADER => array(
				  'Content-Type: application/x-www-form-urlencoded'
			  ),
		  ));
  
		  // Eksekusi permintaan dan simpan respons
		  $response = curl_exec($curl);
		  curl_close($curl);
  
		  // Cek respons
		  if ($response) {
			  $json_response = json_decode($response);
			  if (isset($json_response->status) && $json_response->status === true && isset($json_response->token)) {
				  $access_token = $json_response->token;
				  // Simpan access_token ke session atau gunakan sesuai kebutuhan aplikasi Anda
				  $this->session->set_userdata('access_token', $access_token);
				//   echo "Access Token: " . $access_token; // Hanya untuk debug, sebaiknya simpan di session
			  } else {
				//   echo "Failed to get access token.";
			  }
		  } else {
			//   echo "Failed to connect to API.";
		  }
	  }
	  
	  public function getProfilPegawai($nip) {
		$this->loginapi();
		// URL endpoint untuk mengambil profil pegawai
		$profil_url = 'https://api.kemenag.go.id/v1/pegawai/profil/' . $nip;
	
		// Ambil access_token dari session atau sesuai kebutuhan aplikasi Anda
		$access_token = $this->session->userdata('access_token');
	
		// Inisialisasi cURL
		$curl = curl_init();
	
		// Setel opsi cURL
		curl_setopt_array($curl, array(
			CURLOPT_URL => $profil_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $access_token,
				'Content-Type: application/json; charset=utf-8'
			),
		));
	
		// Eksekusi permintaan dan simpan respons
		$response = curl_exec($curl);
		curl_close($curl);
	
		// Initialize the response array
		$ndata = array(
			'success' => '',
			'error' => ''
		);
	
		// Cek respons
		if ($response) {
			$json_response = json_decode($response, true);
			if ($json_response['status']) {
				$ndata['success'] = 'Sukses';
				// Data pegawai
				$data_pegawai = $json_response['data'];
				$update_data = array(
					'NIP' => $data_pegawai['NIP'],
					'NIP_BARU' => $data_pegawai['NIP_BARU'],
					'NAMA' => $data_pegawai['NAMA'],
					'userNama' => $data_pegawai['NAMA_LENGKAP'],
					'NAMA_LENGKAP' => $data_pegawai['NAMA_LENGKAP'],
					'AGAMA' => $data_pegawai['AGAMA'],
					'TEMPAT_LAHIR' => $data_pegawai['TEMPAT_LAHIR'],
					'TANGGAL_LAHIR' => $data_pegawai['TANGGAL_LAHIR'],
					'JENIS_KELAMIN' => $data_pegawai['JENIS_KELAMIN'],
					'PENDIDIKAN' => $data_pegawai['PENDIDIKAN'],
					'KODE_LEVEL_JABATAN' => $data_pegawai['KODE_LEVEL_JABATAN'],
					'LEVEL_JABATAN' => $data_pegawai['LEVEL_JABATAN'],
					'PANGKAT' => $data_pegawai['PANGKAT'],
					'GOL_RUANG' => $data_pegawai['GOL_RUANG'],
					'TMT_CPNS' => $data_pegawai['TMT_CPNS'],
					'TMT_PANGKAT' => $data_pegawai['TMT_PANGKAT'],
					'MASAKERJA_TAHUN' => $data_pegawai['MK_TAHUN'],
					'MASAKERJA_BULAN' => $data_pegawai['MK_BULAN'],
					'TIPE_JABATAN' => $data_pegawai['TIPE_JABATAN'],
					'KODE_JABATAN' => $data_pegawai['KODE_JABATAN'],
					'TAMPIL_JABATAN' => $data_pegawai['TAMPIL_JABATAN'],
					'TMT_JABATAN' => $data_pegawai['TMT_JABATAN'],
					'KODE_SATKER_1' => $data_pegawai['KODE_SATUAN_KERJA'],
					'SATKER_1' => $data_pegawai['SATKER_1'],
					'KODE_SATKER_2' => $data_pegawai['KODE_SATKER_2'],
					'SATKER_2' => $data_pegawai['SATKER_2'],
					'KODE_SATKER_3' => $data_pegawai['KODE_SATKER_3'],
					'SATKER_3' => $data_pegawai['SATKER_3'],
					'KODE_SATKER_4' => $data_pegawai['KODE_SATKER_4'],
					'SATKER_4' => $data_pegawai['SATKER_4'],
					'KODE_SATKER_5' => $data_pegawai['KODE_SATKER_5'],
					'SATKER_5' => $data_pegawai['SATKER_5'],
					'SATUAN_KERJA' => $data_pegawai['GRUP_SATUAN_KERJA'],
					'STATUS_KAWIN' => $data_pegawai['STATUS_KAWIN'],
					'ALAMAT_1' => $data_pegawai['ALAMAT_1'],
					'ALAMAT_2' => $data_pegawai['ALAMAT_2'],
					'TELEPON' => $data_pegawai['TELEPON'],
					'NO_HP' => $data_pegawai['NO_HP'],
					'EMAIL' => $data_pegawai['EMAIL'],
					'KAB_KOTA' => $data_pegawai['KAB_KOTA'],
					'PROVINSI' => $data_pegawai['PROVINSI'],
					'KODE_POS' => $data_pegawai['KODE_POS'],
					'KODE_LOKASI' => $data_pegawai['KODE_LOKASI'],
					'KODE_PANGKAT' => $data_pegawai['KODE_PANGKAT'],
					'ISO' => $data_pegawai['ISO'],
					'KETERANGAN' => $data_pegawai['KETERANGAN'],
					'tmt_pangkat_yad' => $data_pegawai['tmt_pangkat_yad'],
					'tmt_kgb_yad' => $data_pegawai['tmt_kgb_yad'],
					'USIA_PENSIUN' => $data_pegawai['USIA_PENSIUN'],
					'TMT_PENSIUN' => $data_pegawai['TMT_PENSIUN'],
					'MK_TAHUN_1' => $data_pegawai['MK_TAHUN_1'],
					'MK_BULAN_1' => $data_pegawai['MK_BULAN_1'],
					'NSM' => $data_pegawai['NSM'],
					'NPSN' => $data_pegawai['NPSN'],
					'KODE_KUA' => $data_pegawai['KODE_KUA'],
					'KODE_BIDANG_STUDI' => $data_pegawai['KODE_BIDANG_STUDI'],
					'BIDANG_STUDI' => $data_pegawai['BIDANG_STUDI'],
					'STATUS_PEGAWAI' => $data_pegawai['STATUS_PEGAWAI'],
					'LAT' => $data_pegawai['LAT'],
					'LON' => $data_pegawai['LON'],
					'SATKER_KELOLA' => $data_pegawai['SATKER_KELOLA'],
					'HARI_KERJA' => $data_pegawai['HARI_KERJA']
				);
			
				// Update data di tabel tbuser
				$this->db->where('userNip', $nip);
				$this->db->update('tbuser', $update_data);
			
				if ($this->db->affected_rows() > 0) {
					$ndata['success'] = 'Sukses mengupdate data.';
					$ndata['error'] = '';
				} else {
					$ndata['success'] = '';
					$ndata['error'] = 'No data was updated. Check if NIP exists in the database.';
				}
			} else {
				$ndata['success'] = '';
				$ndata['error'] = 'Gagal mengupdate data.';
			}
			
		} else {
			$ndata['success'] = '';
			$ndata['error'] = 'Gagal terkoneksi dengan API.';
		}
	
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($ndata));
	}
	public function getsatuankerja() {
		$this->loginapi();
		
		// URL endpoint untuk mengambil profil pegawai
		$profil_url = 'https://api.kemenag.go.id/v1/master/satker';
		
		// Ambil access_token dari session atau sesuai kebutuhan aplikasi Anda
		$access_token = $this->session->userdata('access_token');
		
		// Inisialisasi cURL
		$curl = curl_init();
		
		// Setel opsi cURL
		curl_setopt_array($curl, array(
			CURLOPT_URL => $profil_url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer ' . $access_token,
				'Content-Type: application/json; charset=utf-8'
			),
		));
		
		// Eksekusi permintaan dan simpan respons
		$response = curl_exec($curl);
		curl_close($curl);
		
		// Initialize the response array
		$ndata = array(
			'success' => '',
			'error' => ''
		);
		
		// Cek respons
		if ($response) {
			$json_response = json_decode($response, true);
			
			if (isset($json_response['data']) && is_array($json_response['data'])) {
				foreach ($json_response['data'] as $item) {
					// Extract data
					$kode_satuan_kerja = $item['KODE_SATUAN_KERJA'];
					$kode_atasan = $item['KODE_ATASAN'];
					$satuan_kerja = $item['SATUAN_KERJA'];
					
					// Prepare data for insertion
					$data = array(
						'KODE_SATUAN_KERJA' => $kode_satuan_kerja,
						'KODE_ATASAN' => $kode_atasan,
						'SATUAN_KERJA' => $satuan_kerja,
						'created_at' => date('Y-m-d H:i:s'),
						'updated_at' => date('Y-m-d H:i:s')
					);
					
					// Insert data into tbsatuankerja table
					$this->db->replace('tbsatuankerja', $data);
				}
				
				$ndata['success'] = 'Data successfully retrieved and stored.';
			} else {
				$ndata['error'] = 'Invalid response format or data not found.';
			}
		} else {
			$ndata['error'] = 'Failed to fetch data from API.';
		}
		
		return $ndata;
	}
	
	
}
