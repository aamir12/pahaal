<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Product extends CI_Controller
{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('product_model','PM');
		$this->load->model('category_model','CM');
	}

	public function index(){
		$params = $this->input->get();
		$data['params'] = $params;
		$data['category'] = $this->common_model->GetAllData('category',null,'id');
		$data['allCategory'] = $this->CM->getAllCategory();
		//showData($data['allCategory']);
		$data['colors'] =$this->common_model->GetAllData('options_values',array('optionId '=> COLOR_OPTIONID));
		$this->load->view('Site/shop',$data);
	}

	public function Shop_detail($pid){
		//$data['blogs'] = $this->common_model->GetAllData('blog',null,'id');
		$data['category'] = $this->common_model->GetAllData('category',null,'id');
		$product= $this->common_model->GetSingleData('products',array('id '=> $pid));
		if($product){
			$data['product'] = $product;
			$data['product_images']= 
			$this->common_model->GetAllData('gallery_image',array('product_id '=> $pid),'id');
			$data['product_options'] =$this->PM->getProductDetailOptions($pid);
			$data['product_releted'] =$this->PM->getRelatedProduct($pid,$product['category'],$product['subcategory'],10);
		     //showData($data);
		    $this->load->view('Site/shop_detail',$data);
		}else{
			return redirect('shop');
		}
		
	}

	public function getFilterProduct(){
		$params = $this->input->get();
		$limit = 12;
		$page = isset($params['page'])?$params['page']:'1';
		$params['pagination']['start'] = $page;
		$params['pagination']['limit'] = $limit;
		$products = $this->PM->filterProduct($params);
		$result = array(
			'status' => false
		);
		if($products['totalRecords']>0){
		   $result['status'] = true;
		   $html = '';
		   foreach ($products['result'] as $p) {
				$pImgUrl = site_url().'assets/img/defaultProduct.jpg';
				if($p['image']!=""){
			    	$pImgUrl = site_url().'assets/img/product_image/'.$p['image'];
				}
			   $html .='<div class="col-xl-4 col-md-6 col-grid-box ">
			   <div class="product-box product-wrap" >
				  <div class="img-wrapper">
					 <div class="lable-block">
					 </div>
					 <div class="front">
						<a href="'.site_url().'shop_detail/'.$p['prodId'].'">
						<img src="'.$pImgUrl.'" 
						   class="lazyload  img-fluid  w-100" style="width:298px;height:298px;" alt="'.$p['title'].'" >
						</a>
					 </div>
					 <div class="back">
						<a href="'.site_url().'shop_detail/'.$p['prodId'].'">
						<img src="'.$pImgUrl.'" 
						   class="lazyload  img-fluid  w-100" alt="'.$p['title'].'" style="width:298px;height:298px;" >
						</a>
					 </div>
					 <div class="cart-box">
						<a class="action--wishlist tile-actions--btn flex wishlist-btn" href="javascript:void(0)" title="Wishlist" data-product-handle="grocery-pista">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						</a>
						<a class="quick-view" data-lightbox="image-1" href="'.site_url().'assets/img/product_image/'.$p['image'].'"   title="'.$p['title'].'">
						<i class="ti-eye"></i>
						</a>
					 </div>
				  </div>
				  <div class="product-detail text-center ">
					 <div class="rating ">
						<span class="shopify-product-reviews-badge" ></span>
					 </div>
					 <div class="title-price">
						<a href="'.site_url().'shop_detail/'.$p['prodId'].'">
						   <h6 itemprop="name" class="">
							  '.$p['title'].'
						   </h6>
						</a>
						<h4  data-price="'.$p['prodPrice'].'" class="">
						   <span class="money">$'.$p['prodPrice'].'</span>
						</h4>
					 </div>
					 <div class="advanced_add_cart select-dropdown">
						<form method="post" action="/cart/add" class="product_grid_cart_form_1" id="product_grid_id_'.$p['id'].'">
						   <div class="qty-add-box d-flex">
							  <div class="qty-box d-flex">
								 <label>Qty</label>
								 <div class="input-group quantity">
									<input min="1" class="form-control input-number" type="number" id="quantity" name="quantity" value="1"/>
								 </div>
							  </div>
							  <input type="hidden" name="id" value="'.$p['id'].'" />
							  <input type="submit" value="add" class="btn btn-block btn-solid" />
						   </div>
						</form>
					 </div>
				  </div>
			   </div>
			</div>';
		   }
		   /////
		   
		
		   $result['productHtml'] = $html;
		   $result['pageHtml'] = web_pagination(true,false,$limit,$page,$products['totalRecords'],5);
		   $result['totalProducts'] = $products['totalRecords'];
		   $result['pageStart'] = $products['pStart'];
		   $result['pageEnd'] = $products['pEnd'];
		   $result['perPage'] = $limit;
		   //$result['sql'] = $products['sql'];
		}
		echo json_encode($result);
	}

}

?>
