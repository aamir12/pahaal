<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Home extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('product_model','PM');
	}

	public function index(){
		$data['category'] = $this->common_model->GetAllData('category',null,'cat_name','asc');
		$data['slider_content'] = $this->common_model->GetAllData('slider_content',null,'id');
		$data['blogs'] = $this->common_model->GetAllData('blog',null,'id');
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));

		$data['new_products']= $this->PM->getProductsData(null,'p.id','desc','10');
		$special_condition="p.special='on'";
		$data['special_products']= $this->PM->getProductsData($special_condition,'p.id','desc','10');
		$data['special_products_all']= $this->PM->getProductsData($special_condition,'p.id','desc');

        $men_product_condition="p.category='5'";
		$data['men_products']= $this->PM->getProductsData($men_product_condition,'p.id','desc');

		$women_product_condition="p.category='6'";
		$data['women_products']= $this->PM->getProductsData($women_product_condition,'p.id','desc');

		$boy_product_condition="p.category='7'";
		$data['boy_products']= $this->PM->getProductsData($boy_product_condition,'p.id','desc');

		$girl_product_condition="p.category='8'";
		$data['girl_products']= $this->PM->getProductsData($girl_product_condition,'p.id','desc');
		$this->load->view('Site/index',$data);
	}

	
	public function logout(){
		session_destroy();
		redirect('Admin/login');
	}

	

}

?>
