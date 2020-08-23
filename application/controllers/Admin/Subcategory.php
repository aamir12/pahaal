<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Subcategory extends CI_Controller
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
		$type = $this->session->userdata('type');
		
		$data['category'] = $this->common_model->GetAllData('category',null,'id');
		$data['subcategory'] = $this->common_model->GetAllData('subcategory',null,'id');
		
		
		$this->load->view('Admin/subcategory_list',$data);
	}

	public function delete_subcategory($id=null){
	
		$run = $this->common_model->DeleteData('subcategory',array('id'=>$id));
		
		if($run){
			
			$this->session->set_flashdata('msg','<div class="alert alert-success">Subcategory has been deleted successfully.</div>');
			
		} else {
			
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later.</div>');
			
			
		}
		
		redirect('admin/subcategory-management');
	}


	public function add_subcategory(){

		$this->form_validation->set_rules('subcategory','subcategory name','trim|required');
		
		if($this->form_validation->run()){
			
				$insert['subcategory'] = $subcategory = $this->input->post('subcategory');
				$insert['cat_id'] = $cat_id = $this->input->post('cat_id');
				
				
				$catData= $this->common_model->GetSingleData('subcategory',array('subcategory'=>$subcategory,'cat_id' => $cat_id));
				if(empty($catData)){
					$run = $this->common_model->InsertData('subcategory',$insert);
				
					if($run){
						
						$this->session->set_flashdata('msg','<div class="alert alert-success">subcategory has been created successfully.</div>');
						
						$json['status'] = 1;
					} else {
						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';
						$json['status'] = 0;
					}
				}else{
					$json['msg'] = '<div class="alert alert-danger">subcategory name already exists.</div>';
					$json['status'] = 0;
				}
				


				
			
		} else {
			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			$json['status'] = 0;
		}

		echo json_encode($json);

	}

	public function edit_subcategory(){
		$this->form_validation->set_rules('subcategory','Subcategory name','trim|required');
		if($this->form_validation->run()){
			
			    $insert['subcategory'] = $subcategory = $this->input->post('subcategory');
			    $insert['cat_id'] = $cat_id = $this->input->post('cat_id');
				$id = $this->input->post('id');

				$catData= $this->common_model->GetSingleData('subcategory',array('subcategory'=>$subcategory,'id !='=> $id,'cat_id' => $cat_id));
				
				if(empty($catData)){
					$run = $this->common_model->UpdateData('subcategory',array('id'=>$id),$insert);
				
					if($run){
						
						$this->session->set_flashdata('msg','<div class="alert alert-success">Subcategory has been updated successfully.</div>');
						
						$json['status'] = 1;
						
					} else {
						
						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later.</div>';
						$json['status'] = 0;
						
					}	
				}else{
					$json['msg'] = '<div class="alert alert-danger">Category name already exists.</div>';
					$json['status'] = 0;
				}
				
			
		} else {
			
			$json['status'] = 0;
			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';
			
		}
		echo json_encode($json);
	}
}