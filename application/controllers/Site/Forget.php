<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Forget extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/forget',$data);
	}

	
	
}