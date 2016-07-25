<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class User_manager {

	function __construct(){

	}
	
	//generates a random hash
    public function salt_gen(){
		$CI =& get_instance();
		$CI->load->library('encrypt');
		return $CI->encrypt->encode(time(), md5('KYnIgZxWKew0nOm2bu4Zd'));
    }
	
	//generates a random hash based on the salt
	public function activation_gen($salt){ 
		$CI =& get_instance();
		$CI->load->library('encrypt');
		return md5($CI->encrypt->encode(time(),$salt));
    }
	
	//encodes the password in to a unique hash 
	public function encode_password($pass){
		$CI =& get_instance();
		$CI->load->library('encrypt');
		return $CI->encrypt->sha1($pass);
	}
	
	//registers a user with the given data
	public function register_user($dbdata){
	$CI =& get_instance();
	
		$salt=$this->salt_gen();//generates a unique salt for this user
		//data prep
		$def_dbdata=array(
			'salt'=>$salt,
			'activationkey'=>$this->activation_gen($salt),//genarate an activation key bsd on the salt
			'accountactive'=>1, //$CI->config->item('um_accountactive'),
			'accountblocked'=>$CI->config->item('um_accountblocked'),
			'registereddate'=>time(),
			'lastloggenindate'=>0,
			'userlvl'=>0,
			'address'=>'',
			'interests'=>'',
			'profileprivacy'=>$CI->config->item('um_profileprivacy'),
			'appearonline'=>$CI->config->item('um_appearonline')
			);
		$dbdata=array_merge($dbdata,$def_dbdata);
		
		$dbdata['password']=$this->encode_password($dbdata['password'],$salt);
		
		$CI->um_users_model->register_user($dbdata);
		$this->send_activation_email($dbdata['username'],$dbdata['email'],$def_dbdata['activationkey']);		
	}
	
	//logs in a user
	public function login_user($getData) {
		$CI =& get_instance();
		$CI->load->library('session');
	
		$sess_data = array(
			'firstName'	=>	$getData->firstName,
			'lastName'	=>	$getData->lastName,
			'email'		=>	$getData->email,
			'phone'		=>	$getData->phone
		);
		$CI->session->set_userdata('logged_in',$sess_data);
		$CI->um_users_model->update_lastlogin_date($getData->email);
		return true;
		//$logged_in_data['ip']=$_SERVER['HTTP_X_FORWARDED_FOR'];
		//$CI->um_users_model->register_user_as_logged_in($username);
	}
	
	//logout and clears the session for a user
	public function logout_user($sessName){
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->session->unset_userdata($sessName);
		$CI->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
	
	//updates the password for a user
	public function update_password($email,$token,$newpassword){
		$CI =& get_instance();
		$CI->load->library('email');
		
		if($CI->um_users_model->is_user_exist2($email)){
			$dbtoken=$CI->um_users_model->get_activation_key_by_email($email);
			if($token==$dbtoken){
				$CI->um_users_model->update_password($email,$this->encode_password($newpassword));
				//and reset the activation key no more resetting
				$salt=$CI->um_users_model->get_salt_by_email($email);
				$new_activation=$this->activation_gen($salt);
				$CI->um_users_model->update_activation_key($email,$new_activation);
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	
	//updates user info
	public function update_user_info($username,$dbdata){
		$CI =& get_instance();
		$CI->load->library('email');
		
		if($CI->um_users_model->is_user_exist($username)){
			$CI->um_users_model->update_user($username,$dbdata);
			return true;
		}else{
			return false;
		}
	}
	

	/*
	emails - see email.php in config for settings
	*/
	
	/*
	send account activation email to the user
	*/
	public function send_activation_email($username,$email,$activationkey){
		$CI =& get_instance();
		$CI->load->library('email');
		$config=array(
		'charset'=>'utf-8',
		'wordwrap'=> TRUE,
		'mailtype' => 'html'
		);
		$CI->email->initialize($config);
		$CI->email->from($CI->config->item('um_email_from'), $CI->config->item('um_email_from_name'));
		$CI->email->to($email);
		$CI->email->subject($CI->config->item('um_email_activate_subject'));
		
		$data['username']=$username;
		$data['email']=$email;
		$data['activationkey']=$activationkey;

		$message = $CI->load->view('email/activation',$data,TRUE); // this will return you html data as message
		$CI->email->message($message);
		$CI->email->send();
		//echo $CI->email->print_debugger();//turn this on for debugging if needed
	}
	
	/*
	send the password reset mail to the user
	*/
	public function send_pass_reset_email($email){
		$CI =& get_instance();
		//first see if this user really exist
		if($CI->um_users_model->is_user_exist2($email)){
			//is the users account active?
			if($CI->um_users_model->is_account_active($email)){
				$username=$CI->um_users_model->get_username_by_email($email);
				//reset the activation key
				$salt=$CI->um_users_model->get_salt_by_username($username);
				$new_activation=$this->activation_gen($salt);
				$CI->um_users_model->update_activation_key($email,$new_activation);
				
				//now send the email
				$CI->load->library('email');
			
				$CI->email->from($CI->config->item('um_email_from'), $CI->config->item('um_email_from_name'));
				$CI->email->to($email); 
				
				$CI->email->subject($CI->config->item('um_email_reset_subject'));
				$CI->email->message('<h1>Hello '.$username.' !</h1><h3>You requested a password reset for your account</h3>
				<br />
				<a href="'.base_url().'resetpass?email='.$email.'&token='.$new_activation.'">Click here to reset your password
				</a>');	
				
				$CI->email->send();
				//echo $CI->email->print_debugger();//turn this on for debugging if needed
				return true;
			}else{
				//cannot reset pass for an account that has not been activated yet
				return false;
			}
		}else{
			return false;
		}
	}
	
	/*
	returns the current username
	*/
	public function this_user_name(){
		$CI =& get_instance();
		
		$session_data= $CI->session->userdata('logged_in');
		 if($CI->um_users_model->is_user_exist($session_data['username'])){
		 	return $session_data['username'];
		 }else{
		 	show_404();
		 }
	}

	public function this_user_id(){
		$CI =& get_instance();
		
		$session_data= $CI->session->userdata('logged_in');
		 if($CI->um_users_model->is_user_exist($session_data['username'])){
		 	$id = $CI->um_users_model->get_user_details($session_data['username']);
		 	return $id['users_id'];
		 }else{
		 	show_404();
		 }
	}

	public function this_user_first_name()
	{
		$CI =& get_instance();
		$session_data= $CI->session->userdata('logged_in');
		 if($CI->um_users_model->is_user_exist($session_data['username'])){
		 	$id = $CI->um_users_model->get_user_details($session_data['username']);
		 	return $id['firstname'];
		 }else{
		 	show_404();
		 }

	}



	public function ci_send_email($from,$to,$subject,$message){  
        
        $CI =& get_instance();
		$CI->load->library('email');
        $CI->email->set_newline("\r\n");
		$config = array(  // Using SendGrid SMTP.
    		'mailtype'	=>	'html',
			'protocol'	=> 	'smtp',
			'smtp_host'	=> 	'smtp.sendgrid.net',
			'smtp_user'	=> 	'admin.eprostaff',
			'smtp_pass'	=> 	'password123',
			'smtp_port'	=> 	587,
			'crlf' 		=> '\r\n'
  		);
		
		$fromName = explode("@",$from);
		$CI->email->initialize($config);
		$CI->email->from($from, ucfirst($fromName[0]));
		$CI->email->to($to);
		$CI->email->subject($subject);

		$CI->email->message($message);
		$CI->email->send();
        return TRUE;
    }


}