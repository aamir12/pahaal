<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->check_login();
	}

	public function check_login(){
		if(!$this->session->userdata('user_id')){
			redirect('Admin/login');
		}
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		
		$data['category']= $this->common_model->GetColumnName('category',NULL,array('id'),true);
		
		

		
		
		 
		 
		$this->load->view('Admin/index',$data);
	}
	
	public function logout(){
		session_destroy();
		redirect('Admin/login');
	}

	

}

?>