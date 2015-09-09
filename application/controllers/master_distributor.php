<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master_distributor extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('master_distributor_model');
            date_default_timezone_set('Asia/Kolkata');  
            if( $this->session->userdata('login_id') == ''){redirect('login');}
        }
	public function create_master_distributor(){
            if($this->session->userdata('my_type') != 1 ){redirect('dashboard');}
                $data = array(
                        'title'         => ' ESY TOPUP :: CREATE MASTER DISTRIBUTOR',
                        'metakeyword'   => ' ESY TOPUP :: CREATE MASTER DISTRIBUTOR',
                        'metadesc'      => ' ESY TOPUP :: CREATE MASTER DISTRIBUTOR',
                        'content'       => 'create_master_distributor'
                );
                if($this->input->post('create_master_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",       "required|is_unique[login.login_mobile]|min_length[10]");
                        $this->form_validation->set_rules("login_email",        "Email Id",         "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",         "required|min_length[4]|callback_password_check");
                        $this->form_validation->set_rules("con_password",       "Confirm Password", "required|matches[password]");
                        $this->form_validation->set_rules("country",            "Country",          "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("package",            "Package",          "callback_select_package");
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
                                $get    =   $this->master_distributor_model->insert_master_distributor($idP,$addp);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Master Distributor has been created successfully");
                                        redirect("master_distributor/create_master_distributor");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating master distributor");
                                        redirect("master_distributor/create_master_distributor");
                                }
                        }
                }
                $data['pkg']   =  $this->packages();
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
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
        public function select_country($val){
                if($val == "Select Country"){
                        $this->form_validation->set_message("select_country", "Please Select Country.");
                        return false;
                }
                else{
                    return true;
                }
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
        public function select_package($val){
                if($val == "Select Package"){
                        $this->form_validation->set_message("select_package", "Please Select Package.");
                        return false;
                }
                else{
                    return true;
                }
        }
        public function view_master_distributor(){
            if($this->session->userdata('my_type') != 1 ){redirect('dashboard');}
                $data = array(
                        'title'         => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'metakeyword'   => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'metadesc'      => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'content'       => 'view_master_distributor'
                );
                $data['view_dis']   =  $this->master_distributor_model->view_master_distributor();
                $this->load->view('layout/inner_template',$data);		
	}
        public function edit_master_distributor(){
            if($this->session->userdata('my_type') != 1 ){redirect('dashboard');}
                $data = array(
                        'title'         => ' ESY TOPUP :: EDIT MASTER DISTRIBUTOR',
                        'metakeyword'   => ' ESY TOPUP :: EDIT MASTER DISTRIBUTOR',
                        'metadesc'      => ' ESY TOPUP :: EDIT MASTER DISTRIBUTOR',
                        'content'       => 'edit_master_distributor'
                );
                $valu    = $this->uri->segment(3);
                if($valu !=  ""){
                        $this->session->set_userdata("value",$valu);
                        $valu   =   $this->session->userdata("value");
                }
                else{
                        $valu   =   $this->session->userdata("value");
                }
                $data['view']       =  $this->master_distributor_model->edit_master_distributor($valu);
                if($this->input->post('update_master_distributor')){
                        $original_value =  $data['view']->login_email;
                        if($this->input->post('login_email') != $original_value) {
                            $va_em     =  $this->input->post('login_email');
                            $is_unique =  '|is_unique[login.login_email]';
                        } else {
                                $va_em      =   $original_value;
                                $is_unique =  '';
                        }
                    
                        $mol_value =  $data['view']->mobile;
                        if($this->input->post('mobile_no') != $mol_value) {
                            $mo_em     =  $this->input->post('mobile_no');
                            $is_unie =  '|is_unique[login.login_mobile]';
                        } else {
                                $mo_em      =   $mol_value;
                                $is_unie =  '';
                        }
                        $this->form_validation->set_rules("first_name",         "First Name",       "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",        "required");
                        $this->form_validation->set_rules("country",            "Country",          "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",            "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",             "callback_select_city");
                        $this->form_validation->set_rules("package",            "Package",          "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",          "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",       "required|min_length[10]".$is_unie);
                        $this->form_validation->set_rules("login_email",        "Email Id",         "required". $is_unique);
                        
                        if($this->form_validation->run() == TRUE){
                             $idP = $data['view']->id_prof;$addp=$data['view']->add_proof;
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
                                $get    =   $this->master_distributor_model->update_master_distributor($valu,$idP,$addp,$va_em,$mo_em);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Master Distributor has been updated successfully");
                                        redirect("master_distributor/edit_master_distributor/".$valu);
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating master distributor");
                                        redirect("master_distributor/edit_master_distributor/".$valu);
                                }
                        }
                }
                
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->packages();
                $this->load->view('layout/inner_template',$data);		
	}
        public function packages(){
                $pkg1    =  $this->master_distributor_model->getMasterPackages();
                return $pkg1;
        }
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
        public function master_distributor_details(){
            if($this->session->userdata('my_type') != 1 ){redirect('dashboard');}
                $data = array(
                        'title'         => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'metakeyword'   => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'metadesc'      => ' ESY TOPUP :: VIEW MASTER DISTRIBUTOR',
                        'content'       => 'view_master_distributor_details'
                );
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('det',$val);
                        $id     =   $this->session->userdata('det');
                }
                else{
                        $id     =   $this->session->userdata('det');
                }
                    $type   =  2;
                    $data['view']       =   $this->common_model->details($id,$type);
//                    $data['super']      =   $this->master_distributor_model->super_distributor_details($id);
                $this->load->view('layout/inner_template',$data);    
        }
        public function module_access(){
                $this->load->library('../controllers/common');
                $this->common->update_access();		
	}
}