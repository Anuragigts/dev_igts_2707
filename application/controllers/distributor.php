<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('distributor_model');
            date_default_timezone_set('Asia/Kolkata');  
            if( $this->session->userdata('login_id') == ''){redirect('login');}
        }
	public function create_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: CREATE DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: CREATE DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: CREATE DISTRIBUTOR',
                        'content'       => 'create_distributor'
                );
                if($this->input->post('create_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",           "required|is_unique[login.login_mobile]|min_length[10]");
                        $this->form_validation->set_rules("login_email",        "Email Id",             "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",             "required|min_length[4]||callback_password_check");
                        $this->form_validation->set_rules("con_password",       "Confirm Password",     "required|matches[password]");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
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
                           
                                $get    =   $this->distributor_model->insert_distributor($idP,$addp);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Distributor has been created successfully");
                                        redirect("distributor/create_distributor");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating distributor");
                                        redirect("distributor/create_distributor");
                                }
                        }
                }
                $data['states']     =  $this->states();
                $data['city']        =  $this->cities();
                $id1    = 4;
                $data['pkg']        =  $this->getPackages($id1);
                $data['sup']        =  $this->getSuperdistributors();
                $data['master']     =  $this->common_model->getMasterdistributors();
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
        public function select_super($val){
                if($val == "Select Super Distributor"){
                        $this->form_validation->set_message("select_super", "Please Select Super Distributor.");
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
        public function view_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'content'       => 'view_distributor'
                );
                $data['view_dis']   =  $this->distributor_model->view_distributor();
                $this->load->view('layout/inner_template',$data);		
	}
        public function edit_distributor(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: EDIT DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: EDIT DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: EDIT DISTRIBUTOR',
                        'content'       => 'edit_distributor'
                );
                $valu    = $this->uri->segment(3);
                if($valu !=  ""){
                        $this->session->set_userdata("value",$valu);
                        $valu   =   $this->session->userdata("value");
                }
                else{
                        $valu   =   $this->session->userdata("value");
                }
                $data['view']       =  $this->distributor_model->edit_distributor($valu);
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
                if($this->input->post('update_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
                        $this->form_validation->set_rules("package",            "Package",              "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",              "required");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",                   $is_unie);
                        $this->form_validation->set_rules("login_email",        "Email Id",                     $is_unique);
                        if($this->form_validation->run() == TRUE){
                             $idP = $data['view']->id_proof;$addp=$data['view']->add_proof;
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
                        
                                $get    =   $this->distributor_model->update_distributor($valu,$idP,$addp,$va_em,$mo_em);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Distributor has been updated successfully");
                                        redirect("distributor/edit_distributor/".$valu);
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating distributor");
                                        redirect("distributor/edit_distributor/".$valu);
                                }
                        }
                }
                
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $id1    = 4;
                $data['pkg']        =  $this->getPackages($id1);
                $data['master']     =  $this->getMasterdistributors();
                $data['sup']        =  $this->getSuperdistributors();
                $this->load->view('layout/inner_template',$data);		
	}
        public function getPackages($id){
                $pak    =   $this->common_model->getallPackages($id);
                return $pak;
        }
        public function getSuperdistributors(){
                $pak    =   $this->common_model->getallSuperdistributors();
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
        public function distributor_details(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'metakeyword'   => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'metadesc'      => 'ESY TOPUP :: VIEW DISTRIBUTOR',
                        'content'       => 'view_distributor_details'
                );
                $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('det',$val);
                        $id     =   $this->session->userdata('det');
                }
                else{
                        $id     =   $this->session->userdata('det');
                }
                $type   =   4;
                $data['view']      =   $this->common_model->details($id,$type);
                $this->load->view('layout/inner_template',$data);    
        }
        public function module_access_dis(){
                $this->load->library('../controllers/common');
                $this->common->update_access();		
	}
}