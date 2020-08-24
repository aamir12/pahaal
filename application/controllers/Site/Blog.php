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

		$blogs= $this->common_model->GetAllData('blog',null,'id','desc');
		$this->load->library('pagination');
		$config = [
		'base_url'=>base_url('blog'),
		'per_page' =>2,
		'total_rows' => count($blogs),
		"full_tag_open" => "<center><ul class='pagination'>",
		"full_tag_close" => "</ul></center>",
		"first_tag_open" => "<li>",
		"first_tag_close" => "</li>",
		"last_tag_open" => "<li>",
		"last_tag_close" => "</li>",
		"next_tag_open" => "<li> ",
		"next_tag_close" => "</li>",
		"prev_tag_open" => "<li>",
		"prev_tag_close" => "</li>",
		"num_tag_open" => "<li>",
		"num_tag_close" => "</li>",
		"cur_tag_open" => "<li class='active'><a>",
		"cur_tag_close" => "</a></li>",
		"use_page_numbers" => TRUE

		];


		$this->pagination->initialize($config);

		$limit = $config['per_page'];
		$offset = $this->uri->segment(3);
		$offset = ($offset=='' || filter_var($offset, FILTER_VALIDATE_INT) === false)?1:$offset;
		$cur_page = $offset;
		$offset -= 1;
		$per_page = $limit;
		$start = $offset * $per_page;
//$data['students'] = $this->Student_mdl->getAllstudent($limit,$start);


		
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