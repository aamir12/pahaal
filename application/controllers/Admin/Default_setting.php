<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

 * 

 */

class Default_setting extends CI_Controller

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

		

		$this->load->view('Admin/default_setting');

	}

	public function updateSiteIdentity(){

		

		

		$this->form_validation->set_rules('site_title','Site Title','trim|required');

 		



 		if($this->form_validation->run()==true){

 			$id= $this->input->post('id');

			$default_content = $this->common_model->GetColumnName('default_content',array('id'=>$id),array('logo','site_icon')); 

			

			$update['site_title'] = $this->input->post('site_title');

			

            

            



			if(isset($_FILES['logo']['name']) && !empty($_FILES['logo']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('logo')) {

						$u_profile=$this->upload->data("file_name");

						$update['logo'] = $u_profile;

						unlink("assets/img/default_image/".$default_content['logo']);

						

					}

		    }



		    if(isset($_FILES['site_icon']['name']) && !empty($_FILES['site_icon']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('site_icon')) {

						$u_profile=$this->upload->data("file_name");

						$update['site_icon'] = $u_profile;

						unlink("assets/img/default_image/".$default_content['site_icon']);

						

					}

		    }



			



			

			$run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Site Identity Updated successfully.

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

 	public function menuUpdate(){

		

		

		

 			$id= $this->input->post('id');

			 

			

			$update['home_page'] = $this->input->post('home_page');

			$update['about_page'] = $this->input->post('about_page');

			$update['shop_page'] = $this->input->post('shop_page');

			$update['blog_page'] = $this->input->post('blog_page');

			$update['contact_page'] = $this->input->post('contact_page');

			

            $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Menu Setting Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}

		



		echo json_encode($json);



 	}



 	public function footerContentUpdate(){

		

		

		$this->form_validation->set_rules('footer_content','Footer Content','trim|required');

		$this->form_validation->set_rules('copy_right_content','Copy Right Content','trim|required');

 		



 		if($this->form_validation->run()==true){

 			$id= $this->input->post('id');

			$default_content = $this->common_model->GetColumnName('default_content',array('id'=>$id),array('footer_logo ')); 

			

			$update['footer_content'] = $this->input->post('footer_content');

			$update['copy_right_content'] = $this->input->post('copy_right_content');

			

            

            





			if(isset($_FILES['footer_logo']['name']) && !empty($_FILES['footer_logo']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('footer_logo')) {

						$u_profile=$this->upload->data("file_name");

						$update['footer_logo'] = $u_profile;

						unlink("assets/img/default_image/".$default_content['footer_logo']);

						

					}

		    }



			



			

			$run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Footer Content Updated successfully.

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



 	public function paymentDetailUpdate(){

		

		

		$this->form_validation->set_rules('publishable_key','Publishable Key','trim|required');

		$this->form_validation->set_rules('secret_key','Secret Key','trim|required');

 		



 		if($this->form_validation->run()==true){

 			$id= $this->input->post('id');

 			$update['gateway_mode'] = $this->input->post('gateway_mode');

			$update['publishable_key'] = $this->input->post('publishable_key');

			$update['secret_key'] = $this->input->post('secret_key');

			

			

            $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Payment Gateway Details Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}



 		}else {

			

			$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  '.validation_errors().'

					</div>';

			$json['status'] = 0;

		}



		echo json_encode($json);



 	}



 	public function socialMediaUpdate(){

		

		

		

 			$id= $this->input->post('id');

			 

			

			$update['facebook_link'] = $this->input->post('facebook_link');

			$update['twitter_link'] = $this->input->post('twitter_link');

			$update['instagram_link'] = $this->input->post('instagram_link');

			$update['linkedin_link'] = $this->input->post('linkedin_link');

			

			

            $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Social Media Setting Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}

		



		echo json_encode($json);



 	}



 	public function contactDetailsUpdate(){

		

		

		

 			$id= $this->input->post('id');

			 

			

			$update['phone_number'] = $this->input->post('phone_number');

			$update['email'] = $this->input->post('email');

			$update['address'] = $this->input->post('address');

			

			

			

            $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Contact Details Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}

		



		echo json_encode($json);



 	}



 	public function topBannerUpdate(){

		

		

		

 			$id= $this->input->post('id');

			$default_content = $this->common_model->GetColumnName('default_content',array('id'=>$id),array('top_banner')); 

			

			$update['top_banner_status'] = $this->input->post('top_banner_status');

			

            

            



			if(isset($_FILES['top_banner']['name']) && !empty($_FILES['top_banner']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('top_banner')) {

						$u_profile=$this->upload->data("file_name");

						$update['top_banner'] = $u_profile;

						unlink("assets/img/default_image/".$default_content['top_banner']);

						

					}

		    }



		    $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Top Banner Setting Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}

		



		echo json_encode($json);



 	}



 	public function loaderUpdate(){

		

		

		

 			$id= $this->input->post('id');

			$default_content = $this->common_model->GetColumnName('default_content',array('id'=>$id),array('loader_image')); 

			

			$update['loader_status'] = $this->input->post('loader_status');

			

            

            



			if(isset($_FILES['loader_image']['name']) && !empty($_FILES['loader_image']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('loader_image')) {

						$u_profile=$this->upload->data("file_name");

						$update['loader_image'] = $u_profile;

						unlink("assets/img/default_image/".$default_content['loader_image']);

						

					}

		    }



		    $run = $this->common_model->UpdateData('default_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Loader Setting Updated successfully.

					</div>';

				$json['status'] = 1;

			} else {

				

				$json['msg'] = '<div class="alert alert-danger alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Error!</strong>  Something went to wrong.

					</div>';

				$json['status'] = 0;

			}

		



		echo json_encode($json);



 	}



}