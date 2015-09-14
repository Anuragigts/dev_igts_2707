<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Super_distributor extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('super_distributor_model');
            date_default_timezone_set('Asia/Kolkata');  
            if( $this->session->userdata('login_id') == ''){redirect('login');}
        }
	public function create_super_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: CREATE SUPER DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: CREATE SUPER DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: CREATE SUPER DISTRIBUTOR',
                        'content'       => 'create_super_distributor'
                );
                if($this->input->post('create_super_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",           "required|is_unique[login.login_mobile]|min_length[10]");
                        $this->form_validation->set_rules("login_email",        "Email Id",             "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",             "required|min_length[4]||callback_password_check");
                        $this->form_validation->set_rules("con_password",       "Confirm Password",     "required|matches[password]");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("package",            "Package",              "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",              "required");
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
                                $get    =   $this->super_distributor_model->insert_super_distributor($idP,$addp);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Super Distributor has been created successfully");
                                        redirect("super_distributor/create_super_distributor");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating super distributor");
                                        redirect("super_distributor/create_super_distributor");
                                }
                        }
                }
                $data['state']        =  $this->states();
                $data['city']        =  $this->cities();
                $data['master']     =  $this->getMasterdistributors();
                $id1    = 3;
                $data['pkg']        =  $this->getPackages($id1);
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
        public function select_master($val){
                if($val == "Select Master Distributor"){
                        $this->form_validation->set_message("select_master", "Please Select Master Distributor.");
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
        public function view_super_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'content'       => 'view_super_distributor'
                );
                $data['view_dis']   =  $this->super_distributor_model->view_super_distributor();
                $this->load->view('layout/inner_template',$data);		
	}
        public function edit_super_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: EDIT SUPER DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: EDIT SUPER DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: EDIT SUPER DISTRIBUTOR',
                        'content'       => 'edit_super_distributor'
                );
                $valu    = $this->uri->segment(3);
                $id1    = 3;
                
                if($valu !=  ""){
                        $this->session->set_userdata("ve",$valu);
                        $ve   =   $this->session->userdata("ve");
                }
                else{
                        $ve   =   $this->session->userdata("ve");
                }
                $data['view']       =  $this->super_distributor_model->edit_super_distributor($ve);
                
                if($this->input->post('update_super_distributor')){
                        
                        $original_value =  $data['view']->login_email;
                        $mol_value =  $data["view"]->mobile;
                       
                        if($this->session->userdata("my_type") == 1){
                            if($this->input->post('login_email') != $original_value) {
                                $va_em     =  $this->input->post('login_email');
                                $is_unique =  'required|is_unique[login.login_email]';
                            } 
                            else{
                                $va_em          =   $original_value;
                                $is_unique      =  '';
                            }
                            if($this->input->post('mobile_no') != $mol_value) {
                                $mo_em     =  $this->input->post('mobile_no');
                                $is_unie =  'required|min_length[10]|is_unique[login.login_mobile]';
                            } else{
                                $mo_em          =   $mol_value;
                                $is_unie        =  '';
                            }
                        }else{
                                $va_em          =   $original_value;
                                $is_unique      =  '';
                                $mo_em          =   $mol_value;
                                $is_unie        =  '';
                        }
                        
                        $this->form_validation->set_rules("first_name",         "First Name",                   "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",                    "required");
                        $this->form_validation->set_rules("state",              "State",                        "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                         "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",           "callback_select_master");
                        $this->form_validation->set_rules("package",            "Package",                      "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",                      "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",                   $is_unie);
                        $this->form_validation->set_rules("login_email",        "Email Id",                     $is_unique);
                        if($this->form_validation->run() == TRUE){
                                 $idp = $data['view']->id_proof;$addp=$data['view']->add_proof;
                        if($_FILES['idproof']['name'] != ''){
                            $config['upload_path'] = './doc';
                            $config['allowed_types'] = 'gif|jpg|png';
                            $file = $_FILES['idproof'];
                            $uid = date('Y-m-d_i-s');
                            $uid = 'i'.$uid;
                            $filename = basename($file['name']); 
                            $fv=explode(".",$filename);
                            $idp = $uid.".".$fv['1'];
                            $name = $config['file_name'] = $idp; //set file name
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
                                $get    =   $this->super_distributor_model->update_super_distributor($ve,$idp,$addp,$va_em,$mo_em);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Super Distributor has been updated successfully");
                                        redirect("super_distributor/edit_super_distributor/".$ve);
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating super distributor");
                                        redirect("super_distributor/edit_super_distributor/".$ve);
                                }
                        }
                }
                
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->getPackages($id1);
                $data['master']     =  $this->getMasterdistributors();
                $this->load->view('layout/inner_template',$data);		
	}
        public function getPackages($id){
                $pak    =   $this->common_model->getallPackages($id);
                return $pak;
        }
        public function getMasterdistributors(){
                $pak    =   $this->common_model->getMasterdistributors();
                return $pak;
        }
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
        public function super_distributor_details(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: VIEW SUPER DISTRIBUTOR',
                        'content'       => 'view_super_distributor_details'
                );
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('det',$val);
                        $id     =   $this->session->userdata('det');
                }
                else{
                        $id     =   $this->session->userdata('det');
                }
                $type   =   3;
                $data['view']      =   $this->common_model->details($id,$type);
                $this->load->view('layout/inner_template',$data);    
        }
        public function module_access_super(){
                $this->load->library('../controllers/common');
                $this->common->update_access();		
	}
}