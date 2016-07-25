<?php 
   if (!defined('BASEPATH')) exit('No direct script access allowed'); 
 
  /*
   @description :  get default date formate from module setting of configuration menu
   @param : module_id,date
   @return : newly formated date
  */
   function get_app_config($module_id,$required_field,$date=""){				
		$ci =& get_instance();
		$ci->load->database();
		
		$ci->db->select('s.date_format,f.max_rows');	
		$ci->db->from(get_table_prefix().'module_settings as f');	
		$ci->db->join(get_table_prefix().'date_format as s','f.date_format_id=s.date_format_id');	
		$condition=array('module_id'=>$module_id);
		$ci->db->where($condition);	
		$row=$ci->db->get()->row_array();	
		//print_r($row);  exit;
	   if(isset($row) && is_array($row) && !empty($row)){
	   $return_value="";
	   switch($required_field){
		  case "date": 
			  $return_value=date($row['date_format'],strtotime($date));
			  break;	
		  case "row": 
			  $return_value=$row['max_rows'];
			  break;			 	   
	   }
	  }else {
		    $module_name=get_one_value('modules','module_name','module_id',$module_id);
			echo 'Note : Please set '.$module_name.' module in <a href="'.base_url().'module_setting/add/">configuration->module settings.</a>';exit;
	  }
	  return  $return_value;		   
	}
	
   /*
   @name : get_app_setting()
   @description :  get default date formate from modul setting of configuration menu
   @param : module_id,date
   @return : newly formated date
  */
   function get_app_setting(){				
		$ci =& get_instance();
		$ci->load->database();
		
		$ci->db->select('*');	
		$ci->db->from(get_table_prefix().'site_settings');			
		$row=$ci->db->get()->row_array();	
		//print_r($row);  exit;
	  
	  return  $row;		   
	}
	
?>