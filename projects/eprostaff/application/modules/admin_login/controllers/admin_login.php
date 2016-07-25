<?php
class Admin_login extends MX_Controller
{
	function __construct(){
		parent::__construct();			
		$this->load->model('admin_login_model','main_model');				
	}
	
	function index(){
	   if($this->login_model->is_logged_in()==TRUE)
		   redirect(base_url().'admin_dashboard/');
		
		$data['title']="Admin Login";			    
		if($this->input->post('submit')){			
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[4]|max_length[10]');
			if($this->form_validation->run()==TRUE)
			{
				if($this->login_model->login('admin')){
					redirect(base_url()."admin_dashboard/");
				}else {
				$this->session->set_userdata('msg','Invalid Login details.');			
				}				
			}
		}		
		$this->load->view('login_header',$data);		
		$this->load->view('login',$data);		
		$this->load->view('login_footer',$data);
		$this->session->unset_userdata('msg');		
	}			
	function forgot_password(){		
	
		$data['title']="Forgot Password";		
		if($this->input->post('submit')){
		$email =$this->input->post('email');
		 $response=$this->spitech_common->forgot_password('users','email',$email);
		 if($response=='y'){
			 $this->session->set_userdata('msg','New password is sent to your email id.');
			  redirect(base_url().'admin_login/');
		 }else{
			 $this->session->set_userdata('msg','Invalid Login Details');
			  redirect(base_url().'admin_login/forgot_password/');
		 }
		}
		$this->load->view('login_header',$data);		
		$this->load->view('forgot_password',$data);		
		$this->load->view('login_footer',$data);
		$this->session->unset_userdata('msg');		
	}
	
	function logout(){	
	//session_destroy();  	
		$this->session->sess_destroy();
		$this->session->userdata = array();
		redirect(base_url()."admin_login/");
	}
	
}
?>