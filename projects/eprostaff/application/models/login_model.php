<?php
class Login_model extends CI_Model
{
	function __construct(){	
		parent::__construct();
		$this->load->database();	
	}
	
	function login($role="admin")
	{
		if($role=="admin"){
		$tbl_name=get_table_prefix().'users';
		}		
		$email=$this->input->post('email');
		$password=md5($this->input->post('password'));
		$this->db->select('*');
		$this->db->from($tbl_name);
		$this->db->where(array('email'=>$email,'password'=>$password,'status'=>'1'));
		$query=$this->db->get();		
		if ($query->num_rows()> 0){
				$rows=$query->row();			
				if($role=="admin"){
					$this->session->set_userdata('logged_in_email',$rows->email);
					$this->session->set_userdata('logged_in_name',$rows->first_name);
					$this->session->set_userdata('logged_in_id',$rows->user_id);
					$this->session->set_userdata('logged_in_role',$rows->role);
					//put_log('logged in.',"login");
		     	}
				//debug('sgfsdfg54345');				
		 return true;
		} else { 
			return false;
		} 
	}
	
	
	function is_logged_in(){
		//print_r($this->session->userdata('logged_in_email'));exit;
	   if($this->session->userdata('logged_in_email')){
		   return TRUE;
	   }else{
		   return FALSE;
	   }
	}
	function logout(){			
		$this->session->sess_destroy();
		//debug($this->session->userdata);
		redirect(base_url()."student_login/",'refresh');
	}
}
?>