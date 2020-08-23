<?php

defined('BASEPATH') OR exit('No direct script access allowed');



/**

 * 

 */

class Page_setting extends CI_Controller

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

		
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Admin/home_setting',$data);

	}

	public function sliderList(){

		

		$user_id = $this->session->userdata('user_id');

		$data['slider_content'] = $this->common_model->GetAllData('slider_content',null,'id');

		$this->load->view('Admin/slider_list',$data);

	}



	public function add_slider(){


       if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

					$config['upload_path']="assets/img/slider_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('image')) {

						$u_profile=$this->upload->data("file_name");

						$insert['image'] = $u_profile;

						

					}

				}

				$insert['heading_first']  = $this->input->post('heading_first');
				$insert['heading_second']  = $this->input->post('heading_second');
				$insert['heading_third']  = $this->input->post('heading_third');
				$insert['link']  = $this->input->post('link');
				$insert['content_side']  = $this->input->post('content_side');

				$run = $this->common_model->InsertData('slider_content',$insert);

				

					if($run){

						$this->session->set_flashdata('msg','<div class="alert alert-success">Slider has been created successfully!</div>');

						

						$json['status'] = 1;

					} else {

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

					}

				

		echo json_encode($json);



	}
	public function edit_slider(){

		        $update['heading_first'] =  $this->input->post('heading_first');
				$update['heading_second'] = $this->input->post('heading_second');
				$update['heading_third']= $this->input->post('heading_third');
				$update['link'] =  $this->input->post('link');
				$update['content_side'] = $this->input->post('content_side');

				$id = $this->input->post('id');



				$selectData= $this->common_model->GetSingleData('slider_content',array('id '=> $id));



					if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){

					$config['upload_path']="assets/img/slider_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('image')) {

						$u_profile=$this->upload->data("file_name");

						$update['image'] = $u_profile;

						unlink("assets/img/slider_image/".$selectData['image']);

						

					}

				   }



					$run = $this->common_model->UpdateData('slider_content',array('id'=>$id),$update);



					if($run){

						

						$this->session->set_flashdata('msg','<div class="alert alert-success">Slider has been updated successfully!</div>');

						

						$json['status'] = 1;

						

					} else {

						

						$json['msg'] = '<div class="alert alert-danger">Something went wrong, try again later!</div>';

						$json['status'] = 0;

						

					}	

				

				

			

		

		echo json_encode($json);

	}

	public function delete_silder($id=null){

		$selectData= $this->common_model->GetSingleData('slider_content',array('id '=> $id));

		$run = $this->common_model->DeleteData('slider_content',array('id'=>$id));

		

		if($run){

			unlink("assets/img/slider_image/".$selectData['image']);

			$this->session->set_flashdata('msg','<div class="alert alert-success">Slider has been deleted successfully!</div>');

			

		} else {

			

			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');

			

			

		}

		

		redirect('admin/slider-setting');

	}


	public function updateHomeBanner(){

		

 			$id= $this->input->post('id');

 			$page_content= $this->common_model->GetSingleData('page_content',array('id'=>$id));
			
            $update['f_b_top_heading'] = $this->input->post('f_b_top_heading');
            $update['f_b_heading'] = $this->input->post('f_b_heading');
            $update['f_b_link'] = $this->input->post('f_b_link');
            $update['s_b_top_heading'] = $this->input->post('s_b_top_heading');
            $update['s_b_heading'] = $this->input->post('s_b_heading');
            $update['s_b_link'] = $this->input->post('s_b_link');
            $update['t_b_top_heading'] = $this->input->post('t_b_top_heading');
            $update['t_b_heading'] = $this->input->post('t_b_heading');
            $update['t_b_link'] = $this->input->post('t_b_link');
            $update['fi_b_top_heading'] = $this->input->post('fi_b_top_heading');
            $update['fi_b_heading'] = $this->input->post('fi_b_heading');
            $update['fi_b_link'] = $this->input->post('fi_b_link');
            $update['fiv_b_top_heading'] = $this->input->post('fiv_b_top_heading');
            $update['fiv_b_heading'] = $this->input->post('fiv_b_heading');
            $update['fiv_b_link'] = $this->input->post('fiv_b_link');

            $update['six_b_top_heading'] = $this->input->post('six_b_top_heading');
            $update['six_b_heading'] = $this->input->post('six_b_heading');
            $update['six_b_link'] = $this->input->post('six_b_link');

            $update['sev_b_top_heading'] = $this->input->post('sev_b_top_heading');
            $update['sev_b_heading'] = $this->input->post('sev_b_heading');
            $update['sev_b_link'] = $this->input->post('sev_b_link');

            $update['ei_b_top_heading'] = $this->input->post('ei_b_top_heading');
            $update['ei_b_heading'] = $this->input->post('ei_b_heading');
            $update['ei_b_link'] = $this->input->post('ei_b_link');

            $update['ni_b_top_heading'] = $this->input->post('ni_b_top_heading');
            $update['ni_b_heading'] = $this->input->post('ni_b_heading');
            $update['ni_b_link'] = $this->input->post('ni_b_link');




			if(isset($_FILES['f_b']['name']) && !empty($_FILES['f_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('f_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['f_b'] = $u_profile;

						
						if($page_content['f_b']!=''){
							unlink("assets/img/default_image/".$page_content['f_b']);
						}

						

						

					}

		    }
		    if(isset($_FILES['s_b']['name']) && !empty($_FILES['s_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('s_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['s_b'] = $u_profile;

						
						if($page_content['s_b']!=''){
							unlink("assets/img/default_image/".$page_content['s_b']);
						}

						

						

					}

		    }
		     if(isset($_FILES['t_b']['name']) && !empty($_FILES['t_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('t_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['t_b'] = $u_profile;

						
						if($page_content['t_b']!=''){
							unlink("assets/img/default_image/".$page_content['t_b']);
						}

						

						

					}

		    }

		    if(isset($_FILES['fi_b']['name']) && !empty($_FILES['fi_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('fi_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['fi_b'] = $u_profile;

						
						if($page_content['fi_b']!=''){
							unlink("assets/img/default_image/".$page_content['fi_b']);
						}

						

						

					}

		    }
		    if(isset($_FILES['fiv_b']['name']) && !empty($_FILES['fiv_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('fiv_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['fiv_b'] = $u_profile;

						
						if($page_content['fiv_b']!=''){
							unlink("assets/img/default_image/".$page_content['fiv_b']);
						}

						

						

					}

		    }

		    if(isset($_FILES['six_b']['name']) && !empty($_FILES['six_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('six_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['six_b'] = $u_profile;

						
						if($page_content['six_b']!=''){
							unlink("assets/img/default_image/".$page_content['six_b']);
						}

						

						

					}

		    }


		    if(isset($_FILES['sev_b']['name']) && !empty($_FILES['sev_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('sev_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['sev_b'] = $u_profile;

						
						if($page_content['sev_b']!=''){
							unlink("assets/img/default_image/".$page_content['sev_b']);
						}

						

						

					}

		    }

		    if(isset($_FILES['ei_b']['name']) && !empty($_FILES['ei_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('ei_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['ei_b'] = $u_profile;

						
						if($page_content['ei_b']!=''){
							unlink("assets/img/default_image/".$page_content['ei_b']);
						}

						

						

					}

		    }

		       if(isset($_FILES['ni_b']['name']) && !empty($_FILES['ni_b']['name'])){

					$config['upload_path']="assets/img/default_image/";

					$config['allowed_types'] = 'jpeg|gif|jpg|png';

					$config['encrypt_name']=true;

					$this->load->library("upload",$config);

					

					if ($this->upload->do_upload('ni_b')) {

						$u_profile=$this->upload->data("file_name");

						$update['ni_b'] = $u_profile;

						
						if($page_content['ni_b']!=''){
							unlink("assets/img/default_image/".$page_content['ni_b']);
						}

						

						

					}

		    }




		   $run = $this->common_model->UpdateData('page_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Home Page content Updated successfully.

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

 	public function headingContentUpdate(){

		

		

		

 			$id= $this->input->post('id');

			 

			

			$update['t_s_top_heading'] = $this->input->post('t_s_top_heading');

			$update['t_s_heading'] = $this->input->post('t_s_heading');

			$update['s_s_top_heading'] = $this->input->post('s_s_top_heading');

			$update['s_s_heading'] = $this->input->post('s_s_heading');

			$update['blog_s_top_heading'] = $this->input->post('blog_s_top_heading');
			$update['blog_s_heading'] = $this->input->post('blog_s_heading');

			

            $run = $this->common_model->UpdateData('page_content',array('id' =>$id),$update);



			if($run){

				

				$json['msg'] = '<div class="alert alert-success alert-dismissible">

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

					<strong>Success!</strong> Heading Setting Updated successfully.

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