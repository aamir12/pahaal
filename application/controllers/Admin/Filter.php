<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Filter extends CI_Controller
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
		$data['filters'] = $this->common_model->GetAllData('filter',null,'id');
		
		$this->load->view('Admin/filter_list',$data);
	}

	public function saveFilter(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$insertData = $this->input->post();
		
		$insert['filtergroup'] = $insertData['filtergroup'];
		$insert['sortOrder'] = $insertData['sortOrder'];
		$this->common_model->InsertData('filter',$insert);
		$filterId = $this->db->insert_id();
		$filterOptions = [];
		foreach ($insertData['filters'] as $filter) {
			$filterData =[];
			$filterData['filterId'] = $filterId;
			$filterData['filterOption'] = $filter['filterOption'];
			$filterData['sortOrder'] = $filter['sortOrder'];
			array_push($filterOptions,$filterData);
		}
		if(count($filterOptions)>0){
			$this->db->insert_batch('filter_options', $filterOptions); 
		}
		$json['status'] = true;
		$json['message'] = 'Filter Add Successfully';
		echo json_encode($json);
	}

	public function addFilter(){
		$this->load->view('Admin/add_filter');
	}

	public function editFilter($id =null){
        if(!$id){
			redirect('Admin/filter');
		}
        $data['id'] = $id;
		$this->load->view('Admin/edit_filter',$data);
	}

	public function getFilter(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$params = $this->input->post();
		$id = $params['id'];
		$filter= $this->common_model->GetSingleData('filter',array('id '=> $id));
		if($filter){
			$data['filter'] = $filter;
			$data['filterOptions'] = $this->common_model->GetAllData('filter_options',array('filterId '=> $id),'id');
			$data['status'] = true;
		}else{
			$data['status'] = false;
		}
		echo json_encode($data);
	}


	public function updateFilter(){
		$_POST = json_decode(file_get_contents('php://input'), true);
		$updateData = $this->input->post();
		$filters = $updateData['filters'];
		$id = $updateData['id'];
		unset($updateData['filters']);
		unset($updateData['id']);
		$this->common_model->UpdateData('filter',array('id'=>$id),$updateData);
		$this->common_model->DeleteData('filter_options',array('filterId'=>$id));
		$filterOptionsWithID = [];
		$filterOptions = [];
		foreach ($filters as $filter) {
			$filterData =[];
			$filterData['filterId'] = $id;
			$filterData['filterOption'] = $filter['filterOption'];
			$filterData['sortOrder'] = $filter['sortOrder'];
			if(isset($filter['id'])){
				$filterData['id'] = $filter['id'];
				array_push($filterOptionsWithID,$filterData);
			}else{
				array_push($filterOptions,$filterData);
			}
			
		}
		if(count($filterOptions)>0){
			$this->db->insert_batch('filter_options', $filterOptions); 
		}
		if(count($filterOptionsWithID)>0){
			$this->db->insert_batch('filter_options', $filterOptionsWithID); 
		}

		$json['status'] = true;
		$json['message'] = "Filter Update Successfully";
		echo json_encode($json);
	}

	public function deleteFilter($id=null){
		$run = $this->common_model->DeleteData('filter',array('id'=>$id));
	    $this->common_model->DeleteData('filter_options',array('filterId'=>$id));
		if($run){
			$this->session->set_flashdata('msg','<div class="alert alert-success">Filter has been deleted successfully!</div>');
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
		}
		redirect('Admin/filter');
	}
}
