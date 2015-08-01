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
            $this->form_validation->set_rules('middle_name',    'Middle Name',      'required');
            $this->form_validation->set_rules('last_name',      'Last Name',        'required');
            $this->form_validation->set_rules('m_name',         "Mother's Name",    'required');
            $this->form_validation->set_rules('dob',            "Date Of Birth",    'required');
            $this->form_validation->set_rules('email',          "Email",            'required|email');
            $this->form_validation->set_rules('mobile',         'Mobile Number',    'required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('state',          'State',            'required');
            $this->form_validation->set_rules('city',           'City',             'required');
            $this->form_validation->set_rules('add',            'Address',          'required');
            $this->form_validation->set_rules('zip',            'ZIP',              'required');
            $this->form_validation->set_rules('id_proof_type',  'ID Proof Type',    'required');
            $this->form_validation->set_rules('id_proof',       'ID Proof',         'required');
            $this->form_validation->set_rules('id_proof_url',   'ID Proof URL',     'required');
            $this->form_validation->set_rules('address_proof_type','Address Proof Type','required');
            $this->form_validation->set_rules('address_proof',  'Address Proof',    'required');
            $this->form_validation->set_rules('address_proof_url','Address Proof URL','required');
            $this->form_validation->set_rules('kyc',            'KYC',              'required');
            
            
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
                    redirect('dmr/viewBeneficiary');
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
         $data['ben_details']=$this->dmr_model->getBeneficiary();
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
}
    