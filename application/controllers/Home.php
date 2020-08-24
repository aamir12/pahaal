<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$data['category'] = $this->common_model->GetAllData('category',null,'cat_name','asc');
		$data['slider_content'] = $this->common_model->GetAllData('slider_content',null,'id');
		$data['blogs'] = $this->common_model->GetAllData('blog',null,'id');
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));

		$data['new_products']= $this->common_model->GetAllDataLimit('products',null,'id','desc','10');
		$special_condition="special='on'";
		$data['special_products']= $this->common_model->GetAllDataLimit('products',$special_condition,'id','desc','10');

		$data['special_products_all']= $this->common_model->GetAllData('products',$special_condition,'id','desc');

        $men_product_condition="category='5'";
		$data['men_products']= $this->common_model->GetAllData('products',$men_product_condition,'id','desc');

		$women_product_condition="category='6'";
		$data['women_products']= $this->common_model->GetAllData('products',$women_product_condition,'id','desc');

		$boy_product_condition="category='7'";
		$data['boy_products']= $this->common_model->GetAllData('products',$boy_product_condition,'id','desc');

		$girl_product_condition="category='8'";
		$data['girl_products']= $this->common_model->GetAllData('products',$girl_product_condition,'id','desc');
		


		$this->load->view('Site/index',$data);
	}

	
	public function logout(){
		session_destroy();
		redirect('Admin/login');
	}

	

}

?>