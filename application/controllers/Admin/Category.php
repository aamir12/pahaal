<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

 * 

 */

class Category extends CI_Controller

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

		$data['category'] = $this->common_model->GetAllData('category',null,'id');

		$this->load->view('Admin/category_list',$data);

	}



	public function add_category(){



		$this->form_validation->set_rules('cat_name','Category name','trim|required');

		

		if($this->form_validation->run()){

			

				if(isset($_FILES['category_image']['name']) && !empty($_FILES['category_image']['name'])){

					$config['upload_path']="assets/img/category_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('category_image')) {

						$u_profile=$this->upload->data("file_name");

						$insert['category_image'] = $u_profile;

						

					}

				}

				$insert['cat_name'] = $cat_name = $this->input->post('cat_name');

				

				

				$catData= $this->common_model->GetSingleData('category',array('cat_name'=>$cat_name));

				if(empty($catData)){

					$run = $this->common_model->InsertData('category',$insert);

				

					if($run){

						

						$this->session->set_flashdata('msg','<div class="alert alert-success">Category has been created successfully!</div>');

						

						$json['status'] = 1;

					} else {

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

					}

				}else{

					$json['msg'] = '<div class="alert alert-danger">Category name already exists!</div>';

					$json['status'] = 0;

				}

				





				

			

		} else {

			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';

			$json['status'] = 0;

		}



		echo json_encode($json);



	}



	public function edit_category(){

		$this->form_validation->set_rules('cat_name','Category name','trim|required');

		if($this->form_validation->run()){

			

			    $insert['cat_name'] = $cat_name = $this->input->post('cat_name');

				$id = $this->input->post('id');



				$catData= $this->common_model->GetSingleData('category',array('cat_name'=>$cat_name,'id !='=> $id));

				

				if(empty($catData)){

					$selectData= $this->common_model->GetSingleData('category',array('id '=> $id));



					if(isset($_FILES['category_image']['name']) && !empty($_FILES['category_image']['name'])){

					$config['upload_path']="assets/img/category_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('category_image')) {

						$u_profile=$this->upload->data("file_name");

						$insert['category_image'] = $u_profile;

						unlink("assets/img/category_image/".$selectData['category_image']);

						

					}

				   }



					$run = $this->common_model->UpdateData('category',array('id'=>$id),$insert);



					if($run){

						

						$this->session->set_flashdata('msg','<div class="alert alert-success">Category has been updated successfully!</div>');

						

						$json['status'] = 1;

						

					} else {

						

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

						

					}	

				}else{

					$json['msg'] = '<div class="alert alert-danger">Category name already exists!</div>';

					$json['status'] = 0;

				}

				

			

		} else {

			

			$json['status'] = 0;

			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';

			

		}

		echo json_encode($json);

	}

	

	

	public function delete_category($id=null){
		$condition='cat_id="'.$id.'"';
		$subcategorydata = $this->common_model->GetAllData('subcategory',$condition,'id');
		
		if(count($subcategorydata) == 0){
			$selectData= $this->common_model->GetSingleData('category',array('id '=> $id));
			$run = $this->common_model->DeleteData('category',array('id'=>$id));
			if($run){
				if($selectData['category_image']!=''){
					unlink("assets/img/category_image/".$selectData['category_image']);
				}

				$this->session->set_flashdata('msg','<div class="alert alert-success">Category has been deleted successfully!</div>');

				

			} else {

				

				$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');

				

				

			}

			

			
		}else{
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Delete subcategory first!</div>');
		}
		redirect('admin/category-management');

	}

	
	

}
