<?php
class Admin_login_model extends CI_Model
{
	function __construct(){	
	  parent::__construct();
	  $this->load->database();
	}
	
	function get_log($type='login'){			    
		$this->db->select('*');
		$this->db->from(get_table_prefix().'log');		
		$this->db->where('type',$type);
		$this->db->order_by('log_id','desc');
		$this->db->limit(20,0);
		$query=$this->db->get();			
		return $query->result();
	}	
	
	function get_profile()	
	{		
		$this->db->select('*');
		$this->db->from(get_table_prefix().'users');		
		$this->db->where('user_id',$this->session->userdata('logged_in_id'));
		$query=$this->db->get();	
		return $query->row();			
	}
}
?>