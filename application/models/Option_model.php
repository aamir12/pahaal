<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Option_model extends CI_Model {
    public function getOptionValues($option_id){
		$option_value_data = array();
		$this->db->select('*');
		$this->db->from('options_values as ov');
		$this->db->where('ov.optionId',$option_id);
		$this->db->order_by('ov.sortOrder ASC , ov.optionKey ASC');
		$query = $this->db->get();
		if($query->num_rows()) {	
			$option_value_query = $query->result_array();
			foreach ($option_value_query as $option_value) {
				$option_value_data[] = array(
                    'option_value_id' => $option_value['id'],
                    'name'            => $option_value['optionKey'],                    
                    'sort_order'      => $option_value['sortOrder']
                );
			}
		}
        return $option_value_data;
	}
}
