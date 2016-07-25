<?php 
    if (!defined('BASEPATH')) exit('No direct script access allowed'); 
	
	function debug($arg){
		if(is_array($arg)){
		 echo '<pre>';print_r($arg);exit;		
		}else if(is_object($arg)){
		 echo '<pre>';print_r($arg);exit;		
		}else{			
		 echo '<pre>'.$arg;exit;	
		}
	}
	function get_label($lbl,$language='1'){		
		$ci=& get_instance();
		$ci->load->database();	
		
		$ci->db->start_cache();
		$ci->db->select('*');
		$ci->db->from('spitech_label');		
		if($language=='1'){
			//----------- english to hindi --------
			$ci->db->like("english",$lbl);			
			$qry=$ci->db->get();
			$lbl=$qry->row_array();					
			
			$qry->free_result();				
			$ci->db->stop_cache();					
			$ci->db->flush_cache();
			
			header("Content-type: text/html; charset=utf-8");
			echo $lbl['hindi'];
		}else{
			echo $lbl;
		}		
	}
    
	/*
	@name : upload_media : uploads media files like doc,pdf,images etc.
	@param : $file_control_name : Name of html file control name used for browsing  file
	@param : $upload_path : destination folder path
	@param : $max_size : maximum allowed size of file in kb.
	@param : $allowed_types :allowed file types like jpg|jpeg|png|pdf|docx|doc
	*/
	function upload_media($file_control_name='thumbnail',$upload_path='./media/',$max_size='10000',$allowed_types='jpg|jpeg|png'){
		$ci=& get_instance();
		$image_data=array();
		$config['upload_path'] =$upload_path;
		$config['allowed_types'] = $allowed_types;
		$config['overwrite']  = false;	
		$config['max_size']	= $max_size;												
		$ci->load->library('upload', $config);		
		$thumbnail="";
		if (!$ci->upload->do_upload($file_control_name)){
		$error = array('error' => $ci->upload->display_errors());			
		debug($error);
		}else{
		$image_data =$ci->upload->data();				
		}	
		return $image_data; 
	}
	
	/*
	@name : remove_media : delete media files like doc,pdf,images etc.
	@param : $file_name : file name.	
	@param : $dir : destination folder.	
	*/
	function remove_media($file_name,$dir='./media/'){
		$complete_path=$dir.$file_name;
		@unlink($complete_path);
	}
    
	function is_localhost(){
		return $_SERVER['REMOTE_ADDR'] == '::1' || $_SERVER['REMOTE_ADDR'] == '127.0.0.1';
	}  

	function set_active($left,$right){
		$class='';
		if($left==$right){
		$class='active';
		}
		echo $class;
	}
	
	//--------------------get table------------------
	function get_table_prefix(){
		$ci=& get_instance();
		return $ci->config->item('table_prefix');
	}
	
	function is_exists($tbl_name,$pk,$pk_value){
		$ci=& get_instance();
				
		$ci->db->select('*');
		$ci->db->from(get_table_prefix().$tbl_name);
		$ci->db->where($pk,$pk_value);	
		$qry=$ci->db->get();				
		if($qry->num_rows()>0)
		 return TRUE;
		else
		return FALSE;
	}
	
	function get_row($tbl_name='',$aWhere=''){
		$ci=& get_instance();		
		
		$ci->db->start_cache();				
		$row=array();
		
		$ci->db->select('*');
		$ci->db->from(get_table_prefix().$tbl_name);		
		$ci->db->where($aWhere);			
		$qry=$ci->db->get();	
		$row=$qry->row_array();		
		
		//echo $ci->db->last_query();
		
		$qry->free_result();				
		$ci->db->stop_cache();					
		$ci->db->flush_cache();
		
		return $row;
	}
	
	 
	function get_sum($tbl_name='',$sColumn,$aWhere=''){
		$ci=& get_instance();		
		
		$ci->db->start_cache();				
		$row=array();
		
		$ci->db->select_sum($sColumn);
		$ci->db->from(get_table_prefix().$tbl_name);		
		$ci->db->where($aWhere);			
		$qry=$ci->db->get();	
		$row=$qry->row_array();		
		
		$qry->free_result();				
		$ci->db->stop_cache();					
		$ci->db->flush_cache();
		
		return $row[$sColumn];
	}
	
	function get_count($tbl_name='',$aWhere=''){
		$ci=& get_instance();		
		
		$ci->db->start_cache();				
		$row=0;
		
		$ci->db->select('*');
		$ci->db->from(get_table_prefix().$tbl_name);		
		$ci->db->where($aWhere);			
		$qry=$ci->db->get();	
		$row=$qry->num_rows();
				
		$qry->free_result();				
		$ci->db->stop_cache();					
		$ci->db->flush_cache();
		
		return $row;
	}
	
	
	
	function check_available($tbl_name,$aWhere){
		$rows=0;
		$ci=& get_instance();
		$ci->load->database();
		$ci->db->select('*');
		$ci->db->from(get_table_prefix().$tbl_name);		
		$ci->db->where($aWhere);			
		$qry=$ci->db->get();				
		$rows=$qry->num_rows();		
		return $rows;
	}
	
	//------------ get one value ---------------
	function get_one_value($tbl_name,$required_field,$key_field,$key_value){
		$ci=& get_instance();
		$ci->load->database();
		$ci->db->select($required_field);
		$ci->db->from(get_table_prefix().$tbl_name);
		$ci->db->where($key_field,$key_value);	
		$row=$ci->db->get()->row_array();				
		return $row[$required_field];
	}
	
	function put_log($activity='',$type='other'){
		$ci=& get_instance();		
		
		date_default_timezone_set("Asia/Kolkata"); 
		$username=$ci->session->userdata('logged_in_name');
		$date=date("l jS \of F Y h:i:s A");		
		$activity=$activity;
		$ip=$_SERVER['REMOTE_ADDR'];
			
		$ci->load->database();		
		$input_array=array(
		"username"=>$username,
		"date"=>$date,		
		"activity"=>$activity,
		"ip"=>$ip,
		"type"=>$type,
		"role"=>$ci->session->userdata('logged_in_role')
		);
		$ci->db->insert(get_table_prefix().'log',$input_array);							
	}	
		
	function delete($Url){	   
	echo  " onclick=\"if(confirm('Are you sure to delete this record?')) window.location='".$Url."';  else  return false;\" " ;
	}
	
	function alert($Message,$Location=""){
		if($Location=="")
		  $msg="<script language='javascript'>alert('".$Message."');</script>";
		else 
		  $msg="<script language='javascript'>alert('$Message');window.location='".$Location."';</script>"; 	
		echo $msg;
	}
	
	function move_to($Location){
		echo "<script language='javascript'>window.location='$Location';</script>";   
	}
	
	function show_hide($id='me',$display_style='block'){
		echo "
		if(document.getElementById('".$id."').style.display!='none') { document.getElementById('".$id."').style.display='none' } 
		else { document.getElementById('".$id."').style.display='".$display_style."' } ; 
		"; 
	}
	
	function refresh($IntervalInMinuts=0.5){
	 $IntervalInMicroSeconds=$IntervalInMinuts*60000;
	 echo "<script> setInterval('window.location.reload()',$IntervalInMicroSeconds);</script>";
	} 
	
	function focus($ID=""){ 
	   echo "<script>document.getElementById('$ID').focus();</script>";   	
	}
	
	function get_shift(){
		$result="";
		$CurrentTime=strtotime("now");
		$start1=strtotime("10:00:00");
		$start2=strtotime("10:45:00");
		
		$start3=strtotime("17:30:00");
		$start4=strtotime("19:00:00");
		
		if($CurrentTime>=$start1 && $CurrentTime<=$start2)
		$result="Morning";
		else if($CurrentTime>=$start3 && $CurrentTime<=$start4)
		$result="Evening";
		
		return $result;
	}

	function attendance(){
		$result=false;
		$CurrentTime=strtotime("now");
		$start1=strtotime("10:00:00");
		$start2=strtotime("10:45:00");
		
		$start3=strtotime("17:30:00");
		$start4=strtotime("19:00:00");
		
		if(($CurrentTime>=$start1 && $CurrentTime<=$start2)||($CurrentTime>=$start3 && $CurrentTime<=$start4))
		$result=true;
		return $result;
	} 
	
	function same_page(){
		return htmlentities($_SERVER['PHP_SELF']);
	}
	
	function Country($selected){
		$str='
		<select name="Country" id="Country" class="Country" >
		<option value="-1">-Select Country-</option>
		';
		$qry="select * from tbl_country order by CountryId";
		$rows=mysql_query($qry) or die(mysql_error());	
		while($ROWS=mysql_fetch_assoc($rows)) 
		{
			if($ROWS['CountryId']==$selected)
			{
				$str.='<option value="'.$ROWS['CountryId'].'" selected="selected" style="background-image:url(../SpitechImages/Country/'.$ROWS['ISO2'].'.png);background-repeat:no-repeat;background-position:bottom left;
				padding-left:30px;">
				'.$ROWS['ShortName'].'
				</option>';
		    }
			$str.='<option value="'.$ROWS['CountryId'].'" style="background-image:url(../SpitechImages/Country/'.$ROWS['ISO2'].'.png);background-repeat:no-repeat;background-position:bottom left;
			padding-left:30px;">
			'.$ROWS['ShortName'].'
			</option>';
		}	        
		$str.='</select> ';
		echo $str;
	}

	function back_url(){
		$url=$_SERVER['HTTP_REFERER'];
		$pos = strpos($url,"?");
		if($pos>0)
			$url1 = substr($url, 0,$pos);
		else
			$url1 =$url;
		return "location:".$url1;
	}

    function check_blanks($arr){
		$error=true;
		foreach ($arr as $key => $value) {
			if(empty($value)){
				$error=false;  	 
				break;
			}
		}	
		return  $error;
	}
	
	function has_file($FileFieldName){
		$HasFile=false;
		if($_FILES[$FileFieldName]["name"])
		$HasFile=true;	
	    return $HasFile;
	}
	
	function get_parameters($arr){
		$Parameters="";
		foreach ($arr as $key => $value)
		{
		$Parameters.="$key=$value&";
		}	
		return  $Parameters;
	}
	
	//padding to one length numerics
	function pad_digit($digit){
		if($digit<=9)
			$digit = "0".$digit;
		return $digit;
	}
	
	/********************************************************************
	Remove Pad Ex 01 becomes 1
	********************************************************************/	
	function remove_pad($digit){
		if($digit[0]=='0')
			$ret = $digit[1];
		else
			$ret = $digit;
		return $ret;
	}
	
	function get_random_number( $length = 16 ) {
     $chars = "0123456789";
     $password = substr( str_shuffle( $chars ), 0, $length );
     return $password;
    }
	
	function get_random( $length = 16 ) {
     $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
     $password = substr( str_shuffle( $chars ), 0, $length );
     return $password;
    }

	
	
	/******************************************************************************************
	//calculate the age of the persons
	******************************************************************************************/	
	function get_age($S_DATE, $E_DATE){
		$ageparts = explode("-",$S_DATE);
		$today = $E_DATE;
		$todayparts = explode("-",$today);
		$age=  $todayparts[0]-$ageparts[0];
		$Month=$todayparts[1]-$ageparts[1];
		$Day=  $todayparts[2]-$ageparts[2];
		return floor($age+($Month/12)+($Day/365));   
	} 
	
function message($msg,$type='success'){
	$return_msg='';
	if($msg!=""){	
		switch($type){
			case "success":
				$return_msg="<div class='msg-success' >".$msg."</div>";
				break;
			case "warning":
				$return_msg="<div class='msg-warning'>".$msg."</div>";
				break;	
			case "error":
				$return_msg="<div class='msg-error'>".$msg."</div>";
				break;	
			case "info":
				$return_msg="<div class='msg-info'>".$msg."</div>";
				break;						
		}
	}
	echo $return_msg;	
}

	function selected_select($left,$right){ 
	 if($left==$right) { echo " selected='selected' style='background:lightgreen; ' "; }
	}
	
	function checked_checkbox($Left, $Right){
		if($Left==$Right) { echo " checked='checked' " ; } 
	}

	function checked_radio($Left, $Right){
		if($Left==$Right) { echo " checked='checked' " ; } 
	}

	function create_list($STRING, $List_type="ul", $Class="", $ID=""){
		$array=@split(",",$STRING);
		$COUNT=count($array);
		if($COUNT>0){
		  if($Class!="") { $NewClass=" class='$Class' "; }
		  if($ID!="")    { $NewID=" id='$ID' "; }		 
		  echo "<".$List_type." $NewClass $NewID >";
		  for($S=0;$S<$COUNT;$S++){
			  if(trim($array[$S])!=""){
					echo "<li>".$array[$S]."</li>";
			  }
		  }
		  echo "</".$List_type.">";
		}
	}
	//-----------------pagination ---------------
	function pagination($links){
		 $str='<ul class="pagination">';                                  
          foreach ($links as $link) {
                $str.="<li>". $link."</li>";
             }
         $str.='</ul>';
	}
	/*
	@name : money : the function converts the money field into proper money format by separating with comma(,)
	@param : $number : number field value to be converted.
	@param : $fractional : decides whether output will include fractional part or not.
	*/	
	function money($number, $fractional=true){ 
			if ($fractional){ 
				$number = sprintf('%.2f', $number); 
			} 
			while(true){ 
				$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number); 
				if ($replaced != $number){ 
					$number = $replaced; 
				} else{ 
					break; 
				} 
			} 
			return $number;
		}
             
?>