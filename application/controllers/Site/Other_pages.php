<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Other_pages extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/about',$data);
	}

	public function Contactus(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/contact',$data);
	}

	public function Termscondition(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/terms_condition',$data);
	}
	public function Privacypolicy(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/privacy_policy',$data);
	}

	
}