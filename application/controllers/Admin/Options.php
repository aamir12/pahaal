<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Options extends CI_Controller
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
		$data['options'] = $this->common_model->GetAllData('options',null,'id');
		
		$this->load->view('Admin/options_list',$data);
	}

	public function saveOption(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$insertData = $this->input->post();
		
		$insert['optionName'] = $insertData['optionName'];
		$insert['optionType'] = $insertData['optionType'];
		$this->common_model->InsertData('options',$insert);
		$optionId = $this->db->insert_id();
		$arrayOptions = [];
		foreach ($insertData['options'] as $option) {
			$optionData =[];
			$optionData['optionId'] = $optionId;
			$optionData['optionKey'] = $option['optionKey'];
			$optionData['sortOrder'] = $option['sortOrder'];
			array_push($arrayOptions,$optionData);
		}
		if(count($arrayOptions)>0){
			$this->db->insert_batch('options_values', $arrayOptions); 
		}
		$json['status'] = true;
		$json['message'] = 'Option Add Successfully';
		echo json_encode($json);
	}

	public function addOption(){
		$this->load->view('Admin/add_option');
	}

	public function editOption($id =null){
        if(!$id){
			redirect('Admin/options');
		}
        $data['id'] = $id;
		$this->load->view('Admin/edit_option',$data);
	}

	public function getOption(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$params = $this->input->post();
		$id = $params['id'];
		$option= $this->common_model->GetSingleData('options',array('id '=> $id));
		if($option){
			$data['option'] = $option;
			$data['Options'] = $this->common_model->GetAllData('options_values',array('optionId '=> $id),'id');
			$data['status'] = true;
		}else{
			$data['status'] = false;
		}
		echo json_encode($data);
	}

	public function getOptions(){
		$id = $this->input->post('optionid');
		$option= $this->common_model->GetSingleData('options',array('id '=> $id));
		$option_values = $this->common_model->GetAllData('options_values',array('optionId '=> $id),'id');
		$json = array(
			"type" => $option['optionType'],
			"label" => $option['optionName'],
			"value" => $option['id']
		);
		if(count($option_values)>0){
			 $json["option_value"] = $option_values;
		}
		echo json_encode($json);
		
	}

	


	public function updateOption(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$updateData = $this->input->post();
		$options = $updateData['options'];
		$id = $updateData['id'];
		unset($updateData['options']);
		unset($updateData['id']);
		$this->common_model->UpdateData('options',array('id'=>$id),$updateData);
		$this->common_model->DeleteData('options_values',array('optionId'=>$id));
		$arrayOptionsWithID = [];
		$arrayOptions = [];
		foreach ($options as $option) {
			$optionData =[];
			$optionData['optionId'] = $id;
			$optionData['optionKey'] = $option['optionKey'];
			$optionData['sortOrder'] = $option['sortOrder'];
			if(isset($option['id'])){
				$optionData['id'] = $option['id'];
				array_push($arrayOptionsWithID,$optionData);
			}else{
				array_push($arrayOptions,$optionData);
			}
			
		}
		if(count($arrayOptions)>0){
			$this->db->insert_batch('options_values', $arrayOptions); 
		}
		if(count($arrayOptionsWithID)>0){
			$this->db->insert_batch('options_values', $arrayOptionsWithID); 
		}

		$json['status'] = true;
		$json['message'] = "Option Update Successfully";
		echo json_encode($json);
	}

	public function deleteOption($id=null){
		if($id == 2){
			redirect('Admin/options');
		}
		$run = $this->common_model->DeleteData('options',array('id'=>$id));
	    $this->common_model->DeleteData('options_values',array('optionId'=>$id));
		if($run){
			$this->session->set_flashdata('msg','<div class="alert alert-success">Option has been deleted successfully!</div>');
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
		}
		redirect('Admin/options');
	}

	
}
