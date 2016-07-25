<?php
class Sample extends MX_Controller
{
	function __construct(){
		parent::__construct();					
	}
	
	function index($page='index'){
		$data['title']="Admin Sample";	
		$data['SelectedMenu']="Sample";			    		    
		$this->load->view('admin_header',$data);		
		switch($page){
		case 'index' :
		$data['title']="Sample Index";			    
		$this->load->view('index',$data);		
		break;
		case 'form' :
		$data['title']="Sample Form";			    
		$this->load->view('form',$data);		
		break;
		case "tab":
		$data['title']="Sample Tab";			    
		$this->load->view('tab',$data);		
		break;
		case "profile":
		$data['title']="Sample Profile";			    
		$this->load->view('profile',$data);		
		break;
		case "blank":
		$data['title']="Sample Blank";			    
		$this->load->view('blank',$data);		
		break;
		default :
		echo 'Invalid Request';
		exit;
		break;
		}
		$this->load->view('admin_footer_data_table',$data);
	}			
}
?>