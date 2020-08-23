<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Blog extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function index(){

	}

	public function Blog_page(){

		//$data['page'] =$page;
		$data['blogs'] = $this->common_model->GetAllData('blog',null,'id','desc');

		$data['blogs_limited']= $this->common_model->GetAllDataLimit('blog',NULL,'id','desc','3');
		
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/blog',$data);
	}

	public function Blog_detail(){
		
		$id =$this->uri->segment(2);
		if($id!=''){
			$data['blog_detail']= $this->common_model->GetSingleData('blog',array('id'=>$id));
		
		     $this->load->view('Site/blog_detail',$data);
		}else{
			redirect('blog');
		}
		
	}

	

	

}

?>