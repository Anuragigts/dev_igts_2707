<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Distributor extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('distributor_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
	public function create_distributor(){
                $data = array(
                        'title'         => 'SC :: CREATE DISTRIBUTOR',
                        'metakeyword'   => 'SC :: CREATE DISTRIBUTOR',
                        'metadesc'      => 'SC :: CREATE DISTRIBUTOR',
                        'content'       => 'create_distributor'
                );
                if($this->input->post('create_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required|min_length[4]");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",           "required|is_unique[login.login_mobile]|min_length[10]");
                        $this->form_validation->set_rules("login_email",        "Email Id",             "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",             "required|min_length[4]");
                        $this->form_validation->set_rules("con_password",       "Confirm Password",     "required|matches[password]");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
                        $this->form_validation->set_rules("package",            "Package",              "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",              "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->distributor_model->insert_distributor();
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
                $data['val']        =  $this->common_model->getCountries();
                $data['master']     =  $this->common_model->getMasterdistributors();
                $this->load->view('layout/inner_template',$data);		
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
                $data = array(
                        'title'         => 'SC :: VIEW DISTRIBUTOR',
                        'metakeyword'   => 'SC :: VIEW DISTRIBUTOR',
                        'metadesc'      => 'SC :: VIEW DISTRIBUTOR',
                        'content'       => 'view_distributor'
                );
                $data['view_dis']   =  $this->distributor_model->view_distributor();
                $this->load->view('layout/inner_template',$data);		
	}
        public function edit_distributor(){
                $data = array(
                        'title'         => 'SC :: EDIT DISTRIBUTOR',
                        'metakeyword'   => 'SC :: EDIT DISTRIBUTOR',
                        'metadesc'      => 'SC :: EDIT DISTRIBUTOR',
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
                if($this->input->post('update_distributor')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required|min_length[4]");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
                        $this->form_validation->set_rules("package",            "Package",              "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",              "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->distributor_model->update_distributor($valu);
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
                $data['view']       =  $this->distributor_model->edit_distributor($valu);
                $data['val']        =  $this->countries();
                $data['state']      =  $this->states();
                $data['city']       =  $this->cities();
                $data['pkg']        =  $this->getPackages();
                $data['master']     =  $this->getMasterdistributors();
                $data['sup']        =  $this->getSuperdistributors();
                $this->load->view('layout/inner_template',$data);		
	}
        public function getPackages(){
                $pak    =   $this->common_model->getallPackages();
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
        public function distributor_details(){
                $data = array(
                        'title'         => 'SC :: VIEW DISTRIBUTOR',
                        'metakeyword'   => 'SC :: VIEW DISTRIBUTOR',
                        'metadesc'      => 'SC :: VIEW DISTRIBUTOR',
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