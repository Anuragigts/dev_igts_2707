<?php
    class Api extends CI_Controller {
        public function __construct(){
            parent::__construct();
           // $this->load->library('form_validation');
             $this->load->model('api_model');
             $this->load->library('form_validation');
              date_default_timezone_set('Asia/Kolkata');          
        }
        public function checkLogin(){
            $agent = $this->input->get_post('agent');
            if($agent != ''){
                echo $result = $this->api_model->checkLogin($agent);
                return $result;
            }else{
                return "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>Invalid</response>";
            }
        }
         public function isValidTransfer(){
            $agent = $this->input->get_post('agent');
            $amt = $this->input->get_post('amount');
            if( $agent != "" && $amt != ''){
                $result = $this->api_model->isValidTransfer($agent,$amt);
                return $result;
            }else{
                return "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>Invalid</response>";
            }
        }
        public function sendSuccessInfo(){
            $agent = $this->input->get_post('agent');
            $amt = $this->input->get_post('amount');
            $beneficaryID = $this->input->get_post('beneficary_id');
            $track_id = $this->input->get_post('track_id');
            $transstatus = $this->input->get_post('transaction_status');
            $responseCode = $this->input->get_post('response_code');
            $rrn = $this->input->get_post('rrn');
            $statuscode = $this->input->get_post('status_code');
            $beneficaryname = $this->input->get_post('beneficary_name');
             if( $agent != "" && $amt != '' && $beneficaryID != '' && $track_id != '' && $transstatus != '' && $responseCode != '' && $rrn != '' && $statuscode !='' && $beneficaryname != ''){
                $result = $this->api_model->sendSuccessInfo($agent,$amt,$beneficaryID,$track_id,$transstatus,$responseCode,$rrn,$statuscode,$beneficaryname);
                return $result;
            }else{
                return "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>Invalid</response>";
            }
        }
        
        public function sendSuccessTopupInfo(){
            $agent = $this->input->get_post('agent');
            $amt = $this->input->get_post('amount');
            $name = $this->input->get_post('name');
            $serial = $this->input->get_post('serial');
            $topupval = $this->input->get_post('topupval');
            $currnetvalue = $this->input->get_post('currnetvalue');
            $previousvalue = $this->input->get_post('previousvalue');
            $topuptransid = $this->input->get_post('previousvalue');
            $expirydate = $this->input->get_post('expirydate');
            if( $agent != "" && $amt != '' && $name != '' && $track_id != '' && $serial != '' && $topupval != '' && $currnetvalue != '' && $previousvalue !='' && $topuptransid != '' && $expirydate != ''){
                $result = $this->api_model->sendSuccessTopupInfo($agent,$amt,$name, $serial, $topupval, $currnetvalue, $previousvalue, $topuptransid, $expirydate);
                return $result;
            }else{
                return "<?xml version='1.0' encoding='utf-8' standalone='no'?><response>Invalid</response>";
            }
        }
        public function getdataUrl(){
            $data = array(
              'title'         => 'ESY TOPUP :: DMR SENDER REGISTRATION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_sender_registration'
             );
            $data['result'] = array();
             if($this->input->post('login')){
                $this->form_validation->set_rules('login_email',          'Login Name',            'required');
                $this->form_validation->set_rules('login_password',           'Password',             'required');
                if($this->form_validation->run() == TRUE){
                    if($this->input->post('login_email') == "test" && $this->input->post('login_password') == "test"){
                    $data['result'] = $this->api_model->getuser();
                        
                    }
                }
             }
            
         
            //echo sha1($str);
          //$encode = base64_encode($str);
          
          $this->load->view("detdataurl", $data);

            
        }

                 

    }