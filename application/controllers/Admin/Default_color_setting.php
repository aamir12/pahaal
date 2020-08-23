<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Default_color_setting extends CI_Controller
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
		$data['default_color_content']= $this->common_model->GetSingleData('default_color',array('id'=>1));
		$this->load->view('Admin/default_color_setting',$data);
	}

	public function updateColorSetting(){
		
		
			$this->form_validation->set_rules('primary_color','Primary color','trim|required');
		    $this->form_validation->set_rules('top_header','Top Header color','trim|required');
		    $this->form_validation->set_rules('top_header_bg','Top Header Background color','trim|required');
		    $this->form_validation->set_rules('header','Header color','trim|required');
		    $this->form_validation->set_rules('header_bg','Header Background color','trim|required');
		    $this->form_validation->set_rules('footer','Footer color','trim|required');
 			$this->form_validation->set_rules('footer_bg','Footer Background color','trim|required');
 			$this->form_validation->set_rules('bottom_footer','Bottom Footer color','trim|required');
 			$this->form_validation->set_rules('bottom_footer_bg','Bottom Footer Background color','trim|required');

 		    if($this->form_validation->run()==true){

 		    	$id= $this->input->post('id');
			    $update['primary_color'] = $this->input->post('primary_color');
				$update['top_header'] = $this->input->post('top_header');
				$update['top_header_bg'] = $this->input->post('top_header_bg');
				$update['header'] = $this->input->post('header');
				$update['header_bg'] = $this->input->post('header_bg');
				$update['footer'] = $this->input->post('footer');
				$update['footer_bg'] = $this->input->post('footer_bg');
				$update['bottom_footer'] = $this->input->post('bottom_footer');
				$update['bottom_footer_bg'] = $this->input->post('bottom_footer_bg');
				
	            $run = $this->common_model->UpdateData('default_color',array('id' =>$id),$update);

				if($run){
					
					$json['msg'] = '<div class="alert alert-success alert-dismissible">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						<strong>Success!</strong> Color Setting Updated successfully.
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
}