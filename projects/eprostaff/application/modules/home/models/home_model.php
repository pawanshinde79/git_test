<?php

    class Home_model extends CI_Model
    {
            function __construct() {
                parent::__construct();
            }

            function saveDemoRequest($inputData) {
                $data = array(
                    'firstName'     =>  !empty($inputData['txt_firstName']) ? $inputData['txt_firstName'] : " ",
                    'lastName'      =>  !empty($inputData['txt_lastName']) ? $inputData['txt_lastName'] : " ",
                    'email'         =>  !empty($inputData['txt_email']) ? $inputData['txt_email'] : " ",
                    'companyName'   =>  !empty($inputData['txt_cmpName']) ? $inputData['txt_cmpName'] : " ",
                    'phone'         =>  !empty($inputData['txt_phoneNo']) ? $inputData['txt_phoneNo'] : " ",
                    'comments'      =>  !empty($inputData['txt_comment']) ? $inputData['txt_comment'] : " ",
                    'createdOn'     =>  date('Y-m-d H:i:s')
                );
                return $this->db->insert('guest_users', $data);
            }

    } // End of Class

?>