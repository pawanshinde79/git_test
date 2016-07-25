<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_manager_ci extends CI_Controller {

	function __construct() {
		parent::__construct();
	}


	function register (){

		if(!empty($_GET['txtFirstName']) && $_GET['btn_signup'] == "btnRegister" ) {

			$dbdata = "";
			$dbdata = array(
				'firstName'		=>	$this->input->get('txtFirstName'),
				'lastName'		=>	$this->input->get('txtLastName'),
				'company'		=>	$this->input->get('txtCmpName'),
				'email'			=>	$this->input->get('txtEmail'),
				'password'		=>	md5(time().rand(99999,28579)),
				'phone'			=>	$this->input->get('txtAddress'),
				'address'		=>	$this->input->get('txtAddress'),
				'verificationStatus' =>	$this->user_manager->salt_gen(),
				'createdOn'		=>	date('Y:m:d H:i:s'),
			);

			$result = $this->um_users_model->register($dbdata);

			if($result == 0){
				$message = $this->email_template->msgRegistration($dbdata); // From Libraries
				$this->user_manager->ci_send_email("mamatha@css-epro.com",$dbdata['email'],"Email Verification | EproStaff",$message);
				$this->session->set_flashdata('success', 'Your account has been created, Please check your e-mail for activation link.');
				redirect(base_url());
			}
			else if($result == 1){
				$this->session->set_flashdata('error', 'Email already exists');
				redirect(base_url()."home/user_manager_ci/register");
			}
			else {
				$this->session->set_flashdata('error', 'Please contact your administrator !');
				redirect(base_url()."home/user_manager_ci/register");
			}
		}
		else {
			$this->load->view("signup");
		}

	}

	function email_verify() {
		$fixedstring = str_replace(" ", "+", $this->input->get("salt_key"));
		$data = array(
			'verificationStatus' => $fixedstring, 'email'  => $this->input->get("email")
		);

		$iResponse = $this->um_users_model->verify_email($data);
		if($iResponse == 1){
			$this->session->set_flashdata('success',"Email verified successfully.");
			redirect(base_url()."home/user_manager_ci/login");
			//redirect(base_url()."home/user_manager_ci/change_pass");
		}else{
			$this->session->set_flashdata('error',"Invalid verification link.");
			redirect(base_url());
		}
	}

	function login(){
        
		if(!empty($_POST['txtEmail']) && $_POST['btnSubmit'] == "loginBtn" ) {
			$user_data = array(
				'email' 	=> $_POST['txtEmail'],
				'password'	=> $_POST['txtPassword']
			);
			$result = $this->um_users_model->user_login($user_data);

			if ($result == -1) {
				$this->session->set_flashdata('error',"Incorrect username or password.");
				redirect(base_url()."home/user_manager_ci/login");
			}
			else if($result == 0 && strlen($result) == 1) {
				$this->session->set_flashdata('error','Your email id is not verified.');
				redirect(base_url()."home/user_manager_ci/login");
			}
			else {
				$result = json_decode($result);
				$this->user_manager->login_user($result);
				$this->session->set_flashdata('success','Welcome to EPRO Staff ERP System.');
				redirect(base_url());
			}
		}
		else{
			$this->load->view("login");
		}
	}

	function forgetpass(){
		if(isset($_POST['txtEmail']) && $_POST['btnSubmit'] == "resetPassword" ) {
			$result = $this->um_users_model->email_exists($_POST['txtEmail']);
			if(!empty($result)) {
				// $them_pass is the varible to be sent to the user's email
				$temp_pass = md5(time().uniqid().rand(52487,78955));
				$message = $this->email_template->msgForgotPassword($result,$temp_pass);  // From Libraries

				$this->user_manager->ci_send_email("mamatha@css-epro.com",$result->email,"Reset password | EproStaff",$message);

				if($this->um_users_model->temp_reset_password($temp_pass,$result->email)){
					$this->session->set_flashdata('success', "Check your email for instructions to reset password.");
					redirect(base_url()."home/user_manager_ci/login");
				}
				else {
					$this->session->set_flashdata('error', 'Email was not sent, please contact your administrator.');
					redirect(base_url()."home/user_manager_ci/forgetpass");
				}
			}
			else {
				$this->session->set_flashdata('error', 'Email id does not exists');
				redirect(base_url()."home/user_manager_ci/forgetpass");
			}

		}
		else {
			$this->load->view("forgetpass");
		}
	}

	function change_pass() {
		if(isset($_POST['txtConfirPass']) && $_POST['btnChangePass'] == "changePass" ) {
			$txtNewPass        = $this->input->post('txtNewpass');
			$txtConfirmedPass  = $this->input->post('txtConfirPass');
			if($txtNewPass != $txtConfirmedPass) {
				$this->session->set_flashdata('error', 'Password is not matching with new password.');
				redirect(base_url()."home/user_manager_ci/change_pass/?email=".$_GET['email']."&token=".$_GET['token']);
			}
			else {
				$data = $this->um_users_model->change_password($_GET,$txtConfirmedPass);
				if($data == "success"){
					$this->session->set_flashdata('success', 'Successfully updated password.');
				}else {
					$this->session->set_flashdata('error', 'Some error occured ,please contact your administrator.');
				}
				redirect(base_url());
			}
		}
		else {
			$this->load->view("change_password");
		}

	}


	function check_token_for_reset_pass() {

		$result = $this->um_users_model->is_temp_pass_valid($_GET);
		if($result > 0) {
			redirect(base_url()."home/user_manager_ci/change_pass/?email=".$_GET['email']."&token=".$_GET['token']);
		}else{
			echo "The key is not valid";
		}

	}

	function logout_user() {
		$this->user_manager->logout_user("logged_in");
	}


	
}		// End Of Class
?>
