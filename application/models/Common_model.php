<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

  public function GetDataByOrderLimit($table,$where,$odf=NULL,$odc=NULL,$limit=NULL,$start=0) {
    if($where) {
      $this->db->where($where);
    }		 

    if($odf && $odc){
      $this->db->order_by($odf,$odc);
    }
       
    if($limit){
      $this->db->limit($limit, $start);
    }

    $sql=$this->db->get($table);
    
    if($sql) {
      return $sql->result_array();
    }else{
      return array();
    }
  }

  public function GetDataById($table,$value) {
    $this->db->where('id', $value);
    $obj=$this->db->get($table);
    if($obj->num_rows() > 0){
      return $obj->row_array();
    } else {
      return false;
    }
  }
  
  public function InsertData($table,$data) {
    $insert = $this->db->insert($table,$data);
     if($insert){
      return $this->db->insert_id();
    }else{
      return false;
    }
  }
  
  function GetAllData($table,$where=null,$ob=null,$obc='desc'){
    if($where) {
      $this->db->where($where);
    }
    if($ob) {
      $this->db->order_by($ob,$obc);
    }
    $query = $this->db->get($table);
    if($query->num_rows()) {	
      return $query->result_array();
    } else {
      return array();
    }
  }

  function GetAllDataLimit($table,$where=null,$ob=null,$obc='desc',$limit=null){
    if($where) {
      $this->db->where($where);
    }
    if($ob) {
      $this->db->order_by($ob,$obc);
    }
    if($limit) {
      $this->db->limit($limit);
    }
    
    $query = $this->db->get($table);
    if($query->num_rows()) {  
      return $query->result_array();
    } else {
      return array();
    }
  }
     // print_r($this->db->last_query($query));

  function GetSingleData($table,$where=null,$ob=null,$obc='desc'){
    if($where) {
      $this->db->where($where);
    }
    if($ob) {
      $this->db->order_by($ob,$obc);
    }
    $query = $this->db->get($table);
    if($query->num_rows()) {	
      return $query->row_array();
    } else {
      return false;
    }
  }
	
	public function insert_user_meta($user_id=null,$meta_key=null,$meta_value=null){
		$check = $this->GetColumnName('user_meta',array('user_id'=>$user_id,'meta_key'=>$meta_key));
		
		if($check){
			
			$this->UpdateData('user_meta',array('id'=>$check['id']),array('meta_value'=>$meta_value,'update_date'=>date('Y-m-d H:i:s')));
			$run = $check['id'];
		} else {
			$run = $this->InsertData('user_meta',array('user_id'=>$user_id,'meta_key'=>$meta_key,'meta_value'=>$meta_value,'update_date'=>date('Y-m-d H:i:s'),'create_date'=>date('Y-m-d H:i:s')));
		}
		return $run;
	}
  

  public function UpdateData($table,$where,$data){
    $this->db->where($where);
    $obj=$this->db->update($table,$data);
    //return ($this->db->affected_rows() > 0)?true:false;
    return true;
  }

  public function DeleteData($table,$where){
    $this->db->where($where);
    $obj=$this->db->delete($table);
    return ($this->db->affected_rows() > 0)?true:false;  
  }

  public function GetColumnName($table,$where=null,$name=null,$double=null,$order_by=null,$order_col='desc') {
    if($name){
      $this->db->select(implode(',',$name));
    } else {
      $this->db->select('*');
    }
    
    if($where){
      $this->db->where($where);
    }
    
    if($order_by && $order_col){
      $this->db->order_by($order_by,$order_col);
    }
    $sql=$this->db->get($table);
    if($double){
      $data = array();
    } else {
      $data = false;
    }
    if($sql->num_rows() > 0){
      if($double){
        $data = $sql->result_array();
      } else {
        $data = $sql->row_array();
      } 
      
    }
    return $data;
  }

  function SendMail($to,$sub,$body,$bcc=null)
  {
		
		$config = array();
		$config['mailtype'] = "html";
		$config['charset'] = "utf-8";
		$config['newline'] = "\r\n";
		$config['wordwrap'] = TRUE;
		$config['validate'] = FALSE;
		
		$this->email->initialize($config);
		
		$this->email->from(EMAIL_ID, Project);
	 
		$this->email->to($to);
		$this->email->set_crlf("\r\n");	
		//$this->email->set_mailtype("html");	
		$this->email->subject($sub);

		if($bcc){
			$this->email->bcc($bcc);
		}
		
    $msg = '<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" name="mjqemailid" content="B0WB7P9VV27ACYA96DTTHDGYXR1I0SUB">
            <tbody>
              <tr>
                <td align="center" valign="top">
                  <table border="0" cellpadding="10" cellspacing="0" width="600" style="border:1px solid #ddd;margin:50px 0px 100px 0px;text-align:center;color:#363636;font-family:\'Montserrat\',Arial,Helvetica,sans-serif;background-color:white">
                    <tbody>
                      <tr>
                        <td align="center" valign="top" style="border-bottom:2px solid #fe8a0f;padding:0px;background:-moz-linear-gradient(top,#fff,#f6f6f6);background:-webkit-linear-gradient(top,#fff,#f6f6f6);">
                          <table border="0" cellpadding="0" cellspacing="10" width="100%">
                            <tbody>
                              <tr>
                                <td align="center" style="text-align: center;" valign="middle"><a style="font-family:\'Ubuntu\',sans-serif;color:#ff3000;font-weight:300;display:block;letter-spacing:-1.5px;text-decoration:none;margin-top:2px" href="'.site_url().'"><img src="'.site_url().'assets/img/logo.png" style="padding-top:0;display:inline-block;vertical-align:middle;margin-right:0px;height:55px" class="CToWUd"></a></td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top">
                          <table border="0" cellpadding="0" cellspacing="10" width="100%">
                            <tbody>
                              <tr>
                                <td align="left" valign="top" style="color:#444;font-size:14px">
																	'.$body.'
																	 <p style="margin:0;padding:10px 0px">Kind regards,<br>The '.Project.' Team</p>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td align="center" valign="top" style="background-color:#2b3133;color:white">
                          <table border="0" cellpadding="0" cellspacing="10" width="100%">
                            <tbody>
                              <tr>
                                <td align="left" valign="top" width="80%">
                                  <div style="margin:0;padding:0;color:#fff;font-size:13px">Copyright © 2020 <a href="'.site_url().'" style="color:white;text-decoration:none">'.Project.'</a>. All rights reserved.</div>
                                </td>
                                
                              </tr>
                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </td>
              </tr>
            </tbody>
          </table>';
				
		$this->email->message($msg);
		
		$run  = $this->email->send();
		
    if($run) {
      return 1;
    } else {
      return 0;
    }

  }
}
