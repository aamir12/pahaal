<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Products extends CI_Controller{

	public function __construct() {
		parent::__construct();
		$this->check_login();
		$this->load->model('product_model','PM');
		$this->load->model('option_model','OM');
	}

	public function check_login(){
		if(!$this->session->userdata('user_id')){
			redirect('Admin/login');
		}
	}

	public function index(){
		$user_id = $this->session->userdata('user_id');
		$data['products'] = $this->common_model->GetAllData('products',null,'id');
		$this->load->view('Admin/product_list',$data);
	}

	public function delete_product($id=null){
		$selectData= $this->common_model->GetSingleData('products',array('id '=> $id));
		$selectAllData = $this->common_model->GetAllData('gallery_image',array('product_id'=>$id),'id');
		$run = $this->common_model->DeleteData('products',array('id'=>$id));
		if($run){
			unlink("assets/img/product_image/".$selectData['image']);
			if(!empty($selectAllData)){
				foreach ($selectAllData as $key => $value) {
				 unlink("assets/img/gallery_image/".$value['gallery_image']);
			    }
			}
			$run_again = $this->common_model->DeleteData('gallery_image',array('product_id'=>$id));
			$this->session->set_flashdata('msg','<div class="alert alert-success">Product has been deleted successfully!</div>');
		} else {
			$this->session->set_flashdata('msg','<div class="alert alert-danger">Something went wrong, try again later!</div>');
		}
		redirect('admin/all-products');
	}

	public function addProductPage(){
		$data['category'] = $this->common_model->GetAllData('category',null,'id');
		$data['options'] = $this->common_model->GetAllData('options',null,'id');
		$this->load->view('Admin/add_product',$data);
	}

	public function addProduct(){
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('price','Price','trim|required');
		$this->form_validation->set_rules('category','Category','trim|required');
 		if($this->form_validation->run()==true){
			$insert['title'] = $this->input->post('title');
			$insert['description'] = htmlentities($this->input->post('description'), ENT_QUOTES);
			$insert['price'] = $this->input->post('price');
			$insert['reguler_price'] = $this->input->post('reguler_price');
			$insert['quantity'] = $this->input->post('quantity');
			$insert['category'] = $this->input->post('category');
			$insert['subcategory'] = $this->input->post('subcategory');
			$insert['special'] = isset($_POST['special'])?'on':'off';
			$insert['cdate'] = date('Y-m-d H:i:s');
			//product image
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
					$config['upload_path']="assets/img/product_image/";
					$config['allowed_types'] = 'jpeg|gif|jpg|png';
					$config['encrypt_name']=true;
					$this->load->library("upload",$config);
					if ($this->upload->do_upload('image')) {
						$u_profile=$this->upload->data("file_name");
						$insert['image'] = $u_profile;
					}

			}
			//end of product image
			
			

            $run = $this->common_model->InsertData('products',$insert);
            $product_id = $this->db->insert_id();
			if($run){

				//product options
				if (isset($_POST['product_option'])) {
					$product_options = $this->input->post('product_option');
					foreach ($product_options as $product_option) {
						if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' ) {
							if (isset($product_option['product_option_value'])) {
								if(count($product_option['product_option_value'])>0){
									$poData['productId'] = 	$product_id;
									$poData['productOptionId']	 = $product_option['option_id'];
									$this->common_model->InsertData('product_option',$poData);
									$poId =  $this->db->insert_id();

									foreach ($product_option['product_option_value'] as $product_option_value) {
										$povData['poId'] = $poId;
										$povData['productId'] = $product_id;
										$povData['productOptionId'] = $product_option['option_id'];
										$povData['productOptionValueId'] = $product_option_value['option_value_id'];
										$povData['quantity'] = $product_option_value['quantity'];
										$povData['price'] = $product_option_value['price'];
										$this->common_model->InsertData('product_option_value',$povData);
									}
								}
								
							}
						} 
					}
				}
				//end of product options

				//product gallery
				if(isset($_FILES['gallery_image_orignal']['name']) && !empty($_FILES['gallery_image_orignal']['name'])){
						for ($i=0; $i < count($_FILES['gallery_image_orignal']['name']) ; $i++) { 
							$_FILES['file']['name']     = $_FILES['gallery_image_orignal']['name'][$i];
		                    $_FILES['file']['type']     = $_FILES['gallery_image_orignal']['type'][$i];
		                    $_FILES['file']['tmp_name'] = $_FILES['gallery_image_orignal']['tmp_name'][$i]; 
		                    $_FILES['file']['error']     = $_FILES['gallery_image_orignal']['error'][$i]; 
		                    $_FILES['file']['size']     = $_FILES['gallery_image_orignal']['size'][$i]; 
		                    $uploadPath = 'assets/img/gallery_image/'; 
		                    $config['upload_path'] = $uploadPath; 
		                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		                    $this->load->library('upload', $config);
		                    $this->upload->initialize($config);
		                    if($this->upload->do_upload('file')){ 
		                        $fileData = $this->upload->data();
		                        $u_attachment=$uploadData[$i]['file_name'] = $fileData['file_name']; 
		                        $gallery_insert['product_id'] = $product_id;
                                $gallery_insert['gallery_image'] = $u_attachment;
                                $gallery_insert['cdate'] = date('Y-m-d H:i:s');
							    $this->common_model->InsertData('gallery_image',$gallery_insert);
		                    }else{  
		                        $errorUploadType .= $_FILES['file']['name'].' | ';  
		                    }

					    }
				}
				//end of product gallery

				

				$msg = '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> Product added successfully!
					</div>';
				$url='admin/all-products';
			} else {
				$msg = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  Something went to wrong!
					</div>';
				$url='admin/add-product';

			}

		} else {
			$msg = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  '.validation_errors().'
					</div>';
			$url='admin/add-product';
		}

		$this->session->set_flashdata('msg',$msg);
		redirect($url);
 	}


 	public function editProductPage($id=null){
		$product = $this->common_model->GetSingleData('products',array('id '=> $id));
		if($product){
			$data['product'] = $product;
			$data['category'] = $this->common_model->GetAllData('category',null,'id');
		    $data['gallery_image'] = $this->common_model->GetAllData('gallery_image',array('product_id '=> $id),'id');
			$data['product_options'] = $this->getProductOptions($id);
			$data['options'] = $this->common_model->GetAllData('options',null,'id');
		    $this->load->view('Admin/edit_product',$data);
		}else{
			redirect('admin/all-products');
		}
	}

	public function getProductOptions($product_id=16){
		$product_options = $this->PM->getProductOptions($product_id);
		//$this->common_model->showData($product_options);
		return $product_options;
    }

	public function editProduct($id=null){
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('price','Price','trim|required');
		$this->form_validation->set_rules('category','Category','trim|required');
 		if($this->form_validation->run()==true){
 			$product= $this->common_model->GetSingleData('products',array('id '=> $id));
 			$update['title'] = $this->input->post('title');
			$update['description'] = htmlentities($this->input->post('description'), ENT_QUOTES);
			$update['price'] = $this->input->post('price');
			$update['reguler_price'] = $this->input->post('reguler_price');
			$update['quantity'] = $this->input->post('quantity');
			$update['category'] = $this->input->post('category');
			$update['subcategory'] = $this->input->post('subcategory');
			$update['special'] = isset($_POST['special'])?'on':'off';
			if(isset($_FILES['image']['name']) && !empty($_FILES['image']['name'])){
					$config['upload_path']="assets/img/product_image/";
					$config['allowed_types'] = 'jpeg|gif|jpg|png';
					$config['encrypt_name']=true;
					$this->load->library("upload",$config);
					if ($this->upload->do_upload('image')) {
						$u_profile=$this->upload->data("file_name");
						$update['image'] = $u_profile;
						unlink("assets/img/product_image/".$product['image']);
					}
		    }
            $run = $this->common_model->UpdateData('products',array('id'=>$id),$update);
			if($run){
				$abc=implode(',', $this->input->post('gallery-image-id'));
			      if($abc==""){
			        $abc_id=0;
			      }else{
			        $abc_id=$abc;
				}
				
			    $query1 = $this->db->query("select * from gallery_image where product_id='".$id."' and id NOT IN ($abc_id)  ");
                $query1_result = $query1->result();
                if(!empty($query1_result)){
					foreach ($query1_result as $key => $value2) {
						unlink("assets/img/gallery_image/".$value2->gallery_image);
					}
			    }
			    $this->db->query("delete from gallery_image  where product_id='".$id."' and id NOT IN ($abc_id)");
				if(isset($_FILES['gallery_image_orignal']['name']) && !empty($_FILES['gallery_image_orignal']['name'])){
						for ($i=0; $i < count($_FILES['gallery_image_orignal']['name']) ; $i++) { 
							$_FILES['file']['name']     = $_FILES['gallery_image_orignal']['name'][$i]; 
		                    $_FILES['file']['type']     = $_FILES['gallery_image_orignal']['type'][$i];
		                    $_FILES['file']['tmp_name'] = $_FILES['gallery_image_orignal']['tmp_name'][$i]; 
		                    $_FILES['file']['error']     = $_FILES['gallery_image_orignal']['error'][$i];
		                    $_FILES['file']['size']     = $_FILES['gallery_image_orignal']['size'][$i];
		                    $uploadPath = 'assets/img/gallery_image/';
		                    $config['upload_path'] = $uploadPath;
		                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
		                    $this->load->library('upload', $config);
		                    $this->upload->initialize($config);
		                    if($this->upload->do_upload('file')){
		                        $fileData = $this->upload->data();
		                        $u_attachment=$uploadData[$i]['file_name'] = $fileData['file_name'];
		                        $gallery_insert['product_id'] = $id;
                                $gallery_insert['gallery_image'] = $u_attachment;
                                $gallery_insert['cdate'] = date('Y-m-d H:i:s');
							    $this->common_model->InsertData('gallery_image',$gallery_insert);
		                    }else{  
		                        $errorUploadType .= $_FILES['file']['name'].' | ';
		                    }

					    }
				}

				// product option
				$this->common_model->DeleteData('product_option',['productId'=>$id]);
		        $this->common_model->DeleteData('product_option_value',['productId'=>$id]);
				if (isset($_POST['product_option'])) {
					   $product_options =$_POST['product_option'];
					   foreach ($product_options as $product_option) {
						if ($product_option['type'] == 'select' || 
							$product_option['type'] == 'radio' ||
							$product_option['type'] == 'checkbox' ){
								if (isset($product_option['product_option_value'])) {
									$poData['productOptionId'] = $product_option['option_id'];
									$poData['productId'] = $id;
									$poData['poid'] = $product_option['product_option_id'];
									$product_option_id = $this->common_model->InsertData(' product_option',$poData);
									foreach ($product_option['product_option_value'] as $product_option_value) {
										$povData['poId'] = $product_option_id;
										$povData['productId'] = $id;
										$povData['productOptionId'] = $product_option['option_id'];
										$povData['productOptionValueId'] = $product_option_value['option_value_id'];
										$povData['quantity'] = $product_option_value['quantity'];
										$povData['price'] = $product_option_value['price'];
										$povData['povid'] = $product_option_value['product_option_value_id'];
										$this->common_model->InsertData('product_option_value',$povData);
									}
								}
							
						} 
					}
			
				}
				//end of product option

				

				$msg = '<div class="alert alert-success alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Success!</strong> Product Updated successfully!
					</div>';
				$url='admin/all-products';

			} else {
				$msg = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  Something went to wrong!
					</div>';
				$url='admin/edit-product/'.$id;

			}
 		}else{
 			$msg = '<div class="alert alert-danger alert-dismissible">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>  '.validation_errors().'
					</div>';
			$url='admin/edit-product/'.$id;
 		}
 		$this->session->set_flashdata('msg',$msg);
		redirect($url);

    }
    
    public function get_all_subcategory(){
    	$cat_id = $this->input->post('cat_id');
    	$condition='cat_id='.$cat_id;
    	$subcategortData = $this->common_model->GetAllData('subcategory',$condition,'id');
    	echo '<label class=" form-control-label">Sub Category</label><select class="form-control" name="subcategory" >';
    	if(count($subcategortData) > 0){
			   echo "<option value=''>Select Subcategory</option>";
    		foreach ($subcategortData as $key => $subcategort) {
    			echo "<option value='".$subcategort['id']."'>".$subcategort['subcategory']."</option>";
    		}
    	}else{
    		echo "<option value=''>Not Any Subcategory provider found!</option>";
    	}
    	echo '</select>';

	}
	
}
