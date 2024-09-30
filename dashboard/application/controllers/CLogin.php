<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CLogin extends CI_Controller {
	const SSO_URL     = 'https://sso.kemenag.go.id/auth';
  	const SSO_SIGNIN  = self::SSO_URL.'/signin';
  	const SSO_SIGNOUT = self::SSO_URL.'/signout';
  	const SSO_VERIFY  = self::SSO_URL.'/verify';
  	const APP_ID      = '28ae30444be0cc36f9e2e971c8d77350';

	public function __construct()
	{
       	parent::__construct();
       	 $this->load->helper('app_helper');
       	
    }
    
	public function index()
	{
		$this->load->view('login2');
	}
	
	public function login2()
	{
		$this->load->view('login2');
	}
	
	public function callback()
	{
		$token = $this->input->get('token') ?? '';
		if ($token) {
			$verify_url = self::SSO_VERIFY;
			$ch = curl_init($verify_url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
			curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'Authorization: Bearer ' . $token]);

			$response = curl_exec($ch);

			if (curl_errno($ch)) {
				echo "CURL ERROR: " . curl_error($ch);
				curl_close($ch);
				exit();
			}
			curl_close($ch);
			$ret = json_decode($response, true);

			if ($ret['status'] == 200) {
				$pegawai = $ret['pegawai'];
				$session_data = array(
					'nip_lama'  => $pegawai['NIP_LAMA'],
					'nip'       => $pegawai['NIP'],
					'jabatan'   => $pegawai['KETERANGAN_JABATAN'],
					'nama'      => $pegawai['NAMA'],
					'photo'     => $pegawai['PHOTO'],
					'sso_role'  => $pegawai['SSO_ROLE'],
					'satker1'   => $pegawai['KODE_SATUAN_KERJA'],
					'satker2'   => $pegawai['KODE_SATKER_2'],
					'satker3'   => $pegawai['KODE_SATKER_3'],
					'satker4'   => $pegawai['KODE_SATKER_4'],
					'satker5'   => $pegawai['KODE_SATKER_5'],
					'type'      => 'user',
				);
				$this->session->set_userdata($session_data);

				// Execute query to fetch user data
				$sql = "SELECT * FROM vwuser WHERE userAktif = 1 AND userNip = ?";
				$qry = $this->db->query($sql, array($pegawai['NIP']));

				if ($qry) {
					$user = $qry->row_array();
					$cnt = $qry->num_rows();
					$userpass = $user['userPassword'];
					$pass = $ipass . sufixpass();

					if ($cnt > 0) {
						// Set additional session data
						$sessionData = array(
							'userId' => $user['userId'],
							'userPassword' => $user['userPassword'],
							'userType' => $user['userType'],
							'userNama' => $user['userNama'],
							'userJabatan' => $user['userJabatan'],
							'userTingkat' => $user['userTingkat'],
							'userAktif' => $user['userAktif'],
							'userProv' => $user['userProv'],
							'userKabko' => $user['userKabko'],
							'createTgl' => $user['createTgl'],
							'createUser' => $user['createUser'],
							'updateTgl' => $user['updateTgl'],
							'updateUser' => $user['updateUser'],
							'userPhoto' => $user['userPhoto'],
							'userWA' => $user['userWA'],
							'userKua' => $user['userKua'],
							'userNip' => $user['userNip'],
							'logged_in' => TRUE,
							'NIP' => $user['NIP'],
							'NIP_BARU' => $user['NIP_BARU'],
							'NAMA' => $user['NAMA'],
							'NAMA_LENGKAP' => $user['NAMA_LENGKAP'],
							'AGAMA' => $user['AGAMA'],
							'TEMPAT_LAHIR' => $user['TEMPAT_LAHIR'],
							'TANGGAL_LAHIR' => $user['TANGGAL_LAHIR'],
							'JENIS_KELAMIN' => $user['JENIS_KELAMIN'],
							'PENDIDIKAN' => $user['PENDIDIKAN'],
							'KODE_LEVEL_JABATAN' => $user['KODE_LEVEL_JABATAN'],
							'LEVEL_JABATAN' => $user['LEVEL_JABATAN'],
							'PANGKAT' => $user['PANGKAT'],
							'GOL_RUANG' => $user['GOL_RUANG'],
							'TMT_CPNS' => $user['TMT_CPNS'],
							'TMT_PANGKAT' => $user['TMT_PANGKAT'],
							'MASAKERJA_TAHUN' => $user['MASAKERJA_TAHUN'],
							'MASAKERJA_BULAN' => $user['MASAKERJA_BULAN'],
							'TIPE_JABATAN' => $user['TIPE_JABATAN'],
							'KODE_JABATAN' => $user['KODE_JABATAN'],
							'TAMPIL_JABATAN' => $user['TAMPIL_JABATAN'],
							'TMT_JABATAN' => $user['TMT_JABATAN'],
							'KODE_SATKER_1' => $user['KODE_SATKER_1'],
							'SATKER_1' => $user['SATKER_1'],
							'KODE_SATKER_2' => $user['KODE_SATKER_2'],
							'SATKER_2' => $user['SATKER_2'],
							'KODE_SATKER_3' => $user['KODE_SATKER_3'],
							'SATKER_3' => $user['SATKER_3'],
							'KODE_SATKER_4' => $user['KODE_SATKER_4'],
							'SATKER_4' => $user['SATKER_4'],
							'KODE_SATKER_5' => $user['KODE_SATKER_5'],
							'SATKER_5' => $user['SATKER_5'],
							'SATUAN_KERJA' => $user['SATUAN_KERJA']
						);
						

						$this->session->set_userdata($sessionData);

						// Log session data
						log_message('info', 'Session data after login: ' . print_r($this->session->userdata(), true));

						$json['success'] = 'Login sukses';
						logUser('Login');

						// Redirect to root folder
						redirect(base_url());
					} else {
						$json['error'] = 'Username atau password salah';
						// Redirect to auth page
						redirect('auth');
					}
				} else {
					$json['error'] = 'Query failed';
					// Redirect to auth page
					redirect('auth');
				}
			} else {
				// If not valid, redirect to auth page
				redirect('auth');
			}
		} else {
			die('Something Wrong');
		}
	}

	
	public function auth(){
		$iuser = isset($_POST['user']) ? addslashes($_POST['user']) : '';
		$ipass = isset($_POST['pass']) ? addslashes($_POST['pass']) : '';
		
		$json = array();
		
		if ($iuser == '') {
			$json['error'] = 'Username tidak boleh kosong!';
		} elseif ($ipass == '') {
			$json['error'] = 'Password tidak boleh kosong!';
		} else {
			$sql = "SELECT * FROM vwuser WHERE userAktif = 1 AND userId = ?";
			$qry = $this->db->query($sql, array($iuser));
			
			if ($qry) {
				$user = $qry->row_array();
				$cnt = $qry->num_rows();
				$userpass = $user['userPassword'];
				$pass = $ipass . sufixpass();
				
				if ($cnt > 0 && md5($pass) == $userpass) {
					// Set session data
					$sessionData = array(
						'userId' => $user['userId'],
						'userPassword' => $user['userPassword'],
						'userType' => $user['userType'],
						'typeNama' => $user['typeNama'],
						'userNama' => $user['userNama'],
						'userJabatan' => $user['userJabatan'],
						'userTingkat' => $user['userTingkat'],
						'userAktif' => $user['userAktif'],
						'userProv' => $user['userProv'],
						'userKabko' => $user['userKabko'],
						'createTgl' => $user['createTgl'],
						'createUser' => $user['createUser'],
						'updateTgl' => $user['updateTgl'],
						'updateUser' => $user['updateUser'],
						'userPhoto' => $user['userPhoto'],
						'userWA' => $user['userWA'],
						'userKua' => $user['userKua'],
						'userNip' => $user['userNip'],
						'NIP' => $user['NIP'],
						'NIP_BARU' => $user['NIP_BARU'],
						'NAMA' => $user['NAMA'],
						'NAMA_LENGKAP' => $user['NAMA_LENGKAP'],
						'AGAMA' => $user['AGAMA'],
						'TEMPAT_LAHIR' => $user['TEMPAT_LAHIR'],
						'TANGGAL_LAHIR' => $user['TANGGAL_LAHIR'],
						'JENIS_KELAMIN' => $user['JENIS_KELAMIN'],
						'PENDIDIKAN' => $user['PENDIDIKAN'],
						'KODE_LEVEL_JABATAN' => $user['KODE_LEVEL_JABATAN'],
						'LEVEL_JABATAN' => $user['LEVEL_JABATAN'],
						'PANGKAT' => $user['PANGKAT'],
						'GOL_RUANG' => $user['GOL_RUANG'],
						'TMT_CPNS' => $user['TMT_CPNS'],
						'TMT_PANGKAT' => $user['TMT_PANGKAT'],
						'MASAKERJA_TAHUN' => $user['MASAKERJA_TAHUN'],
						'MASAKERJA_BULAN' => $user['MASAKERJA_BULAN'],
						'TIPE_JABATAN' => $user['TIPE_JABATAN'],
						'KODE_JABATAN' => $user['KODE_JABATAN'],
						'TAMPIL_JABATAN' => $user['TAMPIL_JABATAN'],
						'TMT_JABATAN' => $user['TMT_JABATAN'],
						'KODE_SATKER_1' => $user['KODE_SATKER_1'],
						'SATKER_1' => $user['SATKER_1'],
						'KODE_SATKER_2' => $user['KODE_SATKER_2'],
						'SATKER_2' => $user['SATKER_2'],
						'KODE_SATKER_3' => $user['KODE_SATKER_3'],
						'SATKER_3' => $user['SATKER_3'],
						'KODE_SATKER_4' => $user['KODE_SATKER_4'],
						'SATKER_4' => $user['SATKER_4'],
						'KODE_SATKER_5' => $user['KODE_SATKER_5'],
						'SATKER_5' => $user['SATKER_5'],
						'SATUAN_KERJA' => $user['SATUAN_KERJA'],
						'logged_in' => TRUE
					);
					
					$this->session->set_userdata($sessionData);
					
					// Log session data
					log_message('info', 'Session data after login: ' . print_r($this->session->userdata(), true));
					
					$json['success'] = 'Login sukses';
					logUser('Login');
				} else {
					$json['error'] = 'Username atau password salah';
				}
			} else {
				$json['error'] = 'Query failed';
			}
		}
		
		echo json_encode($json);
	}
	
}
