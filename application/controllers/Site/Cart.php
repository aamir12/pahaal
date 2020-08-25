<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Cart extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('product_model','PM');
	}

	public function index(){
		$data['page_content']= $this->common_model->GetSingleData('page_content',array('id'=>1));
		$this->load->view('Site/cart',$data);
	}

	public function addToCart(){
		$data = $this->input->post();
		$result = array(
			'status' => false,
			'code' => 404
		);
		$product = $this->common_model->GetSingleData('products',array('id'=>$data['pid']));
        if($product){
		    $pid = $product['id'];
		    $result['status'] = true;

		    if(isset($data['product_cartquntity'])){
              $quantity = $data['product_cartquntity'];
            }else{
              $quantity = 1;
			} 
			
			if(isset($data['option'])){
				$option = array_filter($data['option']);
			  }else{
				$option = array();
			}

   

		   $insert = array(
				'id'=>$pid,
				'price'=>$product['price'],
				'qty'=>$quantity,
				'name'=>$product['title']
			);
		
			$product_options = $this->PM->getProductOptions($pid);
			foreach ($product_options as $product_option) {
				if (empty($option[$product_option['product_option_id']])) {
					$result['status'] = false;
					$result['code'] = 406;
					$result['error']['option'][$product_option['product_option_id']] = $product_option['name'].' is required';
				}
			}
			if(!$result['status']){
			   echo json_encode($result);
               die(); 
			}
			
			$insert['options'] = $option;
			$result['code'] = 200;
			$this->cart->insert($insert);
			$result['cart'] =  $this->cart->contents();
		   //$result['product'] = $product;//rm
		   //;
		   //$result['product_option'] = $product_options; //rm
		}
		echo json_encode($result);
	}

	
	
}
