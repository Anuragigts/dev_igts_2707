<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agent extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->library('form_validation');
            $this->load->model('common_model');
            $this->load->model('agent_model');
            date_default_timezone_set('Asia/Kolkata');  
        }
	public function create_agent(){
                $data = array(
                        'title'         => 'SC :: CREATE AGENT',
                        'metakeyword'   => 'SC :: CREATE AGENT',
                        'metadesc'      => 'SC :: CREATE AGENT',
                        'content'       => 'create_agent'
                );
                if($this->input->post('create_agent')){
                        $this->form_validation->set_rules("first_name",         "First Name",           "required|min_length[4]");
                        $this->form_validation->set_rules("last_name",          "Last Name",            "required|min_length[4]");
                        $this->form_validation->set_rules("mobile_no",          "Mobile No.",           "required|is_unique[login.login_mobile]");
                        $this->form_validation->set_rules("login_email",        "Email Id",             "required|is_unique[login.login_email]");
                        $this->form_validation->set_rules("password",           "Password",             "required|min_length[4]");
                        $this->form_validation->set_rules("con_password",       "Confirm Password",     "required|matches[password]");
                        $this->form_validation->set_rules("country",            "Country",              "callback_select_country");
                        $this->form_validation->set_rules("state",              "State",                "callback_select_state");
                        $this->form_validation->set_rules("city",               "City",                 "callback_select_city");
                        $this->form_validation->set_rules("master",             "Master Distributor",   "callback_select_master");
                        $this->form_validation->set_rules("super",              "Super Distributor",    "callback_select_super");
                        $this->form_validation->set_rules("distributor",        "Distributor",          "callback_select_distributor");
                        $this->form_validation->set_rules("package",            "Package",              "callback_select_package");
                        $this->form_validation->set_rules("address",            "Address",              "required");
                        if($this->form_validation->run() == TRUE){
                                $get    =   $this->agent_model->insert_agent();
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
                $data = array(
                        'title'         => 'SC :: VIEW AGENT',
                        'metakeyword'   => 'SC :: VIEW AGENT',
                        'metadesc'      => 'SC :: VIEW AGENT',
                        'content'       => 'view_agent'
                );
                $data['view_dis']   =  $this->agent_model->view_agent();
                $this->load->view('layout/inner_template',$data);		
	}
}