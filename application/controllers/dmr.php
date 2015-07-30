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
}
    