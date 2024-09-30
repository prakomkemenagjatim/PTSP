<?php
class Sitecontroller extends CI_Controller
{
	public function __construct()
    {
		parent::__construct();
die('');
		$this->load->library('session');
    }
	
	public function isLogin(){
		$UserID = $this->session->userdata('ULogin');
		if($UserID == ''){
			redirect(base_url('login'));
		}
	}
	
	public function _releasesession(){
		$this->session->unset_userdata(array("ULogin"=>''));
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