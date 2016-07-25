<?php

class Home extends MX_Controller {

    function __construct() {
        parent::__construct();
    }

    function index($get_id=0){
        // echo base_url(); exit("Here ..@");
        if(!empty($_GET['txt_firstName']) && $_GET['btn_submitSchedule'] == "sendEmail") {
            $this->home_model->saveDemoRequest($_GET);
            $message = $this->email_template->msgDemoRequest2($_GET); // From Libraries
            $message1 = $this->email_template->msgDemoRequest2_reply($_GET); // From Libraries
            $this->user_manager->ci_send_email($_GET['txt_email'],"mamatha@css-epro.com","Demo Request | Verification",$message);
            $this->user_manager->ci_send_email("mamatha@css-epro.com",$_GET['txt_email'],"Demo Reply | EPRO Team",$message1);
            $this->session->set_flashdata("success","Thank you ,we will answer shortly.");
            redirect(base_url());
        }
        else {
            $this->load->view("index");
        }

    }

    function tab3demo() {
        if(!empty($_GET['txt_firstName']) && $_GET['btn_submitSchedule'] == "sendEmail") {
            $this->home_model->saveDemoRequest($_GET);
            $message = $this->email_template->msgDemoRequest($_GET); // From Libraries
            $this->user_manager->ci_send_email($_GET['txt_email'],"dev.dpersist@gmail.com","Demo Request | Verification",$message);
            $this->session->set_flashdata("success","Thank you ,we will answer shortly.");
            redirect(base_url()."home/tab3demo");
        }
        else {
            $this->load->view("tab3demo");
        }

    }


} // End of Class

?>
