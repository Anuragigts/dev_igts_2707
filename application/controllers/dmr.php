<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dmr extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('dmr_model');
        $this->load->model('common');
    }
    
    public function sender_registration(){
         $data = array(
              'title'         => 'SC :: DMR SENDER REGISTRATION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_sender_registration'
             );
         if($this->input->post('register')){
            $this->form_validation->set_rules('first_name',     'First Name',       'required');
            
            $this->form_validation->set_rules('last_name',      'Last Name',        'required');
            $this->form_validation->set_rules('mobile',         'Mobile Number',    'required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('state',          'State',            'required');
            $this->form_validation->set_rules('city',           'City',             'required');
            $this->form_validation->set_rules('add',            'Address',          'required');
            $this->form_validation->set_rules('zip',            'ZIP',              'required');
            $this->form_validation->set_rules('kyc',            'KYC',              'required');
            
            if($this->input->post('kyc') != '1'){
                $this->form_validation->set_rules('middle_name',    'Middle Name',      'required');
                $this->form_validation->set_rules('m_name',         "Mother's Name",    'required');
                $this->form_validation->set_rules('dob',            "Date Of Birth",    'required');
                $this->form_validation->set_rules('email',          "Email",            'required|email');
                $this->form_validation->set_rules('id_proof_type',  'ID Proof Type',    'required');
                $this->form_validation->set_rules('id_proof',       'ID Proof',         'required');
                $this->form_validation->set_rules('id_proof_url',   'ID Proof URL',     'required');
                $this->form_validation->set_rules('address_proof_type','Address Proof Type','required');
                $this->form_validation->set_rules('address_proof',  'Address Proof',    'required');
                $this->form_validation->set_rules('address_proof_url','Address Proof URL','required');
            }
            
            
            
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doRegister();
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','Registration fail : Some internal error occurred.');  
                     redirect('dmr/sender_registration');
                }
               else if( $result == 20){                    
                    $this->session->set_flashdata('err','Registration fail : Already Reginster.');  
                     redirect('dmr/sender_registration');
                }else{
                    $this->session->set_flashdata('msg','Your Registration is successfull Please verify if by using OTP.');  
                    redirect('dmr/otp/'.$result);
                     
                }
            }
        }
        
        if($this->input->post('verify_pin')){
            $this->form_validation->set_rules('otp',     'PIN',       'required');
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->setPin();
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','PIN verification fail : Some internal error occurred.');  
                     redirect('dmr/sender_registration');
                } else{
                    $this->session->set_flashdata('msg','Your PIN verification is successfull.');  
                    redirect('dmr/sender_registration/');
                     
                }
            }
        }
        $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
        $data['sender_details'] = $this->dmr_model->sender_details();
        $this->load->view('layout/inner_template',$data);
    }
    
    public function getCity(){
        $state = $_POST['state'];
        $val = '';
        $cityies = $this->common->getCityChanged($state);
       // print_r($states);
        if(count($cityies)>0){
            $val .= "<option value=''>Select</option>";
            foreach($cityies as $ct){
                 $val .= "<option value='".$ct->City_name."'>".$ct->City_name."</option>";
            }
        }
        echo $val;
        
    }
     public function otp(){
        $transection_id = $this->uri->segment(3);
         $data = array(
              'title'         => 'DMR :: OTP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_register_otp'
             );
         $data['details'] = $this->dmr_model->getDMRDetails($transection_id);
        
         if($this->input->post('send')){
            $this->form_validation->set_rules('trans',  'Transection Id',   'required');
            $this->form_validation->set_rules('otp',    'OTP',              'required');
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doVerify($transection_id);
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your Verification is successfull .');  
                    redirect('dmr/sender_registration');
                }
               else if( $result == 2){                    
                    $this->session->set_flashdata('err','Verification fail : Invalid OTP.');  
                      redirect('dmr/otp/'.$transection_id);
                }else{
                     $this->session->set_flashdata('err','Verification fail : Some internal error occurred.');  
                       redirect('dmr/otp/'.$transection_id);
                }
            }
         } 
         
         $this->load->view('layout/inner_template',$data);
    }
    public function resendOTP(){
        $id = $this->uri->segment(4);
        $result = $this->dmr_model->resendOTP();
       if($result == 1){                    
            $this->session->set_flashdata('msg','Resent OTP Enter New OTP.');  
           redirect('dmr/otp/'.$id);
        }else{
             $this->session->set_flashdata('err','Resend OTP fail : Some internal error occurred.');  
               redirect('dmr/otp/'.$id);
        }
    }
    public function dmrLogin(){
        $result = $this->dmr_model->dmrLogin();
        
        if(count($result) <5){
            if($result == 3){  
                return 3;
            }else if($result == 2){ 
                return 2;
            }else if($result == 0){
                return 0;
            }
        }else{
            return $result;
        }
        
    }
    
    public function addBeneficiary(){
        $data = array(
              'title'         => 'DMR :: ADD BENEFICIARY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'add_beneficiary'
             );
        $data['login_details'] = array();
        
        $login_result = $this->dmrLogin();
       
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
           $data['login_details'] = $login_result; 
        }
       // print_r($login_result);die();
        
        if($this->input->post('add')){
            $this->form_validation->set_rules('card_no',     'Card Number',             'required');
           // $this->form_validation->set_rules('trans_no',    'Transection Number',      'required');
            $this->form_validation->set_rules('b_type',      'Beneficiary Type',        'required');
            $this->form_validation->set_rules('b_name',      'Beneficiary Name',        'required');
            if($this->input->post('b_type') == 'MMID'){
                $this->form_validation->set_rules('mmid',     "MMID Number",            'required');
                $this->form_validation->set_rules('mobile',   "Mobile",                 'required|min_length[10]|max_length[10]|numeric');
            }
            if($this->input->post('b_type') == 'IFSC'){
                $this->form_validation->set_rules('bank_name', "Bank Name",             'required');
                $this->form_validation->set_rules('state',     "State",                 'required');
                $this->form_validation->set_rules('city',      "City",                  'required');
                $this->form_validation->set_rules('branch_name',"Branch Name",          'required');
                $this->form_validation->set_rules('ifsc_code',  "IFSC Code",            'required');
                $this->form_validation->set_rules('ac_no',      "Account No",           'required');
            }
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->addBeneficiary();
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','Beneficiary registration fail : Some internal error occurred.');  
                     redirect('dmr/addBeneficiary');
                }else if($result == 0){
                    $this->session->set_flashdata('err','Beneficiary registration fail : User already exist.');  
                     redirect('dmr/addBeneficiary');
                }
              else{
                    $this->session->set_flashdata('msg','Your Beneficiary registration is successfull Please verify if by using OTP.');  
                   //redirect('dmr/addBeneficiary');
                     redirect('dmr/beneficiaryOTP/'.$result);
                     
                }
            }
        }
        
        
        $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
        $data['sender_details'] = $this->dmr_model->sender_details();
        $data['banks'] = $this->common->bank_name();
         $this->load->view('layout/inner_template',$data);
    }
    
    public function beneficiaryOTP(){
        $ben_id = $this->uri->segment(3);
         $data = array(
              'title'         => 'DMR :: BENEFICIARY OTP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'beneficiary_otp'
             );
         $data['details'] = $this->dmr_model->getBENDetails($ben_id);
        
         if($this->input->post('send')){
            $this->form_validation->set_rules('trans',  'Card Number',   'required');
            $this->form_validation->set_rules('bene_id',  'Beneficiary ID',   'required');
            $this->form_validation->set_rules('otp',    'OTP',              'required');
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doVerifyBen($ben_id);
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your Verification is successfull .');  
                    redirect('dmr/beneficiaryList/'.$ben_id);
                }
               else if( $result == 2){                    
                    $this->session->set_flashdata('err','Verification fail : Invalid OTP.');  
                      redirect('dmr/beneficiaryOTP/'.$ben_id);
                }else{
                     $this->session->set_flashdata('err','Verification fail : Some internal error occurred.');  
                       redirect('dmr/beneficiaryOTP/'.$ben_id);
                }
            }
         } 
         
         $this->load->view('layout/inner_template',$data);
    }

        public function viewBeneficiary(){
            $data = array(
                 'title'         => 'DMR :: ADD BENEFICIARY',
                 'metakeyword'   => '',
                 'metadesc'      => '',
                 'content'       => 'view_beneficiary'
                );
            //$data['ben_details']=$this->dmr_model->getBeneficiary();
             $this->load->view('layout/inner_template',$data);
        }
    public function editBeneficary(){
        $data = array(
              'title'         => 'DMR :: ADD BENEFICIARY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'edit_beneficiary'
             );
        $data['login_details'] = array();
         $id = $this->uri->segment(3);
         $data['ben_details']=$this->dmr_model->getBeneficiary_edit($id);
        
        $login_result = $this->dmrLogin();
       
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
           $data['login_details'] = $login_result; 
        }
        
        if($this->input->post('edit')){
              $this->form_validation->set_rules('card_no',     'Card Number',             'required');
           // $this->form_validation->set_rules('trans_no',    'Transection Number',      'required');
            $this->form_validation->set_rules('b_type',      'Beneficiary Type',        'required');
            $this->form_validation->set_rules('b_name',      'Beneficiary Name',        'required');
            if($this->input->post('b_type') == 'MMID'){
                $this->form_validation->set_rules('mmid',     "MMID Number",            'required');
                $this->form_validation->set_rules('mobile',   "Mobile",                 'required|min_length[10]|max_length[10]|numeric');
            }
            if($this->input->post('b_type') == 'IFSC'){
                $this->form_validation->set_rules('bank_name', "Bank Name",             'required');
                $this->form_validation->set_rules('state',     "State",                 'required');
                $this->form_validation->set_rules('city',      "City",                  'required');
                $this->form_validation->set_rules('branch_name',"Branch Name",          'required');
                $this->form_validation->set_rules('ifsc_code',  "IFSC Code",            'required');
                $this->form_validation->set_rules('ac_no',      "Account No",           'required');
            }
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->editBeneficiary( $data['ben_details']->beneid);
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','Beneficiary registration fail : Some internal error occurred.');  
                     redirect('dmr/editBeneficary'.$id);
                }else if($result == 0){
                    $this->session->set_flashdata('err','Beneficiary registration fail : User already exist.');  
                     redirect('dmr/editBeneficary'.$id);
                }
              else{
                    $this->session->set_flashdata('msg','Your Beneficiary registration is successfull Please verify if by using OTP.');  
                   redirect('dmr/editBeneficary'.$id);
                    // redirect('dmr/beneficiaryOTP/'.$result);
                     
                }
            }
        }
        
        
         
         $data['sender_details'] = $this->dmr_model->sender_details();
          $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
          $this->load->view('layout/inner_template',$data);
    }
    public function resendBenOTP(){
        $id = $this->uri->segment(4);
        $result = $this->dmr_model->resendBenOTP();
       if($result == 1){                    
            $this->session->set_flashdata('msg','Resent OTP Enter New OTP.');  
           redirect('dmr/beneficiaryOTP/'.$id);
        }else{
             $this->session->set_flashdata('err','Resend OTP fail : Some internal error occurred.');  
               redirect('dmr/beneficiaryOTP/'.$id);
        }
    }
    public function removeBeneficary(){
        $id = $this->uri->segment(3);
        
         $data['login_details'] = array();        
        
        $login_result = $this->dmrLogin();
        //print_r($login_result);die();
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
           $data['login_details'] = $login_result; 
        }
       
        $result = $this->dmr_model->removeBeneficary();
       if($result == 1){                    
            $this->session->set_flashdata('msg','OTP has been sent on your mobile.');  
           redirect('dmr/removeBenOtp/'.$id);
        }else{
             $this->session->set_flashdata('err','Resend OTP fail : Some internal error occurred.');  
               redirect('dmr/viewBeneficiary');
        }
    }
    public function removeBenOtp(){
        $ben_id = $this->uri->segment(3);
        
         $data = array(
              'title'         => 'DMR :: BENEFICIARY OTP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'remove_beneficiary_otp'
             );
         $data['details'] = $this->dmr_model->getBENDetails($ben_id);
        
         if($this->input->post('send')){
            $this->form_validation->set_rules('trans',  'Card Number',   'required');
            $this->form_validation->set_rules('bene_id',  'Beneficiary ID',   'required');
            $this->form_validation->set_rules('otp',    'OTP',              'required');
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doRemoveVerifyBen($ben_id);
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your beneficiary removed successfull .');  
                    redirect('dmr/viewBeneficiary');
                }
               else if( $result == 2){                    
                    $this->session->set_flashdata('err','Verification fail : Invalid OTP.');  
                      redirect('dmr/removeBenOtp/'.$ben_id);
                }else{
                     $this->session->set_flashdata('err','Verification fail : Some internal error occurred.');  
                       redirect('dmr/removeBenOtp/'.$ben_id);
                }
            }
         } 
         
         $this->load->view('layout/inner_template',$data);
    }
    
    public function getBranch(){
        $bnk = $_POST['bname'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $val= "";
        $branch =$this->common->getBranch($bnk, $state, $city);
       // echo $branch;
        $val .= "<option value=''>Select</value>";
        foreach($branch as $b){
            $val .= "<option value='".$b->name."'>".$b->name."</option>";
        }
        echo $val;
    }
    public function getifsc(){
        $bn = $_POST['br'];
        $branch =$this->common->getIfsc($bn);
        echo $branch->IFSC_Code;
    }
    
    public function dmrUserSearch(){
         $data = array(
              'title'         => 'DMR :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_search'
             );
         if($this->input->post('send')){
              $this->form_validation->set_rules('mobile',  'Mobile',   'required|min_length[10]|max_length[10]|numeric');
              
               if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->searchuser();
               
                if(count($result) == 1){                    
                   // $this->session->set_flashdata('msg','Amount transferred successfull .');  
                    redirect('dmr/beneficiaryList/'.$result->card_number);
                    //$this->beneficiaryList($result);
                }
              else{
                     $this->session->set_flashdata('msg','This number is not registered please register first');  
                       redirect('dmr/sender_registration');
                }
            }
         }
         
         $this->load->view('layout/inner_template',$data);
    }
    public function beneficiaryList(){
         $data = array(
              'title'         => 'DMR :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'bene_list_user'
             );
          $card = $this->uri->segment(3);
          $data['login_details'] = array();        
        
            $login_result = $this->dmrLogin();
            $key = '';
            //echo $login_result->SECURITYKEY; die();
            //print_r($login_result);die();
            if(count($login_result) <5){
                if($login_result == 3){ 
                   $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
                }else if($login_result == 2){ 
                     $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
                }else if($login_result == 0){
                     $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
                }
            }else{
                $key = $login_result->SECURITYKEY;
               $data['login_details'] = $login_result; 
            }
             if($this->input->post('trans')){
                 $this->form_validation->set_rules('tr_amt',  'Transfer Amount',   'required');
                 $this->form_validation->set_rules('tr_charge',  'Service Charge',   'required');
                 $this->form_validation->set_rules('ben_id',  'Beneficiary Id',   'required');
                 if($this->form_validation->run() == TRUE){
                     
                    $result = $this->dmr_model->dotransferAmt($key,$card);
                  
                    if($result == 1){                    
                        $this->session->set_flashdata('msg','Amount transferred successfull .');  
                        redirect('dmr/beneficiaryList/'.$card);
                    }
                   else if( $result == 2){                    
                        $this->session->set_flashdata('err','Verification fail : Security Key is not valid.');  
                          redirect('dmr/beneficiaryList/'.$card);
                    }else if( $result == 3){                    
                        $this->session->set_flashdata('err','Unknown : please try after 90 seconds.');  
                          redirect('dmr/beneficiaryList/'.$card);
                    }else if( $result == 4){                    
                        $this->session->set_flashdata('err','Transaction failed : check your transfer amount, it is not valid.');  
                          redirect('dmr/beneficiaryList/'.$card);
                    }else if( $result == 0){                    
                        $this->session->set_flashdata('err','Transaction failed : Benefeciary ID is not correct.');  
                          redirect('dmr/beneficiaryList/'.$card);
                    }else{
                         $this->session->set_flashdata('err','Unknown : Internal error.');  
                           redirect('dmr/beneficiaryList/'.$card);
                    }
                }
             }
          
         $data['ben_details']=$this->dmr_model->getBeneficiary($card);
         $data['limit'] = $this->dmr_model->checktopupLimit($card);
         $this->load->view('layout/inner_template',$data);
    }

        public function transaction(){
         $data = array(
              'title'         => 'DMR :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'transfer_amt'
             );
         $data['login_details'] = array();        
        
        $login_result = $this->dmrLogin();
        $key = '';
        //echo $login_result->SECURITYKEY; die();
        //print_r($login_result);die();
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
            $key = $login_result->SECURITYKEY;
           $data['login_details'] = $login_result; 
        }
         if($this->input->post('transfer')){
            $this->form_validation->set_rules('card',  'Card Number',   'required');
            $this->form_validation->set_rules('bene',  'Beneficiary',   'required');
            $this->form_validation->set_rules('bene_id',  'Beneficiary Id',   'required');
            $this->form_validation->set_rules('bene_type',  'Beneficiary Type',   'required');
            if($this->input->post('bene_type') == 'IFSC'){
                $this->form_validation->set_rules('ifsc_cod',    'IFSC Code',              'required');
            }
            $this->form_validation->set_rules('tr_amt',  'Transfer Amount',   'required');
            $this->form_validation->set_rules('tr_des',  'Transfer Description',   'required');
            $this->form_validation->set_rules('tr_charge',  'Service Charge',   'required');
            $this->form_validation->set_rules('mobile_no',  'Mobile',   'required|min_length[10]|max_length[10]|numeric');
            
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->dotransferAmt($key);
               
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Amount transferred successfull .');  
                    redirect('dmr/transaction');
                }
               else if( $result == 2){                    
                    $this->session->set_flashdata('err','Verification fail : Security Key is not valid.');  
                      redirect('dmr/transaction');
                }else if( $result == 3){                    
                    $this->session->set_flashdata('err','Unknown : please try after 90 seconds.');  
                      redirect('dmr/transaction');
                }else if( $result == 4){                    
                    $this->session->set_flashdata('err','Transaction failed : check your transfer amount, it is not valid.');  
                      redirect('dmr/transaction');
                }else{
                     $this->session->set_flashdata('err','Unknown : Internal error.');  
                       redirect('dmr/transaction');
                }
            }
         }
         
         
         $data['card'] = $this->dmr_model->getCardMore($this->session->userdata('login_id'));
         $data['limit'] = $this->dmr_model->checktopupLimit();
         $data['benes'] = $this->dmr_model->getBene($this->session->userdata('login_id'));
         $this->load->view('layout/inner_template',$data);
    }
    
    public function topup(){
        $data = array(
              'title'         => 'DMR :: TOPUP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'topup'
             );
        $data['login_details'] = array();        
        
        $login_result = $this->dmrLogin();
        $key = '';
        //echo $login_result->SECURITYKEY; die();
        //print_r($login_result);die();
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
            $key = $login_result->SECURITYKEY;
           $data['login_details'] = $login_result; 
        }
        
        if($this->input->post('topup')){
            $this->form_validation->set_rules('amount',  'Amount',   'required');
            $this->form_validation->set_rules('region',  'Region',   'required');
            //$this->form_validation->set_rules('mobile_no',  'Region',   'required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('charge',  'Service Charge',   'required');
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doTopup($key);
               
                if($result !=0){                    
                    $this->session->set_flashdata('msg','Topup successfull .');  
                    redirect('dmr/topup');
                }
               else{
                     $this->session->set_flashdata('err','Unknown : Please try after some time.');  
                       redirect('dmr/topup');
                }
            }
            
        }
        $this->load->view('layout/inner_template',$data);
    }
    
    public function senderList(){
         $data = array(
              'title'         => 'DMR :: SENDER LIST',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'senderList'
             );
         $data['senders']= $this->dmr_model->getSender();
         $this->load->view('layout/inner_template',$data);
    }
    
    public function doKyc(){
        $data = array(
              'title'         => 'DMR :: DO KYC',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'non_to_kyc'
             );
        $id = $this->uri->segment(3);
        $data['login_details'] = array();        
        
        $login_result = $this->dmrLogin();
        $key = '';
        //echo $login_result->SECURITYKEY; die();
        //print_r($login_result);die();
        if(count($login_result) <5){
            if($login_result == 3){ 
               $this->session->set_flashdata('msg','Please Set your Pin Number on sender registration page.'); 
            }else if($login_result == 2){ 
                 $this->session->set_flashdata('err','Invalid Pin Which yoyu have set on sender registration page.'); 
            }else if($login_result == 0){
                 $this->session->set_flashdata('err','DMR Login Fail: Please try after some time.'); 
            }
        }else{
            $key = $login_result->SECURITYKEY;
           $data['login_details'] = $login_result; 
        }
        if($this->input->post('kyc')){
            $this->form_validation->set_rules('first_name',     'First Name',       'required');            
            $this->form_validation->set_rules('last_name',      'Last Name',        'required');
             $this->form_validation->set_rules('state',          'State',            'required');
            $this->form_validation->set_rules('city',           'City',             'required');
            $this->form_validation->set_rules('add',            'Address',          'required');
            $this->form_validation->set_rules('zip',            'ZIP',              'required');
           
        $this->form_validation->set_rules('middle_name',    'Middle Name',      'required');
        $this->form_validation->set_rules('m_name',         "Mother's Name",    'required');
        $this->form_validation->set_rules('dob',            "Date Of Birth",    'required');
        $this->form_validation->set_rules('email',          "Email",            'required|email');
        $this->form_validation->set_rules('id_proof_type',  'ID Proof Type',    'required');
        $this->form_validation->set_rules('id_proof',       'ID Proof',         'required');
        $this->form_validation->set_rules('id_proof_url',   'ID Proof URL',     'required');
        $this->form_validation->set_rules('address_proof_type','Address Proof Type','required');
        $this->form_validation->set_rules('address_proof',  'Address Proof',    'required');
        $this->form_validation->set_rules('address_proof_url','Address Proof URL','required');
            
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->upgradeToKYC($id);
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','Upgradation  fail : Some internal error occurred.');  
                     redirect('dmr/doKyc/'.$id);
                }
              else{
                    $this->session->set_flashdata('msg','Your Upgradation  is successfull.');  
                    redirect('dmr/senderList');
                     
                }
            }
        }
        
        
         $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
        $data['sender_details'] = $this->dmr_model->sender_details();
        $data['sender']= $this->dmr_model->getSenderdetail($id );
        $this->load->view('layout/inner_template',$data);
    }
}
    