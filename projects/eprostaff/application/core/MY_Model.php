<?php
class MY_Model extends CI_Model
{	
	function __construct(){	
	  parent::__construct();
	  $this->load->database();
	}
	
	function get_main_table($module_id){	
	    return get_one_value('modules','module_name','module_id',$module_id);			
	}	
	/*
	@function : add_contents , add module's contents into spitech_contents table
	@param : $module_id  , module_id of spitech_modules table
	@param : $input_array  , array of values to be inserted into spitech_contents table
	@param : $aWhere  , array of conditions for getting main table row for contents updation
	*/		
	function add_contents($module_id,$aWhere){		
		$input_array=array(
			"module_id"=>$module_id,
			"name"=>$this->input->post('name'),
			"long_desc"=>$this->input->post('long_desc'),
			"short_desc"=>$this->input->post('short_desc')
			);			
		$content_id=0;
		if(isset($aWhere) && is_array($aWhere) && !empty($aWhere)){
		   $table_name= $this->get_main_table($module_id);
		   $main_row=get_row($table_name,$aWhere);
		   //debug($main_row);
		   $content_id=$main_row['content_id'];
		   $this->db->where('id',$content_id);
		   $this->db->update(get_table_prefix().'contents',$input_array);	
		   //echo $this->db->last_query();exit;				   
		}else{
		   $this->db->insert(get_table_prefix().'contents',$input_array);		   
		   $content_id= $this->db->insert_id();
		}
		return $content_id;
	}	
	
}
?>