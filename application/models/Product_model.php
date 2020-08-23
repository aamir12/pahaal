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
							'price'                   => $product_option_value['price'],
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

		$sql = "SELECT *,p.price as prodPrice,p.id as prodId FROM products p
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

	
	
}
