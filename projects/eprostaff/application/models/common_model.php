<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();		
		date_default_timezone_set('Asia/Kolkata');
	}

	
	/*
	*  	getMailTemplate()
    *  	@return   - single row
	*	@Description: Method for fetching Mail Template from Database. 
	*	@author: Sourav Dey
    */
	public function getEmailTemplate($id){
		$query = $this->db->query('SELECT * FROM  '.get_table_prefix().'_email_template where id = "'.$id.'"');
		return $query->row();
	}
	
	
	/*
	*  	fetchEmailTemplate()
    *  	@return   - multiple rows
	*	@Description: Method for fetching Mail Template from Database for Admin. 
	*	@author: Sourav Dey
    */
	public function fetchEmailTemplate(){
		$query = $this->db->query('SELECT id,email_name FROM  '.get_table_prefix().'_email_template');
		return $query->result();
	}
	
	
	/*
	*  	fetchEmailTemplateByID()
    *  	@return   - single rows
	*	@Description: Method for fetching Mail Template from Database for Admin by ID. 
	*	@author: Sourav Dey
    */
	public function fetchEmailTemplateByID($id){
		$query = $this->db->query("SELECT * FROM  ".get_table_prefix()."_email_template where id = '".$id."'");
		return $query->row();
	}
	
	
	
	/*
	*  	updateEmailTemplateByID()
	*	@Description: Method for updating Mail Template from Database for  by ID. 
	*	@author: Sourav Dey
    */
	public function updateEmailTemplateByID(){
		$query = $this->db->query("Update ".get_table_prefix()."_email_template set from_address = '".$_POST['from_address']."', from_name = '".$_POST['from_name']."', bcc_address = '".$_POST['bcc_address']."', subject = '".$_POST['subject']."', message = '".$_POST['message']."' where id = '".$_POST['id']."'");
	}
	
}

