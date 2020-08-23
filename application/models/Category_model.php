<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function getAllCategory(){
		$categorArray = array();
		$this->db->select('*');
		$this->db->from('category');
		$this->db->order_by('cat_name', 'ASC');
		$query = $this->db->get();
		
		if($query->num_rows()) {
			$categories = $query->result_array();
			foreach ($categories as $category) {
				$category['subCategory'] = array();
				$this->db->select('*');
				$this->db->from('subcategory');
				$this->db->where('cat_id',$category['id']);
				$this->db->order_by('subcategory', 'ASC');
				$sub_query = $this->db->get();
				if($sub_query->num_rows()) {	
					$subcategories = $sub_query->result_array();
					foreach ($subcategories as $subcat) {
						array_push($category['subCategory'],$subcat);
					}
				}
				array_push($categorArray,$category);
			}
			
		}
		return $categorArray;
		
	}
	
}
