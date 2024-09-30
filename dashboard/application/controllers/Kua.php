<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include(SITE_URI.'application/controllers/Admincontroller'.EXT);

class Kua extends Admincontroller {

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
    public function datakua()
	{
		aksesmenu(0);
		$page = 'kua/data_kua';
		$data['content']=$page;
		$data['title'] = 'Data KUA';
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}

    public function layanankua()
	{
		aksesmenu(0);
		$page = 'kua/data_layanankua';
		$data['content']=$page;
		$data['title'] = 'Data Layanan KUA';
		$data['userSess'] = userSess();
		$this->load->view('index',$data);
	}

    function getDatakua(){
		aksesmenu(0);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'Kodefikasi_KUA';
		$order = isset($_POST['order']) ? strval($_POST['Kodefikasi_KUA']) : 'desc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'Nama_KUA';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		$where = " where ". $icari . " like '%$ncari%' "; 
		$result = array();
		$sql = "select * from kua ";
		$query = $this->db->query($sql.$where);
		$result["total"] = $query->num_rows();
		$rs = $sql.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
        
		$items = $rs->result_array();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}
    function getLayanankua(){
		aksesmenu(0);
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$sort = isset($_POST['sort']) ? $_POST['sort'] : 'no';
		$order = isset($_POST['order']) ? strval($_POST['no']) : 'asc';
		$icari = isset($_POST['icari']) ? $_POST['icari'] : 'jenis_layanan';
		$ncari = isset($_POST['ncari']) ? addslashes($_POST['ncari']) : '';
		$offset = ($page-1)*$rows;
		$where = '';
		$where = " where ". $icari . " like '%$ncari%' "; 
		$result = array();
		$sql = "select * from layanankua ";
		$query = $this->db->query($sql.$where);
		$result["total"] = $query->num_rows();
		$rs = $sql.$where;
		$rs = $this->db->query($rs . " order by ". $sort . " ". $order . " limit $offset,$rows");
        
		$items = $rs->result_array();
		$result["rows"] = $items;
		
		die(json_encode($result));
	}

    function editKua(){
        aksesmenu(0);
        $userlogin = $this->session->userdata('userId');
        
        $Kodefikasi_KUA = isset($_POST['Kodefikasi_KUA']) ? $_POST['Kodefikasi_KUA'] : '';
        $Kode_Satker = isset($_POST['Kode_Satker']) ? $_POST['Kode_Satker'] : '';
        $Kode_Kanwil = isset($_POST['Kode_Kanwil']) ? $_POST['Kode_Kanwil'] : '';
        $Nama_KUA = isset($_POST['Nama_KUA']) ? $_POST['Nama_KUA'] : '';
        $Nama_Provinsi = isset($_POST['Nama_Provinsi']) ? $_POST['Nama_Provinsi'] : '';
        $Nama_Kabupaten = isset($_POST['Nama_Kabupaten']) ? $_POST['Nama_Kabupaten'] : '';
        $Nama_Kecamatan = isset($_POST['Nama_Kecamatan']) ? $_POST['Nama_Kecamatan'] : '';
        $Alamat = isset($_POST['Alamat']) ? $_POST['Alamat'] : '';
        $Latitude = isset($_POST['Latitude']) ? $_POST['Latitude'] : '';
        $Longitude = isset($_POST['Longitude']) ? $_POST['Longitude'] : '';
        $Luas_Tanah = isset($_POST['Luas_Tanah']) ? $_POST['Luas_Tanah'] : '';
        $Status_Tanah = isset($_POST['Status_Tanah']) ? $_POST['Status_Tanah'] : '';
        $Tipologi_KUA = isset($_POST['Tipologi_KUA']) ? $_POST['Tipologi_KUA'] : '';
        $Nomor_Telpon = isset($_POST['Nomor_Telpon']) ? $_POST['Nomor_Telpon'] : '';
        $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $admin = isset($_POST['admin']) ? $_POST['admin'] : '';
        $nomor_wa = isset($_POST['nomor_wa']) ? $_POST['nomor_wa'] : '';
        
        $json = array();  
        
        if (
            $Kodefikasi_KUA == '' || $Kode_Satker == '' || $Kode_Kanwil == '' || $Nama_KUA == '' || $Nama_Provinsi == '' ||
            $Nama_Kabupaten == '' || $Nama_Kecamatan == '' || $Alamat == '' || $Latitude == '' || $Longitude == '' ||
            $Luas_Tanah == '' || $Status_Tanah == '' || $Tipologi_KUA == '' || $Nomor_Telpon == '' || $Email == '' ||
            $admin == '' || $nomor_wa == '' 
        ) {
            $json['status'] = 2;
        } else {
            loguser('Edit KUA ' . $Kodefikasi_KUA);
            $result = $this->db->query("
                UPDATE `kua` SET 
                    `Kode_Satker` = '$Kode_Satker', 
                    `Kode_Kanwil` = '$Kode_Kanwil', 
                    `Nama_KUA` = '$Nama_KUA', 
                    `Nama_Provinsi` = '$Nama_Provinsi', 
                    `Nama_Kabupaten` = '$Nama_Kabupaten', 
                    `Nama_Kecamatan` = '$Nama_Kecamatan', 
                    `Alamat` = '$Alamat', 
                    `Latitude` = '$Latitude', 
                    `Longitude` = '$Longitude', 
                    `Luas_Tanah` = '$Luas_Tanah', 
                    `Status_Tanah` = '$Status_Tanah', 
                    `Tipologi_KUA` = '$Tipologi_KUA', 
                    `Nomor_Telpon` = '$Nomor_Telpon', 
                    `Email` = '$Email', 
                    `admin` = '$admin', 
                    `nomor_wa` = '$nomor_wa'
                WHERE `Kodefikasi_KUA` = '$Kodefikasi_KUA'
            ");
            
            if ($result) {
                $json['status'] = 1;
            } else {
                $json['status'] = 3;
            }
        }
        
        die(json_encode($json));
    }

    function editLayanankua(){
        aksesmenu(0);
        $userlogin = $this->session->userdata('userId');
        
        $no = isset($_POST['no']) ? $_POST['no'] : '';
        $jenis_layanan = isset($_POST['jenis_layanan']) ? $_POST['jenis_layanan'] : '';
        $syarat = isset($_POST['syarat']) ? $_POST['syarat'] : '';
        
        $json = array();  
        
        if ($no == '' || $jenis_layanan == '' || $syarat == '') {
            $json['status'] = 2;
        } else {
            loguser('Edit Layanan KUA ' . $no);
            $result = $this->db->query("
                UPDATE `layanankua` SET 
                    `jenis_layanan` = '$jenis_layanan', 
                    `syarat` = '$syarat'
                WHERE `no` = '$no'
            ");
            
            if ($result) {
                $json['status'] = 1;
            } else {
                $json['status'] = 3;
            }
        }
        
        die(json_encode($json));
    }
    
    function delKua(){
		aksesmenu(0);
		$Kodefikasi_KUA=isset($_POST['Kodefikasi_KUA'])?$_POST['Kodefikasi_KUA']:'';
		loguser('Hapus KUA '.$Kodefikasi_KUA);
		$json=array();
		if ($Kodefikasi_KUA == ''){
			$json['status']=2;
		} else {
			$result = $this->db->query("delete from kua where Kodefikasi_KUA = '$Kodefikasi_KUA'");
			if ($result){
				$json['status']=1;
			} else {
				$json['status']=3;
			}
			
		}
		die(json_encode($json));
	}

    function delLayanankua(){
        aksesmenu(0);
        $no = isset($_POST['no']) ? $_POST['no'] : '';
        loguser('Hapus Layanan KUA ' . $no);
        $json = array();
        
        if ($no == ''){
            $json['status'] = 2;
        } else {
            $result = $this->db->query("DELETE FROM layanankua WHERE no = '$no'");
            if ($result){
                $json['status'] = 1;
            } else {
                $json['status'] = 3;
            }
        }
        
        die(json_encode($json));
    }
    

    function postKua(){
        aksesmenu(0);
        $userlogin = $this->session->userdata('userId');
        $Kodefikasi_KUA = isset($_POST['Kodefikasi_KUA']) ? $_POST['Kodefikasi_KUA'] : '';
        $Kode_Satker = isset($_POST['Kode_Satker']) ? $_POST['Kode_Satker'] : '';
        $Kode_Kanwil = isset($_POST['Kode_Kanwil']) ? $_POST['Kode_Kanwil'] : '';
        $Nama_KUA = isset($_POST['Nama_KUA']) ? $_POST['Nama_KUA'] : '';
        $Nama_Provinsi = isset($_POST['Nama_Provinsi']) ? $_POST['Nama_Provinsi'] : '';
        $Nama_Kabupaten = isset($_POST['Nama_Kabupaten']) ? $_POST['Nama_Kabupaten'] : '';
        $Nama_Kecamatan = isset($_POST['Nama_Kecamatan']) ? $_POST['Nama_Kecamatan'] : '';
        $Alamat = isset($_POST['Alamat']) ? $_POST['Alamat'] : '';
        $Latitude = isset($_POST['Latitude']) ? $_POST['Latitude'] : '';
        $Longitude = isset($_POST['Longitude']) ? $_POST['Longitude'] : '';
        $Luas_Tanah = isset($_POST['Luas_Tanah']) ? $_POST['Luas_Tanah'] : '';
        $Status_Tanah = isset($_POST['Status_Tanah']) ? $_POST['Status_Tanah'] : '';
        $Tipologi_KUA = isset($_POST['Tipologi_KUA']) ? $_POST['Tipologi_KUA'] : '';
        $Nomor_Telpon = isset($_POST['Nomor_Telpon']) ? $_POST['Nomor_Telpon'] : '';
        $Email = isset($_POST['Email']) ? $_POST['Email'] : '';
        $admin = isset($_POST['admin']) ? $_POST['admin'] : '';
        $nomor_wa = isset($_POST['nomor_wa']) ? $_POST['nomor_wa'] : '';
        
        $json = array();  
        
        if (
            $Kodefikasi_KUA == '' || $Kode_Satker == '' || $Kode_Kanwil == '' || $Nama_KUA == '' || $Nama_Provinsi == '' ||
            $Nama_Kabupaten == '' || $Nama_Kecamatan == '' || $Alamat == '' || $Latitude == '' || $Longitude == '' ||
            $Luas_Tanah == '' || $Status_Tanah == '' || $Tipologi_KUA == '' || $Nomor_Telpon == '' || $Email == '' ||
            $admin == '' || $nomor_wa == ''
        ) {
            $json['status'] = 2;
        } else {
            loguser('Simpan User ' . $Kodefikasi_KUA);
            $result = $this->db->query("
                INSERT INTO `kua` (
                    `Kodefikasi_KUA`, `Kode_Satker`, `Kode_Kanwil`, `Nama_KUA`, `Nama_Provinsi`, `Nama_Kabupaten`, `Nama_Kecamatan`, 
                    `Alamat`, `Latitude`, `Longitude`, `Luas_Tanah`, `Status_Tanah`, `Tipologi_KUA`, `Nomor_Telpon`, `Email`, `admin`, `nomor_wa`
                ) VALUES (
                    '$Kodefikasi_KUA', '$Kode_Satker', '$Kode_Kanwil', '$Nama_KUA', '$Nama_Provinsi', '$Nama_Kabupaten', '$Nama_Kecamatan', 
                    '$Alamat', '$Latitude', '$Longitude', '$Luas_Tanah', '$Status_Tanah', '$Tipologi_KUA', '$Nomor_Telpon', '$Email', '$admin', '$nomor_wa'
                )
            ");
            
            if ($result) {
                $json['status'] = 1;
            } else {
                $json['status'] = 3;
            }
        }
        
        die(json_encode($json));
    }
    function postLayanankua(){
        aksesmenu(0);
        $userlogin = $this->session->userdata('userId');
        $no = isset($_POST['no']) ? $_POST['no'] : '';
        $jenis_layanan = isset($_POST['jenis_layanan']) ? $_POST['jenis_layanan'] : '';
        $syarat = isset($_POST['syarat']) ? $_POST['syarat'] : '';
        
        $json = array();  
        
        if ($no == '' || $jenis_layanan == '' || $syarat == '') {
            $json['status'] = 2;
        } else {
            loguser('Simpan Layanan KUA ' . $no);
            $result = $this->db->query("
                INSERT INTO `layanankua` (
                    `no`, `jenis_layanan`, `syarat`
                ) VALUES (
                    '$no', '$jenis_layanan', '$syarat'
                )
            ");
            
            if ($result) {
                $json['status'] = 1;
            } else {
                $json['status'] = 3;
            }
        }
        
        die(json_encode($json));
    }
    
    
}