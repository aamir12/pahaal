<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Coupon extends CI_Controller
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
		$data['coupon'] = $this->common_model->GetAllData('coupon',null,'id');
		
		$this->load->view('Admin/coupon_list',$data);
	}

	public function add_coupon(){

		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('discount','Discount','trim|required');
		$this->form_validation->set_rules('expiry_date','Expiry Date','trim|required');
		//$this->form_validation->set_rules('description','Description','trim|required');
		
		if($this->form_validation->run()){
			
				$insert['title'] = $title = $this->input->post('title');
				$insert['discount']  = $this->input->post('discount');
				$insert['expiry_date']  = $this->input->post('expiry_date');
				$insert['description']  = $this->input->post('description');

				$planData= $this->common_model->GetSingleData('coupon',array('title'=>$title));
				if(empty($planData)){
					$run = $this->common_model->InsertData('coupon',$insert);
				
					if($run){
						
						$this->session->set_flashdata('msg','<div class="alert alert-success">Coupon has been created successfully!</div>');
						
						$json['status'] = 1;
					} else {
						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';
						$json['status'] = 0;
					}
				}else{
					$json['msg'] = '<div class="alert alert-danger">Coupon already exists!</div>';
					$json['status'] = 0;
				}
				


				
			
		} else {
			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			$json['status'] = 0;
		}

		echo json_encode($json);

	}

	public function edit_coupon(){
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('discount','Discount','trim|required');
		$this->form_validation->set_rules('expiry_date','Expiry Date','trim|required');
		//$this->form_validation->set_rules('description','Description','trim|required');

		if($this->form_validation->run()){
			
			    $update['title'] = $title = $this->input->post('title');
				$update['discount']  = $this->input->post('discount');
				$update['expiry_date']  = $this->input->post('expiry_date');
				$update['description']  = $this->input->post('description');
				$id = $this->input->post('id');

				$coupanData= $this->common_model->GetSingleData('coupon',array('title'=>$title,'id !='=> $id));
				
				if(empty($coupanData)){
					$run = $this->common_model->UpdateData('coupon',array('id'=>$id),$update);

					if($run){
						
						$this->session->set_flashdata('msg','<div class="alert alert-success">Coupon has been updated successfully!</div>');
						
						$json['status'] = 1;
						
					} else {
						
						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';
						$json['status'] = 0;
						
					}	
				}else{
					$json['msg'] = '<div class="alert alert-danger">Coupon already exists!</div>';
					$json['status'] = 0;
				}
				
			
		} else {
			
			$json['status'] = 0;
			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			
		}
		echo json_encode($json);
	}

	public function delete_coupon($id=null){
	
		$run = $this->common_model->DeleteData('coupon',array('id'=>$id));
		
		if($run){
			
			$this->session->set_flashdata('msg','<div class="alert alert-success">Coupon has been deleted successfully!</div>');
			
		} else {
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
			
			
		}
		
		redirect('admin/coupon-management');
	}

	
}