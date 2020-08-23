<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/*
*/
/*
*/
error_reporting(0);
class Profile extends CI_Controller
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
		$this->load->view('Admin/profile');
	} 
 	
 	public function updateProfile(){
		
		$user_id = $this->session->userdata('user_id');
		$this->form_validation->set_rules('fname','First name','trim|required');
 		$this->form_validation->set_rules('lname','Last name','trim|required');

 		if($this->form_validation->run()==true){
			$user = $this->common_model->GetColumnName('admin',array('id'=>$user_id),array('profile_image')); 
			
			$fname=$insert['fname'] = $this->input->post('fname');
			$lname=$insert['lname'] = $this->input->post('lname');
            
            if($_FILES['profile_image']['name']){
				$config['upload_path']="assets/img/profile_image/";
				$config['allowed_types'] = 'jpeg|gif|jpg|png';
				$config['encrypt_name']=true;
				$this->load->library("upload",$config);
				if ($this->upload->do_upload('profile_image')) {
				$u_profile=$this->upload->data("file_name");
				$insert['profile_image'] = $u_profile;
				unlink("assets/img/profile_image/".$user['profile_image']);
				} else {
			       
				   $json['msg'] = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  '.$this->upload->display_errors().'.
					</div>';
			        $json['status'] = 0;

				}
			}

			
			$run = $this->common_model->UpdateData('admin',array('id' =>$user_id),$insert);

			if($run){
				$json['name'] =$fname.' '.$lname;
				$json['msg'] = '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong>  Your Profile Update successfully.
					</div>';
				$json['status'] = 1;
			} else {
				
				$json['msg'] = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  Something went to wrong.
					</div>';
				$json['status'] = 0;
			}
		} else {
			
			$json['msg'] = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  '.validation_errors().'
					</div>';
			$json['status'] = 0;
		}

		echo json_encode($json);

 	}
 	public function changePassword(){

 		$user_id = $this->session->userdata('user_id');
		$users_data= $this->common_model->GetSingleData('admin',array('id'=>$user_id));
 		$this->form_validation->set_rules('admin_pass','Current password','required');
 		$this->form_validation->set_rules('New_Password','Password','required|min_length[6]');
 		$this->form_validation->set_rules('Confirm_Password','Confirm','required|matches[New_Password]');

 		if($this->form_validation->run()==true){

			$admin_pass = $this->input->post('admin_pass');
			$New_Password = $this->input->post('New_Password');

 			if($users_data['password'] == $admin_pass){

 				$run = $this->common_model->UpdateData('admin',array('id' =>$user_id),array('password'=>$New_Password));

 				if($run){
                    $json['msg'] = '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong>  Your password update successfully.
					</div>';
				    $json['status'] = 1;

				}else {
					$json['msg'] = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  Something went to wrong.
					</div>';
				    $json['status'] = 0;
				}
 			}
 			else{

 				$json['msg'] = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  Current password is not matched.
					</div>';
				$json['status'] = 0;
 			}
 		}
 		else{
			$json['msg'] = '<div class="alert alert-danger alert-dismissible">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong>  '.validation_errors().'
			</div>';
			$json['status'] = 0;
		 }
		 
		 echo json_encode($json);
 	}
 	


}


 ?>