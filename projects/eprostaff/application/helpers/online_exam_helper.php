<?php 
   if (!defined('BASEPATH')) exit('No direct script access allowed'); 
  //------------------ color for quations -------------
   function question_status($btn_no,$iTestId,$iSectionId,$current_ques,$type='english'){				
		$ci =& get_instance();
		$ci->load->database();
		$ci->db->select('*');	
		$ci->db->from(get_table_prefix().'question');	
		$condition=array('section_id'=>$iSectionId,'test_id'=>$iTestId,'question_no'=>$btn_no,$type=>'1');
		$ci->db->where($condition);	
		$query=$ci->db->get();				
		$class="Empty";	
		if($btn_no==$current_ques && $query->num_rows()>0){
			$class="Current  HasQuestion";
		}else if($btn_no==$current_ques){
			$class="Current";	 
		}else if($query->num_rows()>0){
			$class="HasQuestion";	 
		}		
	return $class;
	}
		
//------------------ active class  -------------
   function get_active($var1,$var2){				
   $class="";
   if($var1==$var2){
	 $class="active";
   }else{
	  $class=""; 
   }
   return $class;
  }
	
	function get_lang($section_id,$test_id){
		$tab_lang="";
		if($section_id=="1"){
			//-------------hindi ----------
			$tab_lang="hindi";
		}else if($section_id=="2"){
			//-------------english ----------
			$tab_lang="english";
		}else{
			$ci =& get_instance();
			$ci->load->database();
			$ci->db->select('test_lang');	
			$ci->db->from(get_table_prefix().'test');	
			$condition=array('test_id'=>$test_id);
			$ci->db->where($condition);	
			$query=$ci->db->get()->row_array();				
			$test_lang=$query['test_lang'];	
			if($test_lang=="1"){
				//-------------hindi ----------
				$tab_lang="hindi";	
			}else if($test_lang=="2"){
				//----------- english -----------	
				$tab_lang="english";
			}else if($test_lang=="3"){
				//----------- both -----------
				$tab_lang="both";		
			}
		}
	}
?>