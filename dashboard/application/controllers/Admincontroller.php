<?php
date_default_timezone_set('Asia/Jakarta');
class Admincontroller extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
		$this->load->library('session');
    }
	
	public function isLogin(){
		$UserID = $this->session->userdata('userId');
	    if (substr($this->getcurrenturl(),strlen($this->getcurrenturl())-1,1) == '?'){
	        $urldirect = substr($this->getcurrenturl(),0,strlen($this->getcurrenturl())-1);  
	    } else {
	        $urldirect = $this->getcurrenturl();  
	    }
		
		 
		if($UserID == ''){
			redirect(base_url('index.php/login?redirect='.$urldirect));
		}
	}
	

	private function getcurrenturl(){
		$currentURL = current_url();
		$params = $_SERVER['QUERY_STRING'];
		$fullURL = $currentURL . '?' . $params;
		return $fullURL;
	}
	public function _releasesession(){
		$this->session->unset_userdata(array("userId"=>''));
		$this->session->sess_destroy();
	}
	
	public function pagination($url,$uri_segment,$num,$limit,$offset){
		$this->load->library('pagination');
		
		$config['base_url'] = $url;
		$config['total_rows'] = $num;
		$config['per_page'] = $limit;
		$config['uri_segment'] = $uri_segment;
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['next_link'] = '&gt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['prev_link'] = '&lt;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['first_link'] = '&laquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['last_link'] = '&raquo;';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = ' <li class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$this->pagination->initialize($config);		
		return $this->pagination->create_links();
	}
	
}   
?>