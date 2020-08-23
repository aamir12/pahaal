<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

 * 

 */

class Blog extends CI_Controller

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

		$data['blog'] = $this->common_model->GetAllData('blog',null,'id');

		$this->load->view('Admin/blog_list',$data);

	}



	public function add_blog(){



		$this->form_validation->set_rules('title','Title name','trim|required');

		

		if($this->form_validation->run()){

			

				if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])){

					$config['upload_path']="assets/img/blog_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('blog_image')) {

						$u_profile=$this->upload->data("file_name");

						$insert['blog_image'] = $u_profile;

						

					}

				}

				$insert['title']  =$this->input->post('title');
				$insert['content'] = htmlentities($this->input->post('content'), ENT_QUOTES);
				$insert['cdate']  = date('Y-m-d H:i:s');

				

					$run = $this->common_model->InsertData('blog',$insert);

				

					if($run){

						

						$this->session->set_flashdata('msg','<div class="alert alert-success">Blog has been created successfully!</div>');

						

						$json['status'] = 1;

					} else {

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

					}

				

				





				

			

		} else {

			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';

			$json['status'] = 0;

		}



		echo json_encode($json);



	}



	public function edit_blog(){

		$this->form_validation->set_rules('title','Title','trim|required');

		if($this->form_validation->run()){

			

			    $insert['title'] =  $this->input->post('title');
			    $insert['content'] = htmlentities($this->input->post('content'), ENT_QUOTES);

				$id = $this->input->post('id');



				

					$selectData= $this->common_model->GetSingleData('blog',array('id '=> $id));



					if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])){

					$config['upload_path']="assets/img/blog_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('blog_image')) {

						$u_profile=$this->upload->data("file_name");

						$insert['blog_image'] = $u_profile;

						if($selectData['blog_image']!=''){
							unlink("assets/img/blog_image/".$selectData['blog_image']);
						}

						

						

					}

				   }



					$run = $this->common_model->UpdateData('blog',array('id'=>$id),$insert);



					if($run){

						

						$this->session->set_flashdata('msg','<div class="alert alert-success">Blog has been updated successfully!</div>');

						

						$json['status'] = 1;

						

					} else {

						

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

						

					}	

				

				

			

		} else {

			

			$json['status'] = 0;

			$json['msg'] = '<div class="alert alert-danger">'.validation_errors().'</div>';

			

		}

		echo json_encode($json);

	}

	

	

	public function delete_blog($id=null){

		$selectData= $this->common_model->GetSingleData('blog',array('id '=> $id));

		$run = $this->common_model->DeleteData('blog',array('id'=>$id));

		

		if($run){
			if($selectData['blog_image']){
                unlink("assets/img/blog_image/".$selectData['blog_image']);
             }
			

			$this->session->set_flashdata('msg','<div class="alert alert-success">Blog has been deleted successfully!</div>');

			

		} else {

			

			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');

			

			

		}

		

		redirect('admin/blog-management');

	}



	



	

	

}