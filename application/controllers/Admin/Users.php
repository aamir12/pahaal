<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Users extends CI_Controller
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
		$data['users'] = $this->common_model->GetAllData('users',array('is_deleted'=>0),'id');
		$this->load->view('Admin/users_list',$data);
	}


	public function delete_user($id=null){
	    $insert['is_deleted']=1;
		$run = $this->common_model->UpdateData('users',array('id'=>$id),$insert);
		
		if($run){
			
			$this->session->set_flashdata('msg','<div class="alert alert-success">User has been deleted successfully!</div>');
			
		} else {
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
			
			
		}
		
		redirect('admin/users-management');
	}

	public function deactive_user($id=null){
	    $insert['status']=0;
		$run = $this->common_model->UpdateData('users',array('id'=>$id),$insert);
		
		if($run){
			
			$this->session->set_flashdata('msg','<div class="alert alert-success">User has been Deactive successfully!</div>');
			
		} else {
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
			
			
		}
		
		redirect('admin/users-management');
	}


	public function active_user($id=null){
	    $insert['status']=1;
		$run = $this->common_model->UpdateData('users',array('id'=>$id),$insert);
		
		if($run){
			
			$this->session->set_flashdata('msg','<div class="alert alert-success">User has been Active successfully!</div>');
			
		} else {
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
			
			
		}
		
		redirect('admin/users-management');
	}
}