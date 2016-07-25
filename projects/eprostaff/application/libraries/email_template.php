<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 


class Email_template {

	function msgDemoRequest($getInputs){
		$message  = '<!DOCTYPE html><head></head><body>';
		$message .=
			'<div>
                    <h3 style="background:#0096EC;text-align:center; padding:10px; color:#FFFFFF;font-size:16px;">EPRO Staffing</h3>

                    <div></div>
                      <div class="" style="background:#FFFFFF;padding:10px;color:#000000;border-bottom:1px solid #CCCCCC;font-size:16px;">
                          <p style="font-size:13px;">User Name: '.$getInputs['txt_firstName'].' '.$getInputs['txt_lastName'].'</p>
                          <p style="font-size:13px;">Company Name: '.$getInputs['txt_cmpName'].'</p>
                          <p style="font-size:13px;">Phone no: '.$getInputs['txt_phoneNo'].'</p>
                          <div></div>

                      </div>
                      <div class="" style="background:#FFFFFF; padding:10px; color:#000000; font-size:16px;">
                        <p style="font-size:14px;">Regards,</p>
                        <p style="font-size:14px;">EPRO Team</p>
                        </div>
                </div>';
		$message .= '</body></html>';
		return $message;
	}

	function msgDemoRequest2($getInputs){
		$message  = '<!DOCTYPE html><head></head><body>';
		$message .=
			'<div>
                    <h3 style="background:#0096EC;text-align:center; padding:10px; color:#FFFFFF;font-size:16px;">EPRO Staffing</h3>

                    <div></div>
                      <div class="" style="background:#FFFFFF;padding:10px;color:#000000;border-bottom:1px solid #CCCCCC;font-size:16px;">
                          <p style="font-size:13px;">User Name: '.$getInputs['txt_firstName'].' '.$getInputs['txt_lastName'].'</p>
                          <p style="font-size:13px;">Company Name: '.$getInputs['txt_cmpName'].'</p>
                          <p style="font-size:13px;">Phone no: '.$getInputs['txt_phoneNo'].'</p>
                          <p style="font-size:13px;">Comment: '.$getInputs['txt_comment'].'</p>
                          <div></div>

                      </div>
                      <div class="" style="background:#FFFFFF; padding:10px; color:#000000; font-size:16px;">
                        <p style="font-size:14px;">Regards,</p>
                        <p style="font-size:14px;">EPRO Team</p>
                        </div>
                </div>';
		$message .= '</body></html>';
		return $message;
	}

	function msgDemoRequest2_reply($getInputs){
		$message  = '<!DOCTYPE html><head></head><body>';
		$message .= '<div>
						<h3 style="background:#0096EC;text-align:center; padding:10px; color:#FFFFFF;font-size:16px;">EPRO STAFF</h3>
						<p>Hi '.$getInputs['txt_firstName'].' '.$getInputs['txt_lastName'].',</p>
						<div></div>
						  <div class="" style="background:#FFFFFF;padding:10px;color:#000000;border-bottom:1px solid #CCCCCC;font-size:16px;">
							  <p style="font-size:13px;">Thank you for connecting with us. We have received your request for a Demo of EPRO. We appreciate your interest. Someone from our team will get back to you shortly to schedule a date/time for a demo.
							  <p style="font-size:13px;">Thank you again for the consideration. We look forward to a growing relationship with you.
							  <div></div>
						  </div>
						  <div class="" style="background:#FFFFFF; padding:10px; color:#000000; font-size:16px;">
							<p style="font-size:14px;">Regards,</p>
							<p style="font-size:14px;">EPRO Team</p>
							</div>
					</div>';
		$message .= '</body></html>';
		return $message;
	}

	function msgRegistration($dbdata){
		$szVerfUrl  = base_url()."home/user_manager_ci/email_verify?email=".$dbdata['email']."&salt_key=".$dbdata['verificationStatus'];
		$message  = '<!DOCTYPE html><head></head><body>';
		$message .= '<div>
						<h3 style="background:#0096EC;text-align:center; padding:10px; color:#FFFFFF;font-size:16px;">EPRO STAFF</h3>
						<p>Dear '.$dbdata['firstName'].' '.$dbdata['lastName'].',</p>
						<div></div>
						  <div class="" style="background:#FFFFFF;padding:10px;color:#000000;border-bottom:1px solid #CCCCCC;font-size:16px;">
							  <p style="font-size:13px;">Thanks for signing up with EproStaff !  Your account has been created.
						You can login with the following credentials after you have activated your account by clicking on the url below:</p>
							  <div></div>
							  <p style="font-size:13px;">Username: '.$dbdata['email'].'</p>
							  <p style="font-size:13px;">Password: '.$dbdata['password'].'</p>

							  <div></div>
							  <p style="font-size:13px;"><a href="'.$szVerfUrl.'">Click here </a>if you want to verify your mail id.</p>
							  <div></div>
							  <p style="font-size:13px;">Note: If the above link does not work properly, then paste the below URL into your browser:</p>
							  <p style="font-size:13px;">"'.$szVerfUrl.'"</p>
						  </div>
						  <div class="" style="background:#FFFFFF; padding:10px; color:#000000; font-size:16px;">
							<p style="font-size:13px;">Regards,</p>
							<p style="font-size:13px;">EPRO Team</p>
							</div>
					</div>';
		$message .= '</body></html>';
		return $message;
	}

	function msgForgotPassword($result,$temp_pass){
		// send email with #temp_pass as a link
		$szVerfUrl  = base_url()."home/user_manager_ci/check_token_for_reset_pass?email=".$result->email."&token=".$temp_pass;

		$message  = '<!DOCTYPE html><head></head><body>';
		$message .= '<div>
						<h3 style="background:#0096EC;text-align:center; padding:10px; color:#FFFFFF;font-size:16px;">EPRO STAFF</h3>
						<p style="font-size:13px;">This email has been sent as a request to reset your password.</p>
						<h4 style="background:#CCCCCC;padding:10px;color:#000000;text-align:center;margin-top:-8px;font-size:16px;">Reset Password</h4>
						<div></div>
							<div class="" style="background:#FFFFFF;color:#000000;font-size:16px;">
							  <p style="font-size:13px;">Dear '.$result->firstName.' '.$result->lastName.',</p>
							  <div></div>
							  <p style="font-size:13px;"><a href="'.$szVerfUrl.'">Click here </a>if you want to reset your password.</p>
							  <div></div>
							  <p style="font-size:12px;">Note: If the above link does not work properly, then paste the below URL into your browser:</p>
							  <p style="font-size:13px;">"'.$szVerfUrl.'"</p>
							</div>
							<p style="font-size:13px;">Regards,</p>
							<p style="font-size:13px;margin-top: -9px;">EPRO Team</p>
					</div>';
		$message .= '</body></html>';
		return $message;
	}


}