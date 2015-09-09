<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('agent_model');
            date_default_timezone_set('Asia/Kolkata');
            if( $this->session->userdata('login_id') == ''){redirect('login');}
        }
	public function create_agent(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3 &&  $this->session->userdata('my_type') != 4){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: CREATE AGENT',
                        'metakeyword'   => 'ESY TOPUP :: CREATE AGENT',
                        'metadesc'      => 'ESY TOPUP :: CREATE AGENT',
                        'content'       => 'create_agent'
                );
                if($this->input->post('create_agent')){
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
                        $this->form_validation->set_rules("distributor",        "Distributor",          "callback_select_distributor");
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
                                $get    =   $this->agent_model->insert_agent($idP,$addp);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Agent has been created successfully");
                                        redirect("agent/create_agent");
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while creating agent");
                                        redirect("agent/create_agent");
                                }
                        }
                }
                $id1    =   5;
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->getPackages($id1);
                $data['master']     =  $this->common_model->getMasterdistributors();
                $data['sup']        =  $this->getSuperdistributors();
                $data['dis']        =  $this->getDistributors();
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
        public function select_distributor($val){
                if($val == "Select Distributor"){
                        $this->form_validation->set_message("select_distributor", "Please Select Distributor.");
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
        public function view_agent(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3 &&  $this->session->userdata('my_type') != 4){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW AGENT',
                        'metakeyword'   => 'ESY TOPUP :: VIEW AGENT',
                        'metadesc'      => 'ESY TOPUP :: VIEW AGENT',
                        'content'       => 'view_agent'
                );
                $data['view_dis']   =  $this->agent_model->view_agent();
                $this->load->view('layout/inner_template',$data);		
	}
        public function agent_details(){
             if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3 &&  $this->session->userdata('my_type') != 4){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: VIEW AGENT',
                        'metakeyword'   => 'ESY TOPUP :: VIEW AGENT',
                        'metadesc'      => 'ESY TOPUP :: VIEW AGENT',
                        'content'       => 'view_agent_detail'
                );               
                 $val    = $this->uri->segment(3);
                if($val !=  ''){
                        $this->session->set_userdata('det',$val);
                        $id     =   $this->session->userdata('det');
                }
                else{
                        $id     =   $this->session->userdata('det');
                }
                $type   =   5;
                $data['view']      =   $this->common_model->details($id,$type);
                $this->load->view('layout/inner_template',$data);    		
        }

        public function edit_agent(){
            if($this->session->userdata('my_type') != 1 && $this->session->userdata('my_type') != 2 &&  $this->session->userdata('my_type') != 3 &&  $this->session->userdata('my_type') != 4){redirect('dashboard');}
                $data = array(
                        'title'         => 'ESY TOPUP :: EDIT AGENT',
                        'metakeyword'   => 'ESY TOPUP :: EDIT AGENT',
                        'metadesc'      => 'ESY TOPUP :: EDIT AGENT',
                        'content'       => 'edit_agent'
                );
                $valu    = $this->uri->segment(3);
                if($valu !=  ""){
                        $this->session->set_userdata("value",$valu);
                        $valu   =   $this->session->userdata("value");
                }
                else{
                        $valu   =   $this->session->userdata("value");
                }
                $data['view']       =  $this->agent_model->edit_agent($valu);
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
                if($this->input->post('update_agent')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
                        $this->form_validation->set_rules("distributor",        "Distributor",          "callback_select_distributor");
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
                                $get    =   $this->agent_model->update_agent($valu,$idP,$addp,$va_em,$mo_em);
                                if($get == 1){
                                        $this->session->set_flashdata("msg","Agent has been updated successfully");
                                        redirect("agent/edit_agent/".$valu);
                                }
                                else{
                                        $this->session->set_flashdata("err","Internal error occurred while updating agent");
                                        redirect("agent/edit_agent/".$valu);
                                }
                        }
                }
                
                $id1    =   5;
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->getPackages($id1);
                $data['master']     =  $this->getMasterdistributors();
                $data['sup']        =  $this->getSuperdistributors();
                $data['dis']        =  $this->getDistributors();
                $this->load->view('layout/inner_template',$data);		
	}
        public function getPackages($id1){
                $pak    =   $this->common_model->getallPackages($id1);
                return $pak;
        }
        public function getDistributors(){
                $pak    =   $this->common_model->allDistributors();
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
        public function countries(){
                $cou    =  $this->common_model->getCountries();
                return $cou;
        }
        public function states(){
                $cou    =  $this->common_model->getallStates();
                return $cou;
        }
        public function cities(){
                $cou    =  $this->common_model->getallCities();
                return $cou;
        }
        public function module_access_agent(){
                $this->load->library('../controllers/common');
                $this->common->update_access();		
	}
}