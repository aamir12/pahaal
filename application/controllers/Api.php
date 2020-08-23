<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller {
  public function __construct() {
    parent::__construct();
    header("Access-Control-Allow-Origin: *");
    header('Content-type:application/json');
    $this->db->query("set sql_mode = ''");
    $this->load->helper('my_helper');
		
  }
	
	public function index(){
		echo json_encode(array('status'=>0,'message'=>'No web service Found.'));
	}
	public function updateLatLong(){
		//https://www.webwiders.in/tradie_quotes/api/updateLatLong?latitude=54887&longitude=75544&user_id=26
		//latitude=54887
		//longitude=75544
		//user_id=26
		if(isset($_REQUEST['latitude']) && !empty($_REQUEST['latitude']) && isset($_REQUEST['longitude']) && !empty($_REQUEST['longitude']) && isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
			$insert['latitude']=$latitude = $_REQUEST['latitude'];
		    $insert['longitude']=$longitude = $_REQUEST['longitude'];
		    $user_id = $_REQUEST['user_id'];
			$check = $this->common_model->GetColumnName('users',array('id'=>$user_id,'is_deleted'=>0),array('id'));
			
			if($check!=""){
				$run = $this->common_model->UpdateData('users',array('id'=>$user_id),$insert);
				
				if($run){
					
					$output['status'] = 1;
					$output['message'] = 'lat long updated successfully.';
				} else {
					$output['status'] = 0;
					$output['message'] = 'Something went wrong, try again later.';
				}
				
			}else{
				$output['status'] = 0;
			    $output['message'] = 'This user does not exist.';
			}
		    
		}else{
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		
		echo json_encode($output);
	}

	public function updateDeviceId(){
		//https://www.webwiders.in/tradie_quotes/api/updateDeviceId?device_id=1544&user_id=26
		//device_id=124578
		//user_id=2

		
		if(isset($_REQUEST['device_id']) && !empty($_REQUEST['device_id']) && isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
			$insert['device_id']=$latitude = $_REQUEST['device_id'];
		    
		    $user_id = $_REQUEST['user_id'];
			$check = $this->common_model->GetColumnName('users',array('id'=>$user_id,'is_deleted'=>0),array('id'));
			
			if($check!=""){
				$run = $this->common_model->UpdateData('users',array('id'=>$user_id),$insert);
				
				if($run){
					
					$output['status'] = 1;
					$output['message'] = 'Device Id updated successfully.';
				} else {
					$output['status'] = 0;
					$output['message'] = 'Something went wrong, try again later.';
				}
				
			}else{
				$output['status'] = 0;
			    $output['message'] = 'This user does not exist.';
			}
		    
		}else{
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		
		echo json_encode($output);
	}
	public function checkEmail(){
		//https://www.webwiders.in/tradie_quotes/api/checkEmail?email=anil@gmail.com
		//email=anil@gmail.com
		
		
		if(isset($_REQUEST['email']) && !empty($_REQUEST['email']) ){
			$email = $_REQUEST['email'];
			$check = $this->common_model->GetColumnName('users',array('email'=>$email,'is_deleted'=>0),array('id'));
			print_r($check);
			if($check==false){
				
				$output['status'] = 1;
			    $output['message'] = 'This email address does not exist.';
				
				
			}else{
				$output['status'] = 0;
			    $output['message'] = 'This email address already exist.';
				
			}
		    
		}else{
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		
		echo json_encode($output);
	}
	public function planList(){
		//https://www.webwiders.in/tradie_quotes/api/planList
		   
			$plan = $this->common_model->GetAllData('plan');
			
			if(count($plan) > 0){
				$output['data'] = $plan;
				$output['status'] = 1;
			    $output['message'] = 'Success!';
				
				
			}else{
				$output['data'] = array();
				$output['status'] = 0;
			    $output['message'] = 'We did not find any records.';
				
			}
		    
		
		
		echo json_encode($output);
	}
	public function signup(){
		//https://www.webwiders.in/tradie_quotes/api/signup
		$type = $insert['type'] = $this->input->post('type');

		$this->form_validation->set_rules('type','type','trim|required');
		$this->form_validation->set_rules('email','email','trim|required');
		$this->form_validation->set_rules('password','password','trim|required');
		$this->form_validation->set_rules('fname','fname','trim|required');
		$this->form_validation->set_rules('lname','lname','trim|required');
		$this->form_validation->set_rules('phone','phone','trim|required');
		$this->form_validation->set_rules('address','address','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('state','state','trim|required');
		$this->form_validation->set_rules('country','country','trim|required');
		$this->form_validation->set_rules('postcode','postcode','trim|required');
		$this->form_validation->set_rules('latitude','latitude','trim|required');
		$this->form_validation->set_rules('longitude','longitude','trim|required');
		$this->form_validation->set_rules('about','about','trim|required');

		if($type==2){
		$this->form_validation->set_rules('distance','distance','trim|required');
		$this->form_validation->set_rules('trade','trade','trim|required');	
		$this->form_validation->set_rules('business_name','business_name','trim|required');	
		$this->form_validation->set_rules('licence','licence','trim|required');	
		$this->form_validation->set_rules('plan','plan','trim|required');		
		}

		if($this->form_validation->run()){
			
			$email = $insert['email'] = $this->input->post('email');
			
			
			$check = $this->common_model->GetColumnName('users',array('email'=>$email,'is_deleted'=>0),array('id'));
			
			if($check==false){
				$password = $insert['password'] = $this->input->post('password');
				$fname=$insert['lname'] = $this->input->post('lname');
				$lname=$insert['fname'] = $this->input->post('fname');
				$insert['phone'] = $this->input->post('phone');
				$insert['address'] = $this->input->post('address');
				$insert['city'] = $this->input->post('city');
				$insert['state'] = $this->input->post('state');
				$insert['country'] = $this->input->post('country');
				$insert['postcode'] = $this->input->post('postcode');
				$insert['latitude'] = $this->input->post('latitude');
				$insert['longitude'] = $this->input->post('longitude');
				$insert['about'] = $this->input->post('about');
				$insert['create_date'] = date('Y-m-d H:i:s');
				$insert['update_date'] = date('Y-m-d H:i:s');
				$insert['status'] = 1;
				$insert['is_deleted'] = 0;

				if($type==2){
				 $insert['distance'] = $this->input->post('distance');	
				 $insert['trade'] = $this->input->post('trade');	
				 $insert['business_name'] = $this->input->post('business_name');
				 $insert['licence'] = $this->input->post('licence');
				 $insert['plan'] = $this->input->post('plan');
				 $plan_id= $insert['start_date'] = date('Y-m-d H:i:s');	
				 $days = $this->common_model->GetColumnName('plan',array('id'=>$plan_id),array('duration'));	
				 $end_date=date('Y-m-d', strtotime(date('Y-m-d H:i:s'). ' + '.$days.' days'));
				 $plan_id= $insert['end_date'] = $end_date;					
				}
				
				$run = $this->common_model->InsertData('users',$insert);
				$insert_id = $this->db->insert_id();
				$trans_id =$add['transaction_id'] = $this->input->post('transaction_id');
				if($trans_id!=""){
					$add['plan'] = $this->input->post('plan');
					$add['amount'] = $this->input->post('amount');
					$add['cdate'] = date('Y-m-d H:i:s');
					$add['user_id'] = $insert_id;
					$run = $this->common_model->InsertData('transaction',$add);
				}
				  
				
				if($run){
					
					if($type==1){
						$mytype='customer';
					}else{
						$mytype='Tradesman';
					}
					$subject = "Congratulations: Your account has created as ".$mytype;
					
					$html = '<p style="margin:0;font-size:20px;padding-bottom:5px;color:#2875d7">Welcome to '.Project.'!</p>';
					
					$html .= '<p style="margin:0;padding:20px 0px">Hi, '.$fname.' '.$lname.'!</p>';
					$html .= '<p style="margin:0;padding:20px 0px">This is mail to inform you that your account has been created as <b>'.$mytype.'</b>.</p>';
					$html .= '<p style="margin:0;padding:20px 0px">See Your email and password below:</p>';
					$html .= '<p style="margin:0;padding:20px 0px">Email : '.$email.' <br> Password : '.$password.'</p>';
					
					$this->common_model->SendMail($email,$subject,$html);
					
					$output['status'] = 1;
					$output['message'] = 'Your account created successfully.';
				} else {
					$output['status'] = 0;
					$output['message'] = 'Something went wrong, try again later.';
				}
					
			} else {
				$output['status'] = 0;
				$output['message'] = 'This email address already exist.';
			}
			
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}

		
	public function login(){
		//https://www.webwiders.in/tradie_quotes/api/login
		//email=tahir@mailinator.com&password=12345678
		
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run()){
			
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$run = $this->common_model->GetColumnName('users',array('email' =>$email ,'password'=>$password,'is_deleted'=>0),array('id','type','status'));
			
			if($run){
				if($run['status']==0){
					
					$output['status'] = 0;
					$output['message'] = 'Your account is deactive, please to admin for active your account.';
					
				}else {
					
					$return = $this->get_users_basic_details($run['id'],$run['type']);
					$output['data'] = $return;
					$output['status'] = 1;
					$output['message'] = 'Success!';
					
				} 
			} else {
				$output['status'] = 0;
				$output['message'] = 'username or password incorrect.';
			}
			
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}

	public function forgetPassword(){
		//https://www.webwiders.in/tradie_quotes/api/forgetPassword
		//email=anil.webwiders@gmail.com
		
		$this->form_validation->set_rules('email','email','required');
		
		if($this->form_validation->run()){
			
			$email = $this->input->post('email');
			$run = $this->common_model->GetColumnName('users',array('email' =>$email, 'is_deleted'=>0),array('password','email','fname','lname'));
			
			if($run){
				
				$subject = "Forget password";
				
				$html = '<p>Hello, '.$run['fname'].' '.$run['lname'].'</p>';
				$html .= '<p>This is an automated message . If you did not recently initiate the Forgot Password process, please disregard this email.</p>';
				$html .= '<p>You indicated that you forgot your login password. We can generate a temporary password for you to log in with, then once logged in you can change your password to anything you like.</p>';
				$html .= '<p>Password: <b>'.$run['password'].'</b></p>';
				
				$this->common_model->SendMail($run['email'],$subject,$html);
				
				$output['status'] = 1;
				$output['message'] = 'Password sent at your email address.';
				
			} else {
				$output['status'] = 0;
				$output['message'] = 'Email address that you have entered is not registered with us.';
			}
			
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}

	public function getUserProfile(){
		//https://www.webwiders.in/tradie_quotes/api/getUserProfile?user_id=26
		
		if(isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id'])){
			
			$id = $_REQUEST['user_id'];
			$run = $this->common_model->GetColumnName('users',array('id' =>$id),array('id','type'));
			
			if($run){
				
				
				$return = $this->get_users_basic_details($run['id'],$run['type']);
				$output['data'] = $return;
				$output['status'] = 1;
				$output['message'] = 'Success!';
				
			} else {
				$output['status'] = 0;
				$output['message'] = 'We did not find any records.';
			}
				
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}
	
	public function changePassword(){
		//https://www.webwiders.in/tradie_quotes/api/changePassword
		//current_password=123456
		//new_password=123456
		//user_id=33
		
		$this->form_validation->set_rules('current_password','current password','trim|required');
		$this->form_validation->set_rules('new_password','New password','trim|required');
		$this->form_validation->set_rules('user_id','user_id','trim|required');
		
		if($this->form_validation->run()){
			
			$id = $this->input->post('user_id');
			$cpassword=  $this->input->post('current_password');
			$npassword=  $this->input->post('new_password');

			$user = $this->common_model->GetColumnName('users',array('id'=>$id),array('password'));
			
			if($user){
				
				$check = true;
				
				if($user['password']==$cpassword){

					$insert['password']=$npassword;
					
					$run = $this->common_model->UpdateData('users',array('id'=>$id),$insert);
				
					if($run){
						
						$output['status'] = 1;
						$output['message'] = 'Your password changed successfully.';
					} else {
						$output['status'] = 0;
						$output['message'] = 'We did not find any changes.';
					}

				} else {
					$output['status'] = 0;
					$output['message'] = 'Your existing password is incorrect.';
				}	
				
			} else {
				$output['status'] = 0;
				$output['message'] = 'We did not find any records.';
			}
				
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}

	public function editProfile(){
		//https://www.webwiders.in/tradie_quotes/api/editProfile
		
		$this->form_validation->set_rules('type','type','trim|required');
		$this->form_validation->set_rules('fname','fname','trim|required');
		$this->form_validation->set_rules('lname','lname','trim|required');
		$this->form_validation->set_rules('phone','phone','trim|required');
		$this->form_validation->set_rules('address','address','trim|required');
		$this->form_validation->set_rules('city','city','trim|required');
		$this->form_validation->set_rules('state','state','trim|required');
		$this->form_validation->set_rules('country','country','trim|required');
		$this->form_validation->set_rules('postcode','postcode','trim|required');
		$this->form_validation->set_rules('latitude','latitude','trim|required');
		$this->form_validation->set_rules('longitude','longitude','trim|required');
		$this->form_validation->set_rules('about','about','trim|required');
		$this->form_validation->set_rules('user_id','user_id','trim|required');
		$type = $this->input->post('type');
		if($type==2){
		$this->form_validation->set_rules('distance','distance','trim|required');
		$this->form_validation->set_rules('trade','trade','trim|required');	
		}
		
		if($this->form_validation->run()){
			
			$id = $this->input->post('user_id');
			
			$user = $this->common_model->GetColumnName('users',array('id'=>$id),array('profile_image','type'));
			
			if($user){
				
				if(isset($_FILES['profile_image']['name']) && !empty($_FILES['profile_image']['name'])){
					$config['upload_path']="assets/img/profile_image/";
					$config['allowed_types'] = 'jpeg|gif|jpg|png';
					$config['encrypt_name']=true;
					$this->load->library("upload",$config);
					
					if ($this->upload->do_upload('profile_image')) {
						$u_profile=$this->upload->data("file_name");
						$insert['profile_image'] = $u_profile;
						unlink("assets/img/profile_image/".$user['profile_image']);
					}
				}
				
				
				$insert['lname'] = $this->input->post('lname');
				$insert['fname'] = $this->input->post('fname');
				$insert['phone'] = $this->input->post('phone');
				$insert['address'] = $this->input->post('address');
				$insert['city'] = $this->input->post('city');
				$insert['state'] = $this->input->post('state');
				$insert['country'] = $this->input->post('country');
				$insert['postcode'] = $this->input->post('postcode');
				$insert['latitude'] = $this->input->post('latitude');
				$insert['longitude'] = $this->input->post('longitude');
				$insert['about'] = $this->input->post('about');
				$insert['update_date'] = date('Y-m-d H:i:s');

				if($type==2){
				$insert['distance'] = $this->input->post('distance');
				$insert['trade'] = $this->input->post('trade');
				}
				
				$run = $this->common_model->UpdateData('users',array('id'=>$id),$insert);
			
				if($run){
					
					$output['status'] = 1;
					$output['message'] = 'Your profile updated successfully.';
				} else {
					$output['status'] = 0;
					$output['message'] = 'We did not find any change.';
				}
				
			} else {
				$output['status'] = 0;
				$output['message'] = 'We did not find any records.';
			}
				
 		} else {
			$output['status'] = 0;
			$output['message'] = 'Check parameter.';
		}
		echo json_encode($output);
	}
	
	
	
	public function get_users_basic_details($id=null,$type=null){
		if($type==1){
			$user = $this->common_model->GetColumnName('users',array('id'=>$id),array('id','fname','lname','email','phone','address','city','state','country','postcode','latitude','longitude','profile_image','about','type','create_date','device_id'));
		}else{
			$user = $this->common_model->GetColumnName('users',array('id'=>$id),array('id','fname','lname','email','phone','address','city','state','country','postcode','latitude','longitude','profile_image','about','distance','trade','business_name','licence','plan','start_date','end_date','wallet','type','create_date','device_id'));
		}
		
		if($user){
			
			if($user['profile_image']){
				$user['profile_image'] = site_url().'assets/img/profile_image/'.$user['profile_image'];
			} else {
				$user['profile_image'] = site_url().'assets/img/user.png';
			}
			
			$output = $user;
		} else {
			$output['status'] = 0;
			$output['message'] = 'Something went wrong.';
		}
		return $output;
	}
	
		
	
	
	
	
	


}