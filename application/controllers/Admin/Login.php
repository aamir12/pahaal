<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$this->check_login();
	}
	public function check_login(){
		if($this->session->userdata('user_id')){
			redirect('Admin/home');
		}
	}
	public function index(){
		$data['default_content']= $this->common_model->GetSingleData('default_content',array('id'=>1));
		$this->load->view('Admin/login',$data);
	}
	public function do_login(){
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		if($this->form_validation->run()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$run = $this->common_model->GetSingleData('admin',array('email' =>$email ,'password'=>$password));
			if($run){
				$this->session->set_userdata('user_id',$run['id']);
					$this->session->set_flashdata('msg','<div class="alert alert-success">Welcome '.$run['fname'].' '.$run['lname'].'</div>');
                redirect('Admin/home');
			} else {
				$this->session->set_flashdata('msg','<div class="alert alert-danger">username or password incorrect.</div>');
				redirect('Admin/login');
			}
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">'.validation_errors().'</div>');
			redirect('Admin/login');
		}
	}
}
?>