<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
    public function getProductOptions($productId){
		$product_option_data = array();
		$this->db->select('*');
		$this->db->from('product_option');
		$this->db->join('options', 'product_option.productOptionId = options.id','left');
		$this->db->where('product_option.productId',$productId);
		$query = $this->db->get();
		if($query->num_rows()) {	
			$product_option_query = $query->result_array();
			foreach ($product_option_query as $product_option) {
				$product_option_value_data = array();
				$this->db->select('*,ov.id as optionValueId');
				$this->db->from('product_option_value as pov');
				$this->db->join('options_values as ov', 'pov.productOptionValueId = ov.id','left');
				$this->db->where('pov.productOptionId',$product_option['productOptionId']);
				$this->db->where('pov.productId',$productId);
				$this->db->order_by('ov.sortOrder', 'ASC');
				$pov_query = $this->db->get();
				if($pov_query->num_rows()) {	
					$product_option_value_query = $pov_query->result_array();
					foreach ($product_option_value_query as $product_option_value) {
						$product_option_value_data[] = array(
							'product_option_value_id' => $product_option_value['povid'],                    
							'quantity'                => $product_option_value['quantity'],
							'price'                   => round($product_option_value['price'],0),
							'option_value_id'         => $product_option_value['productOptionValueId'],
							'name'                   => $product_option_value['optionKey']
							
						);
					}
				}

				$product_option_data[] = array(
					'product_option_id'    => $product_option['poid'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['productOptionId'],
					'name'                 => $product_option['optionName'],
					'type'                 => $product_option['optionType']
				);

			}
		}
		return $product_option_data;
		
	}
	
	public function filterProduct($params){
		$conditions = [];
		if(isset($params['search'])){
		  if(trim($params['search']) !=""){
			$conditions[] = " (p.title 
			like '%".$params['search']."%' or 
			c.cat_name like '%".$params['search']."%' or 
			sc.subcategory like '%".$params['search']."%' ) ";
		  }
		}
		if(isset($params['parentCat']) && trim($params['parentCat'])!="" ){
			$conditions[] = "p.category = '".$params['parentCat']."'";
		}
		if(isset($params['subCat']) && trim($params['subCat'])!=""){
			$conditions[] = "p.subcategory = '".$params['subCat']."'";
		}
		if(isset($params['colors'])){
			$conditions[] = "pov.productOptionValueId in (".implode(',',$params['colors']).")";
		}
		if(isset($params['price'])){
			$prices = explode('-',$params['price']);
			$priceLen =  count($prices);
			if($priceLen>0){
				if($priceLen==2){
					$conditions[] ="( p.price between ".$prices[0]." and ".$prices[1]." )";
				}else{
					$conditions[] ="p.price = ".$priceLen[0];
				}
				
			}

		}
		
		$conditionStr = "";
		if(count($conditions)){
          $conditionStr = "where ".implode(" And ", $conditions);
		}

		$sql = "SELECT * FROM products p 
		left join category  c on p.category = c.id 
		left join subcategory sc on sc.id = p.subcategory 
		left join product_option_value  pov on p.id = pov.productId 
		".$conditionStr." group by p.id order by p.price asc" ;
		
		
		$countQuery = $this->db->query($sql);
		$totalRecords = $countQuery->num_rows();

		$page= $params['pagination']['start'];
		$cur_page = $page;
		$page -= 1;
		$limit = $params['pagination']['limit'];
		$start = $page * $limit;

		$sql = "SELECT *, round(p.price, 0) as prodPrice,p.id as prodId FROM products p
		    left join category  c on p.category = c.id 
			left join subcategory sc on sc.id = p.subcategory 
			left join product_option_value  pov on p.id = pov.productId 
			".$conditionStr." group by p.id order by p.price asc limit ".$start.",".$limit;
		$query = $this->db->query($sql);
		$noRecords = $query->num_rows();
		$data = array(
			"totalRecords"=>$totalRecords,
			"result" => [],
			"page" =>$page,
			"pStart"=>($start+1),
			"pEnd" =>($noRecords+$start)
			//,"sql" => $sql
		);
       
		if($noRecords>0){
			$data["result"] =  $query->result_array();
		}
		return $data;
	}

	public function getProductDetailOptions($product_id){
	    $options = array();
	    $productoptions = $this->getProductOptions($product_id);
	    foreach ($productoptions as $option) {
			$product_option_value_data = array();
			foreach ($option['product_option_value'] as $option_value) {
				if(($option_value['quantity'] > 0)) {
					if ((float)$option_value['price']) {
						$price = $option_value['price'];
					} else {
						$price = false;
					}

					$product_option_value_data[] = array(
						'product_option_value_id' => $option_value['product_option_value_id'],
						'option_value_id'         => $option_value['option_value_id'],
						'name'                    => $option_value['name'],                            
						'price'                   => $price
						
					);
				}
			}

			$options[] = array(
				'product_option_id'    => $option['product_option_id'],
				'product_option_value' => $product_option_value_data,
				'option_id'            => $option['option_id'],
				'name'                 => $option['name'],
				'type'                 => $option['type']
			);
		}
		return $options;
	}  

	public function getRelatedProduct($pid,$category=0,$subcategory=0,$limit=10){
		if($category!=0){
			$sql = "select *,round(price, 0) as price from products where category = '".$category."' and id <> '".$pid."' ";
			// if($subcategory !=0){
			// 	$sql .=" and subcategory= '".$subcategory."'";
			// }
			$sql.=" order by price asc limit ".$limit;
			$query = $this->db->query($sql);
			if($query->num_rows()>0){
              return $query->result_array();
			}else{
				return array();
			}

		}else{
			return array();
		}
	}

	function getProductsData($where=null,$ob=null,$obc='desc',$limit=null){
		$this->db->select('p.*,pov.povid');
		$this->db->from('products  as p');
		$this->db->join('product_option_value  as pov', 'pov.productId  = p.id','left');
		if($where) {
		  $this->db->where($where);
		}
		if($ob) {
		  $this->db->order_by($ob,$obc);
		}
		if($limit) {
		  $this->db->limit($limit);
		}
		
		$this->db->group_by('p.id'); 
		$query = $this->db->get();
		if($query->num_rows()) {  
		  return $query->result_array();
		} else {
		  return array();
		}
	}


   
	
}
