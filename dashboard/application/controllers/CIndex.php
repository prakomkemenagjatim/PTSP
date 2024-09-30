<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class CIndex extends Admincontroller {

	public function __construct()
	{
       	parent::__construct();
       	$this->isLogin();
        $this->load->helper('app_helper');
        $this->load->model('m_data');
    }
	public function index()
	{
		
		$data['title'] = 'Dashboard';
		$data['userSess'] = userSess();
		$data['disp'] = $this->m_data->get_disposisi('vwsuratmasuk')->result();
		$data['unit'] = $this->m_data->pejabat()->result();
		$userSess = $data['userSess'];
		$where ='';
		$this->load->view('index',$data);
	}

	public function getsatkeraktif() {
		// Load the database library
		$this->load->database();
	
		// Query to fetch distinct KODE_SATKER_2 and SATKER_2 from the vwsatkeraktif view
		$query = $this->db->select('KODE_SATKER_2, SATKER_2')
						  ->from('vwsatkeraktif')
						  ->get();
	
		// Check if data was fetched successfully
		if ($query->num_rows() > 0) {
			// Fetch the result as an array
			$data = $query->result_array();
	
			// Format the data
			$formattedData = array_map(function($satker) {
				return array(
					'KODE_SATKER' => $satker['KODE_SATKER_2'],
					'SATKER' => $satker['SATKER_2']
				);
			}, $data);
	
			// Data fetched successfully
			$responseData = $formattedData;
		} else {
			// Handle error here, if needed
			$responseData = array('status' => 'error', 'message' => 'Failed to fetch data.');
		}
	
		// Return JSON response
		$this->output->set_content_type('application/json')->set_output(json_encode($responseData));
	}
	

	public function getprovinsi() {
		// Load the database library
		$this->load->database();
	
		// Query to fetch provinces data from the reg_provinces table
		$query = $this->db->select('id, name')
						  ->from('reg_provinces')
						  ->get();
	
		// Check if data was fetched successfully
		if ($query->num_rows() > 0) {
			// Fetch the result as an array
			$data = $query->result_array();
	
			// Format the data
			$formattedData = array_map(function($province) {
				return array('id' => $province['id'], 'name' => $province['name']);
			}, $data);
	
			// Data fetched successfully
			$responseData = $formattedData;
		} else {
			// Handle error here, if needed
			$responseData = array('status' => 'error', 'message' => 'Failed to fetch data.');
		}
	
		// Return JSON response
		$this->output->set_content_type('application/json')->set_output(json_encode($responseData));
	}
	
	public function getkabupaten($provinceId) {
		// Load the database library
		$this->load->database();
	
		// Query to fetch kabupaten/kota data from the reg_regencies table for the given provinceId
		$query = $this->db->select('id, name')
						  ->from('reg_regencies')
						  ->where('province_id', $provinceId)
						  ->get();
	
		// Check if data was fetched successfully
		if ($query->num_rows() > 0) {
			// Fetch the result as an array
			$data = $query->result_array();
	
			// Format the data
			$formattedData = array_map(function($kabupaten) use ($provinceId) {
				return array(
					'id' => $kabupaten['id'],
					'province_id' => $provinceId,
					'name' => $kabupaten['name']
				);
			}, $data);
	
			// Data fetched successfully
			$responseData = $formattedData;
		} else {
			// Handle error here, if needed
			$responseData = array('status' => 'error', 'message' => 'Failed to fetch data for provinceId: ' . $provinceId);
		}
	
		// Return JSON response
		$this->output->set_content_type('application/json')->set_output(json_encode($responseData));
	}
	
	
		
	

	public function fetch_and_pull() {
        // Path to your Git repository
        $repoPath = '/www/wwwroot/ptsp.kemenagngawi.or.id';

        // Personal access token
        $token = 'your_personal_access_token';

        // Function to run shell commands
        function runCommand($command, $repoPath) {
            chdir($repoPath);
            $output = shell_exec($command);
            return $output;
        }

        // Set the remote URL with token
        //runCommand("git remote set-url origin https://$token@github.com/username/repo.git", $repoPath);
		runCommand("git remote set-url origin https://@github.com/mahfudds/santun.git", $repoPath);

        // Run Git commands
        $fetchOutput = runCommand('git fetch origin 2>&1', $repoPath);
        $pullOutput = runCommand('git pull origin main 2>&1', $repoPath);
		$lastCommit = runCommand('git log --pretty=format:"%h - %an, %ar : %s"', $repoPath);
		$repoSize = runCommand('git count-objects -vH', $repoPath);



        // Prepare data for view
        $data['fetchOutput'] = $fetchOutput;
        $data['pullOutput'] = $pullOutput;
		$data['lastCommit'] = $lastCommit;
		$data['repoSize'] = $repoSize;
		$data['userSess'] = userSess();

		
        // Load the view and pass the data
        $this->load->view('git_output', $data);
    }
	public function dispo(){
	    $data['title'] = 'Disposisi';
		$data['userSess'] = userSess();
		$data['disp'] = $this->m_data->get_disposisi('vwsuratmasuk')->result();
		$data['unit'] = $this->m_data->pejabat()->result();
		$userSess = $data['userSess'];
		$where ='';
		$this->load->view('dispo',$data);
	}
	
	public function disposisi_aksi()
	{	
		$dispo_ke = isset($_POST['check_list'])?$_POST['check_list']:'';
		$noreg = $this->input->post('surat_id'); 
		$disposisicatatan=isset($_POST['isi'])?$_POST['isi']:'';
	
		if ($dispo_ke == NULL || $disposisicatatan == NULL) {
			$this->session->set_flashdata('error', 'Tujuan dan Isi Perintah tidak boleh kosong! Silahkan Disposisi Ulang');
			redirect('index.php/disposisi');
		} else {
		    foreach ($dispo_ke as $dis){
			    $this->m_data->disp_add($dis);
		    }
			$this->session->set_flashdata('sukses', 'Disposisi Surat Sukses');
			redirect('index.php/disposisi');
		}
	}
	
	public function logout(){
		loguser('Logout');
		$this->_releasesession();
		redirect(base_url('index.php/login'));
	}

}
