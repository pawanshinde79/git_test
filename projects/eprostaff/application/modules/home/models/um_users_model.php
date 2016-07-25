<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Um_users_model extends CI_Model {

	function __construct(){
        parent::__construct();
    }


	public function register($data){
		$this->db->select('count(email) as email_count');
		$this->db->where('email',$data['email']);
		$this->db->from('users');
		$query   = $this->db->get();
		$row     = $query->row();
		$count   = $row->email_count;
		if($count > 0){
			return $count;
		}
		else{
			$query = $this->db->insert('users',$data);
			return $count;
		}
	}

	function verify_email($getData) { // Email verification after signup and click on the sended link to registered email id.
		if(!empty($getData)){
			$this->db->where('email', $getData['email']);
			$this->db->where('verificationStatus',$getData['verificationStatus']);
			$Query = $this->db->get('users');
			if($Query->num_rows() > 0){
				$data = array( 'verificationStatus' => 1);
				$this->db->where('email', $getData['email']);
				$this->db->where('verificationStatus',$getData['verificationStatus']);
				$this->db->update('users', $data);
				$iResponse = $this->db->trans_complete();
				return $iResponse;
			}
		}
	}

	function user_login($user_data) {
		$this->db->where('email',$user_data['email']);
		$this->db->where('password',$user_data['password']);
		$query  = $this->db->get("users");
		$result = $query->result();
		$row    = $query->row();

		if($result){
			$this->db->where('email',$user_data['email']);
			$this->db->where('password',$user_data['password']);
			$this->db->where('verificationStatus',1);
			$query  = $this->db->get("users");
			if($query->num_rows() == 0){
				$result = 0;
				return $result;
			}
			else {
				$result = json_encode($row);
				return $result;
			}
		}
		else {
			$result = -1;
			return $result;
		}

	}

	function update_lastlogin_date($getData){
		$this->db->where("email",$getData);
		$data = array("lastLoginDtTm" => date("Y-m-d H:i:s"));
		$query = $this->db->update("users",$data);
		return $query;
	}

	function email_exists($getEmail){
		$this->db->where('email',$getEmail);
		$this->db->where('verificationStatus',1);
		$query  = $this->db->get("users");
		$row    = $query->row();
		return $row;
	}

	function temp_reset_password($temp_pass,$user_name){
		$data = array(
			'email' 	=> $user_name,
			'password'  => $temp_pass
		);
		$this->db->where('email', $user_name);
		$this->db->where('verificationStatus',1);
		$this->db->update('users', $data);
		return true;
	}

	function is_temp_pass_valid($getData) {
		$this->db->where('email', $getData['email']);
		$this->db->where('password', $getData['token']);
		$query = $this->db->get('users');
		$result = $query->num_rows();
		return $result;
	}

	function change_password($getData,$newPass){
		$getResult = $this->is_temp_pass_valid($getData);
		if($getResult == 1){
			$data = array(
				'password'  => $newPass
			);
			$this->db->where('email', $getData['email']);
			$this->db->where('password', $getData['token']);
			$this->db->update('users', $data);
			return true;
		}
		else {
			return false;
		}
	}



}  // End Of Class
?>