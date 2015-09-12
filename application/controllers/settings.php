<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('settings_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
        public function change_password(){
            if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: CHANGE PASSWORD',
                    'metakeyword'   => 'ESY TOPUP :: CHANGE PASSWORD',
                    'metadesc'      => 'ESY TOPUP :: CHANGE PASSWORD',
                    'content'       => 'change_password'
            );
            if($this->input->post('change_password')){
                    $this->form_validation->set_rules("pass",               "Password",             "required|min_length[4]|callback_password_check");
                    $this->form_validation->set_rules("con_pass",           "Confirm Password",     "required|min_length[4]|matches[pass]");
                    if($this->form_validation->run() == TRUE){
                            $insert     =   $this->settings_model->change_password();
                            if($insert == 1){
                                    $this->session->set_flashdata("msg","Password has been changed");
                                    redirect("settings/change_password");
                            }
                            else{
                                    $this->session->set_flashdata("err","Password has not been changed");
                                    redirect("settings/change_password");
                            }
                    }
            }
            $this->load->view('layout/inner_template',$data);
        }
                public function password_check($str)
            {
               if ((preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) || preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$str)) {
                    return TRUE;
               }
               $this->form_validation->set_message('password_check', "Please add alphabets and  numeric charcters in your password.");
               return FALSE;
            }
        public function profile(){
            if($this->session->userdata('my_type') == ""){redirect('/');}
            $data = array(
                    'title'         => 'ESY TOPUP :: PROFILE',
                    'metakeyword'   => 'ESY TOPUP :: PROFILE',
                    'metadesc'      => 'ESY TOPUP :: PROFILE',
                    'content'       => 'profile'
            );
                $valu               =  $this->session->userdata("login_id");
                if($this->input->post('update_profile')){
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required");
                         $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("address",            "Address",          "required");
                        if($this->form_validation->run() == TRUE){
                            $idP = '';$addp='';
                            if($_FILES['idproof']['name'] != ''){
                                $config['upload_path'] = './doc';
                                $config['allowed_types'] = 'gif|jpg|png';
                                $file = $_FILES['idproof'];
                                $uid = date('Y-m-d_i-s');
                                $uid = 'i'.$uid;
                                $filename = basename($file['name']); 
                                $fv=explode(".",$filename);
                                $idP = $uid.".".$fv['1'];
                                $name = $config['file_name'] = $idP; //set file name
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $this->upload->do_upload('idproof');
                            }
                            if($_FILES['addproof']['name'] != ''){
                                $config['upload_path'] = './doc';
                                $config['allowed_types'] = 'gif|jpg|png';
                                $file = $_FILES['addproof'];
                                $uid = date('Y-m-d_i-s');
                                $uid = 'p'.$uid;
                                $filename = basename($file['name']); 
                                $fv=explode(".",$filename);
                                $addp = $uid.".".$fv['1'];
                                $name = $config['file_name'] = $addp; //set file name
                                $this->load->library('upload', $config);
                                $this->upload->initialize($config);
                                $this->upload->do_upload('addproof');
                            }
                                $get    =   $this->settings_model->update_profile($valu,$idP,$addp);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Profile has been updated successfully");
                                        redirect("settings/profile");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating your profile");
                                        redirect("settings/profile");
                                }
                        }
                }
                $data['view']       =  $this->settings_model->profile($valu);
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $this->load->view('layout/inner_template',$data);		
	}
        public function select_state($val){
                if($val == "Select State"){
                        $this->form_validation->set_message('select_state', "Please Select State.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function select_city($val){
                if($val == "Select City"){
                        $this->form_validation->set_message("select_city", "Please Select City.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
        
        public function virtualAmt(){
             $data = array(
                    'title'         => 'ESY TOPUP :: VIRTUAL AMOUNT',
                    'metakeyword'   => 'ESY TOPUP :: VIRTUAL AMOUNT',
                    'metadesc'      => 'ESY TOPUP :: VIRTUAL AMOUNT',
                    'content'       => 'virtualAmt'
            );
             if($this->input->post('add')){
                     
            $this->form_validation->set_rules('amount','Virtual Amount','required');
            
             if($this->form_validation->run() == TRUE){
                				 
                $result = $this->settings_model->addAmount();
                                
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Virtual Amount Added Successfully.');  
                    redirect('settings/virtualAmt');
                }else{
                     $this->session->set_flashdata('err','Recharge fail : Some internal error occurred.');  
                     redirect('settings/virtualAmt');
                }
            }
       }
             $data['get']       =  $this->settings_model->getVirtual();
            $this->load->view('layout/inner_template',$data);
        }
        public function editVirtualAmt(){
             $data = array(
                    'title'         => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'metakeyword'   => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'metadesc'      => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'content'       => 'edit_virtualAmt'
            );
             if($this->input->post('add')){
                     
            $this->form_validation->set_rules('amount','Virtual Amount','required');
            
             if($this->form_validation->run() == TRUE){
                				 
                $result = $this->settings_model->editAmount();
                                
                if($result == 1){                    
                    $this->session->set_flashdata('msg','Virtual Amount Added Successfully.');  
                    redirect('settings/virtualAmt');
                }else{
                     $this->session->set_flashdata('err','Recharge fail : Some internal error occurred.');  
                     redirect('settings/editVirtualAmt');
                }
            }
       }
             $data['get']       =  $this->settings_model->getVirtual();
            $this->load->view('layout/inner_template',$data);
        }
        
        public function getVirtual(){
            echo $this->settings_model->getVirtual1();
         }
         
         public function moneyTransfer(){
              $data = array(
                    'title'         => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'metakeyword'   => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'metadesc'      => 'ESY TOPUP :: EDIT VIRTUAL AMOUNT',
                    'content'       => 'recharge_transfer'
            );
              if($this->input->post('transfer')){
                  $this->form_validation->set_rules('amount',' Amount','required');
                  $this->form_validation->set_rules('remarks','Remarks','required');
                  $this->form_validation->set_rules('credit','Credit or Rollback ','required');
            
                    if($this->form_validation->run() == TRUE){
                        if($this->input->post("credit") == 2){
                            $from     = $this->session->userdata('login_id');
                            $to   = $this->uri->segment(3);
                            $result = $this->settings_model->transferVamt($to,$from);
                        }
                        else{
                            $from = $this->session->userdata('login_id');
                            $to = $this->uri->segment(3);
                            $result = $this->settings_model->transferVamt($from,$to);
                        }
                       if($result == 1){                    
                           $this->session->set_flashdata('msg','Amount Transfered Successfully.');  
                           redirect('settings/moneyTransfer/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
                       }else{
                            $this->session->set_flashdata('err',' fail : Some internal error occurred.');  
                            redirect('settings/moneyTransfer/'.$this->uri->segment(3).'/'.$this->uri->segment(4));
                       }
                   }
            }
            $val = "<table class='table table-striped'><tr><td>User Type </td><td>Name</td><td>Amount</td></tr>";
            $data['get']      =  $this->settings_model->getVirtualgetter($this->uri->segment(3)); 
            $ue = $this->uri->segment(4);
            $get_co           =  $this->settings_model->getVirtualallgetter($this->uri->segment(3),$ue);
            foreach($get_co as $co){
                    $val .= "<tr><td>".$co->type_user."</td><td>".ucfirst($co->first_name)."</td><td>".$this->settings_model->getVirtualgetter($co->login_id)."</td></tr>";
            }
            $val .= "</table>";
            $data['get_co']  = $val;
            $data['profile']      =  $this->settings_model->getprofile($this->uri->segment(3)); 
            $this->load->view('layout/inner_template',$data);
         }
         
         public function viewTrandDetail(){
             $data = array(
                    'title'         => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'metakeyword'   => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'metadesc'      => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'content'       => 'view_trans_details'
            );
              $data['debit']       =  $this->settings_model->getDebit($this->uri->segment(3)); 
              $data['credit']       =  $this->settings_model->getCredit($this->uri->segment(3)); 
            $this->load->view('layout/inner_template',$data);
         }
         
         public function notes(){
             $data = array(
                    'title'         => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'metakeyword'   => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'metadesc'      => 'ESY TOPUP :: VIEW TRANSFER DETAIL',
                    'content'       => 'notice'
            );
             if($this->input->post('add')){
                 $this->form_validation->set_rules('title',' Title','required');
                  $this->form_validation->set_rules('message','Message','required');
                    if($this->form_validation->run() == TRUE){
                        $update = $this->settings_model->noticeUpdate();
                        if($update == 1){
                             $this->session->set_flashdata('msg','Notice Board Updated.');  
                           redirect('settings/notes/');
                        }else{
                           $this->session->set_flashdata('err','Fail : Some internal error occurred.');
                             redirect('settings/notes/');
                        }
                    }
             }
             $data['notice']       =  $this->settings_model->notice();
             $this->load->view('layout/inner_template',$data);
         }
}