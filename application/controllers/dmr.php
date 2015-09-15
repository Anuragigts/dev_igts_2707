<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dmr extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');   
        $this->load->model('dmr_model');
        $this->load->model('common');
        if( $this->session->userdata('login_id') == ''){redirect('login');}
        if( $this->session->userdata('dmr') != '1'){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.');redirect('dashboard');}
    }
    public function knowIp(){
        $result = $this->dmr_model->knowIp();
    }
    public function sender_registration(){
        if($this->session->userdata('my_type') != 4 && $this->session->userdata('my_type') != 5 ){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
         $data = array(
              'title'         => 'ESY TOPUP :: DMR SENDER REGISTRATION',
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
				if($_FILES['id_proof_url']['name'] == ''){
                $this->form_validation->set_rules('id_proof_url',   'ID Proof URL',     'required');
				}
                $this->form_validation->set_rules('address_proof_type','Address Proof Type','required');
                $this->form_validation->set_rules('address_proof',  'Address Proof',    'required');
				if($_FILES['address_proof_url']['name'] == ''){
                $this->form_validation->set_rules('address_proof_url','Address Proof URL','required');
				}
            }
            
            
            
            if($this->form_validation->run() == TRUE){
                $mv = $this->dmr_model->mobileverify();
				$idP = '';$addp='';
                        if($_FILES['id_proof_url']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['id_proof_url'];
                            $uid = date('Y-m-d_i-s');
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $idP = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $idP; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('id_proof_url');
                        }
                        if($_FILES['address_proof_url']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['address_proof_url'];
                            $uid = date('Y-m-d_i-s');
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $addp = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $addp; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('address_proof_url');
                        }
						$iloc = base_url().'doc/'.$idP;
						$aloc = base_url().'doc/'.$addp;
               // if($mv == 1){
                    $result = $this->dmr_model->doRegister($iloc, $aloc);
                    //echo $result;exit;
                    if($result == 0){                    
                        $this->session->set_flashdata('err','Registration fail : Some internal validation Account Number Already Registered.');  
                         redirect('dmr/sender_registration');
                    }
                   else if( $result == 20){                    
                        $this->session->set_flashdata('err','Registration fail : Already Register.');  
                         redirect('dmr/sender_registration');
                    }else{
                        $this->session->set_flashdata('msg','Your Registration is successfull Please verify if by using OTP.');  
                        redirect('dmr/otp/'.$result);

                    }
                /*}else{
                    $this->session->set_flashdata('err','Registration fail : mobile number is not present in system.');  
                    redirect('dmr/sender_registration');
                }*/
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
              'title'         => 'DMR ESY TOPUP :: OTP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_register_otp'
             );
         $data['details'] = $this->dmr_model->getDMRDetails($transection_id);
        
         if($this->input->post('send')){
            $this->form_validation->set_rules('trans',  'Transaction Id',   'required');
            $this->form_validation->set_rules('otp',    'OTP',              'required');
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doVerify($transection_id);
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your Verification is successfull .');  
                   redirect('dmr/dmrUserSearch');
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
    public function pinreset(){
        if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $id = $this->uri->segment(4);
        $mo = $this->uri->segment(3);
        $result = $this->dmr_model->changePin($mo);
        if($result == 1){
            $this->session->set_flashdata('msg','Your pin has been sent successfully .');  
            redirect('dmr/otp/'.$id);
        }else{
            $this->session->set_flashdata('err','Fail : Some internal error occurred.');  
             redirect('dmr/otp/'.$id);
        }
        
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
 
    
    public function addBeneficiary(){
        if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $data = array(
              'title'         => 'DMR ESY TOPUP :: ADD BENEFICIARY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'add_beneficiary'
             );
        
       // print_r($login_result);die();
        $card = $this->uri->segment(3);
        if($this->input->post('add')){
            $this->form_validation->set_rules('card_no',     'Card Number',             'required');
           // $this->form_validation->set_rules('trans_no',    'Transaction Number',      'required');
            $this->form_validation->set_rules('b_type',      'Beneficiary Type',        'required');
            $this->form_validation->set_rules('b_name',      'Beneficiary Name',        'required');
            if($this->input->post('b_type') == 'MMID'){
                $this->form_validation->set_rules('mmid',     "MMID Number",            'required');
                $this->form_validation->set_rules('mobile',   "Mobile",                 'required|min_length[10]|max_length[10]|numeric');
            }
            if($this->input->post('b_type') == 'IFSC'){
                $this->form_validation->set_rules('bank_name', "Bank Name",             'required');
                 $this->form_validation->set_rules('ac_no',      "Account No",           'required');
                 if($this->input->post('reqval') == '1'){ 
                    $this->form_validation->set_rules('state',     "State",                 'required');
                    $this->form_validation->set_rules('city',      "City",                  'required');
                    $this->form_validation->set_rules('branch_name',"Branch Name",          'required');
                    $this->form_validation->set_rules('ifsc_code',  "IFSC Code",            'required');
                 }
               
            }
            if($this->form_validation->run() == TRUE){
                //echo "jiiii";die();
                $result = $this->dmr_model->addBeneficiary();
                
                if($result == 0){                    
                    $this->session->set_flashdata('err','Beneficiary registration fail : Some internal error occurred.');  
                     redirect('dmr/addBeneficiary/'.$card);
                }else if($result == 1){
                    $this->session->set_flashdata('err','Beneficiary registration fail : User already exist.');  
                     redirect('dmr/addBeneficiary/'.$card);
                }
              else{
                    $this->session->set_flashdata('msg','Your Beneficiary registration And verification is successfull Please verify if by using OTP.');  
                   //redirect('dmr/addBeneficiary');
                     redirect('dmr/beneficiaryOTP/'.$result.'/'.$this->input->post('card_no'));
                     
                }
            }
        }
        if($this->input->post('verify')){
            $this->form_validation->set_rules('card_no',     'Card Number',             'required');
           // $this->form_validation->set_rules('trans_no',    'Transaction Number',      'required');
            $this->form_validation->set_rules('b_type',      'Beneficiary Type',        'required');
            $this->form_validation->set_rules('b_name',      'Beneficiary Name',        'required');
            if($this->input->post('b_type') == 'MMID'){
                $this->form_validation->set_rules('mmid',     "MMID Number",            'required');
                $this->form_validation->set_rules('mobile',   "Mobile",                 'required|min_length[10]|max_length[10]|numeric');
            }
            if($this->input->post('b_type') == 'IFSC'){
                $this->form_validation->set_rules('bank_name', "Bank Name",             'required');
                 $this->form_validation->set_rules('ac_no',      "Account No",           'required');
                 if($this->input->post('reqval') == '1'){ 
                    $this->form_validation->set_rules('state',     "State",                 'required');
                    $this->form_validation->set_rules('city',      "City",                  'required');
                    $this->form_validation->set_rules('branch_name',"Branch Name",          'required');
                    $this->form_validation->set_rules('ifsc_code',  "IFSC Code",            'required');
                 }
               
            }
            if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->addVerifyBeneficiary();
                //echo $result;exit;
                if($result == 0){                    
                    $this->session->set_flashdata('err','Beneficiary registration fail : Some internal error occurred.');  
                     redirect('dmr/addBeneficiary/'.$card);
                }else if($result == 1){
                    $this->session->set_flashdata('err','Confirm Failure');  
                     redirect('dmr/beneficiaryOTP/'.$result.'/'.$this->input->post('card_no'));
                }else if($result == 8){
                    $this->session->set_flashdata('err','User Already added.');  
                     redirect('dmr/beneficiaryOTP/'.$result.'/'.$this->input->post('card_no'));
                }else if($result == 3){                     
                      $this->session->set_flashdata('err','Beneficiary registration fail : Some internal error occurred.');  
                     redirect('dmr/addBeneficiary/'.$card);
                }
              else{
                  $this->session->set_flashdata('msg','Beneficary Account Addedd  but not verified Please try again, Please confirm with OTP.');  
                   redirect('dmr/beneficiaryOTP/'.$result.'/'.$this->input->post('card_no'));
                }
            }
        }
        
        
        $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
       
        $data['banks'] = $this->common->bank_name();
         $this->load->view('layout/inner_template',$data);
    }
    public function accountVerification(){
        
        $result = $this->dmr_model->verifyBeneficiary();
                //echo $result;exit;
        if($result == 1){                    
            $this->session->set_flashdata('msg','Account verified.');  
             redirect('dmr/beneficiaryList/');
        }else if($result == 2){
            $this->session->set_flashdata('err','Beneficiary Account Verification fail  : User already Verified.');  
             redirect('dmr/beneficiaryList/');
        }else {
            $this->session->set_flashdata('err',"Beneficiary Account Verification fail  : validation Error - $result.");  
             redirect('dmr/beneficiaryList/');
        }
      
        
    }


    public function beneficiaryOTP(){
        if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $ben_id = $this->uri->segment(3);
         $data = array(
              'title'         => 'DMR ESY TOPUP :: BENEFICIARY OTP',
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
                    redirect('dmr/beneficiaryList/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
                }
               else if( $result == 2){                    
                    $this->session->set_flashdata('err','Verification fail : Invalid OTP.');  
                      redirect('dmr/beneficiaryOTP/'.$ben_id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
                }else{
                     $this->session->set_flashdata('err','Verification fail : Some internal error occurred.');  
                       redirect('dmr/beneficiaryOTP/'.$ben_id.'/'.$this->uri->segment(4).'/'.$this->uri->segment(5));
                }
            }
         } 
         
         $this->load->view('layout/inner_template',$data);
    }

        public function viewBeneficiary(){
            if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
            $data = array(
                 'title'         => 'DMR ESY TOPUP :: ADD BENEFICIARY',
                 'metakeyword'   => '',
                 'metadesc'      => '',
                 'content'       => 'view_beneficiary'
                );
            //$data['ben_details']=$this->dmr_model->getBeneficiary();
             $this->load->view('layout/inner_template',$data);
        }
    public function editBeneficary(){
        $data = array(
              'title'         => 'DMR ESY TOPUP :: ADD BENEFICIARY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'edit_beneficiary'
             );
        $data['login_details'] = array();
       
        if($this->input->post('edit')){
              $this->form_validation->set_rules('card_no',     'Card Number',             'required');
           // $this->form_validation->set_rules('trans_no',    'Transaction Number',      'required');
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
           redirect('dmr/beneficiaryOTP/'.$id.'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));
        }else{
             $this->session->set_flashdata('err','Resend OTP fail : Some internal error occurred.');  
               redirect('dmr/beneficiaryOTP/'.$id.'/'.$this->uri->segment(5).'/'.$this->uri->segment(6));
        }
    }
    public function removeBeneficary(){
        $id = $this->uri->segment(3);
        
         $data['login_details'] = array();
       
        $result = $this->dmr_model->removeBeneficary($id);
       //echo $result; die();
       if($result == "1"){                    
            $this->session->set_flashdata('msg','OTP has been sent on your mobile.');  
           redirect('dmr/removeBenOtp/'.$id);
        }else{
             $this->session->set_flashdata('err','Resend OTP fail : Some internal error occurred.');  
               redirect('dmr/beneficiaryList/'.$id);
        }
    }
    

    public function removeBenOtp(){
        
        $ben_id = $this->uri->segment(3);
        
         $data = array(
              'title'         => 'DMR ESY TOPUP :: BENEFICIARY OTP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'remove_beneficiary_otp'
             );
         $data['details'] = $this->dmr_model->getBENDetails($ben_id);
        
         if($this->input->post('send')){
            
            $this->form_validation->set_rules('bene_id',  'Beneficiary ID',   'required');
            $this->form_validation->set_rules('otp',    'OTP',              'required');
            
             if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->doRemoveVerifyBen();
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Your beneficiary removed successfull .');  
                    redirect('dmr/beneficiaryList/'.$ben_id);
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
    public function dmrLoginAjax(){
        $card = $_POST['card'];
        $mo = $_POST['mo'];
       echo  $result = $this->dmr_model->dmrLogin1($card,$mo);
        
    }
    public function dmrUserSearch(){
        if($this->session->userdata('my_type') != 4 && $this->session->userdata('my_type') != 5 ){$this->session->set_flashdata('err','Access Denied, Please contact to administrator.'); redirect('dashboard');}
         if( $this->session->userdata('iddmr') == '1'){redirect('dmr/beneficiaryList/'.$this->session->userdata('dmrcard').'/'.$this->session->userdata('dmrmo'));}
         
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_search'
             );
         if($this->input->post('send')){
              $this->form_validation->set_rules('mobile',  'Mobile',   'required|min_length[10]|max_length[10]|numeric');
              $this->form_validation->set_rules('otp',  'OTP',   'required');
              
               if($this->form_validation->run() == TRUE){
                $mo = $this->input->post('mobile');
                $result = $this->dmr_model->verifyUser($mo);
               //print_r($this->session->all_userdata());die();
                if(count($result) == 1){
                    redirect('dmr/beneficiaryList/'.$this->session->userdata('dmrcard').'/'.$this->session->userdata('dmrmo'));
                }
              else{
                     $this->session->set_flashdata('msg','This number is not registered please register first');  
                       redirect('dmr/sender_registration');
                }
            }
         }
         if($this->input->post('pinbut')){
            
              $this->form_validation->set_rules('mobile',  'Mobile',   'required|min_length[10]|max_length[10]|numeric');
              $this->form_validation->set_rules('pin',  'PIN',   'required');
              
               if($this->form_validation->run() == TRUE){
                 
                $mo = $this->input->post('mobile');
                $pin = $this->input->post('pin');
                $result = $this->dmr_model->dmrLogin1($mo,$pin);
               //print_r($this->session->all_userdata());die();
                if(count($result) == 2){
                    redirect('dmr/beneficiaryList/'.$this->session->userdata('dmrcard').'/'.$this->session->userdata('dmrmo'));
                }else  if(count($result) == 1){
                    $this->session->set_flashdata('err','Login Fail Invalid Pin');  
                       redirect('dmr/dmrUserSearch');
                }else  if(count($result) == 3){
                    $this->session->set_flashdata('msg','Login Fail : Please verify account using OTP.');   
                       redirect('dmr/dmrverify/'.$mo);
                }
              else{
                     $this->session->set_flashdata('msg','This number is not registered please register first');  
                       redirect('dmr/sender_registration');
                }
            }
         }
         
         $this->load->view('layout/inner_template',$data);
    }
    
    public function dmrverify(){
        
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_login_verify'
             );
        $mobile =  $this->uri->segment(3);
          if($this->input->post('send')){
             
              $this->form_validation->set_rules('otp',  'OTP',   'required');
               if($this->form_validation->run() == TRUE){
               
                $result = $this->dmr_model->verifyUser($mobile);
               
                if(count($result) == 1){
                    redirect('dmr/beneficiaryList/'.$this->uri->segment(3));
                }
              else{
                     $this->session->set_flashdata('err','This number is not registered please register first');  
                       redirect('dmr/verifyUser/'.$this->uri->segment(3));
                }
            }
         }
         $this->load->view('layout/inner_template',$data); 
    }


    
    public function verifyUser(){
        $data = array(
              'title'         => 'DMR ESY TOPUP :: VERIFY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'dmr_verify'
             );
         if($this->input->post('send')){
              $this->form_validation->set_rules('otp',  'OTP',   'required');
              
               if($this->form_validation->run() == TRUE){
                
                $result = $this->dmr_model->verifyUser($this->uri->segment(4));
               
                if($result == 1){                    
                   // $this->session->set_flashdata('msg','Amount transferred successfull .');  
                    redirect('dmr/beneficiaryList/'.$this->uri->segment(3));
                    //$this->beneficiaryList($result);
                }
              else{
                     $this->session->set_flashdata('err','This number is not registered please register first');  
                       redirect('dmr/verifyUser/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
                }
            }
         }
        $this->load->view('layout/inner_template',$data);        
    }

    public function beneficiaryList(){
        if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'bene_list_user'
             );
          $card = $this->session->userdata('dmrcard');
         $mo =$this->session->userdata('dmrmo');
         $key = $this->session->userdata('dmrkey');
         
             if($this->input->post('trans')){ 
                
                 $this->form_validation->set_rules('tr_amt',  'Transfer Amount',   'required');
                 //$this->form_validation->set_rules('tr_charge',  'Service Charge',   'required');
                 $this->form_validation->set_rules('ben_id',  'Beneficiary Id',   'required');
                // $this->form_validation->set_rules('otp',  'OTP',   'required');
                 if($this->form_validation->run() == TRUE){
                    
                        $result = $this->dmr_model->dotransferAmt($key,$card,$mo,0);
                     
                  //echo $result;die();
                    if($result == 1){                    
                        $this->session->set_flashdata('msg','Amount transferred successfull .');  
                        redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }
                   else if( $result == 2){                    
                        $this->session->set_flashdata('err','Transaction fail :  The transaction has failed.');  
                         redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }else if( $result == 5){ 
                        $this->session->set_flashdata('err','Unknown : Internal error.');  
                       redirect('dmr/beneficiaryList/'.$card.'/'.$mo);                  
                    }else if( $result == 4){                    
                        $this->session->set_flashdata('err','Transaction failed : due to internal validation.');  
                         redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }else{
                        $this->session->set_flashdata('err','Unknown : please Retry after 90 seconds. Server is busy!');  
                        redirect('dmr/transRequery/'.$result);
                    }
                }
             }
             if($this->input->post('transneft')){ 
                
                 $this->form_validation->set_rules('tr_amt',  'Transfer Amount',   'required');
                 //$this->form_validation->set_rules('tr_charge',  'Service Charge',   'required');
                 $this->form_validation->set_rules('ben_id',  'Beneficiary Id',   'required');
                // $this->form_validation->set_rules('otp',  'OTP',   'required');
                 if($this->form_validation->run() == TRUE){
                    
                        $result = $this->dmr_model->dotransferAmt($key,$card,$mo,$type=8);
                     
                  //echo $result;die();
                    if($result == 1){                    
                        $this->session->set_flashdata('msg','Amount transferred successfull .');  
                        redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }
                   else if( $result == 2){                    
                        $this->session->set_flashdata('err','Transaction fail :  The transaction has failed.');  
                         redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }else if( $result == 5){ 
                        $this->session->set_flashdata('err','Unknown : Internal error.');  
                       redirect('dmr/beneficiaryList/'.$card.'/'.$mo);                  
                    }else if( $result == 4){                    
                        $this->session->set_flashdata('err','Transaction failed : due to internal validation.');  
                         redirect('dmr/beneficiaryList/'.$card.'/'.$mo);
                    }else{
                        $this->session->set_flashdata('err','Unknown : please Retry after 90 seconds. Server is busy!');  
                        redirect('dmr/transRequery/'.$result);
                    }
                }
             }
          
         $data['ben_details']=$this->dmr_model->getBeneficiary($card);
         $data['limit'] = $this->dmr_model->checktopupLimit($this->session->userdata('dmrcard'));
         $this->load->view('layout/inner_template',$data);
    }
    
    public function transRequery(){
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'requery'
             );
          $t_id = $this->uri->segment(3);
          $data['login_details'] = array(); 
            
            if($this->input->post('send')){
                $this->form_validation->set_rules('id',  'Transaction Id',   'required');
                 if($this->form_validation->run() == TRUE){
                     $retry = $this->dmr_model->reTryTransfer();
                      if($retry == 1){ 
                        $this->session->set_flashdata('msg','Amount Transferred successfully.');                          
                            redirect('dmr/beneficiaryList/');
                     }else if($retry == 2){ 
                          $this->session->set_flashdata('err','Confirmation failed.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else if($retry == 3){ 
                          $this->session->set_flashdata('err','Internal validation failed.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else if($retry == 4){ 
                          $this->session->set_flashdata('err','Invalid Transaction.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else{
                          $this->session->set_flashdata('err','Retry Failed: due to Internal error.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }
                 }
            }
          $this->load->view('layout/inner_template',$data);   
    }
     public function transRequery1(){
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'requery'
             );
          $t_id = $this->uri->segment(3);
          $data['login_details'] = array(); 
            
            if($this->input->post('send')){
                $this->form_validation->set_rules('id',  'Transaction Id',   'required');
                 if($this->form_validation->run() == TRUE){
                     $retry = $this->dmr_model->reTryTransfer1();
                      if($retry == 1){ 
                        $this->session->set_flashdata('msg','Account Verified');                          
                            redirect('dmr/dmrUserSearch/');
                     }else if($retry == 2){ 
                          $this->session->set_flashdata('err','Confirmation failed.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else if($retry == 3){ 
                          $this->session->set_flashdata('err','Internal validation failed.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else if($retry == 4){ 
                          $this->session->set_flashdata('err','Invalid Transaction.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }else{
                          $this->session->set_flashdata('err','Retry Failed: due to Internal error.'); 
                          redirect('dmr/transRequery/'.$t_id);
                     }
                 }
            }
          $this->load->view('layout/inner_template',$data);   
    }
    public function printDetail(){
        $data = array(
              'title'         => 'DMR ESY TOPUP :: PRINT DETAIL',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'Trans_details'
             );
         $t_id = $this->uri->segment(3);
         $data['detail'] = $this->dmr_model->transectionQUickDetails($t_id);
        $this->load->view('layout/inner_template',$data);   
    }


   public function transaction(){
       if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
         $data = array(
              'title'         => 'DMR ESY TOPUP :: TRANSACTION',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'transfer_amt'
             );
         $data['login_details'] = array();        
        $key = '';
       
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
    public function dmrLoginTopupAjax(){
        $mo = $_POST['mo'];
        //$card = $this->dmr_model->cardByMo($mo);
        $card = '';
        //echo  $result = $this->dmr_model->dmrLogin1($card,$mo);
        echo  $result = $this->dmr_model->dmrLogin_cp($card,$mo);
        
    }
    public function topup(){
        if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $data = array(
              'title'         => 'DMR ESY TOPUP :: TOPUP',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'topup'
             );
        $data['login_details'] = array(); 
       $key = '';
        
        if($this->input->post('amount')){
            $this->form_validation->set_rules('amount',  'Amount',   'required');
            $this->form_validation->set_rules('region',  'Region',   'required');
            //$this->form_validation->set_rules('mob',  'Region',   'required|min_length[10]|max_length[10]|numeric');
            $this->form_validation->set_rules('charge',  'Service Charge',   'required');
           // $this->form_validation->set_rules('otp',  'OTP',   'required');
            if($this->form_validation->run() == TRUE){
              //  echo "lll";die();
                $result = $this->dmr_model->doTopup($this->session->userdata('dmrkey'));
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
        $data['limit'] = $this->dmr_model->checktopupLimit($this->session->userdata('dmrcard'));
        $this->load->view('layout/inner_template',$data);
    }
    
    public function getAjaxBank(){
        $ifsc = $_POST['ifsc'];
        $bank = $_POST['bank'];
        echo $this->dmr_model->getAjaxBank($ifsc,$bank);
    }
    public function getIFSCBank(){
        $name = $_POST['name'];
        
        echo $this->dmr_model->getIFSCBank($name);
    }
    public function dmrLogout(){
         $this->session->unset_userdata('iddmr');
        $this->session->unset_userdata('dmrname');
        $this->session->unset_userdata('dmrmidname');
        $this->session->unset_userdata('dmrlastname');
        $this->session->unset_userdata('dmrmo');
        $this->session->unset_userdata('dmrcard');
        $this->session->unset_userdata('dmrtranslimit');
        $this->session->unset_userdata('dmrbalance');
        $this->session->unset_userdata('dmrkey');
        $this->session->unset_userdata('dmrkyc');
        $this->session->unset_userdata('dmrpin');
        $this->session->unset_userdata('dmrad');
        $this->session->unset_userdata('dmrcity');
        $this->session->unset_userdata('dmrstate');
        $this->session->unset_userdata('dmrmo');
        redirect('dmr/dmrUserSearch');
    }
	 public function senderList(){
         $data = array(
              'title'         => 'DMR ESY TOPUP :: SENDER LIST',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'senderList'
             );
         $data['senders']= $this->dmr_model->getSender();
         $this->load->view('layout/inner_template',$data);
    }
	public function viewAgentHistory(){
	if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $data = array(
              'title'         => 'DMR ESY TOPUP :: VIEW TRANSECTION HISTORY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'agent_history'
             );
        $type = '';
        $mode = '';
         $card = $this->session->userdata('dmrcard');
          $data["searched"] = array();
          $data['filter_by'] = '';
         if($this->input->post('search')){
             if($this->input->post('t_type') == 0){
                $type = 'All'; 
             }else if($this->input->post('t_type') == 3){
                 $type = 'Remited'; 
             }else if($this->input->post('t_type') == 5){
                 $type = 'Rejection'; 
             }else{
                 $type = 'Refuund'; 
             }
             
             if($this->input->post('m_type') == 0){
                $mode = 'All'; 
             }else if($this->input->post('m_type') == 1){
                 $mode = 'IMPS(MMID)'; 
             }else if($this->input->post('m_type') == 2){
                 $mode = 'IMPS(IFSC)'; 
             }else{
                 $mode = 'NEFT'; 
             }
             
              $data["searched"] =$this->dmr_model->searchagentHistory($card,$type,$mode);
              $data['filter_by'] = "Filter By From Date: <b class='bold1'>".$this->input->post('from')."</b>, To Date: <b class='bold1'>".$this->input->post('to')."</b>, Transaction Type: <b class='bold1'>".$type."</b>, Transaction Mode: <b class='bold1'>".$mode."</b>";
         }
         
         $data['cardholder'] = $this->dmr_model->card_details($card);
         $this->load->view('layout/inner_template',$data);
    }
	
	public function viewTransectionHistory(){
	if( $this->session->userdata('iddmr') != '1'){redirect('dmr/dmrUserSearch');}
        $data = array(
              'title'         => 'DMR ESY TOPUP :: VIEW TRANSECTION HISTORY',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'tr_history'
             );
        $type = '';
        $mode = '';
         $card = $this->session->userdata('dmrcard');
          $data["searched"] = array();
          $data['filter_by'] = '';
         if($this->input->post('search')){
             
             if($this->input->post('t_type') == 0){
                $type = 'All'; 
             }else if($this->input->post('t_type') == 3){
                 $type = 'Remited'; 
             }else if($this->input->post('t_type') == 5){
                 $type = 'Rejection'; 
             }else{
                 $type = 'Refuund'; 
             }
             
             if($this->input->post('m_type') == 0){
                $mode = 'All'; 
             }else if($this->input->post('m_type') == 1){
                 $mode = 'IMPS(MMID)'; 
             }else if($this->input->post('m_type') == 2){
                 $mode = 'IMPS(IFSC)'; 
             }else{
                 $mode = 'NEFT'; 
             }
             
            
            $data["searched"] =$this->dmr_model->searchUserHistory($card,$type,$mode);
              $data['filter_by'] = "Filter By From Date: <b class='bold1'>".$this->input->post('from')."</b>, To Date: <b class='bold1'>".$this->input->post('to')."</b>, Transaction Type: <b class='bold1'>".$type."</b>, Transaction Mode: <b class='bold1'>".$mode."</b>";
         }
         
        // $data['cardholder'] = $this->dmr_model->card_details($card);
         $this->load->view('layout/inner_template',$data);
    }
	public function doKyc(){
        $data = array(
              'title'         => 'DMR ESY TOPUP :: DO KYC',
              'metakeyword'   => '',
              'metadesc'      => '',
              'content'       => 'non_to_kyc'
             );
        
        $data['login_details'] = array(); 
        $key = '';
        
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
        if($_FILES['id_proof_url']['name'] == ''){
                $this->form_validation->set_rules('id_proof_url',   'ID Proof URL',     'required');
				}
                $this->form_validation->set_rules('address_proof_type','Address Proof Type','required');
                $this->form_validation->set_rules('address_proof',  'Address Proof',    'required');
				if($_FILES['address_proof_url']['name'] == ''){
                $this->form_validation->set_rules('address_proof_url','Address Proof URL','required');
				}
            
            if($this->form_validation->run() == TRUE){
				$idP = '';$addp='';
                        if($_FILES['id_proof_url']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['id_proof_url'];
                            $uid = date('Y-m-d_i-s');
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $idP = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $idP; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('id_proof_url');
                        }
                        if($_FILES['address_proof_url']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['address_proof_url'];
                            $uid = date('Y-m-d_i-s');
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $addp = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $addp; //set file name
                            $this->load->library('upload', $config);
                            $this->upload->initialize($config);
                            $this->upload->do_upload('address_proof_url');
                        }
						$iloc = base_url().'doc/'.$idP;
						$aloc = base_url().'doc/'.$addp;
                
                $result = $this->dmr_model->upgradeToKYC($iloc,$aloc);
                //echo $result;exit;
                if($result == 1){                    
                    $this->session->set_flashdata('msg','User Updated to KYC: Please Logout from DMR and Login Again');  
                    redirect('dmr/beneficiaryList');
                }
              else{
					$this->session->set_flashdata('err','Upgradation  fail : Some internal error occurred.');  
                     redirect('dmr/doKyc/'.$id);
                     
                }
            }
        }
        
        
         $india = '101';
        $data['states']=$this->common->getState($india);
        $data['citys']=$this->common->getcity();
        $data['sender_details'] = $this->dmr_model->sender_details();
        
        $this->load->view('layout/inner_template',$data);
    }
 
}